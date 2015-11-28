<?php
/**
 * @author Jaisen Mathai <jaisen@jmathai.com>
 * @copyright Copyright 2015, Jaisen Mathai
 */

namespace JMathai\S3BucketStreamZipTest;

use JMathai\S3BucketStreamZip\S3BucketStreamZip;
use PHPUnit_Framework_TestCase;

class S3BucketStreamZipTest extends PHPUnit_Framework_TestCase
{
  /**
  * @expectedException \JMathai\S3BucketStreamZip\Exception\InvalidParameterException
  */
  public function testInvalidParamsToConstructorKey()
  {
    $client = new S3BucketStreamZip(array(), array());
  }

  /**
  * @expectedException \JMathai\S3BucketStreamZip\Exception\InvalidParameterException
  */
  public function testInvalidParamsToConstructorSecret()
  {
    $client = new S3BucketStreamZip(array('key' => 'foo'), array());
  }

  /**
  * @expectedException \JMathai\S3BucketStreamZip\Exception\InvalidParameterException
  */
  public function testInvalidParamsToConstructorBucket()
  {
    $client = new S3BucketStreamZip(array('key' => 'foo', 'secret' => 'bar'), array());
  }

  public function testValidParamsToConstructor()
  {
    $client = new S3BucketStreamZip(array('key' => 'foo', 'secret' => 'bar'), array('Bucket' => 'foobar'));
  }
}
