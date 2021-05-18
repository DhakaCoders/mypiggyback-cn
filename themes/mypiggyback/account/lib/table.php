<?php
if ( !defined('ABSPATH')) {
	die;
}
/**
 * Sql Table Class
 */
if (!class_exists('cbv_create_tables')) {
	class cbv_create_tables
	{
		public static function create_tables(){
			global $wpdb;
			$charset_collate = $wpdb->get_charset_collate();
			
			/*creating Order table*/
			$appoint_tbl_name = $wpdb->prefix . 'order_appoint'; 
			if($wpdb->get_var("SHOW TABLES LIKE '$appoint_tbl_name'") != $appoint_tbl_name) {
				$b_sql = "CREATE TABLE $appoint_tbl_name (
					id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					order_id BIGINT(20) UNSIGNED NOT NULL,
					author_id BIGINT(20) UNSIGNED NOT NULL,
					driver_id BIGINT(20) UNSIGNED NOT NULL,
					status VARCHAR(30) DEFAULT 'incomplete',
					created_at datetime
					) $charset_collate; ";
				require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
				dbDelta( $b_sql );
			}
		}
	}
}
