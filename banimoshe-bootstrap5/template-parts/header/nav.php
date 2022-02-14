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
$id_temp_marker = 0;

?>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="<?php echo esc_html( get_bloginfo( 'name' )  . " " . get_bloginfo( 'description' ) ); ?>">
                <div class="container-fluid">
                    <?php
                        #WordPress custom logo display
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            #Either logotype - javascript:void(0); or HOME as href
                            echo '<a class="navbar-brand" href="/"  title="' . get_bloginfo( 'description' ) . '" tabindex="-1"><img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">' . '</a>';
                        } else {
                            #Or we could use blog/site name/tag, as chosen in the customizer
                            echo '<a class="text-white" href="/"  title="' . get_bloginfo( 'description' ) . '" tabindex="-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/></svg>' . get_bloginfo('name') . '</a>';
                        }
                    ?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation_ctbm_b5" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navigation_ctbm_b5">
                        <?php 
                        if ( ! empty( $header_menus ) and is_array( $header_menus) ) {
                        ?>
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <?php
                                foreach( $header_menus as $menu_item ) {
                                    if ( ! $menu_item->menu_item_parent ) {
                                        $child_menu_items = $menu_class->get_child_menu_items( $header_menus , $menu_item->ID );
                                        #Storing boolean if the menu item has children
                                        $has_children = ! empty( $child_menu_items ) and is_array( $child_menu_items );
                                        #Checking if it's only one level depth (no children) item
                                        if ( ! $has_children ) {
                                            #It doesn't have children items, hence, one-level menu
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link" title="<?php echo esc_html( $menu_item->title ); ?>" href="<?php echo esc_url( $menu_item->url ); ?>">
                                                    <?php echo esc_html( $menu_item->title ); ?>
                                                </a>
                                            </li>
                                        <?php
                                        } else {
                                            #It does have children
                                            $id_temp_marker++;
                                        ?>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" title="<?php echo esc_html( $menu_item->title ); ?>" href="<?php echo esc_url( $menu_item->url ); ?>" id="sumbenu-<?php echo $id_temp_marker; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php echo esc_html( $menu_item->title ); ?>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="submenu-<?php echo $id_temp_marker; ?>">
                                                    <?php
                                                    foreach( $child_menu_items as $child_menu_item ) {
                                                    ?>
                                                        <li>
                                                            <a class="dropdown-item" title="<?php echo esc_html( $child_menu_item->title ); ?>" href="<?php echo esc_url( $child_menu_item->url ); ?>">
                                                                <?php echo esc_html( $child_menu_item->title ); ?>
                                                            </a>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                        <?php
                                            #End: had children
                                        }
                                        ?>
                                    <?php
                                        #End: was top menu item
                                    }
                                    ?>
                                <?php
                                    #End: foreach
                                }
                                unset( $id_temp_marker); #Getting rid of this temporary marker for submenus
                                ?>
                            </ul>
                            <form>
                                <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                            </form>
                        <?php
                        } 
                        ?> 
                    </div>
                </div>
            </nav>
        </header>
<?php
    // wp_nav_menu(
    //     [
    //         'theme_location' => 'CWTBootstrap5-header-menu',
    //         'container_class' =>'my_extra_menu_class'
    //     ]
    // );
?>