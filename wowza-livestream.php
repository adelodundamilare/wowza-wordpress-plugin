<?php
/**
* @package WowzaLivestream
*/

/*
* Plugin Name: Wowza LiveStream
* Description: Insert Wowza live stream plugin into wordpress
* Version: 1.0
* Author: Adelodun Damilare
* Author URI: https://about.me/adelodundamilare
* License: MIT
* Text Domain: wowza-livestream
*/

if( ! function_exists( 'add_action' ) ){
    echo 'Hey, you can\'t access this fil, you silly human!';
    exit;
}

function wowza_shortcode_function(){
?>
<div id="playerElement" style="width:100%; height:0; padding:0 0 56.25% 0"></div>

<script type="text/javascript">
        WowzaPlayer.create('playerElement',
            {
                "license": "PLAY1-dw4Ea-MhuT9-z8kfe-Fmtmj-GtdDW",
                "title": "GNNTV",
                "description": "GNNTV",
                "sourceURL": "https%3A%2F%2F5ae8ac11ee43c.streamlock.net%2Flive%2Fgnntv%2Fplaylist.m3u8",
                "autoPlay": false,
                "volume": "75",
                "mute": false,
                "loop": false,
                "audioOnly": false,
                "uiShowQuickRewind": true,
                "uiQuickRewindSeconds": "30"
            }
        );

    </script>

<?php
}
add_shortcode('wowza_livestream', 'wowza_shortcode_function');

function wowza_register_script(){
    wp_enqueue_script( 'wowza-livestream', '//player.wowza.com/player/latest/wowzaplayer.min.js' );
}

if( ! wp_script_is( 'wowzaplayer.min.js', 'enqueued' ) ){
    add_action( 'wp_enqueue_scripts', 'wowza_register_script' );
}

// enqueue my script here
function enqueue_my_script(){
    wp_enqueue_script( 'wowza-livestream', '//player.wowza.com/player/latest/wowzaplayer.min.js' );
}

// dequeue my script here
function dequeue_my_script(){
    wp_dequeue_script( 'wowza-livestream', '//player.wowza.com/player/latest/wowzaplayer.min.js' );
}


// uninstall
