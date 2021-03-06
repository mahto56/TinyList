<?php $title="Signup";?>

<?php

    //start session
    session_start();
    
    if($_SESSION['active'] == true){ /* Redirects user to Login.php if not logged in */
    header("location:index.php");
	  exit;
    }
    
    //create db object
    $header = "TinyLists";
    include "include/header.php"; 
    $db = new Db();
    

 
?>
<div id="panel">
    
</div>

<div id="container">
    <form action="" method="post" name="signup_form" class="form-login" autocomplete="nope">
            <!--<div style="margin-bottom:1.2em;">-->
            <!--    <div style="font-size:1.8em;text-align:center;width:100%;color:#333;">Login to continue!</div>-->
            <!--</div>-->
            <!--<div id="header">-->
            <!--  <h1 id="logo"><img src="assets/images/list.png" alt="logo" />-->
            <!--   <span>TinyList</span></h1>-->
            <!--</div>-->
            <div class="form-ctrl__wrapper">
                <!--<label for="username" >Username</label>-->
                <input name="fullname" type="text" id="fullname" class="form-ctrl fc" placeholder="Full Name" required autofocus>
            </div>
            <div class="form-ctrl__wrapper">
                <!--<label for="username" >Username</label>-->
                <input name="username" pattern="^[a-zA-Z0-9.\-_$@*!]{3,30}$" oninvalid="this.setCustomValidity('Invalid Username!');" type="username" id="username" class="form-ctrl fc" placeholder="Username" required autofocus>
            </div>
            <div class="form-ctrl__wrapper">
                <!--<label for="password" >Password</label>-->
                <input name="password" type="password" id="password" class="form-ctrl fc" placeholder="Password" required>
            </div>
            
            <div class="form-ctrl__wrapper">
                <!--<label for="password" >Password</label>-->
                <input name="password1" type="password" id="password1" class="form-ctrl fc" placeholder="Password (confirm)" required>
            </div>
            
            <div class="form-ctrl__wrapper">
                <input name="submit" type="submit" value="Signup" class="form-ctrl form-submit"/>
            </div>
            <div class="form-ctrl__wrapper">
                <p style="text-align:center;font-size:1.4em;margin-top:10px;">Already have a account? <a href="login.php">Signin! </a></p>
            </div>
        <?php
        
        /* Check if  form has been submitted */
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $query = "INSERT INTO `users` (`fullname`,`username`,`password`) values('$fullname','$username','$password')";
            // echo $query;
            $result = $db->mysqli->query($query) or die("<div class='error'>ERROR: Could Signup," . mysqli_error($db->mysqli)."</div>");//password_verify($_POST['password'], $Password);
            /* Check if form's username and password matches */
            if( $result) {
                echo "<script>alert('Success')</script>";
                exit;
            } else {
                ?>
                <!-- Show an error alert -->
                &nbsp;
                <div class="error" role="alert">
                    <strong>Warning!</strong> Incorrect information.
                </div>
                <?php
            }
        }
        ?>

    </form>
</div>


<?php include "include/footer.php"; ?>