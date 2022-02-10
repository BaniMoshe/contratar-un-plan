<?php

/*
Header navigation template file
@package CWTBootstrap5
*/

#Instantiate or recover the object from the Menus::class
$menu_class = \CWTB5_THEME\Inc\Menus::get_instance();
#Get the WP menu id
$header_menu_id = $menu_class->get_menu_id( 'CWTBootstrap5-header-menu' );
#Get the elements such menu has
$header_menus = wp_get_nav_menu_items( $header_menu_id );

?>
        <header>
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
                <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                    <?php 
                        if ( ! empty( $header_menus ) and is_array( $header_menus) ) {
                    ?>
                    <ul class="navbar-nav">
                        <?php
                            foreach( $header_menus as $menu_item ) {
                                if ( ! $menu_item->$menu_item_parent ) {
                                    $child_menu_items = $menu_class->get_child_menu_items( $header_menus , $menu_item->ID );
                                    #Storing boolean if the menu item has children
                                    $has_children = ! empty( $child_menu_items ) and is_array( $child_menu_items );
                                    #Checking if it's only one level depth (no children) item
                                    if ( ! $has_children ) {
                                        #It doesn't have children items
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>">
                                            <?php echo esc_html( $menu_item->title ); ?></a>
                                        </li>
                                        <?php
                                    } else {
                                        #It does have childen items
                                        ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html( $menu_item->title ); ?></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdown08">
                                            <?php
                                                foreach( $child_menu_items as $child_menu_item ) {
                                            ?>
                                                <li><a class="dropdown-item" href="<?php echo esc_url( $child_menu_item->url ); ?>"><?php echo esc_html( $child_menu_item->title ); ?></a></li>
                                            <?php
                                                }
                                            ?>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                ?>
                        <li class="nav-item">
                            <?php
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                if ( has_custom_logo() ) {
                                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                                } else {
                                    echo '<a class="btn btn-primary" href="javascript:void(0);"  title="' . get_bloginfo( 'description' ) . '"tabindex="-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/></svg>' . get_bloginfo('name') . '</a>';
                                }
                            ?>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown08">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                                <?php
                                }
                            }
                        ?>
                    </ul>
                    <?php
                        } 
                    ?>
                </div>
                </div>
            </nav>

        
            <!-- 
            <div class="px-3 py-2 bg-dark text-white">    
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                            <?php
                                // if ( function_exists( 'the_custom_logo' ) )
                                // {
                                //     the_custom_logo();
                                // }
                            ?>
                        </a>
                        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                            <li>
                                <a href="#" class="nav-link text-secondary">
                                    <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#key"/></svg>
                                    Inicio
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"/></svg>
                                    Medidor
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"/></svg>
                                    Productos
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"/></svg>
                                    Mi cuenta
                                </a>
                            </li>
                        </ul> 
                    </div>
                </div>
            </div>-->
            <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-center">
                <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                <button type="button" class="btn btn-light text-dark me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
                </div>
            </div>
            </div>
        </header>
