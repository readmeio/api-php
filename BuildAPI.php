<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/2/2017
 * Time: 8:03 PM
 */

class BuildAPI {
    const API_PATH = 'https://api.readme.build/v0/services/';
    const HTTP_OPEN_TIMEOUT = 5;

    function config($api_key, $password = '')
    {
        $api_key = $api_key;
        $password = $password;
        echo $password;
    }

    function run($service, $method, $data){

    }
}

