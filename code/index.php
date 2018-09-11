<?php
require 'vendor/autoload.php';

$app = new Slim\App();

/**
 * Handle all POST to /create
 *
 * @param string $key
 */
$app->post('/create', function() {
    # Get the key
    $key = $_POST['key'];
    # Setup some data
    $data = array(
        'time' => time(),
        'key' => $key,
        'request' => 'start'
    );
    # Add the message into the queue
    \MessageQueue\Queue::addMessage($key, $data);
});

# Run the application
try {
    $app->run();

} catch (\Slim\Exception\MethodNotAllowedException $e) {
    echo $e->getMessage();

} catch (\Slim\Exception\NotFoundException $e) {
    echo $e->getMessage();

} catch (Exception $e) {
    echo $e->getMessage();

}