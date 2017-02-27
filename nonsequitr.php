<?php
/*
Plugin Name: Non Sequitr
Plugin URI: http://www.google.com
Description: Hides rambling sections of a post.
Version: 0.1
Author: Seth Battin
Author URI: http://itsobviously.com/pbaction
License: GPL2
*/

function nonsequitr_script(){
    wp_register_script('nonsequitr_js',
        plugins_url('nonsequitr.js',__FILE__),array('jquery'));
}
function nonsequitr_style(){
    wp_register_style('nonsequitr_css',
        plugins_url('nonsequitr.css',__FILE__));
}
add_action('wp_enqueue_scripts', 'nonsequitr_script');
add_action('wp_enqueue_scripts', 'nonsequitr_style');

add_shortcode('nonsequitr', 'nonsequitr_shortcode_handler');
function nonsequitr_shortcode_handler( $atts, $content = null )
{
    
    if (is_null($content)){
        return;
    }

    wp_enqueue_script('nonsequitr_js');
    wp_enqueue_style('nonsequitr_css');
    
    static $idCount = 0;
    
    $jsDefault = "nonsequitr_click";
    
    extract( shortcode_atts( array(
        'snippet' => null,
        'type' => 'default',
        'class' => '',
        'onclick' => $jsDefault
        ), $atts )
    );
    
    
    if (is_null($snippet)){
        // if no explicit snippet, show the first part of the content
        $snippet = substr($content,0, min(40, strpos(
            $content," ", strpos($content, " ") + 1))) . "&hellip;";
    }
    $storage = ($idCount == 0 ? "\nvar nonsequitrs = [];\n" : "\n");
    
    $script = "<script type='text/javascript'>" .
        "$storage nonsequitrs[$idCount] = '$jsDefault';</script>";
    $snippet = "<a href='#' class='nonsequitr $class' data-nonsequitr='$idCount'>$snippet</a>";
    $wrapStart = "<div class='nonsequitr $class' data-nonsequitr='$idCount' >";
    $closeElement = "<div class='nonsequitr-close'>Click to Close</div>";
    $wrapEnd = "</div>";
    
    if (has_filter('the_content', 'wpautop')){
        $meat = do_shortcode(wpautop($content));
    } else {
        $meat = do_shortcode($content);
    }
    
    
    $idCount++;
    
    return "$script
        $snippet
        $wrapStart
        $closeElement
        $meat
        $wrapEnd";
   
}



?>