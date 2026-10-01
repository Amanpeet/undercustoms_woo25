<?php
/**
 * UnderCustoms Custom HTML Field
 *
 * Adds a code-only HTML editor to WordPress Pages.
 *
 * @package UnderCustoms
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Undercustoms_Custom_HTML_Field {

	private const META_KEY               = '_undercustoms_custom_html';
	private const NONCE_ACTION           = 'undercustoms_save_custom_html';
	private const NONCE_NAME             = 'undercustoms_custom_html_nonce';
	private const ERROR_TRANSIENT_PREFIX = 'undercustoms_custom_html_error_';

	/**
	 * Initialize the class.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'add_meta_boxes', array( __CLASS__, 'register_meta_box' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_editor' ) );
		add_action( 'save_post_page', array( __CLASS__, 'save' ) );
		add_action( 'admin_notices', array( __CLASS__, 'admin_notice' ) );
	}

	/**
	 * Register the Custom HTML meta box (Pages only).
	 *
	 * @param string       $post_type Current post type.
	 * @param WP_Post|null $post      Current post.
	 * @return void
	 */
	public static function register_meta_box( $post_type, $post = null ) {

		if ( 'page' !== $post_type ) {
			return;
		}

		add_meta_box(
			'undercustoms_custom_html',
			__( 'Custom HTML', 'undercustoms' ),
			array( __CLASS__, 'render_meta_box' ),
			'page',
			'normal',
			'high'
		);
	}

	/**
	 * Render the meta box.
	 *
	 * @param WP_Post $post Current post.
	 * @return void
	 */
	public static function render_meta_box( $post ) {

		wp_nonce_field( self::NONCE_ACTION, self::NONCE_NAME );

		$html = get_post_meta( $post->ID, self::META_KEY, true );

		if ( ! is_string( $html ) ) {
			$html = '';
		}
		?>

		<div class="undercustoms-custom-html-editor">

			<textarea
				id="undercustoms_custom_html"
				name="undercustoms_custom_html"
				rows="20"
				spellcheck="false"
				autocomplete="off"
				aria-label="<?php echo esc_attr__( 'Custom HTML', 'undercustoms' ); ?>"
			><?php echo esc_textarea( $html ); ?></textarea>

			<p class="description">
				<?php
				echo esc_html__(
					'Enter HTML code only. JavaScript is not permitted.',
					'undercustoms'
				);
				?>
			</p>

		</div>

		<?php
	}

	/**
	 * Enqueue CodeMirror and styles on the Page editor.
	 *
	 * @param string $hook Current admin page hook.
	 * @return void
	 */
		/**
	 * Add styles for the Custom HTML textarea on the Page editor.
	 *
	 * @param string $hook Current admin page hook.
	 * @return void
	 */
  public static function enqueue_editor( $hook ) {

    if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
      return;
    }

    $screen = get_current_screen();

    if ( ! $screen || 'page' !== $screen->post_type ) {
      return;
    }

    wp_register_style( 'undercustoms-custom-html', false, array(), '1.0.0' );
    wp_enqueue_style( 'undercustoms-custom-html' );
    wp_add_inline_style(
      'undercustoms-custom-html',
      '
      .undercustoms-custom-html-editor { margin-top: 5px; }
      .undercustoms-custom-html-editor textarea#undercustoms_custom_html {
        display: block;
        width: 100%;
        min-height: 200px;
        height: 200px;
        font-family: Consolas, Monaco, monospace;
        font-size: 14px;
        line-height: 1.5;
        tab-size: 2;
        white-space: pre;
        overflow: auto;
      }
      .undercustoms-custom-html-editor .description { margin-top: 8px; }
      '
    );
  }

	/**
	 * Save the custom HTML.
	 *
	 * @param int $post_id Post ID.
	 * @return void
	 */
	public static function save( $post_id ) {

		if ( ! isset( $_POST[ self::NONCE_NAME ] ) ) {
			return;
		}

		$nonce = sanitize_text_field( wp_unslash( $_POST[ self::NONCE_NAME ] ) );

		if ( ! wp_verify_nonce( $nonce, self::NONCE_ACTION ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}

		if ( 'page' !== get_post_type( $post_id ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( ! isset( $_POST['undercustoms_custom_html'] ) ) {
			return;
		}

		/*
		 * Remove WordPress's automatic request slashes. No sanitization
		 * so accepted HTML is stored exactly as entered.
		 */
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$html = wp_unslash( $_POST['undercustoms_custom_html'] );

		if ( ! is_string( $html ) ) {
			return;
		}

		if ( self::contains_javascript( $html ) ) {

			set_transient(
				self::ERROR_TRANSIENT_PREFIX . get_current_user_id(),
				'Your Custom HTML was not saved because JavaScript is not permitted. The previously saved HTML was kept.',
				60
			);

			return;
		}

		update_post_meta( $post_id, self::META_KEY, $html );
	}

	/**
	 * Check HTML for JavaScript.
	 *
	 * @param string $html HTML to check.
	 * @return bool
	 */
	private static function contains_javascript( $html ) {

		// <script> tags.
		if ( preg_match( '/<\s*script\b/i', $html ) ) {
			return true;
		}

		// javascript: URLs.
		if ( preg_match( '/javascript\s*:/i', $html ) ) {
			return true;
		}

		// Inline event handlers inside tags (onclick=, onload=, onerror= ...).
		if ( preg_match( '/<[^>]*[\s\/"\']on[a-z]+\s*=/i', $html ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Display JavaScript rejection notice.
	 *
	 * @return void
	 */
	public static function admin_notice() {

		if ( ! is_admin() ) {
			return;
		}

		$user_id = get_current_user_id();

		if ( ! $user_id ) {
			return;
		}

		$transient_key = self::ERROR_TRANSIENT_PREFIX . $user_id;
		$notice        = get_transient( $transient_key );

		if ( false === $notice ) {
			return;
		}

		delete_transient( $transient_key );
		?>

		<div class="notice notice-error is-dismissible">
			<p><?php echo esc_html( $notice ); ?></p>
		</div>

		<?php
	}

	/**
	 * Output the saved Custom HTML.
	 *
	 * Usage:
	 * Undercustoms_Custom_HTML_Field::output();
	 * Undercustoms_Custom_HTML_Field::output( 123 );
	 *
	 * @param int|null $post_id Optional Page ID.
	 * @return void
	 */
	public static function output( $post_id = null ) {

		if ( null === $post_id ) {
			$post_id = get_the_ID();
		}

		if ( ! $post_id ) {
			return;
		}

		if ( 'page' !== get_post_type( $post_id ) ) {
			return;
		}

		$html = get_post_meta( $post_id, self::META_KEY, true );

		if ( ! is_string( $html ) || '' === trim( $html ) ) {
			return;
		}

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $html;
	}
}

Undercustoms_Custom_HTML_Field::init();
