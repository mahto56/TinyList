<?php $title="Add";?>

<?php
    
    //start session
    session_start();
    
    if($_SESSION['active'] == false){ /* Redirects user to Login.php if not logged in */
    header("location:splash.php");
	  exit;
    }
  //create db object
    $header = "TinyLists";
    include "include/header.php";
    $db = new Db();

?>


<div id="container">
    <form action="" method="post" name="login_form" class="form-login" autocomplete="nope">
            <div class="form-ctrl__wrapper">
                <input maxlength="23" name="task_name" type="text" class="form-ctrl fc" placeholder="Task Name" required autofocus>
            </div>
            <div class="form-ctrl__wrapper">
                <!--<label for="password" >Password</label>-->
                <textarea style="overflow:hidden;min-height:75px;" rows="1" name="task_desc" type="text" class="form-ctrl fc" placeholder="Description" required></textarea> 
            </div>
            
            <div class="form-ctrl__wrapper">
                <!--<label for="password" >Password</label>-->
                <input name="task_tag" maxlength="10" type="text" class="form-ctrl fc" placeholder="Tag" required>
            </div>
            <div class="form-ctrl__wrapper">
                <input name="color" type="button" class="jscolor {valueElement:'valueInput', styleElement:'styleInput'} form-ctrl fc" id="color"/>
            </div>
            <div class="form-ctrl__wrapper">
                <input name="submit" type="submit" value="+ Add Task" class="form-ctrl form-submit"/>
            </div>
            
        <?php
        
        /* Check if  form has been submitted */
        if(isset($_POST['submit'])){
            $taskname = mysql_escape_string($_POST['task_name']);
            $taskdesc = mysql_escape_string($_POST['task_desc']);
            $tasktag = mysql_escape_string($_POST['task_tag']);
            $color = mysql_escape_string($_POST['color']);
            $userid = $db->mysqli->query("SELECT user_id from users WHERE `username`='".$_SESSION['username']."'")->fetch_assoc()['user_id'] or die("ERROR: " . mysqli_error($db->mysqli));;
            $query = "insert into tasks (`task_name`,`owner_id`,`tag`,`description`,`done`,`color`) values('$taskname','$userid','$tasktag','$taskdesc',0,'$color')";
            // echo $query."</br>";
            // echo $query;
            $result = $db->mysqli->query($query) or die("ERROR: Could Insert" . mysqli_error($db->mysqli));//password_verify($_POST['password'], $Password);
            /* Check if form's username and password matches */
            if( $result) {
                /* Success: Set session variables and redirect to protected page */
                // header("location:index.php");
                //echo "<script>window.location='index.php'</script>";
                header('Location: index.php');
                // exit;
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.5.2/randomColor.min.js"></script>
<script type="text/javascript" src="assets/javascripts/script.js"></script>
<script type="text/javascript" src="assets/javascripts/jscolor.js"></script>
<script type="text/javascript">
    var color_box = document.getElementById("color")
    color_box.value = randomColor({luminosity: 'light'});
    color_box.style.color = color_box.value;
</script>
<?php include "include/footer.php"; ?>