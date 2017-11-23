<?php
$id = $_POST['uid'];
$pass = $_POST['upass'];

$host = 'db711052003.db.1and1.com';
$user = 'root';
$pass = 'TP_config27';
mysql_connect($host, $user, $pass);
mysql_select_db('db711052003');

$dologin = "select id,pass from user where id = $id and pass = $pass ";
$result = mysql_query( $dologin );

if($result)
{
 echo "Successfully Logged In";
}
else
{
 echo "Wrong Id Or Password";
}
?>