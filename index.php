<?php $title="TinyList";?>


<?php
  session_start(); /* Starts the session */
  if($_SESSION['active'] == false){ /* Redirects user to Login.php if not logged in */
    header("location:login.php");
	  exit;
  }
  //create new DB object
  include "include/header.php";
  $db = new Db();
  $tasklists = $db->getTasksList();
?>

<div id="container">
  <div class="main">
  <?php if($tasklists) :?>
    <?php while($list = $tasklists->fetch_assoc()) :?>
      <div><?=$list['list_id'];?>: <?=$list['list_name'];?></div>
    <?php endwhile ?>
  <?php  else :?>
    <p>There are no list :(</p>
  <?php endif; ?>
  </div>
</div>         

<?php include "include/footer.php"; ?>