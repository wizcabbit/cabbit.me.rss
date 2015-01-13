<?php

define("RECONNECT_TIMES", 5);

function get_json($url)
{
  for ($i = 0; $i < RECONNECT_TIMES; $i++) {
    $raw_data = file_get_contents($url);

    if (!$raw_data) {
      continue;
    } else {
      $json = json_decode($raw_data, true);
      if ($json == NULL) {
        continue;
      } else {
        return $json;
      }
    }
  }
  return NULL;
}
