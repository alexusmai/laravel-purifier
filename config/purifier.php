<?php

/**
 * Laravel Purifier configuration file
 *
 * Purifier - http://htmlpurifier.org/
 * Purifier configuration documentation - http://htmlpurifier.org/live/configdoc/plain.html
 */

return [

    /**
     * Basic settings for packet
     * Cache folder
     * Encoding
     */
    'basic'  => [
        'Core.Encoding'                 => 'UTF-8',
        'Cache.SerializerPath'          => storage_path('app/purifier'),
        'Cache.SerializerPermissions'   => 0755,
    ],


    //****************************************** Presets ***************************************************************

    /*
     * It's preset used by default.
     */
    'default'   =>  [
        'HTML.Doctype'                  => 'HTML 4.01 Strict',
        'HTML.Allowed'                  => 'div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
        'CSS.AllowedProperties'         => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
        'AutoFormat.AutoParagraph'      => true,
        'AutoFormat.RemoveEmpty'        => true,
    ],

    // clean all html tags
    'clean-html'   =>  [
        'HTML.Allowed'                  => '',
        'AutoFormat.RemoveEmpty'        => true,
    ],

    // You can create your presets



];