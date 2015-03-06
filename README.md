# S3BucketStreamZip

[![Build Status](https://travis-ci.org/jmathai/s3-bucket-stream-zip-php.svg?branch=master)](https://travis-ci.org/jmathai/s3-bucket-stream-zip-php)

## Instalation
Installation is done via composer by adding the a dependency on jmathai/s3-bucket-stream-zip-php.

```json
{
  "require": {
    "jmathai/s3-bucket-stream-zip-php": "dev-master"
  }
}
```

## Overview
This library lets you efficiently stream the contents of an S3 bucket/folder as a zip file to the client.
```php
// taken from examples/simple.php
require sprintf('%s/../vendor/autoload.php', __DIR__);

use S3BucketStreamZip\S3BucketStreamZip;
use S3BucketStreamZip\Exception\InvalidParameterException;

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
