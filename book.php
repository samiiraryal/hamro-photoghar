<?php
if(isset($_GET['date'])){
    $date = $_GET['date'];
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event = $_POST['event'];
    $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
    $stmt = $mysqli->prepare("INSERT INTO bookings (name, email, phone, event, date) VALUES (?,?,?,?,?)");
    $stmt->bind_param('ssiss', $name, $email, $phone, $event, $date);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
    $stmt->close();
    $mysqli->close();
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo isset($msg)?$msg:''; ?>
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="contact-name" onkeyup="validateName()">
                        <span id="name-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="contact-email" onkeyup="validateEmail()">
                        <span id="email-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="phone" class="form-control" name="phone" id="contact-phone" onkeyup="validatePhone()">
                        <span id="phone-error"></span>
                    </div>
                    <div class="form-group">
                        <!-- <label for="">Write your event details</label><br>
                        <textarea name="event" id="" cols="30" rows="10"></textarea> -->
                        <label for="">Event Type</label>
                        <select name="event" id="contact-event" required >
                            <option value="event">Select event</option>
                            <option value="Wedding">Wedding</option>
                            <option value="fashion">Fashion Modelling</option>
                            <option value="bratabanda">Bratabanda</option>
                            <option value="tour">Tour</option>
                            <option value="baby">Baby Shower</option>
                        </select>
                        <span id="event-error"></span>

                        <!-- <input type="textarea" class="form-control" name="email"> -->
                    </div>

                    <button class="btn btn-primary" type="submit" name="submit" onclick="return validateForm()">Submit</button>
                    <span id="submit-error"></span>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>

</html>
