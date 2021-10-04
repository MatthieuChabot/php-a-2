<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["user_name"])) {
      $nameErr = "Name is required";
      echo $nameErr;
    } 
    else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["user_name"])){
      $letterAndSpacesOnName = "Only letters and white space allowed<br>";
      echo $letterAndSpacesOnName;
    }
    else {
      $name = test_input($_POST["user_name"]);
    }

    if (empty($_POST["first_name"])) {
      $firstNameErr = "First Name is required<br>";
      echo $firstNameErr;
    } 
    else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["first_name"])){
      $letterAndSpacesOnFirstName = "Only letters and white space allowed<br>";
      echo $letterAndSpacesOnFirstName;
    }
    else {
      $name = test_input($_POST["user_name"]);
    }
    
    if (empty($_POST["user_email"])) {
      $emailErr = "Email is required";
      echo $emailErr;
    } 
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErrFormat = "Invalid email format<br>";
        echo $emailErrFormat;
    }
    else {
      $email = test_input($_POST["user_email"]);
    }
  
    if (empty($_POST["telNumber"])) {
      $telErr = "Phone number is required";
    } else {
      $tel = test_input($_POST["telNumber"]);
    }

    if (empty($_POST["user_message"])) {
        $msgErr = "Message is required";
      } else {
        $msg = test_input($_POST["user_message"]);
    }
  }

?>
<p>

Merci <?php echo  $_POST['first_name'];?> <?php echo  $_POST['user_name'];?> de nous avoir contacté à propos de <?php echo  $_POST['school'];?>.<br>
Un de nos conseiller vous contactera soit à l’adresse <?php echo  $_POST['user_email'];?> ou par téléphone au <?php echo  $_POST['telNumber'];?> dans les plus brefs délais pour traiter votre demande :<br>
<?php echo  $_POST['user_message'];?>

</p>