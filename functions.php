<?php
/**
 * Twenty Sixteen Child functions and definitions
 **/

require_once get_template_directory() . '/inc/template-tags.php';

add_action( 'after_setup_theme', 'theme_attalens_setup' );
function theme_attalens_setup() {
	load_theme_textdomain( 'theme-attalens' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);
	add_theme_support(
		'custom-header',
		array(
			'width'       => 1200,
			'height'      => 280,
			'flex-height' => true,
		)
	);
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'theme-attalens' ),
		)
	);
}

add_action( 'widgets_init', 'theme_attalens_widgets_init' );
function theme_attalens_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'theme-attalens' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'theme-attalens' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 1', 'theme-attalens' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'theme-attalens' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 2', 'theme-attalens' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'theme-attalens' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	$style_path = get_stylesheet_directory() . '/style.css';
	$style_version = file_exists( $style_path ) ? filemtime( $style_path ) : null;
    wp_enqueue_style( 'theme-attalens-style', get_stylesheet_uri(), array(), $style_version );

}
function codex_custom_init() {

	register_post_type(
		'pilier_public',
			array(
				'label' => 'Articles du pilier public',
				'singular_label' => 'Article du pilier public',
				'labels' => array(
					'menu_name' => 'Pilier public',
					'all_items' => 'Tous les articles du pilier public',
					'add_new' => 'Ajouter un nouvel article',
					'add_new_item' => 'Ajouter un nouvel article du pilier public',
					'edit_item' => 'Modifier l\'article du pilier public',
					'new_item' => 'Nouvel article du pilier public',
					'view_item' => 'Voir l\'article du pilier public',
					'search_items' => 'Rechercher l\'article du pilier public',
					'not_found' => 'Aucun article du pilier public trouvé',
					'not_found_in_trash'=> 'Aucun article du pilier public trouvé dans la corbeille',
					'parent' => 'Article du pilier public parent',
				),
				'public' => true,
				'capability_type' => 'post',
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'custom-fields'
				),
				'has_archive' => true,
        'menu_position' => 5
			)
	   );


  register_taxonomy(
  'pilier_public_categorie',
  'pilier_public',
   array(
     'label' => 'Catégories',
     'labels' => array(
       'name' => 'Catégories',
       'singular_name' => 'Catégorie',
       'all_items' => 'Toutes les catégories',
       'edit_item' => 'Éditer la catégorie',
       'view_item' => 'Voir la catégorie',
       'update_item' => 'Mettre à jour la catégorie',
       'add_new_item' => 'Ajouter une catégorie',
       'new_item_name' => 'Nouvelle catégorie',
       'search_items' => 'Rechercher parmi les catégories',
       'popular_items' => 'Catégories les plus utilisées'
     ),
     'hierarchical' => true
   )
 );
  /*register_taxonomy(
  'dicastere_categorie',
  'dicastere',
   array(
     'label' => 'Catégories',
     'labels' => array(
       'name' => 'Catégories',
       'singular_name' => 'Catégorie',
       'all_items' => 'Toutes les catégories',
       'edit_item' => 'Éditer la catégorie',
       'view_item' => 'Voir la catégorie',
       'update_item' => 'Mettre à jour la catégorie',
       'add_new_item' => 'Ajouter une catégorie',
       'new_item_name' => 'Nouvelle catégorie',
       'search_items' => 'Rechercher parmi les catégories',
       'popular_items' => 'Catégories les plus utilisées'
     ),
     'hierarchical' => true
   )
 );*/
  register_taxonomy_for_object_type( 'pilier_public_categorie', 'pilier_public' );
  //register_taxonomy_for_object_type( 'dicastere_categorie', 'dicastere' );
}

add_action('init', 'codex_custom_init');

add_image_size( 'homepage-thumb', 400, 150, true ); //300 pixels wide
add_image_size( 'insideBanner-size', 2400, 540, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
add_image_size( 'homepageBanner-size', 2400, 1000, true ); 

add_image_size( 'personnel-size', 400, 9999); // 220 pixels wide by 180 pixels tall, hard crop mode

function document_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => ''), $atts ) );
	return '<div class="document">
            <h3 class="document__title">' . $titre . '</h3>
            <div class="document__content">' . $content . '</div>
          </div>';
}
add_shortcode( 'document', 'document_shortcode' );


function photo_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => ''), $atts ) );
	$output = '<div class="carte">';
	$output .= ' <h3 class="carte__title">' . $titre . '</h3>';
	$output .= ' <div class="carte__content">' . $content . '</div>';
	$output .= '</div>';
	return $output;
		  
}
add_shortcode( 'photo', 'photo_shortcode' );

function lien_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => '','lien' => ''), $atts ) );
	$output = '<div class="carte">';
	$output .= '<a href="'. $lien .'">';
	$output .= ' <h3 class="carte__title">' . $titre . '</h3>';
	$output .= ' <div class="carte__content">' . $content . '</div>';
	$output .= '</a>';
	$output .= '</div>';
	return $output;
		  
}
add_shortcode( 'lien', 'lien_shortcode' );


function portrait_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => '', 'description' => ''), $atts ) );
	return '<div class="portrait-img">
            <div class="portrait__image"></div>
            <h3 class="portrait__title">' . $titre . '</h3>
            <div class="portrait__content">' . $content . '
            </div>
          </div>';
}
add_shortcode( 'portrait', 'portrait_shortcode' );




if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Accueil gauche',
		'id' => 'accueil_gauche',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Accueil droite',
		'id' => 'accueil_droite',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Accueil Sidebar',
		'id' => 'accueil_sidebar',
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="offscreen">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Contenu du bas 1',
		'id' => 'bas1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Contenu du bas 2',
		'id' => 'bas2',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Contenu du bas 3',
		'id' => 'bas3',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
}

add_filter( 'pre_option_link_manager_enabled', '__return_true' );


// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
  global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Lire la suite...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Lire la suite...</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


/**
 * change tinymce's paste-as-text functionality
 */
function change_paste_as_text($mceInit, $editor_id){
	//turn on paste_as_text by default
	//NB this has no effect on the browser's right-click context menu's paste!
	$mceInit['paste_as_text'] = true;
	return $mceInit;
}
add_filter('tiny_mce_before_init', 'change_paste_as_text', 1, 2);
update_option('image_default_link_type','');


function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 100);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = $excerpt.'... <a href="' . get_permalink() . '">Continuer la lecture</a>';
	return $excerpt;
}

function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
 background-image: url(<?php echo esc_url( get_template_directory_uri() . '/images/armoiries_attalens.png' ); ?>);  //Add your own logo image in this url 
padding-bottom: 30px; 
} 
</style>
 <?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );




// Function to change email address
 
function wpb_sender_email( $original_email_address ) {
    return 'administration@attalens.ch';
}
 
// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'Commune d\'Attalens';
}
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );

//Remove JQuery migrate
 
function remove_jquery_migrate( $scripts ) {
   if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
   if ( $script->deps ) { 
// Check whether the script has any dependencies

        $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
 }
 }
 }
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

add_filter('mbhi_hours_entry', 'mbhi_replace_day',10,3);

function mbhi_replace_day($entry,$location,$shortcode) {

    if($shortcode === 'mbhi_hours_today')
        $entry->range = __('Aujourd\'hui','mabel-business-hours-indicator-pro');

    return $entry;
}

add_filter('mbhi_hours_entry', 'add_timeslot_separator',10,3);

function add_timeslot_separator($entry,$location,$shortcode) {	
    $entry->hours = str_replace('0 1','0<br/>1',$entry->hours);	
    return $entry;
}
/**
 * Show the banner when a html element with class 'cmplz-show-banner' is clicked
 */
function cmplz_show_banner_on_click() {
	?>
	<script>
        function addEvent(event, selector, callback, context) {
            document.addEventListener(event, e => {
                if ( e.target.closest(selector) ) {
                    callback(e);
                }
            });
        }
        addEvent('click', '.cmplz-show-banner', function(){
            document.querySelectorAll('.cmplz-manage-consent').forEach(obj => {
                obj.click();
            });
        });
	</script>
	<?php
}
add_action( 'wp_footer', 'cmplz_show_banner_on_click' );