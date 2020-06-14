
<?php
require_once 'vendor/autoload.php';
$google_client=new Google_Client();
$google_client->setClientId('482047996896-l9j1mq2qaqslc6c714896s7h1v3cs3d8.apps.googleusercontent.com');
$google_client->setClientSecret('7k_B6RzIDBwAN2Im908L-F5M');
$google_client->setRedirectUri('file:///C:/xampp/htdocs/calendarslot/index.html');
$google_client->addScope('email');
$google_client->addScope('profile');
session_start();
?>