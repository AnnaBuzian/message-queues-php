<?php

namespace MessageQueue;

/**
 * Class Queue
 * @package MessageQueue
 */
class Queue
{


    /**
     * Stores our queue semaphore.
     * @var resource
     */
    private static $queue = NULL;


    /**
     * getQueue: Returns the semaphore message resource.
     *
     * @access public
     */
    public static function getQueue() {

        # Some unique ID
        define('QUEUE_KEY', uniqid('QueueKey', true));

        # Different type of actions
        define('QUEUE_TYPE_START', 1);
        define('QUEUE_TYPE_END', 2);

        # Setup the queue
        self::$queue = msg_get_queue(QUEUE_KEY);

        # Return the queue
        return self::$queue;

    }

    /**
     * addMessage: Given a key, store a new message into our queue.
     *
     * @param string $key - Reference to the message
     * @param array $data - Some data to pass into the message
     */
    public static function addMessage($key, array $data = array()) {
        $message = new Message($key, $data);

        if(msg_send(self::$queue, QUEUE_TYPE_START, $message)) {
            print_r(msg_stat_queue(self::$queue));
        } else {
            echo "Error adding to the queue";
        }
    }
}