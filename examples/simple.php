<?php

// since large buckets may take lots of time we remove any time limits
set_time_limit(0);
// set a default time zone in case it's not set
date_default_timezone_set('America/Los_Angeles');

require sprintf('%s/../vendor/autoload.php', __DIR__);

use JMathai\S3BucketStreamZip\S3BucketStreamZip;

$stream = new S3BucketStreamZip(
            // $auth
            [
              'key'     => '*********',   // required
              'secret'  => '*********',    // required
            ],
            // $params
            [
              'Bucket'  => 'bucketname',  // required
              'Prefix'  => 'subfolder/',   // optional (path to folder to stream)
            ]
          );

$stream->send('name-of-zipfile-to-send.zip');
