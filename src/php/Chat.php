<?php
// CAPTAIN SLOG
// vim: set expandtab tabstop=4 shiftwidth=4 autoindent smartindent:
// File         : chat.php 
// System       : C3I
// Date         : June  2016
// Author       : Mark Addinall
// Synopsis     : This file implements Ratchet for PHP.  This first effort
//                as experimentation is to implement a chat browser component
//                between members of our network.
//
// -------------------------------
//
namespace c3iApp;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

//-----------------------------------------------
class Chat implements MessageComponentInterface {

    public function onOpen(ConnectionInterface $connection) {
    }

    public function onMessage(ConnectionInterface $from, $message) {
    }

    public function onClose(ConnectionInterface $connection) {
    }

    public function onError(ConnectionInterface $connection, \Exception $e) {
    }
}


