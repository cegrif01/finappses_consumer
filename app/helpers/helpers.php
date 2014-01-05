<?php

if ( ! function_exists('pp'))
{
    function pp($x, $die=true)
    {
        echo "<pre>".print_r($x, true)."</pre>";
        if($die){
            die;
        }
    }
}

if ( ! function_exists('strip_http'))
{
    function strip_http($url)
    {
        
        if(substr($url, 0, 7) == 'http://') {
            
            return substr($url, 7);
        } else if(substr($url, 0, 8) == 'https://') {
            return substr($url, 8);
        }
    }
}
