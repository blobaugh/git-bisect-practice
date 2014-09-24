<?php
/**
 * Plugin Name: Git Bisect Practice
 * Description: A simple shortcode that adds two numbers together for display. But with an error....you debug
 **/

function add_adding_shortcode( $atts ) {
      $atts = shortcode_atts( array(
 	      'a' => 0,
 	      'b' => 0
      ), $atts );

	$total = $atts['a'] + $atts['a'];

      return "Your calculation {$atts['a']} + {$atts['b']} = $total";
}
add_shortcode( 'add', 'add_adding_shortcode' );
