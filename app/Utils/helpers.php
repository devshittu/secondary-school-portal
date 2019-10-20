<?php
/**
 * Created by PhpStorm.
 * User: devshittu
 * Date: 10/18/19
 * Time: 9:24 PM
 */
if (! function_exists('get_reg_code_prefix')) {

    function get_reg_code_prefix($userType) {
        $prefix = '';
        switch ($userType) {
            case \App\Utils\Constants::DBCV_USER_TYPE_ADMIN:
                $prefix = 'ADM';
                break;
            case \App\Utils\Constants::DBCV_USER_TYPE_CANDIDATE:
                $prefix = 'CND';
                break;
            case \App\Utils\Constants::DBCV_USER_TYPE_STAFF:
                $prefix = 'STF';
                break;
            case \App\Utils\Constants::DBCV_USER_TYPE_STUDENT:
                $prefix = 'STD';
                break;

        }
        return $prefix . '_';
    }

}
if (! function_exists('random_chars')) {

    function random_chars($length = 10, $randomLowerCase = FALSE, $randomUpperCase = FALSE, $includeDigits = FALSE)
    {
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits = '0123456789';
        //$special = '~@$^*(){}[]|=';
        $chars = ($randomLowerCase ? $lower : '').($randomUpperCase ? $upper : '').($includeDigits ? $digits : '');
        $str = '';
        $last_index = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++)
        {
            mt_srand(hexdec(uniqid()));
            $str .= $chars[mt_rand(0, $last_index)];
        }

        return $str;

    }
}