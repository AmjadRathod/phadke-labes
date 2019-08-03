<?php 

/*****************************************************************/
/* WP COUNT PAGES DASHBOARD WIDGET */
/*****************************************************************/

// WP COUNT PAGES WIDGET --> CALLABLE WIDGET CONTENT

if( ! function_exists('wp_admin_count_pages_widget_content') ) :

    function wp_admin_count_pages_widget_content() { 

        $count_pages = wp_count_posts('page');
        $published = $count_pages->publish;
		if( is_rtl() ) {
			$draft = esc_html__( 'Draft', 'wp-admin-theme-cd' ) . ' ' . $count_pages->draft;
			$pending = esc_html__( 'Pending', 'wp-admin-theme-cd' ) . ' ' . $count_pages->pending;
			$private = esc_html__( 'Private', 'wp-admin-theme-cd' ) . ' ' . $count_pages->private;
			$future = esc_html__( 'Future', 'wp-admin-theme-cd' ) . ' ' . $count_pages->future; 
		} else {
			$draft = $count_pages->draft . ' ' . esc_html__( 'Draft', 'wp-admin-theme-cd' );
			$pending = $count_pages->pending . ' ' . esc_html__( 'Pending', 'wp-admin-theme-cd' );
			$private = $count_pages->private . ' ' . esc_html__( 'Private', 'wp-admin-theme-cd' );
			$future = $count_pages->future . ' ' . esc_html__( 'Future', 'wp-admin-theme-cd' );
		} ?>

        <style>
            .wpat-post-count {margin:0px -15px -15px -15px;text-align:center;}
            .wpat-post-count-focus {line-height:normal;color:#82878c;font-size:40px;border-bottom:1px solid #eee;padding-bottom:20px}
            .wpat-post-count-focus .wpat-post-count-num {display:inline-block}
            .wpat-post-count-focus .wpat-post-count-num ~ div {font-size:16px;font-weight:100;width:100%}
            .wpat-post-count-detail {background:#f8f9fb;padding:12px}
        </style>

        <div class="wpat-post-count">
            <div class="wpat-post-count-focus">
                <div class="wpat-post-count-num">
                    <?php echo esc_html( $published ); ?>
                </div>
                <div><?php esc_html_e( 'Published Pages', 'wp-admin-theme-cd' ); ?></div>
            </div>
            <div class="wpat-post-count-detail">
                <?php echo esc_html( $draft ) . ' | ' .  esc_html( $pending ) . ' | ' .  esc_html( $private ) . ' | ' .  esc_html( $future ); ?>
            </div>
            
        </div>

    <?php }

endif;

// WP COUNT PAGES WIDGET --> ADD DASHBOARD WIDGET

if( ! function_exists('wp_admin_count_pages_widget') ) :

	function wp_admin_count_pages_widget() {

		wp_add_dashboard_widget('wp_count_pages_db_widget', esc_html__( 'Pages', 'wp-admin-theme-cd' ), 'wp_admin_count_pages_widget_content');

	}

endif;

add_action('wp_dashboard_setup', 'wp_admin_count_pages_widget');