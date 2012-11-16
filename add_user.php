<?php

spl_autoload_register();

use App\Models\User;
use App\Mappers\UserMapper;

if ($argc < 2)
{
	echo "Usage: php " . $argv[0] . " login [admin={0,1}]\n";
	exit;
}

$login = $argv[1];
if ($argc >= 3)
	$admin = $argv[2];
else
	$admin = 0;

$user = new User;
$user->init($login, $admin);

$mapper = new UserMapper;

$mapper->save($user);

echo "User '$login' has been added.\n";