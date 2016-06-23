<?php
// CAPTAIN SLOG
// vim: set expandtab tabstop=4 shiftwidth=4 autoindent smartindent:
// File         : rachet.php
// System       : USM v3.x experiments 
// Date         : Apr 20 2016
// Author       : Mark Addinall
// Synopsis     : Implement bi-directional web sockets rather that
//                polling PHP/Javascript/AjaX
//              
//            	  I have a new position at USM.  A safety company
//		          that manufacture remote monitoring devices and 
//                software.  I am having a look at this technology to
//                see if it can be of any use to us for Version 3.x
//
//                The technology in use in this experiment comprise
//                - Bootstrap UI
//                - React JS Client code
//                - jQuery 2.x
//                - RxJS, Reactive Extenstions for Javascript
//                - LESS
//                - Rachet Web Sockets for PHP 
//
// -------------------------------

namespace usm_app;                                           // important. Keep out won namespace clean.

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;


//-----------------------------------------------
class Chat implements MessageComponentInterface {

    // this is our main SOCKET communication interface

    //-------------------------------------------------
    public function onOpen(ConnectionInterface $conn) {

        // OPEN a SOCKET
    }

    //----------------------------------------------------------
    public function onMessage(ConnectionInterface $from, $msg) {

        // RECEIVE from a SOCKET
    }

    //--------------------------------------------------
    public function onClose(ConnectionInterface $conn) {

        // CLOSE a SOCKET
    }

    //-----------------------------------------------------------------
    public function onError(ConnectionInterface $conn, \Exception $e) {

        // THROW EXCEPTION on SOCKET ERROR
    }
}

?>


