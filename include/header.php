<?php include 'config/config.php'; ?>
<?php include "lib/Db.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <title><?=$title?></title>
    <link rel='stylesheet' href='assets/stylesheets/style.css' />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css"/>
    <link href="https://fonts.googleapis.com/css?family=Varela" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="assets/images/logo.png"/>
  </head>
  <body>
    <div id="header">
      <h1 id="logo"><a href="index.php" class="home"><img src="assets/images/logo.png" alt="logo" />
       <span>TinyList</span></a></h1>
       <div class="nav">
         <?php if(strpos($_SERVER['SCRIPT_NAME'], 'login.php') == true) :?>
           <input onclick="window.location='signup.php'" type="button" value="Create new Account" class="form-ctrl form-submit"/>
          <?php elseif($_SESSION['active']==true) :?>
            <input onclick="window.location='logout.php'" type="button" value="Logout" class="form-ctrl form-submit"/>
          <?php else :?>
            <input onclick="window.location='login.php'" type="button" value="Login" class="form-ctrl form-submit"/>
          <?php endif;?>
       </div>
    </div>
    
    