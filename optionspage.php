<?php
function green_party_theme_menu_callback(){
	?>
		<div class="wrap">
			<h1><?php echo get_admin_page_title() ?></h1>
			<form method="post" action="options.php">
				<?php
					settings_fields( 'green_party_theme_settings' ); // settings group name
					do_settings_sections( 'green_party_theme_options' ); // just a page slug
					submit_button(); // "Save Changes" button
				?>
			</form>
		</div>
	<?php
}