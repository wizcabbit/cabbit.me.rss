<?php

define("RECONNECT_TIMES", 5);

function get_json($url)
{
  for ($i = 0; $i < RECONNECT_TIMES; $i++) {
    $raw_data = file_get_contents($url);
    $raw_content = gzdecode($raw_data);

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
