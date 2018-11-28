<?php include 'config/config.php'; ?>
<?php include "lib/Db.php"; ?>
<?php include "lib/util.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <title><?=$title?></title>
    <link rel='stylesheet' href='assets/stylesheets/style.css' />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css"/>
    <link href="https://fonts.googleapis.com/css?family=Varela" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="assets/images/mark.png"/>
    
    <script type="text/javascript">
      var done = (id)=>{
        var val = document.getElementById(id).getAttribute("done")==="0"?"1":"0";
        document.getElementById(id).setAttribute("done",val);
      }
    </script>
  </head>
  <body>
    <div id="header">
      <h1 id="logo"><span id="home"><img src="assets/images/mark.png" alt="logo" />
       <span ><?=$header?></span></span>
      </h1>
            
       <div class="nav">
         <?php if(strpos($_SERVER['SCRIPT_NAME'], 'login.php') == true) :?>
           <div class="form-ctrl__wrapper">
           <input onclick="window.location='signup.php'" type="button" value="Create new Account" class="form-ctrl form-submit"/>
           </div>
            
          <?php elseif($_SESSION['active']==true) :?>
            <div class="form-ctrl__wrapper">
              <input onclick="toggle_search()" id="search-btn" type="button" value="Search" class="form-ctrl form-submit"/>
              <form>
                <input  id="search-bar" type="search" placeholder="Search" style="display:none;" class="form-ctrl icon fc" onblur="toggle_search()" required/>  
              </form>
              
            </div>
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
    
    <script type="text/javascript">
      let bar = document.getElementById("search-bar");
        bar.style.fontSize = "1.8em";
        bar.style.border ="1px solid #ccc";
        // bar.style.textAlign = "left";
        // bar.style.paddingLeft = "40px";
        bar.style.width = "300px";
        let toggle = true;
      function toggle_search(){
        document.getElementById("search-btn").style.display = toggle?"none":"";
        document.getElementById("search-bar").style.display = toggle?"":"none";
        if(toggle) {
          document.getElementById("search-bar").value = "";
          document.getElementById("search-bar").focus();
        }
        console.log("logged!");
        toggle = !toggle;
      }
    </script>
    
    