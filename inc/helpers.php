<?php
// Helpers for String Searching

function get_phone($body)
{
    preg_match_all('/[0-9]{3}[\-][0-9]{6}|[0-9]{3}[\s][0-9]{6}|[0-9]{3}[\s][0-9]{3}[\s][0-9]{4}|[0-9]{9}|[0-9]{3}[\-][0-9]{3}[\-][0-9]{4}/', $body, $matches);
    $matches = array_unique($matches[0]);

    if($matches)
    {

        foreach($matches as $match)
        {

            if(strlen($match) == 12)
            {
                
                $phone = $match;
            }
            else
            {
                $phone = '';
            }
        }
    }
    else
    {
        $phone = '';
    }

    return $phone;
}

function get_email($body)
{

    $pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i';
    preg_match_all($pattern, $body, $matches);
    $matches = $matches[0];


    $email = ( ! empty($matches)) ? $matches : 'Your Email';

    return str_replace(',', '', $email);
}

function get_address($body)
{

    $pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i';
    preg_match_all($pattern, $body, $matches);
    $matches = $matches[0];


    $address = ( ! empty($matches)) ? $matches : 'Your Address Here';

    return str_replace(',', '', $address);
}


function get_main_image($images)
{
    foreach($images as $image)
    {
        $get_image = $image->src;
        break;
    }

    $main_image = ($get_image) ? $get_image : '';

    return $main_image;

}

function generateNumericString(INT $len, STRING $str = '') {
    if (strlen($str) < $len) {
        return generateNumericString($len, $str . random_int(0, 9));
    }
    return $str;
}