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
    <script type="text/javascript">
      var done = (id)=>{
        document.getElementById(id).setAttribute("style","text-decoration:line-through;color:#d3d3d3;");
      }
    </script>
  </head>
  <body>
    <div id="header">
      <h1 id="logo"><a href="index.php" id="home"><img src="assets/images/logo.png" alt="logo" />
       <span ><?=$header?></span></a></h1>
       <div class="nav">
         <?php if(strpos($_SERVER['SCRIPT_NAME'], 'login.php') == true) :?>
           <div class="form-ctrl__wrapper">
           <input onclick="window.location='signup.php'" type="button" value="Create new Account" class="form-ctrl form-submit"/>
           </div>
            
          <?php elseif($_SESSION['active']==true) :?>
            <!--<div class="form-ctrl__wrapper">-->
              <!--<input onclick="alert('not implemented!');" type="button" value="+ New List" class="form-ctrl form-submit"/>-->
            <!--</div>-->
            <div class="form-ctrl__wrapper">
            <input onclick="window.location='logout.php'" type="button" value="Logout" class="form-ctrl form-submit"/>
            </div>
          <?php else :?>
            <div class="form-ctrl__wrapper">
            <input onclick="window.location='login.php'" type="button" value="Login" class="form-ctrl form-submit"/>
            </div>
            
          <?php endif;?>
       </div>
    </div>
    
    