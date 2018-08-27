<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('head_title'))
{
    function head_title($var = 'Sistem Informasi Permintaan ATK')
    {
        return $var;
    }   
}

if ( ! function_exists('base_assets'))
{
    function base_assets()
    {
        $var = base_url('assets/deskapp/');
        return $var;
    }   
}

if ( ! function_exists('shortcut_icon'))
{
    function shortcut_icon()
    {
        $var = base_url('assets/deskapp/vendors/images/login-img.png');
        return $var;
    }   
}

if ( ! function_exists('data_agama'))
{
    function data_agama()
    {
        $var = ['Islam','Kristen','Hindu','Buddha','Kong Hucu'];
        return $var;
    }   
}