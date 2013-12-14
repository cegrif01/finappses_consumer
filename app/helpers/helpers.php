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
