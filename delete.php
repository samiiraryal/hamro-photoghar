<?php
include "db_conn.php";
$sql="delete from bookings where id=$regno";
 mysqli_query($conn, $sql);
 
