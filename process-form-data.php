<!DOCTYPE html>
<html lang="lt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RabotaEU - Darbas, Mokymai, kvalifikacijos įgijimas Europos Sąjungoje įstatymų numatyta tvarka,</title>
    <meta name="description" content="RataEU - Darbas, Mokymai rabotaeu.tk">
    <meta name="keywords" content="Darbas, Mokymai, rabotaeu, rabotavlitve, workready">
    
    <link href="img/favicon.ico" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">
      
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
    <?php

    $date = date("d.m.y");
    $backurl = "index.html";

    $full_nameErr = $emailErr = $genderErr = $phoneErr ="";
    $full_name = $email = $gender = $phone ="";

    $full_name = htmlspecialchars($_POST["full_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $phone = htmlspecialchars($_POST["phone"]);
      
    $full_name = urldecode($_POST["full_name"]);
    $email = urldecode($_POST["email"]);
    $gender = urldecode($_POST["gender"]);
    $phone = urldecode($_POST["phone"]);
      
    if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", $email)) { 
    }
      
    if (isset($_POST["submit"])) {
    $to = "gintariukai@hotmail.com"; // Здесь нужно написать e-mail, куда будут приходить письма
    $from = "gintaras.jakuntavicius@gmail.com"; // // Здесь нужно написать e-mail, от кого будут приходить письма
    $full_name = $_POST["full_name"];
    $subject = "Форма отправки сообщений с сайта";
    $message = "Full_name: ". $full_name . " | Email: "  . $_POST["email"] . " | Phone: " . $_POST["phone"];

    $headers = "From:" . $from;

    mail($to,$subject,$message,$headers);
        
    }
      
    $fp = fopen("formdata.csv", "a");
    $savestring = $full_name . ",  " . $email . ",  " . $gender . ",  " . $phone . "\n\n";

    fwrite($fp, $savestring);
    fclose($fp);

    //    echo "Ačiū už Jūsų domėjimąsi darbu Lietuvoje.";
      
    ini_set("display_errors","On");
    
    error_reporting("E_ALL");
      
    ?>
    <div class="col-md-12 text-center"> 
      <h1 class="probootstrap-animate"><span style="color:blue">Ačiū už Jūsų domėjimąsi darbu Lietuvoje.</span></h1>
      <div class="probootstrap-subtitle probootstrap-animate">
        <h2><span style="color:blue">Mes Jums paskambinsim. </span></h2>
      </div>
      <p class="watch-intro probootstrap-animate"><a href="https://rabotaeu.tk">Į pradžią <i class=" icon-chevron-right"></i></a></p>
    </div>
      
    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>