<?php

/* CUSTOM PHP CLI TO CREATE HMVC CI4 */
$commands = ['buatmodul', 'hapusmodul', 'newroute','list'];
$path = 'app/Modules'; //module path
$basecontroller = "";
$backupdir = 'backup';
$pathview = 'app/Views'; // viewpath

if (isset($argv[1]) && $argv[1] === '-h') {
    echo "Usage: php mikromed.php <command> [parameters]\n";
    echo "Commands: " . implode(', ', $commands) . "\n";
    echo "Description: This script is used to create, delete module CI4 in folder APP/MODULE.\n";
} else if (isset($argv[1]) && in_array($argv[1], $commands)) {
    $command = $argv[1];
    $params = array_slice($argv, 2);

    $forceUpdate = false;
    if (in_array('-R', $params)) {
        $forceUpdate = true;
        $params = array_diff($params, ['-R']);
    }

    switch ($command) {
        case 'buatmodul':
            /* CREATE CONTROLER AND MODEL */
            if (count($params) !== 1) {
                echo "Invalid parameters. Usage: php mikromed.php buatmodul <name>\n";
                exit(1);
            }

            $name = ucfirst($params[0]);


            /* CHECK IF MODULE EXIST */
            $folder = $path . '/' . $name;
            $folderview = $pathview . '/' . $name;
            $controller = $folder . '/Controllers/' . $name . '.php';
            $base = $folder . '/Controllers/BaseControl.php';
            $model = $folder . '/Models/M_' . $name . '.php';
            $route = $folder . '/Config/routes.php';
            $variable = $folder . '/Variable/variable.json';
            $variablenote = $folder . '/Variable/note.txt';
            if (is_dir($folder)) {
                if ($forceUpdate) {
                    // replace modul
                    echo "replace modul $folder\n";

                    $backup = $backupdir . '/' . $name . time();
                    // backup Modul
                    echo "BACKUP MODUL TO $backup \n";
                    recursiveDirectoryCopy($folder, $backup);
                    recursiveDirectoryCopy($folderview, $backup . '/View');

                    echo "DELETE MODULE IF EXIST\n";
                    deleteDirectory($folder);
                    deleteDirectory($folderview);

                    echo "Creating Module Dir $folder...\n";

                    // CREATE FOLDER   MODULE
                    if (!is_dir($folder))
                        mkdir($folder, 0775, true);
                    echo "Creating Module Controller Dir $folder/Controllers...\n";

                    // CREATE FOLDER  controller                  
                    if (!is_dir($folder . '/Controllers'))
                        mkdir($folder . '/Controllers', 0775, true);
                    echo "Creating Controller $controller...\n";
                    // GET MASTER CONTROLLERf FILE
                    $sourceFile = 'masterfile/Controller.txt';
                    // Get the content of the source file
                    $content = file_get_contents($sourceFile);
                    $newcontent = str_replace("CONTROLLERNAME", $name, $content);
                    // Write the modified content to the destination file
                    file_put_contents($controller, $newcontent);


                    // Creating baseControl
                    echo "Creating BaseController $base...\n";
                    // GET MASTER CONTROLLERf FILE
                    $sourceFile = 'masterfile/basecontrol.txt';
                    // Get the content of the source file
                    $content = file_get_contents($sourceFile);
                    $newcontent = str_replace("MODULENAME", $name, $content);
                    // Write the modified content to the destination file
                    file_put_contents($base, $newcontent);


                    // CREATE FOLDER  Model  
                    if (!is_dir($folder . '/Models'))
                        mkdir($folder . '/Models', 0775, true);
                    echo "Creating Model $model...\n";
                    // GET MASTER Model FILE
                    $sourceFile = 'masterfile/Model.txt';
                    // Get the content of the source file
                    $content = file_get_contents($sourceFile);
                    $newcontent = str_replace("MODELNAME", $name, $content);
                    // Write the modified content to the destination file
                    file_put_contents($model, $newcontent);


                    // CREATE FOLDER  VIEW
                    if (!is_dir($folderview))
                        mkdir($folderview, 0775, true);
                    // GET MASTER Model FILE
                    $sourceFile = 'masterfile/View.txt';
                    // Get the content of the source file
                    $content = file_get_contents($sourceFile);
                    $newcontent = str_replace("VIEWNAME", $name, $content);
                    // Write the modified content to the destination file                
                    file_put_contents($folderview . '/V_' . $name . '.php', $newcontent);

                    /* CREATE CONFIG ROUTE */
                    if (!is_dir($folder . '/Config'))
                        mkdir($folder . '/Config', 0775, true);
                    echo "Creating route $route...\n";
                    // GET MASTER ROUTE FILE
                    $sourceRoute = 'masterfile/route.txt';
                    $contentRoute = file_get_contents($sourceRoute);
                    $newcontent = str_replace("MODULENAME", $name, $contentRoute);
                    // Write the modified content to the destination file                
                    file_put_contents($route, $newcontent);


                    // CREATE FOLDER  variable                  
                    if (!is_dir($folder . '/Variable'))
                        mkdir($folder . '/Variable', 0775, true);
                    echo "Creating Variable $variable...\n";
                    // GET MASTER Variable FILE
                    $sourceFile = 'masterfile/variable.txt';
                    // Get the content of the source file
                    $content = file_get_contents($sourceFile);
                    $newcontent = str_replace("VARNAME", $name, $content);
                    $newcontent = str_replace("VARSMALL", strtolower($name), $newcontent);
                    // Write the modified content to the destination file
                    file_put_contents($variable, $newcontent);

                    // GET MASTER Note FILE
                    $sourceFile = 'masterfile/note.txt';
                    // Get the content of the source file
                    $content = file_get_contents($sourceFile);
                    $newcontent = str_replace("VARNAME", $name, $content);
                    $newcontent = str_replace("VARSMALL", strtolower($name), $newcontent);
                    // Write the modified content to the destination file
                    file_put_contents($variablenote, $newcontent);




                    echo "The Modul $name has been created.\n";
                    $link = strtolower($name);
                    echo "access module here http://localhost:8080/$link \n";
                } else {
                    echo "The folder $folder exists.";
                }
            } else {
                echo "Creating Module Dir $folder...\n";
                // CREATE FOLDER   MODULE       
                if (!is_dir($folder))
                    mkdir($folder, 0775, true);

                echo "Creating Module Controller Dir $folder/Controller...\n";

                // CREATE FOLDER  controller  
                if (!is_dir($folder . '/Controllers'))
                    mkdir($folder . '/Controllers', 0775, true);
                echo "Creating Controller $controller...\n";
                // GET MASTER CONTROLLERf FILE
                $sourceFile = 'masterfile/Controller.txt';
                // Get the content of the source file
                $content = file_get_contents($sourceFile);
                $newcontent = str_replace("CONTROLLERNAME", $name, $content);
                // Write the modified content to the destination file
                file_put_contents($controller, $newcontent);

                // Creating baseControl
                echo "Creating BaseController $base...\n";
                // GET MASTER CONTROLLERf FILE
                $sourceFile = 'masterfile/basecontrol.txt';
                // Get the content of the source file
                $content = file_get_contents($sourceFile);
                $newcontent = str_replace("MODULENAME", $name, $content);
                // Write the modified content to the destination file
                file_put_contents($base, $newcontent);


                echo "Creating Dir  $folder/Models...\n";
                // CREATE FOLDER  Model  
                if (!is_dir($folder . '/Models'))
                    mkdir($folder . '/Models', 0775, true);
                // GET MASTER Model FILE
                $sourceFile = 'masterfile/Model.txt';
                // Get the content of the source file
                $content = file_get_contents($sourceFile);
                $newcontent = str_replace("MODELNAME", $name, $content);
                // Write the modified content to the destination file
                echo "Creating Model  $model...\n";
                file_put_contents($model, $newcontent);


                // CREATE FOLDER  VIEW
                if (!is_dir($folderview))
                    mkdir($folderview, 0775, true);
                // GET MASTER Model FILE
                $sourceFile = 'masterfile/View.txt';
                // Get the content of the source file
                $content = file_get_contents($sourceFile);
                $newcontent = str_replace("VIEWNAME", $name, $content);
                // Write the modified content to the destination file                
                file_put_contents($folderview . '/V_' . $name . '.php', $newcontent);

                /* CREATE CONFIG ROUTE */
                if (!is_dir($folder . '/Config'))
                    mkdir($folder . '/Config', 0775, true);
                echo "Creating route $route...\n";
                // GET MASTER ROUTE FILE
                $sourceRoute = 'masterfile/route.txt';
                $contentRoute = file_get_contents($sourceRoute);
                $newcontent = str_replace("MODULENAME", $name, $contentRoute);
                // Write the modified content to the destination file                
                file_put_contents($route, $newcontent);




                // CREATE FOLDER  variable                  
                if (!is_dir($folder . '/Variable'))
                mkdir($folder . '/Variable', 0775, true);
                echo "Creating Variable $variable...\n";
                // GET MASTER Variable FILE
                $sourceFile = 'masterfile/variable.txt';
                // Get the content of the source file
                $content = file_get_contents($sourceFile);
                $newcontent = str_replace("VARNAME", $name, $content);
                $newcontent = str_replace("VARSMALL", strtolower($name), $newcontent);
                // Write the modified content to the destination file
                file_put_contents($variable, $newcontent);

                // GET MASTER Note FILE
                $sourceFile = 'masterfile/note.txt';
                // Get the content of the source file
                $content = file_get_contents($sourceFile);
                $newcontent = str_replace("VARNAME", $name, $content);
                $newcontent = str_replace("VARSMALL", strtolower($name), $newcontent);
                // Write the modified content to the destination file
                file_put_contents($variablenote, $newcontent);



                echo "The Modul $name has been created.\n";
                $link = strtolower($name);
                echo "access module here http://localhost:8080/$link \n";
            }


            // Perform create user logic here
            break;

        case 'hapusmodul':
            if (count($params) !== 1) {
                echo "Invalid parameters. Usage: php mikromed.php hapusmodul <name>\n";
                exit(1);
            }

            $name = ucfirst($params[0]);


            /* CHECK IF MODULE EXIST */
            $folder = $path . '/' . $name;
            $folderview = $pathview . '/' . $name;
            $backup = $backupdir . '/' . $name . time();
            // backup Modul
            echo "BACKUP MODUL TO $backup \n";
            recursiveDirectoryCopy($folder, $backup);
            recursiveDirectoryCopy($folderview, $backup . '/View');

            echo "DELETE MODULE \n";
            deleteDirectory($folder);
            echo "DELETE View \n";
            deleteDirectory($folderview);

            echo "The Modul $name has been deleted.\n";
            break;

        case 'list':
            $modul=glob('app/Modules/*', GLOB_ONLYDIR);

            
            $total  =count($modul);
            echo "List Module ($total in total) :  \n";
            foreach($modul as $modulname){
                echo "$modulname \n";
            }
        

            


            break;
        case 'newroute':
                echo "On Development.. \n";
    
    
                break;
        default:
            echo "Invalid command. Supported commands: " . implode(', ', $commands) . "\n";
            exit(1);
    }
} else {
    echo "Invalid command. Usage: php mikromed.php -h\n";
    exit(1);
}


function recursiveDirectoryCopy($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    while (($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                recursiveDirectoryCopy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function deleteDirectory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}
