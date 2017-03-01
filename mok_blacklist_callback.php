<?php
if (!defined('SYSTEM_ROOT')) {
    die('Insufficient Permissions');
}

function callback_remove()
{
    option::del('mok_blacklist');
}