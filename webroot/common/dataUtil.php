<?php

define("RECONNECT_TIMES", 5);

function get_json($url)
{
  for ($i = 0; $i < RECONNECT_TIMES; $i++) {
    // 获取接口数据，按gzip解压
    $raw_data = file_get_contents($url);
    $raw_content = gzdecode($raw_data);

    // gzip解压失败后，直接使用结果
    if (!$raw_content) {
      $raw_content = $raw_data;
    }

    if (!$raw_content) {
      continue;
    } else {
      $json = json_decode($raw_content, true);
      if ($json == NULL) {
        continue;
      } else {
        return $json;
      }
    }
  }
  return NULL;
}
