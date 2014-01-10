<?php

/**
 * Copyright 2013 - American Pacific Group
 *
 * This class provides methods to access the APG API (http://prs.flyafa.com/api).
 */

/* Check if CURL is available*/
if (!function_exists('curl_init')) {
    throw new Exception('APG PRS SDK needs the CURL PHP extension.');
}

/* Check if JSON functions are available */
if (!function_exists('json_decde')) {
    throw new Exception('Facebook needs the JSON PHP extension.');
}

class apgApi {

    const VERSION = '0.2';
    private $baseUrl = 'http://prs.flyafa.com/api/';
    private $ch = '';

    public function __construct($url = null) {
        if($url) {
            $this->baseUrl = $url;
        }
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    private function makeRequest($api, $params, $ch = null) {
        $requestUrl = $this->baseUrl . $api . '/' . $params;
        curl_setopt($this->ch, CURLOPT_URL, $requestUrl);

        try {
            $response = curl_exec($this->ch);
            if(FALSE === $response) {
                throw new Exception(curl_error($this->ch), curl_errno($this->ch));
            }
        } catch (Exception $e) {
            print $e->getMessage();
        }
        return $response;
    }

    public function getPid($pid) {
        $params = $pid;
        $data = json_decode($this->makeRequest('pid', $pid));
        return $data;
    }

    public function getLogbook($pid) {
        $params = $pid;
        $logbook = json_decode($this->makeRequest('logbook', $pid));
        return $logbook->data;
    }
}