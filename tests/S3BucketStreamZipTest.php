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
      $client = new S3BucketStreamZip([]);
  }

  /**
   * @expectedException \JMathai\S3BucketStreamZip\Exception\InvalidParameterException
   */
  public function testInvalidParamsToConstructorSecret()
  {
      $client = new S3BucketStreamZip(['key' => 'foo']);
  }

  /**
   * @expectedException \JMathai\S3BucketStreamZip\Exception\InvalidParameterException
   */
  public function testInvalidParamsToConstructorBucket()
  {
      $client = new S3BucketStreamZip(['key' => 'foo', 'secret' => 'bar']);
  }

    public function testValidParamsToConstructor()
    {
        $client = new S3BucketStreamZip(['key' => 'foo', 'secret' => 'bar', 'bucket' => 'foobar', 'region' => 'baz']);
    }
}
