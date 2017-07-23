<?php

namespace limenet\S3BucketStreamZip;

class S3Params
{
    public $params;

    public function __construct($bucket)
    {
        $this->params['Bucket'] = $bucket;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setParam($key, $value)
    {
        $this->params[$key] = $value;
    }
}
