<?php
// CAPTAIN SLOG
// vim: set expandtab tabstop=4 shiftwidth=4 autoindent smartindent:
// File         : chat-server.php 
// System       : C3I 
// Date         : May  2016
// Author       : Mark Addinall - Jonothan Cromie
// Synopsis     : This is a shell script that is executed from /bin that launches
//                this part of the application.
//             
//
// -------------------------------


use Ratchet\Server\IoServer;
use c3iApp\php\Chat;


	require dirname (__DIR__) . '/vendor/autoload.php';

	$chat_server = IoServer::factory(
		new Chat(),
		8080
	);

	$chat_server->run();

//---------  EOF --------------------

