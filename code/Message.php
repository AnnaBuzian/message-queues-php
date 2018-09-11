<?php

namespace MessageQueue;

/**
 * Class Message
 * @package MessageQueue
 */
class Message
{

    /** @var string - key of the message */
    private $key;

    /** @var array  */
    private $data;


    /**
     * Constructor: Pass over the data we need
     */
    public function __construct($key, $data) {
        $this->key = $key;
        $this->data = $data;
    }


    /**
     * getKey: Returns the key
     */
    public function getKey() {
        return $this->key;
    }
}