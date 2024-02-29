<?php 
    include_once("db_conn.php");

    session_start();            //starting session

    // check if the user is already logged in
    if(!isset($_SESSION['email'])){
        header("location: login.php");
    }


    If(isset($_GET['delete_img'])){
        $id=$_GET['delete_img'];
        $sql="Delete from images where img_id=$id";
        mysqli_query($conn, $sql);
        header("Location: admin-photo.php");
    }

    if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
        include "db_conn.php";

        $img_name = $_FILES['my_image']['name'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        $desc = $_POST['my_desc'];

        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png"); 
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                // Insert into Database
                $sql = "INSERT INTO images(image_url,description) VALUES('$new_img_name','$desc')";
                mysqli_query($conn, $sql);
                header("Location: grid.php");
            }else {
                $em = "You can't upload files of this type";
                header("Location: grid.php?error=$em");
            }
        }else {
            $em = "unknown error occurred!";
            header("Location: grid.php?error=$em");
        }

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
            <h2> Images</h2>
            <section id="delete-images" style="width: 100%;">
                <div class="delete-grid-system" style="margin: 0;display:flex;flex-wrap:wrap;justify-content:center;">
                    <?php 
                        $sql = "SELECT * FROM images ORDER BY img_id DESC";
                        $res = mysqli_query($conn,  $sql);

                        if(mysqli_num_rows($res) > 0) {
                            while ($images = mysqli_fetch_assoc($res)) {?>
                                <div class="textWithBlurredBg" style="margin:20px;">
                                    <img width=300px height=auto style="display:block;" src="uploads/<?=$images['image_url']?>" alt="">
                                    <?php $id=$images['img_id']?>
                                    <button style="width:60px;height:30px;background-color:blue;color:white;border:none;margin:20px 100px;cursor:pointer;";>
                                        <a href="admin.php?delete_img=<?php echo $id?>" style="text-declaration:none;color:white;">Delete</a>
                                    <button>
                                </div>
                            <?php }?>
                        <?php }?>
                </d
            </section>
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