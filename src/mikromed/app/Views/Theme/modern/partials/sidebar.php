<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu Utama</span></li>    
                <?php 
                    
                    if(session('menu')){
                        
                        $menu = json_decode(session('menu'));
                        
                        foreach($menu as $m){
                            
                            if(empty($m->sub)){
                               
                                echo '<li class="nav-item"><a class="nav-link menu-link" href="'.base_url($m->base->url).'" aria-expanded="false">
                                <i class="'.$m->base->icon.'"></i> <span >'.$m->base->text.'</span></a></li>';
                            }else{
                                
                                echo '<a class="nav-item"><a class="nav-link menu-link" href="#'.$m->base->url.'" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="'.$m->base->url.'">
                                <i class="'.$m->base->icon.'"></i> <span >'.$m->base->text.'</span>
                                    </a>
                                    <div class="collapse menu-dropdown" id="'.$m->base->url.'">
                                        <ul class="nav nav-sm flex-column">';
                                    foreach($m->sub as $sub){
                                        echo '<li class="nav-item">
                                                <a href="'.base_url($sub->url).'" class="nav-link">'.$sub->text.'</a></li>';
                                    }
                                        
                                echo   '</ul>
                                    </div>
                                </a>';
                            }
                        }
                    }
                    ?>

                <?php 
                    if(MASTER_MENU !==null){
                        foreach(MASTER_MENU as $title =>$val){
                            echo '<li class="menu-title"><span data-key="t-menu">'.$title.'</span></li>';     
                            foreach($val as $mainmenu){
                               
                                if(empty($mainmenu['sub'])){
                               
                                    echo '<li class="nav-item"><a class="nav-link menu-link" href="'.base_url($mainmenu['url']).'" aria-expanded="false">
                                    <i class="'.$mainmenu['icon'].'"></i> <span >'.$mainmenu['text'].'</span></a></li>';
                                }else{
                                    
                                    echo '<a class="nav-item"><a class="nav-link menu-link" href="#'.$mainmenu['url'].'" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="'.$mainmenu['url'].'">
                                    <i class="'.$mainmenu['icon'].'"></i> <span >'.$mainmenu['text'].'</span>
                                        </a>
                                        <div class="collapse menu-dropdown" id="'.$mainmenu['url'].'">
                                            <ul class="nav nav-sm flex-column">';
                                        foreach($mainmenu['sub'] as $sub){
                                            echo '<li class="nav-item">
                                                    <a href="'.base_url($sub['url']).'" class="nav-link">'.$sub['text'].'</a></li>';
                                        }
                                            
                                    echo   '</ul>
                                        </div>
                                    </a>';
                                }
                            }       
                        }
                    }
                    ?>
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
               
                <li class="nav-item">
                    
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="las la-tachometer-alt"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics" class="nav-link" data-key="t-analytics"> Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm" class="nav-link" data-key="t-crm"> CRM </a>
                            </li>
                            <li class="nav-item">
                                <a href="/" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto" class="nav-link" data-key="t-crypto"> Crypto </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects" class="nav-link" data-key="t-projects"> Projects </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-nft" class="nav-link" data-key="t-nft"> NFT</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-job" class="nav-link"><span data-key="t-job">Job</span> <span class="badge badge-pill bg-success" data-key="t-new">New</span></a>
                            </li>
                        </ul>
                    </div>
                </li> 
                <!-- end Dashboard Menu -->
                
                <?= $this->renderSection('sidebar') ?>    
                 

                

                

                

                

                 

                

                
                 

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>