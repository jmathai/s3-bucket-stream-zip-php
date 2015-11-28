# S3BucketStreamZip

[![Build Status](https://travis-ci.org/jmathai/s3-bucket-stream-zip-php.svg?branch=master)](https://travis-ci.org/jmathai/s3-bucket-stream-zip-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jmathai/s3-bucket-stream-zip-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jmathai/s3-bucket-stream-zip-php/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/jmathai/s3-bucket-stream-zip-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/jmathai/s3-bucket-stream-zip-php/?branch=master)

## Overview
This library lets you efficiently stream the contents of an S3 bucket/folder as a zip file to the client.

## Installation
Installation is done via composer by adding the a dependency on jmathai/s3-bucket-stream-zip-php.

```json
{
  "require": {
    "jmathai/s3-bucket-stream-zip-php": "dev-master"
  }
}
```

## Usage
```php
// taken from examples/simple.php
// since large buckets may take lots of time we remove any time limits
set_time_limit(0);
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

```

## Authors
* Jaisen Mathai <jaisen@jmathai.com> - http://jaisenmathai.com

## Dependencies
* Paul Duncan <pabs@pablotron.org> - http://pablotron.org/
* Jonatan Männchen <jonatan@maennchen.ch> - http://commanders.ch
* Jesse G. Donat <donatj@gmail.com> - https://donatstudios.com
