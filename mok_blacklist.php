<?php
/*
Plugin Name: 黑名单
Version: 1.0
Plugin URL: http://www.mokeyjay.com
Description: 禁止黑名单内的百度账号绑定
Author: mokeyjay
Author Email: i@mokeyjay.com
Author URL: http://www.mokeyjay.com
For: V3.8+
*/
if (!defined('SYSTEM_ROOT') && !defined('ROLE')) {
    die('Insufficient Permissions');
}

function mok_blacklist_check()
{
    if(ROLE != 'admin' && ROLE != 'vip'){
        $opt = json_decode(option::get('mok_blacklist'), TRUE);
        global $baidu_name; // 引用云签获取到的、经过转义处理的百度用户名
        $baidu_name = str_replace('\\\'', '\'', str_replace('\\\\', '\\', $baidu_name)); // 反转义

        if(in_array($baidu_name, $opt)) msg('绑定百度账号失败，请联系网站管理员');
    }
}

addAction('baiduid_set_2', 'mok_blacklist_check');