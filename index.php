<?php
  session_start(); /* Starts the session */
  if($_SESSION['active'] == false){ /* Redirects user to Login.php if not logged in */
    header("location:splash.php");
	  exit;
  }
  //create new DB object
  $title="TinyLists";
  $header="Welcome, ".$_SESSION['firstname']." ! ";
  //$header="You have 4 uncompleted tasks!";
  include "include/header.php";
  $db = new Db();
  $tasklists = $db->getTasks();
  // $count = $db->getPendingTasksCount()->fetch_assoc();
  
  //delete
  if(isset($_GET['delete'])) {
    $db->deleteTask($_GET['delete']);
  }
  
  if(isset($_GET['msg'])) {
    echo "<script>alert('".$_GET['msg']."')</script>";
    header('Location: index.php');
  }
?>

<style>
  #container{
    display:block;
  }
  
</style>

<script src="assets/javascripts/web-animations.min.js"></script>
<script src="assets/javascripts/hammer.min.js"></script>
<script src="assets/javascripts/muuri.min.js"></script>

<script type="text/javascript">
  function getRandomColor() {
                var letters = 'BCDEF'.split('');
                var color = '#';
                for (var i = 0; i < 6; i++ ) {
                    color += letters[Math.floor(Math.random() * letters.length)];
                }
                return color;
  }
</script>
 <div class="form-ctrl__wrapper" >
      <a href="add.php" id="add" class="form-ctrl form-submit round" >+</a>
  </div>
  
<div id="container">
  <div class="main">
  <?php if($tasklists) :?>
    <?php while($list = $tasklists->fetch_assoc()) :?>
      <div class="card" style="background:<?=$list['color']?>;border-color:<?=$list['color']?>">
          <div class="card_item">
          <div  class="card__header">
            <h7 title="Double click to edit" class="task-title editable" id="<?=$list['task_id'];?>" done="0"><?=$list['task_name'];?></h7>
            <div class="card-ctrl">
              <a style="" href="edit.php?id=<?=$list['task_id']?>"><img src="assets/images/edit.png" alt="logo" /></a>
              <a style="" href="index.php?delete=<?=$list['task_id']?>"><img src="assets/images/bin.png" alt="logo"/></a>
              </div>
          </div>
          <div>
            <p class="date">
                <img src="assets/images/calendar-check.png" alt="logo" />
              
              <span class="date2"><?=date('D, M j',strtotime($list['date']))?></span></p>
            <p title="Double click to edit" class="desc editable">
              <?=$list['description']?>
            </p>
          </div>
          <div class="tags">
          <p class="tag">#<?=$list['tag']?></p>
          </div>
          </div>
      </div>
    <?php endwhile ?>
  <?php  else :?>
    <h1 class="info">There are no Tasks :(</h1>
  <?php endif; ?>
    
  </div>
</div>         
<script type="text/javascript" src="assets/javascripts/script.js"></script>
<!--</script>-->
<?php include "include/footer.php"; ?>