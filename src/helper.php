<?php

/**
 * Helper function
 */

if (!function_exists('purifier')) {
    function purifier($text, $customSettings = null)
    {
        return app('purifier')->clean($text, $customSettings);
    }
}