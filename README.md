# podcast-archiver

A simple PHP script for maintaining an archive of podcasts.

## Setup

1. Run `composer install` to install dependencies.
2. Copy `config.sample.php` to `config.php` and edit this file to configure your feeds (see options below).
3. Run the script with `php podcast-archive.php` to download episodes.

## Options

### Global Config

#### `download_directory`
Path where podcast directories will be created. Do not add a trailing slash.

#### `max_per_feed`
The archiver will download the latest episodes up to this number. Use `0` to download all.

### Podcast feed items

#### `name`
Name of the podcast. Currently only output on the console.

#### `directory`
Directory where the episodes will be saved.

#### `feed`
URL of RSS feed.