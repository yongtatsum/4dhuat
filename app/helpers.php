<?php

/*
|--------------------------------------------------------------------------
| Helper functions
|--------------------------------------------------------------------------
*/

if (!function_exists('xxx')) {
    function xxx($obj, $die = false) {
        echo '<pre>';print_r($obj);echo '</pre>';
        if ($die) die();
    }
}
