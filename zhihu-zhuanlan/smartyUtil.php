<?php

// Initialize smary compnent
require_once('smarty/Smarty.class.php');

$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = true;

// Initialize smarty directory configurations
$smarty->template_dir = './';
$smarty->compile_dir = 'bin/templates_c/';
$smarty->cache_dir = 'bin/cache/';
