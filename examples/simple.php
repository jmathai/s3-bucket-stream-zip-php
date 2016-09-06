<?php

// since large buckets may take lots of time we remove any time limits
set_time_limit(0);
// set a default time zone in case it's not set
date_default_timezone_set('America/Los_Angeles');

require sprintf('%s/../vendor/autoload.php', __DIR__);

use JMathai\S3BucketStreamZip\S3BucketStreamZip;

$stream = new S3BucketStreamZip([
    'key'    => 'your-key-goes-here',
    'secret' => 'your-secret-goes-here',
    'bucket' => 'the-name-of-your-bucket',
    'region' => 'the-region-of-your-bucket',
    'prefix' => 'prefix-of-the-files-to-zip',
  ]);

$stream->send('name-of-zipfile-to-send.zip');
