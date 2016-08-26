<?php
/*
 * Plugin Name: Tags Add
 * Version: 0.0.1
 * Description: Plugin adds tags to post
 * Author: Klaudia Wasilewska
 * Author URI: http://edokumenty.eu/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * @var string
 */
define('PLUGIN_TAGS_DIR', plugin_dir_path(__FILE__));
define('TAGS_VERSION', '0.0.1');

/**
 * add to menu
 */
add_action('admin_menu', 'tags_add_setup_menu');
 
function tags_add_setup_menu(){
    add_menu_page( 'Tags Add', 'Tags Add', 'manage_options', 'tags-add', 'tags_init' );
}
/**
 * add css
 */
add_action('init', function (){
    wp_register_style('tags-add', plugins_url('/style.css', __FILE__));
    wp_enqueue_style('tags-add');
});

//za pomocą tej funkcji przekazujemy zmienną zawierająca adres, do javascript  
wp_enqueue_script (  'my-spiffy-miodal' ,       // handle
                    plugins_url('/js/script.js', __FILE__),  // source
                    array('jquery-ui-dialog')); // dependencies
// A style available in WP               
wp_enqueue_style (  'wp-jquery-ui-dialog');

function writeHeadlines (){
    /*$i = 0;
    foreach( $data as $row ){
        foreach ( $row as $k => $v ){
            if( $i < 1 ){
                
            }
        }
        $i++;
    }*/
    echo '<th>sada</th><th>sad</th>';
}

function tags_init (){
   ?>
    <div id="tags_add">
        <h1 class="plugin-title">Tagi</h1>
        <h3 class="tag-h3">Dodaj nowy tag</h3>
        <button id="add-tag">Dodaj</button>
        
        <table id="tag-table" class="wp-list-table widefat fixed striped posts">
            <thead><?php writeHeadlines(); ?></thead>
            <tbody><tr><td>ddd</td><td>sef</td></tr><tr><td>sdas</td><td>grd</td></tr></tbody>
            <tfoot><?php writeHeadlines(); ?></tfoot>
        </table>
    </div>

    <div id="modal-content">
        <form onsubmit="return false;" method="post">
            <label for="name" class="input-name">Nazwa </label>
            <input type="text" id="name" name="nazwa">
            <span class="input-desc">Nazwa, pod jaką element widoczny jest na witrynie.</span>
            
            <label class="input-name">Slug </label>
            <input type="text" id="slug" name="slug" value="lalalala" disabled>
            <span class="input-desc">Generowany na podstawie nazwy. Używana jest jako część adresu URL. Składa się z małych liter alfabetu łacińskiego, cyfr i myślników.</span>

            <span class="input-name">Ikona </span>
            <input type="file" id="icon" name="ikona" accept="image/svg">
            <span class="input-desc">Ikona, pod jakim element widoczny jest na witrynie. <b>Rozszerzenie: *.svg !</b></span>

            <label for="desc" class="input-name">Opis </label>
            <textarea id="desc" name="desc"></textarea>
            <span class="input-desc" >Opis jest opcjonalny</span>
            
            <button type="submit" id="submit">Dodaj</button>
        </form>
    </div>
    <?php
}


/**
 * Self-update hook
 */
require PLUGIN_TAGS_DIR.'/update-core/plugin-update-checker.php';
$className = PucFactory::getLatestClassVersion('PucGitHubChecker');
$myUpdateChecker = new $className(
    'https://github.com/eDokumenty/tags-add/',
    __FILE__,
    'master'
);
/**
 * end hook
 */