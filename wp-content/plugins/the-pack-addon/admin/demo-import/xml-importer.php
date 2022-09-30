<?php

  if ( ! class_exists( 'tmx_process_demo' ) ) {

	class tmx_process_demo {

		private static $instance = null;

		public function __construct() {

			add_action( 'admin_notices', array( $this, 'demo_import_notice' ), 10 );
			add_action('wp_ajax_the_pack_import_sites_xml', [$this, 'import_xml_site']);
			add_filter( 'upload_mimes', array( $this, 'custom_upload_mimes' ) );

		}

		public static function custom_upload_mimes( $mimes ) {

			$mimes['svg']  = 'image/svg+xml';
			$mimes['svgz'] = 'image/svg+xml';
			$mimes['xml']  = 'text/xml';
			$mimes['json'] = 'application/json';
	
			return $mimes;
		}

		public static function delete_upload_folder($path)
		{
			if (!empty($path) && is_dir($path)) {
				$dir = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
				$files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
				foreach ($files as $f) {
					if (is_file($f)) {
						unlink($f);
					} else {
						$empty_dirs[] = $f;
					}
				}
				if (!empty($empty_dirs)) {
					foreach ($empty_dirs as $eachDir) {
						rmdir($eachDir);
					}
				}
				rmdir($path);
			}
		}

		public static function set_homepage()
		{
			$front_page_id = get_page_by_title('Home');
			update_option('page_on_front', $front_page_id->ID);
			update_option('show_on_front', 'page');
		}

		public static function import_xml_site(){

			$upload_dir = wp_upload_dir(date('Y/m'), true);
			$upload_dir['basedir'] = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $upload_dir['basedir']);
			self::delete_upload_folder($upload_dir['basedir']);

			$id = $_POST['id'];
			global $wpdb;
			$tables = ['commentmeta', 'comments', 'postmeta', 'posts', 'termmeta', 'terms', 'term_relationships', 'term_taxonomy'];
	
			foreach ($tables as $table) {
				$table = $wpdb->prefix . $table;
				$wpdb->query("TRUNCATE TABLE $table");
			}


		    set_time_limit(0);
			if (!function_exists('download_url')) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}
	
			$remote_site = \The_Pack_Cloud_Library::$plugin_data['remote_sites'];
			$data = json_decode(wp_remote_retrieve_body(wp_remote_get($remote_site . '/wp-json/wp/v2/thepack_site_xml/?id=' . $id)), true);
			$tmp_file = download_url($data);
			$filepath = ABSPATH . 'wp-content/data.xml';
			copy($tmp_file, $filepath);
			@unlink($tmp_file);

		    if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

		    require_once TMX_DEMO_DIR .'/includes/vendor/wordpress-importer/wordpress-importer.php';
		       
		    $wp_import = new WP_Import();
		    $wp_import->fetch_attachments = true;
		    ob_start();  
		    $wp_import->import($filepath);
		    ob_end_clean();

			@unlink($filepath);
			\Elementor\Plugin::instance()->files_manager->clear_cache();
	
			$created_default_kit = \Elementor\Plugin::$instance->kits_manager->create_default();
			update_option(\Elementor\Core\Kits\Manager::OPTION_ACTIVE, $created_default_kit);

			self::set_homepage();
			//TODO: dynamic generate
			$var = new \ThePackThemeBuilder\Modules\ThemeBuilder\Classes\Conditions_Cache();
			$var->regenerate();
		    die();

		}  

		public static function get_instance() {

			if ( null == self::$instance ) {
				self::$instance = new self;
				self::$instance->constant();
				self::$instance->includes();
			}
			return self::$instance;
		}

        private function constant() {

            if (!defined('TMX_DEMO_DIR')) {
                define('TMX_DEMO_DIR', plugin_dir_path(__FILE__));
            }
            if (!defined('TMX_DEMO_BASE')) {
                define('TMX_DEMO_BASE', plugin_basename(__FILE__));
            }            
            if (!defined('TMX_DEMO_URL')) {
                define('TMX_DEMO_URL', plugin_dir_url(__FILE__));
            }

        }		

        public function includes(){

        }

		public function admin_scripts() {

		}

		public function demo_import_notice(){

			if (isset($_GET['page']) && $_GET['page'] == 'tmx_demo'){
			    ?>
			    <div class="notice notice-warning is-dismissible">
			        <p><?php _e( 'Please note that importing demo will erase all media files and content. Be sure to backup before importing demo', 'janelove' ); ?></p>
			    </div>
			    <?php if ( class_exists( 'WP_Importer' ) ) { ?>

			    <div class="notice notice-error">
			        <p><?php _e( 'Please deactivate WordPress importer plugin to run demo import', 'janelove' ); ?></p>
			    </div>

			   <?php }		

			}

		}

	} 
}

if ( ! function_exists( 'tmx_process_demo' ) ) {

	function tmx_process_demo() {
		return tmx_process_demo::get_instance();
	}
}

tmx_process_demo();