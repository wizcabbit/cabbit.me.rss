<?php

require_once('smartyUtil.php');
require_once('dataUtil.php');

header('Content-Type: xml');

$API = 'http://zhuanlan.zhihu.com/api/columns/';
$URL_BASE = 'http://zhuanlan.zhihu.com';

if (isset($_GET['name'])) {
  $name = $_GET['name'];

  $channel = get_json($API . $name);
  $posts = get_json($API . $name . '/posts?limit=10');

  if ($channel == NULL || $posts == NULL) {
    echo('请求的专栏不存在');
    exit();
  } else {
    $smarty->assign('channel', $channel);
    $smarty->assign('posts', $posts);
    $smarty->assign('URL_BASE', $URL_BASE);

    $smarty->display('atom.xml.tpl', $name);
  }
} else {
  echo('请求的专栏不存在');
  exit();
}


