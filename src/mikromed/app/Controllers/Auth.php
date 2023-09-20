<?php

namespace App\Controllers;

use App\Models\Users;
use CodeIgniter\Events\Events;
use CodeIgniter\Shield\Entities\User;


class Auth extends BaseController
{
    
    public function index()
    {
        return view('theme/modern/auth/login');
    }
    public function register()
    {
        return view('theme/modern/auth/register');
    }
    public function email(){
         
        $email = \Config\Services::email();

        
        
        $email->setTo('missblacklist@gmail.com');

        $email->setSubject('Email Testing');
        $email->setMessage('Testing the email class.');

        
        if (! $email->send(false)) {
            d($email->printDebugger());
        }
    }

    public function register_process(){
        // echo 'aaa';
        // die();
        $username = trim($this->request->getPost('username'));
        $password = trim($this->request->getPost('password'));
        $email     =trim($this->request->getPost('email')); 

        // d($username);
        // d($password);
        // d($email);
        
        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();
        $user = new User([
            'username' => $username,
            'email'    =>  $email ,
            'password' => $password,
        ]);
        $users->save($user);
        
        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());
        
        // Add to default group
        $users->addToDefaultGroup($user);
        Events::trigger('register', $user);
        // return redirect()->route('login');
    }

    public function loginCheck()
    {
        $username = trim($this->request->getPost('username'));
        $password = trim($this->request->getPost('password'));

        $default_menu = null;
        $m1 = ['url'=>'/',
                'icon'=>'',
                 'text'=>'Dashboard'];
        $m2 = ['url'=>'dashboard2',
                'icon'=>'',
                 'text'=>'Dashboard2'];
        $s1 = ['url'=>'home2',
                 'icon'=>'',
                  'text'=>'subdasboard'];
        $s2 = ['url'=>'home2',
                 'icon'=>'',
                  'text'=>'subdasboard'];
        $submenu = [$s1,$s2];
        $default_menu[]=array('base'=>$m1,'sub'=>[]);
        $default_menu[]=array('base'=>$m2,'sub'=>$submenu);
       
        $menu = cache('default_menu');
       
        
        // if($menu==null){
        //     cache()->save('default_menu',json_encode($default_menu),86400); //store cache to 1day = 86400s
            
        // }else{
            
        // }        
         
        $userModel = new Users();
        $datauser = $userModel->where('username',$username)->first();

        // if ($username == 'admin@themesbrand.com' && $password == '123456') {
        if($datauser){
              
            $pass =$datauser['password'];
            $verify_pass = password_verify($password, $pass); 
            $session = session();
           
            if($verify_pass){                
                $session->set('isLoggedIn', 1);
                $session->set('menu', json_encode($default_menu));
                $session->set('user', $datauser);
                return redirect()->to('/');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->back()->with('error', 'Invalid Login Credentials.');
            }
        } else {
            return redirect()->back()->with('error', 'User Not Found.');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('isLoggedIn');
        return redirect()->to('/login');
    }

}
