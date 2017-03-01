<?php
require '../../init.php';
if (!defined('SYSTEM_ROOT') || ROLE != 'admin') {
    die('Insufficient Permissions');
}
if (isset($_POST['blacklist'])) {
    $ary = explode("\n", $_POST['blacklist']);
    // 遍历去除空行、换行符等
    $list = array();
    foreach ($ary as $r){
        $r = trim($r);
        if($r !== '') $list[] = $r;
    }
    option::set('mok_blacklist', json_encode($list));
    Redirect('../../index.php?mod=admin:setplug&plug=mok_blacklist&save=ok');
}