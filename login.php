<?php $title="Login";?>

<?php
    
    //start session
    session_start();
    
    if($_SESSION['active'] == true){ /* Redirects user to Login.php if not logged in */
    header("location:index.php");
	  exit;
    }
  
  
  //create db object
    $header = "MicroTasks";
    include "include/header.php";
    $db = new Db();
    

 
?>

<div id="panel">
    
</div>

<div id="container">
    <form action="" method="post" name="login_form" class="form-login" autocomplete="nope">
            <!--<div style="margin-bottom:1.2em;">-->
            <!--    <span><h1 class="form-login__header">TinyList</h1></span>-->
            <!--</div>-->
            <!--<div id="header">-->
            <!--  <h1 id="logo"><img src="assets/images/list.png" alt="logo" />-->
            <!--   <span>TinyList</span></h1>-->
            <!--</div>-->
            <div class="form-ctrl__wrapper">
                <!--<label for="username" >Username</label>-->
                <input name="username" type="username" id="username" class="form-ctrl fc" placeholder="Username" required autofocus>
            </div>
            <div class="form-ctrl__wrapper">
                <!--<label for="password" >Password</label>-->
                <input name="password" type="password" id="password" class="form-ctrl fc" placeholder="Password" required>
            </div>
            
            <div class="form-ctrl__wrapper">
                <input name="submit" type="submit" value="Login" class="form-ctrl form-submit"/>
            </div>
            <div class="form-ctrl__wrapper">
                <p style="text-align:center;font-size:1.4em;margin-top:10px;">Don't have a account? <a href="signup.php">Signup! </a></p>
            </div>
        <?php
        
        /* Check if  form has been submitted */
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * from `users` WHERE username='$username' and password='$password'";
            // echo $query;
            $result = $db->mysqli->query($query) or die("ERROR: Could Login" . mysqli_error($db->mysqli));//password_verify($_POST['password'], $Password);
            /* Check if form's username and password matches */
            if( $result->num_rows ==1  ) {
                /* Success: Set session variables and redirect to protected page */
                $_SESSION['username'] = $username;
                $_SESSION['firstname'] = $db->getUsersFirstName();
                $_SESSION['active'] = true;
                header("location:index.php");
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