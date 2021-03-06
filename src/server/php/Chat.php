<?php
// CAPTAIN SLOG
// vim: set expandtab tabstop=4 shiftwidth=4 autoindent smartindent:
// File         : chat.php 
// System       : C3I
// Date         : June  2016
// Author       : Mark Addinall
// Synopsis     : This file implements Ratchet for PHP.  This first effort
//                as experimentation is to implement a chat browser component
//                between members of our network.  This is new compared to the
//                rest of the tool set.  Experimental.
//
//------------+-------------------------------+------------
// DATE       |    CHANGE                     |    WHO
//------------+-------------------------------+------------
// 01/01/2002 | Initial port from PHP3.0      |  MA
// 02/10/2005 | Initial creation Toolset V1.0 |  MA
// 29/04/2007 | Adept to Telstra NOC          |  MA
// 12/08/2009 | Complete re-write v2.x own use|  MA
// 18/02/2010 | Re-write CITEC (unfinished)   |  MA
// 12/02/2012 | Re-write v3.x new object model|  MA
// 16/04/2013 | Re-write v4 new object model  |  MA
// 02/05/2013 | Added support for Mongo noSQL |  MA
// 08/05/2013 | Added an SQL Parser for Mongo |  MA
// 11/04/2014 | Back on the job.              |  MA
// 11/06/2014 | Back in. Distracted by work.  |  MA
// 29/07/2014 | Added Redis support, cache    |  MA
// 22/02/2016 | Adapt to new SPA systems      |  MA
// 26/02/2016 | FINALLY implement PDO         |  MA
// 30/08/2016 | This is likely to be the last incarnation
//              of this object.  I am probably going to
//              drop PHP as the backend for my applications
//              after this year and use a full stack solution
//              such as Angular2 or METEOR.
//              The set of PHP objects has served wll for a very long
//              time, which brings me to my last note.
//      
//              This last version  of the PHP toolset has NO interaction
//              with the DOM, the browser, HTML code, styles,
//              scripts.  It is a pure RESTFUL API that responds
//              to date requests from a client(s).
//
//              It made sense to retire PHP involvement in the front end.
//              It is a nice little language, but the mish mash it
//              creates these days trying to play in the front end
//              is just not worth the confusion.  Javascript fameworks do the
//              job better and cleaner than jumping in and out of
//              HTML generation based on spurious SESSION values.
//          
//          Fourteen years is quite a lifespan for a toolset!
//          This is the FINAL version.
//
//------------+-------------------------------+------------

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


