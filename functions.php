<?php
//-----------------------------------------------
// Thumbnail sizes
//-----------------------------------------------
add_theme_support('post-thumbnails');
set_post_thumbnail_size(294, 196, true);

//-----------------------------------------------
// Menu registration
//-----------------------------------------------
register_nav_menus(array('primary' => 'Header Menu'));

load_theme_textdomain( 'kampuskamari', get_template_directory() . '/languages' );

//-----------------------------------------------
// Including scripts
//-----------------------------------------------
function add_kampuskamari_scripts(){
    wp_enqueue_style('design', get_template_directory_uri() . '/assets/css/app.css', array());

    wp_enqueue_script('jquery');
    wp_enqueue_script('what-input-js', get_template_directory_uri() . '/assets/bower_components/what-input/dist/what-input.js', array('jquery'));
    wp_enqueue_script('foundation-js', get_template_directory_uri() . '/assets/bower_components/foundation-sites/dist/js/foundation.js', array('jquery'));
    wp_enqueue_script('app-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'));
    wp_localize_script('app-js', "kampuskamari_ajax", array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'add_kampuskamari_scripts');

//-----------------------------------------------
// Remove admin bar
//-----------------------------------------------
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

//-----------------------------------------------
// Registering option menus
//-----------------------------------------------
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'kampuskamari courses',
        'menu_title'    => 'Courses',
        'menu_slug'     => 'kampuskamari_courses',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
}

//-----------------------------------------------
// Admin menu chrome fix
//-----------------------------------------------
function chrome_fix(){
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
        wp_add_inline_style('wp-admin', '#adminmenu { transform: translateZ(0); }');
}

add_action('admin_enqueue_scripts', 'chrome_fix');

//-----------------------------------------------
// Hide ACF
//-----------------------------------------------
//add_filter('acf/settings/show_admin', '__return_false');


//-----------------------------------------------
// Change the footer text
//-----------------------------------------------
function change_admin_footer() {
    echo "Kampuskamari WordPress Admin Theme by UTA.";
}

add_filter( 'admin_footer_text', 'change_admin_footer' );

//-----------------------------------------------
// Change the login form logo
//-----------------------------------------------
function change_login_logo() { ?>
    <style>
        .login h1 a {
            background-image: url( <?= get_stylesheet_directory_uri(); ?>/assets/etc/img/favicon.ico );
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'change_login_logo' );

//-----------------------------------------------
// Change the login logo URL and title
//-----------------------------------------------
function change_login_logo_url() {
    return home_url();
}

add_filter( 'login_headerurl', 'change_login_logo_url' );

function change_login_logo_url_title() {
    return "Login Theme";
}

add_filter( 'login_headertitle', 'change_login_logo_url_title' );

//-----------------------------------------------
// Style the login page
//-----------------------------------------------
function change_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/custom-login/custom-login.css' );
}

add_action( 'login_enqueue_scripts', 'change_login_stylesheet' );

//-----------------------------------------------
// Change default WP e-mail and name
//-----------------------------------------------
function new_mail_from($old) {
 return 'kampuskamari@kampuskamari.fi';
}
function new_mail_from_name($old) {
 return 'Kampuskamari team';
}

add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

//-----------------------------------------------
// Disable the password reset feature
//-----------------------------------------------
function disable_reset_pwd() {
    return false;
}

add_filter( 'allow_password_reset', 'disable_reset_pwd' );

//-----------------------------------------------
// Remove error shake
//-----------------------------------------------
function remove_shake() {
    remove_action( 'login_head', 'wp_shake_js', 12 );
}

add_action( 'login_head', 'remove_shake' );


//-----------------------------------------------
// Handle registrations
//-----------------------------------------------
function kampuskamari_register_handle() {

    $data = array();
    $courses = array();
    global $wpdb;

    foreach (@$_POST['register_data'] as $i) {
        $data[htmlspecialchars($i['name'])] = htmlspecialchars($i['value']);
    }
    $courses = ($_POST['register_data'][5]['selectedCourses']);
    foreach ($courses as $course) {
        $sql = "INSERT INTO registrations (user_name, user_company, user_phone, user_mail, user_comment, registered_course, collaboration, reg_date)VALUES ('$data[userName]', '$data[userCompany]', '$data[userPhone]', '$data[userMail]', '$data[userComment]', '$course[courseName]', '$course[collaboration]', '" . date('Y-m-d G:i:s') . "')";
        $results = $wpdb->get_results($sql, $object );
        if ($wpdb->last_error){
            echo('error');
            wp_die();
            return;
        }
    }
    echo 1;
    date_default_timezone_set("Europe/Helsinki");

    $content_to_user = "";
    $content_to_user.= __("Dear", "kampuskamari") . " " . $data['userName'] . ",<br/><br/>";
    $content_to_user.= __("Thank you for registering!", "kampuskamari") .".<br/><br/>" ;
    $content_to_user.= __("See you soon", "kampuskamari") . ", <br/>";
    $content_to_user.= __("Kampuskamari team", "kampuskamari");

    $subject_to_user = "[" . __("Kampuskamari automatic reply", "kampuskamari") . "] " . __("Successfull registration", "kampuskamari");

    $content_to_admin = "";
    $content_to_admin.= "New registration from " . $data['userName'] . "<br/><br/>";
    $content_to_admin.= "Name: " . $data['userName'] . "<br/>";
    $content_to_admin.= "E-mail: " . $data['userMail'] . "<br/>";
    $content_to_admin.= "Phone: " . $data['userPhone'] . "<br/>";
    $content_to_admin.= "Company: " . $data['userCompany'] . "<br/>";
/*
    $content_to_admin.= "Subject: " . $data['subject'] . "<br/>";
    $content_to_admin.= "Message: " . $data['message'];
*/
    $subject_to_admin = "New Kampuskamari registration from " . $data['userName'];

    
    //mail
    echo ($content_to_user);
    echo ($data['userMail']);
    wp_mail("mate.kis-kiraly@uta.fi", $subject_to_admin, $content_to_admin, array('Content-Type: text/html; charset=UTF-8'));
    wp_mail("kis.kiraly.mate@gmail.com", $subject_to_admin, $content_to_admin, array('Content-Type: text/html; charset=UTF-8'));
    wp_mail($data['userMail'], $subject_to_user, $content_to_user, array('Content-Type: text/html; charset=UTF-8'));

    wp_die();
}

add_action('wp_ajax_kampuskamari_register', 'kampuskamari_register_handle');
add_action('wp_ajax_nopriv_kampuskamari_register', 'kampuskamari_register_handle');

//-----------------------------------------------
// Handle registration admin page
//-----------------------------------------------
function ct_registration_update_handle() {

    global $wpdb;
    $data = array();

    if (isset($_POST['update_data'])){
      foreach (@$_POST['update_data'] as $i) {
        $sql = "UPDATE registrations SET discussion_group = " . $i['group'] . ", other='". $i['other'] . "' WHERE id =" . $i['userid'];
        $results = $wpdb->get_results($sql, OBJECT );
        if (count($results) > 0){
            echo('error');
            wp_die();
            return;
        }       
      }
    }
    wp_die();
}

add_action('wp_ajax_ct_registration_update', 'ct_registration_update_handle');
add_action('wp_ajax_nopriv_ct_registration_update', 'ct_registration_update_handle');

// Defer Javascripts
// Defer jQuery Parsing using the HTML5 defer property
if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}