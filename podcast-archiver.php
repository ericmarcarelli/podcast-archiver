<?php

require 'config.php';
require 'vendor/autoload.php';

foreach($config['podcasts'] as $podcast) {
  print 'Checking ' . $podcast['name'] . "\r\n";

  $feed = new SimplePie();
  $feed->set_feed_url($podcast['feed']);
  $feed->init();

  $downloadDir = $config['download_directory'] . $podcast['directory'] . '/';

  if (!file_exists($downloadDir)) {
    mkdir($downloadDir, 0777, true);
  }

  foreach ($feed->get_items() as $item) {
    $enclosure = $item->get_enclosure(0);
    if (!empty($enclosure)) {
      $parts = parse_url($enclosure->get_link());
      $filename = basename($parts["path"]);
      print $filename . "\r\n";

      if (!file_exists($downloadDir . $filename)) {
        file_put_contents($downloadDir . $filename, file_get_contents($enclosure->get_link()));
      }
    }
  }
}