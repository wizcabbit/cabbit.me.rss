<?php

require_once('smartyUtil.php');

header('Content-Type: xml');

$API = 'http://zhuanlan.zhihu.com/api/columns/';

if (isset($_GET['name'])) {
  $name = $_GET['name'];
  $user_data = file_get_contents($API . $name);
  $post_data = file_get_contents($API . $name . '/posts?limit=10');

  if (!$user_data || !$post_data) {
    echo('请求的专栏不存在');
    exit();
  } else {
    $user = json_decode($user_data, true);
    $posts = json_decode($post_data, true);

    $smarty->assign('user', $user);
    $smarty->assign('posts', $posts);

    $smarty->display('atom.xml.tpl', $name);
  }
} else {
  echo('请求的专栏不存在');
  exit();
}


