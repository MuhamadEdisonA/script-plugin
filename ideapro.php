<?php
/** 
 * Plugin Name: Idea Pro Plugin
 * Description: This is just learning plugin
 **/

 //membuat fungsi shortcode
function ideapro_function(){

    $content = "<div>This is very basic plugin</div>";

    $content .= "<div>This is a div</div>";
    $content .= "<p>This is a paragraph</p>";

    return $content;
    
}
add_shortcode( 'ideapro', 'ideapro_function' );

//menambah menu
function idea_pro_admin_menu(){

    add_menu_page('Header & Footer Scripts', 'Site Scripts', 'manage_options', 'ideapro-admin', 'ideapro_admin_scripts', 'dashicons-shield-alt', 6);

}
add_action('admin_menu', 'idea_pro_admin_menu');

//menjalankan fungsi
function ideapro_admin_scripts(){

    if(array_key_exists('submit_scripts_update', $_POST)){

        update_option('ideapro_header_scripts', $_POST['header_scripts']);
        update_option('ideapro_footer_scripts', $_POST['footer_scripts']);

        ?>
            <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"><strong>Settings have been saved!</strong></div>
        <?php

    }

    $header_scripts = get_option('ideapro_header_scripts', 'none');
    $footer_scripts = get_option('ideapro_footer_scripts', 'none');

    ?>
        <div class="wrap">
            <h2><strong>Update Scripts on Header and Footer</strong></h2>

            <form method="post" action="">

                <label for="header_scripts"><h3>Header Scripts</h3></label>
                <textarea name="header_scripts" class="large-text" id="" cols="30" rows="7"><?php print $header_scripts ?></textarea>

                <label for="footer_scripts"><h3>Footer Scripts</h3></label>
                <textarea name="footer_scripts" class="large-text" id="" cols="30" rows="7"><?php print $footer_scripts ?></textarea>
        
                <input type='submit' name="submit_scripts_update" class="button button-primary" value='Update Scripts'/>
            
            </form>

        </div>
    <?php

}

//display header script
function ideapro_display_header_scripts(){

    $header_scripts = get_option('ideapro_header_scripts', 'none');
    print $header_scripts;

}
add_action('wp_head', 'ideapro_display_header_scripts');


//display footer script
function ideapro_display_footer_scripts(){

    $footer_scripts = get_option('ideapro_footer_scripts', 'none');
    print $footer_scripts;

}
add_action('wp_footer', 'ideapro_display_footer_scripts');

?>