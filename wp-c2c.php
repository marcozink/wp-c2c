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
Plugin Name: Wordpress Click2Call
Plugin URI:  http://wordpress.org/plugins/wp-c2c
Description: Wordpress Click2Call with Asterisk
Version:     0.1
Author:      Marco Zink
Author URI:  https://marcozink.com
License:     MIT
*/

add_action('admin_menu', 'c2c_menu_pages');

function c2c_menu_pages(){
	add_menu_page( 'Click 2 Call', 'Click2Call', 'manage_options', 'c2c', 'c2c_menu_output');
	add_submenu_page( 'c2c', 'Asterisk' , 'Asterisk', 'manage_options', 'c2c-asterisk');
	add_submenu_page( 'c2c', 'Form' , 'Forms', 'manage_options', 'c2c-forms');
}


echo "<div class='wrap'>";
echo "<h2>WordPress Click2Call</h2>";
echo "</div>";

