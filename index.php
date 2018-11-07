<?php
  session_start(); /* Starts the session */
  if($_SESSION['active'] == false){ /* Redirects user to Login.php if not logged in */
    header("location:login.php");
	  exit;
  }
  //create new DB object
  $title="MicroTasks";
  $header="Welcome, ".$_SESSION['firstname']." ! ";
  //$header="You have 4 uncompleted tasks!";
  include "include/header.php";
  $db = new Db();
  $tasklists = $db->getTasksList();
  $count = $db->getPendingTasksCount()->fetch_assoc();
?>

<div id="container">
  <h2>You have <?=$count['count(*)']?> uncompleted tasks! </h2>
  <div class="main">
  <?php if($tasklists) :?>
    <?php while($list = $tasklists->fetch_assoc()) :?>
      <div class="card" id="<?=$list['list_id'];?>" onclick="done(this.id);"><h7 class="card__header"><?=$list['list_id'];?>: <?=$list['list_name'];?></h2></div>
    <?php endwhile ?>
  <?php  else :?>
    <p>There are no list :(</p>
  <?php endif; ?>
    <div class="form-ctrl__wrapper">
              <input onclick="alert('not implemented!');" type="button" value="+" class="form-ctrl form-submit round"/>
    </div>
  </div>
</div>         

<?php include "include/footer.php"; ?>