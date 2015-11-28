<?php
/**
 * @author Jaisen Mathai <jaisen@jmathai.com>
 * @copyright Copyright 2015, Jaisen Mathai
 *
 * This library streams the contents from an Amazon S3 bucket
 *  without needing to store the files on disk or download
 *  all of the files before starting to send the archive.
 *
 * Example usage can be found in the examples folder.
 */

namespace JMathai\S3BucketStreamZip;

use JMathai\S3BucketStreamZip\Exception\InvalidParameterException;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

use ZipStream;

class S3BucketStreamZip
{
  /**
   * @var array
   *
   * {
   *   key: your_aws_key,
   *   secret: your_aws_secret
   * }
   */
  private $auth   = array();

  /**
   * @var array
   *
   * See the documentation for the List Objects API for valid parameters.
   * Only `Bucket` is required.
   *
   * http://docs.aws.amazon.com/AmazonS3/latest/API/RESTBucketGET.html
   *
   * {
   *   Bucket: name_of_bucket
   * }
   */
  private $params = array();

  /**
   * @var object
   */
  private $s3Client;

  /**
   * Create a new ZipStream object.
   *
   * @param Array $auth     - AWS key and secret
   * @param Array $params   - AWS List Object parameters
   */
  public function __construct($auth, $params)
  {
    // We require the AWS key to be passed in $auth.
    if(!isset($auth['key']))
      throw new InvalidParameterException('$auth parameter to constructor requires a `key` attribute');

    // We require the AWS secret to be passed in $auth.
    if(!isset($auth['secret']))
      throw new InvalidParameterException('$auth parameter to constructor requires a `secret` attribute');

    // We require the AWS S3 bucket to be passed in $params.
    if(!isset($params['Bucket']))
      throw new InvalidParameterException('$params parameter to constructor requires a `Bucket` attribute (with a capital B)');

    $this->auth   = $auth;
    $this->params = $params;

    $this->s3Client = S3Client::factory($this->auth);
  }

  /**
   * Stream a zip file to the client
   *
   * @param String $filename  - Name for the file to be sent to the client
   * @param Array  $params    - Optional parameters
   *  {
   *    expiration: '+10 minutes'
   *  }
   */
  public function send($filename, $params = array())
  {
    // Set default values for the optional $params argument
    if(!isset($params['expiration']))
      $params['expiration'] = '+10 minutes';

    // Initialize the ZipStream object and pass in the file name which
    //  will be what is sent in the content-disposition header.
    // This is the name of the file which will be sent to the client.
    $zip = new ZipStream\ZipStream($filename);

    // Get a list of objects from the S3 bucket. The iterator is a high
    //  level abstration that will fetch ALL of the objects without having
    //  to manually loop over responses.
    $result = $this->s3Client->getIterator('ListObjects', $this->params);

    // We loop over each object from the ListObjects call.
    foreach($result as $file)
    {
      // We need to use a command to get a request for the S3 object
      //  and then we can get the presigned URL.
      $command = $this->s3Client->getCommand('GetObject', array(
        'Bucket' => $this->params['Bucket'],
        'Key' => $file['Key']
      ));
      $signedUrl = $command->createPresignedUrl($params['expiration']);
      
      // Get the file name on S3 so we can save it to the zip file 
      //  using the same name.
      $fileName = basename($file['Key']);

      // We want to fetch the file to a file pointer so we create it here
      //  and create a curl request and store the response into the file 
      //  pointer.
      // After we've fetched the file we add the file to the zip file using
      //  the file pointer and then we close the curl request and the file 
      //  pointer.
      // Closing the file pointer removes the file.
      $fp = tmpfile();
      $ch = curl_init($signedUrl);
      curl_setopt($ch, CURLOPT_TIMEOUT, 120);
      curl_setopt($ch, CURLOPT_FILE, $fp);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_exec($ch);
      curl_close($ch);
      $zip->addFileFromStream($fileName, $fp);
      fclose($fp);
    }

    // Finalize the zip file.
    $zip->finish();
  }
}
