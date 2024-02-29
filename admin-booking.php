<?php 
    include_once("db_conn.php");

    session_start();            //starting session

    // check if the user is already logged in
    if(!isset($_SESSION['email'])){
        header("location: login.php");
    }

    If(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $sql="delete from bookings where id=$id ";
        mysqli_query($conn, $sql);
        header("Location: admin-booking.php");
    }
    
    If(isset($_GET['completed'])){
        $id=$_GET['completed'];
        $sql="UPDATE bookings SET is_completed=1 where id=$id";
        mysqli_query($conn, $sql);
        header("Location: admin-booking.php");
    }
  


?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Upload Using PHP</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="adminpanel.css">


</head>
<body>
   <?php include("admin-nav.php");?>
    <div class="admin">
        <div class="booking">
            <h2>Pending Bookings</h2>
            <table id="sn"><?>
                <tr>
                    <th>S.N</th>
                    <th>Reserve ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Event</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    $SN = 1;
                    $sql = "select * from bookings where is_completed=0 order BY id DESC";
                    $result = mysqli_query($conn, $sql); 
                ?>


                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <tdphp echo $SN ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['event'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <?php $id=$row['id']?>
                    <td><a href="admin.php?completed=<?php echo $id?>">Completed</td>
                </tr>

                    <?php $SN += 1 ?>
                <?php } ?>
            
            </table>
        </div>


        <div class="booking">
            <h2> Completed Bookings</h2>
            <table id="sn"><?>
                <tr>
                    <th>S.N</th>
                    <th>Reserve ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Event</th>
                    <th>Delete</th>
                </tr>

                <?php 
                    $SN = 1;
                    $sql = "select * from bookings where is_completed=1 order BY id DESC";
                    $result = mysqli_query($conn, $sql); 
                ?>


                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <tdphp echo $SN ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['event'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <?php $id=$row['id']?>
                    <td><a href="admin.php?delete=<?php echo $id?>">Delete</td>
                </tr>

                    <?php $SN += 1 ?>
                <?php } ?>
            
            </table>
        </div>

    </div>
  
    <form action="logout.php" method="post" class="form">
    <input type ="submit" name="logout" value="logout">
    </form>
    <script>
    function deleteRow(r){
        var i=r.parentNode.parentNode.rowIndex;
        document.getElementById('sn').deleteRow(i);
    }
    </script>
</body>
</html> 