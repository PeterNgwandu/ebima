<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Common extends Controller
{

    public static function generateText($ln = 10) {

        $text_created = array_merge( range('0', '9'), range('A', 'Z') );
        shuffle($text_created);
        $text_returnd = substr(implode($text_created), 0, $ln);

        return $text_returnd;
    }

    public static function md5encrypt($text) {

        //	text the and convert to md5
        $text_returnd = password_hash($text, PASSWORD_BCRYPT);

        return $text_returnd;
    }

    public static function crYp($text) {

        //	text the and convert to md5
        $text_returnd = md5($text);

        return $text_returnd;
    }

    function url_encode($string){
        return urlencode(utf8_encode($string));
    }

    #===================================================================================

    function url_decode($string){
        return utf8_decode(urldecode($string));
    }

    function splittext($text, $rule = "space"){
        /*
            bellow is list of rule's string
        */
        $rules = [
            "space" => "/[\s]+/",
            "space_comar" => "/[\s,]+/",
            "comar" => "/[\,]+/",
            "words" => "/\s/",
        ];

        /*
            remove whitespace in the rule's string
        */
        $rule = preg_replace("/\s+/", "", $rule);

        /*
            use the rule's string to split the text
        */
        $strg = preg_split($rules[ $rule ], $text, 0, PREG_SPLIT_NO_EMPTY);

        if(is_array($strg)){
            return $strg;
        }

        return null;
    }

    function replace($text, $rule = "removespaces", $str = ""){
        /*
            bellow is list of rule's string
        */
        $rules = [
            "purenumerous" => "/\D/",
            "alphanumeric" => "/[^a-zA-Z0-9\s]/",
            "removespaces" => "/\s+/"
        ];

        /*
            remove whitespace in the rule's string
        */
        $rule = preg_replace($rules['removespaces'], "", $rule);

        /*
            use the rule's string to split the text
        */
        $strg = preg_replace($rules[ $rule ], $str, $text);

        return $strg;
    }

    public static function pesaformat( $amount, $symbol = '', $nukta = 2 ){
        return $symbol . number_format( sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $amount)), $nukta );
    }

    /*
        gets the data from a URL

        Example :-

        geTdata (
            'http://mrlenga.com/api/v1/sms/sendsms/single',
            'POST',
            [
                'senderid' => 'Info',
                'to' => '255752476139',
                'SMS' => 'ujumbe',
                'api_key' => '654321',
                'api_secret' => '654321',
            ]
        )

        @input params
    */
    public static function geTdata ( $url, $method = 'GET', array $data, $result = null )
    {
        /*
            -- = ----------------------------------------
            TAKE + BACKEND with MODULE PART
        */

        $server	= URL_BACKEND . $url ;
        if((substr($server, 0, 7) == 'http://') || (substr($server, 0, 8) == 'https://')){
            return $server .' -> '. self::pgcurl( $server, $data, $method );
        }
    }

    public static function pgcurl( $url, array $data, $method )
    {
        $curl = new \Curl\Curl();

        $curl->setHeader("cache-control", "no-cache");
        $curl->setHeader("Authorization", ((isset($_SESSION['']['jwt_token']))? $_SESSION['']['jwt_token'] : "5"));
        $curl->setOpts(array(
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 30,
        ));

        switch ($method) {
            case 'get':
            case 'GET':
                $curl->get( $url, $data);
                break;
            case 'post':
            case 'POST':
                $curl->post( $url, $data);
                break;
            case 'delete':
            case 'DELETE':
                $curl->delete( $url, $data);
                break;
            case 'put':
            case 'PUT':
                $curl->put( $url, $data);
                break;
        }

        if ($curl->error) {
            //return  echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
            return null;
        } else {
            return $curl->response;
        }

        return null;
    }

    function get_timeago( $ptime )
    {
        $estimate_time = time() - $ptime;

        if( $estimate_time < 1 )
        {
            return 'less than 1 second ago';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $estimate_time / $secs;

            if( $d >= 1 )
            {
                $r = round( $d );
                return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }

}
