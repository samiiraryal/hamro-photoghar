<?php
    
//     // $full_name = $_POST['foname'];
//     // $email = $_POST['fomail'];
//     // $phone = $_POST['fophone'];
//     // $date = $_POST['fodate'];
//     // $event_type = $_POST['event-type'];
    
//     // if (!empty($full_name) || !empty($email) || !empty($phone) || !empty($date) || !empty($event_type)){
//     //     $host = "localhost";
//     //     $dbUser = "root";
//     //     $dbPass = "";
//     //     $dbname = "test";

//     //     //create connection
//     //     $conn = new mysqli($host, $dbUser, $dbPass, $dbname);
//     //     if ($mysqli_connect_error()){
//     //         die('Connect Error('.$mysqli_connect_errno().')'. $mysqli_connect_error());
//     //     }else{
//     //     echo "All fields are required";
//     //     die();
//     // }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $event = $_POST['event'];
    // $event_type = $_POST['event'];
    // $event_type = $_POST['event-type'];
    // $event_type = $_POST['event-type'];
    // $event_type = $_POST['event-type'];
    // $event_type = $_POST['event-type'];
    // $event_type = $_POST['event-type'];


    //Database Connection
    $conn= new mysqli('localhost','root','','new1');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into users(name, email, phone, date, event) values(?, ?, ?, ?,?)");
        $stmt->bind_param("ssiss", $name, $email, $phone, $date, $event);
        $stmt->execute();
        echo "Reservation successful...";
        header("Location: welcome.html"); 
        $stmt->close();
        $conn->close();
    }


?>
// <?php

//     $con = mysqli_connect('localhost','root','','priz');
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $date = $_POST['date'];
//     $event_type = $_POST['event_type'];
//     $sql = "INSERT INTO `users` (`ID`, `name`, `email`, `phone`, `date`,`event_type`) VALUES ('1', '$name', '$email', '$phone', '$date','$event_type')";
// $rs = mysqli_query($con, $sql);
// if($rs)
// {
// 	echo "Contact Records Inserted";
// }
//  ?>



// <!-- 
// $full_name = $_POST['foname'];
//     $email = $_POST['fomail'];
//     $phone = $_POST['fophone'];
//     $date = $_POST['fodate'];
//     $event_type = $_POST['fowed'];
//     $event_type = $_POST['fobrat'];
//     $event_type = $_POST['fotour'];
//     $event_type = $_POST['fobaby'];
//     $event_type = $_POST['fonewbaby'];
//     $event_type = $_POST['fofashion'];


//     //Database Connection
//     $conn= new mysqli('localhost','root','','reservation');
//     if($conn->connect_error){
//         die('Connection Failed : '.$conn->connect_error);
//     }else{
//         $stmt = $conn->prepare("insert into registration(foname, fomail, fophone, fodate, event-type) values(?, ?, ?, ?, ?)");
//         $stmt->bind_param("ssiis", $full_name, $email, $phone, $date, $event_type);
//         $stmt->execute();
//         echo "Reservation successful...";
//         $stmt->close();
//         $conn->close();
//     } -->