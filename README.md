# S3BucketStreamZip

[![Build Status](https://travis-ci.org/limenet/s3-bucket-stream-zip-php.svg?branch=master)](https://travis-ci.org/limenet/s3-bucket-stream-zip-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/limenet/s3-bucket-stream-zip-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/limenet/s3-bucket-stream-zip-php/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/limenet/s3-bucket-stream-zip-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/limenet/s3-bucket-stream-zip-php/?branch=master)

## Overview
This library lets you efficiently stream the contents of an S3 bucket/folder as a zip file to the client.

## Installation
Installation is done via composer by adding the a dependency on limenet/s3-bucket-stream-zip-php.

```
composer require limenet/s3-bucket-stream-zip-php
composer install
```

## Usage
```php
// taken from examples/simple.php

require 'vendor/autoload.php';

use JMathai\S3BucketStreamZip\S3BucketStreamZip;

$stream = new S3BucketStreamZip([
    'key'    => 'your-key-goes-here',
    'secret' => 'your-secret-goes-here',
    'bucket' => 'the-name-of-your-bucket',
    'region' => 'the-region-of-your-bucket',
    'prefix' => 'prefix-of-the-files-to-zip',
  ]);

$stream->send('name-of-zipfile-to-send.zip');


```

## Authors
* Jaisen Mathai <jaisen@jmathai.com> - http://jaisenmathai.com
* Linus Metzler <hi@linusmetzler.me> - https://linusmetzler.me

## Dependencies
* Paul Duncan <pabs@pablotron.org> - http://pablotron.org/
* Jonatan Männchen <jonatan@maennchen.ch> - http://commanders.ch
* Jesse G. Donat <donatj@gmail.com> - https://donatstudios.com
