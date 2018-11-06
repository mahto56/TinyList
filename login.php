<?php include "include/header.php"; ?>

<?php
  //create db object
    $db = new Db();
    
    //start session
    session_start();

 
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
                <input name="submit" type="submit" value="login" class="form-ctrl form-submit"/>
            </div>
            <div class="form-ctrl__wrapper">
                <span style="text-align:center;font-size:1.2em">Don't have a account? <a href="signup.php">Signup! </a></span>
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