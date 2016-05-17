<?php
/*
The MIT License (MIT)
Copyright (c) 2015 Twitter Inc.
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

/*
Plugin Name: Wordpress Click2Call with Asterisk
Plugin URI:  http://wordpress.org/plugins/wp-c2c-asterisk
Description: Wordpress Click2Call with Asterisk
Version:     0.1
Author:      Marco Zink
Author URI:  https://marcozink.com
License:     MIT
*/

/* add_action('admin_menu', 'c2c_menu_pages');

function c2c_menu_pages(){
	add_menu_page( 'Click 2 Call', 'Click2Call', 'manage_options', 'c2c', 'c2c_menu_output');
	add_submenu_page( 'c2c', 'Asterisk' , 'Asterisk', 'manage_options', 'c2c-asterisk');
	add_submenu_page( 'c2c', 'Form' , 'Forms', 'manage_options', 'c2c-forms');
	add_action( 'admin_init', 'c2c_menu_pages_options' );
}

function c2c_menu_pages_options() {?>
<div class='wrap'>
	<h2>WordPress Click2Call</h2>
</div>

<?php } ?>
*/

// create custom plugin settings menu
add_action('admin_menu', 'wp_c2c_create_menu');

function wp_c2c_create_menu() {

	//create new top-level menu
	add_menu_page('Click2Call Settings', 'WordPress Click2Call', 'administrator', __FILE__, 'wp_c2c_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_wp_c2c_settings' );
}


function register_wp_c2c_settings() {
	//register our settings
	register_setting( 'wp-c2c-settings-group', 'new_option_name' );
	register_setting( 'wp-c2c-settings-group', 'some_other_option' );
	register_setting( 'wp-c2c-settings-group', 'option_etc' );
}

function wp_c2c_settings_page() {
?>
<div class="wrap">
<h2>WordPress Click2Call</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'wp-c2c-settings-group' ); ?>
    <?php do_settings_sections( 'wp-c2c-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
