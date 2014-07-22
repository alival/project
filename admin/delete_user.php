<?php
require_once('include/bootstrap.php');
$user = new Users($db_connection);
$user->isLoggedIn();
$user->delete($_GET['id']);

redirect('users.php');
