<?php

require_once('../common/smartyUtil.php');
require_once('../common/dataUtil.php');

// 加入返回Atom的Header
header('Content-Type: xml');

$API = 'http://zhuanlan.zhihu.com/api/columns/';
$URL_BASE = 'http://zhuanlan.zhihu.com';

if (isset($_GET['name'])) {
  $name = $_GET['name'];

  // 如果缓存尚未失效，直接返回缓存页面
  if ($smarty->isCached('atom.xml.tpl', $name)) {
    $smarty->display('atom.xml.tpl', $name);
    exit();
  }

  // 抓取频道、文章列表JSON
  $channel = get_json($API . $name);
  $posts = get_json($API . $name . '/posts?limit=10');

  if ($channel == NULL || $posts == NULL) {
    echo('请求的专栏不存在');
    exit();
  } else {
    // 填充模板，返回Atom页面
    $smarty->assign('channel', $channel);
    $smarty->assign('posts', $posts);
    $smarty->assign('URL_BASE', $URL_BASE);

    $smarty->display('atom.xml.tpl', $name);
    exit();
  }
} else {
  echo('请求的专栏不存在');
  exit();
}
