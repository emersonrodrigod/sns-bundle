<?php

namespace Solpac\SNSBundle\Services;

use Aws\Exception\AwsException;
use Aws\Sns\SnsClient;


class AmazonSNSClient
{

    protected $service;

    /**
     * AmazonSNSClient constructor.
     * @param $amazon_sns_key
     * @param $amazon_sns_secret
     * @param $amazon_sns_region
     */
    public function __construct($amazon_sns_key, $amazon_sns_secret, $amazon_sns_region)
    {
        $this->service = SnsClient::factory(array(
            'credentials' => [
                'key'    => $amazon_sns_key,
                'secret' => $amazon_sns_secret
            ],
            'version'=> 'latest',
            'region' => $amazon_sns_region
        ));
    }

    /**
     * @param $message
     * @param $topic
     * @return mixed
     */
    public function sendTopic($message, $topic)
    {

        $args = [
            'Message' => $message,
            'TopicArn' => $topic,
        ];

        try {
          return $this->service->publish($args);
        } catch (AwsException $e) {
            error_log($e->getMessage());
        }

    }
}
