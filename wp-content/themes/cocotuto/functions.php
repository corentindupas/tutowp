<?php
/**
 * cocotuto functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cocotuto
 */

if (!function_exists('cocotuto_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */


    function cocoTutoRegisterSettings()
    {
        register_setting('cocotuto', 'custom_field');

        $args = array(
            'posts_per_page' => -1
        );

        $query = new WP_Query($args);
        $q = array();

        while ($query->have_posts()) {

            $query->the_post();

            $categories = get_the_category();

            foreach ($categories as $key => $category) {

                $b = $category->name;

            }

            $q[$b][] = $a; // Create an array with the category names and post titles
        }

        /* Restore original Post Data */
        wp_reset_postdata();
        foreach ($q as $key => $values) {
            register_setting('cocotuto', $key);
        }

    }

    add_action('admin_init', 'cocoTutoRegisterSettings');
    function cocotuto_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on cocotuto, use a find and replace
         * to change 'cocotuto' to the name of your theme in all the template files.
         */
        load_theme_textdomain('cocotuto', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'cocotuto'),
        ));

        function register_my_menu()
        {
            register_nav_menu('second-menu', __('Second Menu'));
            register_nav_menu('footer-menu', __('Footer Menu'));
        }

        add_action('init', 'register_my_menu');


        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('cocotuto_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }
endif; // cocotuto_setup
add_action('after_setup_theme', 'cocotuto_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cocotuto_content_width()
{
    $GLOBALS['content_width'] = apply_filters('cocotuto_content_width', 640);
}

add_action('after_setup_theme', 'cocotuto_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cocotuto_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'cocotuto'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'cocotuto_widgets_init');


function tutococoAdminMenu()
{
    add_menu_page(
        'Tutococo Options',
        'TutoCoco Options',
        'administrator',
        'theme-options',
        'tutoCocoSettingsPage'
    );
}

add_action('admin_menu', 'tutococoAdminMenu');

function tutoCocoSettingsPage()
{
    ?>
    <h1>TutoCoco Options</h1>
    <p>Ceci est une page custom d'options</p>
    <form method="post" action="options.php">
        <?php

        settings_fields('cocotuto');
        ?>
        <table>
            <tr valign="top">
                <th scope="row"><label for="custom_field">My Custom Field</label>
                </th>
                <td><input type="text" id="custom_field" name="custom_field"
                           value="<?php echo get_option('custom_field'); ?>"
                           placeholder=""/><br/>
                </td>
        </table>
        <?php wp_enqueue_script('theme-options-js', get_template_directory_uri() . '/js/themeoptions.js', array(), '1.0.0', true); ?>
        <input type="submit" class="button-primary" value="Save">
    </form>
<?php
}

/**
 * Enqueue scripts and styles.
 */
function cocotuto_scripts()
{
    wp_enqueue_style('cocotuto-style', get_stylesheet_uri());

    wp_enqueue_script('cocotuto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('cocotuto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'cocotuto_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
