<?php

namespace Alexusmai\LaravelPurifier;

use Log;
use File;
use Illuminate\Config\Repository;

class Purifier
{

    /**
     * @var \HTMLPurifier_Config
     */
    protected $settings;

    /**
     * Purifier constructor.
     */
    public function __construct()
    {
        // purifier settings
        $this->settings = \HTMLPurifier_Config::createDefault();

        // load basic settings
        $this->settings->loadArray(config('purifier.basic'));

        // set cache dir
        $cacheDir = config('purifier.basic')['Cache.SerializerPath'];

        if (!File::isDirectory($cacheDir)){
            File::makeDirectory($cacheDir, config('purifier.basic')['Cache.SerializerPermissions']);
        }

    }


    /**
     * Load settings and clean
     * @param string $text
     * @param null|string|array $customSettings
     * @return array|string
     * @throws \Exception
     */
    public function clean($text, $customSettings = null)
    {
        // if custom settings
        if ($customSettings){

            // dynamic settings
            if (is_array($customSettings)){

                // load dynamic settings
                $this->settings->loadArray($customSettings);

            }else{

                // config setting name
                if ( config('purifier.'.$customSettings, null) ){
                    // load custom settings
                    $this->settings->loadArray( config('purifier.'.$customSettings) );

                }else{
                    throw new \Exception('This configuration can\'t be found!');
                }

            }
        }else{
            // load default settings
            $this->settings->loadArray(config('purifier.default'));
        }

        // clean text
        $purifier = new \HTMLPurifier($this->settings);

        // if it's array
        if (is_array($text)) {

            return array_map(function ($item) use($purifier) {
                return $purifier->purify($item);
            }, $text);

        }else{

            return $purifier->purify($text);
        }

    }
}