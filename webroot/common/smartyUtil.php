<?php

// Initialize smary compnent
require_once('../smarty/Smarty.class.php');

$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching_type = 'ocs';
$smarty->caching = true;

// Atom缓存时间：6小时
$smarty->cache_lifetime = "21600";

// Initialize smarty directory configurations
$smarty->template_dir = '../common/';
$smarty->compile_dir = '/ace/app/bin/templates_c/';
$smarty->cache_dir = '/ace/app/bin/cache/';
