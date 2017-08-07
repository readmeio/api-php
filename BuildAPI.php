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
        return 'user@example.com';
    }

    function run($param_service, $method, $data){
        $parts = $this->generate_api_url_parts($param_service);
//        print_r($parts);
//        die();
        $organization = $parts[1];
        $service = $parts[2];
        $version_override  = $parts[3];
        $service_full = $organization.'/'.$service;
        $path = self::API_PATH.$service_full.'/invoke';

        $url = $path;
        $options = array(
            'http' => array(
                'header' => "content-type: application/x-www-form-urlencoded\r\n".
                    "User-Agent:MyAgent/1.0\r\n".
                    'Authorization: Basic ' . base64_encode("abdul_f9cfcade4264cba870585a:''"),
                'method'  => "POST",
                'content' => http_build_query($data)
            )
        );


        $context  = stream_context_create($options);
        //$result = file_get_contents('https://api.readme.build/v0/services//math/multiply/invoke', false, $context);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {

        }

        var_dump($result);

        echo $path;
    }

    private function generate_api_url_parts($service) {
        preg_match("/(?:([-\w]+)\/)?([-\w]+)(?:@([-.\w]+))?/", 'math/multiply/invoke', $matches);
        return ($matches);
    }
}

