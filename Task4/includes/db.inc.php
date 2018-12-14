<?php 


    $db['db_host'] = "localhost";
    $db['db_user'] = 'root';
    $db['db_password'] = 'zeez3020';
    $db['db_basename'] = 'task4';
foreach( $db as $key => $value)
{
    
    
    define(strtoupper($key),$value);
}
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_BASENAME);


    
?>