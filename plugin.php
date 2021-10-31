<?php
/*
Plugin Name: Bulk URL shortener
Plugin URI: https://github.com/kur4ge/bulk_api_bulkshortener
Description: Shorten URLs in bulk (a single request with many URLs to shorten).
Version: 1.1
Author: Kur4ge
Author URI: https://kur4ge.com
*/

// No direct call
if (!defined('YOURLS_ABSPATH')) die();

yourls_add_action('api', 'bulk_api_bulkshortener');

function api_action_bulkshortener()
{
    if (!isset($_REQUEST['urls'])) {
        $return = array(
            'errorCode' => 400,
            'message' => 'bulkshortener: missing URLS parameter',
            'simple' => 'bulkshortener: missing URLS parameter',
        );
        echo $return['errorCode'] . ": " . $return['simple'];
        die();
    }

    $keyword = (isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '');
    $title = (isset($_REQUEST['title']) ? $_REQUEST['title'] : '');
    $urls = (isset($_REQUEST['urls']) ? $_REQUEST['urls'] : array());
    $data = [];
    foreach ($urls as $url) {
        $ret = yourls_add_new_link($url, $keyword, $title);
        // in API mode, no need for our internal HTML output
        unset($ret['html']);
        array_push($data, $ret);
    }

    $return = [];
    $return['status'] = 'success';
    $return['data'] = $data;
    return $return;
}


function bulk_api_bulkshortener($action)
{
    yourls_add_filter('api_action_bulkshortener', api_action_bulkshortener, 99);
}
