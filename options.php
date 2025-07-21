add_action( 'admin_menu', 'green_party_theme_menu' );

function green_party_theme_menu(){

	add_theme_page(
		'Green Party Theme Settings',
		'Slider',
		'manage_options',
		'rudr_slider',
		'green_party_theme_menu_callback',
		0 // menu position
	);
}

function green_party_theme_menu_callback(){
	echo 'What is up?';
}