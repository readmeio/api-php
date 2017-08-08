<?php

namespace ReadmeAPI;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/2/2017
 * Time: 8:03 PM
 */

class BuildAPI {
    const API_PATH = 'https://api.readme.build/v0/services/';
    const HTTP_OPEN_TIMEOUT = 5;

    public  $api_key;
    public  $password;

    function config($api_key, $password = '')
    {
        $this->api_key = $api_key;
        $this->password = $password;
    }

    function run($param_service, $method, $data){
        $parts = $this->generate_api_url_parts($param_service);
        $organization = $parts[0];
        $service = $parts[1];
        //$version_override  = $parts[2];
        $service_full = $organization.'/'.$service;
        $path = self::API_PATH.$service_full.'/'.$method.'/invoke';
        $url = $path;
        $options = array(
            'http' => array(
                'header' => "content-type: application/x-www-form-urlencoded\r\n".
                    "User-Agent:MyAgent/1.0\r\n".
                    'Authorization: Basic ' . base64_encode($this->api_key.':'.$this->password),
                'method'  => "POST",
                'content' => http_build_query($data)
            )
        );


        $context  = stream_context_create($options);
        //$result = file_get_contents('https://api.readme.build/v0/services//math/multiply/invoke', false, $context);
        $result = file_get_contents($url, false, $context);

        switch ($http_response_header[0]){
            case 'HTTP/1.0 200 OK':
                return $result;
            default:
                return $http_response_header[0];
        }
    }

    private function generate_api_url_parts($service) {
        $matches = preg_split("/[\/@]+/", $service);
        if(count($matches) < 3) {
            array_unshift($matches, "");
        }
        return ($matches);
    }
    public function get_http_response_code($domain) {
        $headers = get_headers($domain);
        return substr($headers[0], 9, 3);
    }
}

