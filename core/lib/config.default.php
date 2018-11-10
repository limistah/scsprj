<?php
defined('VERSION') or exit('Sorry, you are not allowed to do that!');

/*
This is a basic database connection script using DHTMLSQL
Uncoment to have us connected to the databse
*/

if(APP_MODE == 'DEV') {
    $host="localhost";
    $user="root";
    $pass="root";
    $dbname="scsprj";
} else {
    $host="live_host";
    $user="live_user";
    $pass="live_password";
    $dbname="live_db_name";
}

include __DIR__ . '/dhtmlsql.php';
// Connection data (server_address, database, name, poassword)
$db=DHTMLSQL::connect($host,$user,$pass,$dbname);

//confirm database connection
if(!$db->connected()) {
    exit("Unable to connect to database. Reason: ".$db->connect_error());
}

//Sets MySQL character set and collation
$db->set_charset('utf8','utf8_general_ci');
