<?php
/**
 * @package Post_Share_Buttons
 * @version 1.0.1
 */
/*
Plugin Name: Post Share Buttons
Plugin URI: https://OptimizeWorldwide.com/wp-content/uploads/2017/03/post-share-buttons.1.0.zip
Description: Post Share Buttons for Twitter, Facebook, Google, and LinkedIn.
Author: Optimize Worldwide
Version: 1.0
Author URI: https://OptimizeWorldwide.com/
*/

if(!defined('ABSPATH')){exit;}
if(!is_single()){

  function psb_action_wp_enqueue_scripts(){
    wp_enqueue_style('post-share-buttons-style',plugins_url('style.css',__FILE__));
    wp_enqueue_script('post-share-buttons-script',plugins_url('script.js',__FILE__));
  }
  add_action('wp_enqueue_scripts','psb_action_wp_enqueue_scripts');

  function psb_action_pre_get_comments(){
    $twitter="'http://twitter.com/home?status=";
    $facebook="'http://www.facebook.com/sharer.php?u=";
    $google="'https://plus.google.com/share?url=";
    $linkedin="'https://www.linkedin.com/shareArticle?url=";
    $page_link=(isset($_SERVER['HTTPS'])?'https':'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]'";
    echo '
    
      <div id="social-share">
        <br>
        <p>Share this post on social media:</p>
        <ul class="soc">
          <li><a class="soc-icon soc-twitter" onclick="openURLInPopup('.$twitter.$page_link.');"></a></li>
          <li><a class="soc-icon soc-facebook" onclick="openURLInPopup('.$facebook.$page_link.');"></a></li>
          <li><a class="soc-icon soc-googleplus" onclick="openURLInPopup('.$google.$page_link.');"></a></li>
          <li><a class="soc-icon soc-linkedin soc-icon-last" onclick="openURLInPopup('.$linkedin.$page_link.');"></a></li>
        </ul>
      </div>

    ';
  };
  add_action('pre_get_comments','psb_action_pre_get_comments',10,1);
 
}

?>
