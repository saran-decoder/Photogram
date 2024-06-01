<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('rabbitmq.selfmade.ninja', 5672, 'pubuser', 'password1', 'sibidharan_helloworld');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);
while (1) {
    $message = random_int(100000, 999999);
    $msg = new AMQPMessage($message);
    $channel->basic_publish($msg, '', 'hello');

    echo " [x] Sent '$message!'\n";
    usleep(500);
}

$channel->close();
$connection->close();
