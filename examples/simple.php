<?php
// since large buckets may take lots of time we remove any time limits
set_time_limit(0);
// set a default time zone in case it's not set
date_default_timezone_set('America/Los_Angeles');

require sprintf('%s/../vendor/autoload.php', __DIR__);

use JMathai\S3BucketStreamZip\S3BucketStreamZip;
use JMathai\S3BucketStreamZip\Exception\InvalidParameterException;

$stream = new S3BucketStreamZip(
            // $auth
            array(
              'key'     => '*********',   // required
              'secret'  => '*********'    // required
            ),
            // $params
            array(
              'Bucket'  => 'bucketname',  // required
              'Prefix'  => 'subfolder/'   // optional (path to folder to stream)
            )
          );

$stream->send('name-of-zipfile-to-send.zip');
