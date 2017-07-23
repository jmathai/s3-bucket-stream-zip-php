# S3BucketStreamZip

[![Build Status](https://travis-ci.org/limenet/s3-bucket-stream-zip-php.svg?branch=master)](https://travis-ci.org/limenet/s3-bucket-stream-zip-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/limenet/s3-bucket-stream-zip-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/limenet/s3-bucket-stream-zip-php/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/limenet/s3-bucket-stream-zip-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/limenet/s3-bucket-stream-zip-php/?branch=master)

Forked from `jmathai/s3-bucket-stream-zip-php` and `michaeltlee/s3-bucket-stream-zip-php`

## Overview
This library lets you efficiently stream the contents of an S3 bucket/folder as a zip file to the client.

Uses v3 of AWS SDK to stream files directly from S3.

## Installation

```
composer require limenet/s3-bucket-stream-zip-php
composer install
```

## Usage

See `examples/simple.php`.

## Laravel 5.4

in `config/app.php`:

```php
'providers' => [
    ...
    limenet\S3BucketStreamZip\AwsZipStreamServiceProvider::class,
    ...
]
```

in `config/services.php`, set:
```php
's3' => [
    'key'     => '',
    'secret'  => '',
    'region'  => '',
    'version' => '',
];
```

## Authors
* Jaisen Mathai <jaisen@jmathai.com> - http://jaisenmathai.com
* [@Michaeltlee](https://github.com/Michaeltlee)
* Linus Metzler <hi@linusmetzler.me> - https://linusmetzler.me

## Dependencies
* Paul Duncan <pabs@pablotron.org> - http://pablotron.org/
* Jonatan Männchen <jonatan@maennchen.ch> - http://commanders.ch
* Jesse G. Donat <donatj@gmail.com> - https://donatstudios.com
