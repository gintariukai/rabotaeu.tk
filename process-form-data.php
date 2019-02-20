<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rabotaeu &mdash; </title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
      
    <?php

    $date = date("d.m.y");
    $backurl = "index.html";

    $fullnameErr = $emailErr = $genderErr = $phoneErr ="";
    $fullname = $email = $gender = $phone ="";

    $fullname = htmlspecialchars($_POST["fullname"]);
    $email = htmlspecialchars($_POST["email"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $phone = htmlspecialchars($_POST["phone"]);
      
    if (empty($_POST["fullname"])) {
        $fullnameErr = "Fullname is required";
      } else {
        $fullname = test_input($_POST["fullname"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
      } else {
        $phone = test_input($_POST["phone"]);
    }

    if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", $email)) { 
        show_error("<br /> Email address does not exist"); 
    } 
      
    $fp = fopen("formdata.txt", "a");
    $savestring = $fullname . "," . $email . "," . $gender . "," . $phone . "\n";

    fwrite($fp, $savestring);
    fclose($fp);

    echo "<h1>Ačiū, mes Jums paskambinsim</h1>";
      
    ?>
    
      <p>Ваше сообщение было успешно отправлено!</p> 
      <p>На <a href="index.html">Главную >>></a></p>
      
    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>