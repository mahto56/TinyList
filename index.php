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
  $tasklists = $db->getTasks();
  $count = $db->getPendingTasksCount()->fetch_assoc();
?>

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
 <div class="form-ctrl__wrapper">
              <input onclick="alert('not implemented!');" type="button" value="+" class="form-ctrl form-submit round"/>
  </div>
  
<div id="container">
  <!--<h2>You have <?=$count['count(*)']?> pending tasks! </h2>-->
  <!--<div class="sidebar">-->
  <!--  <div class="label">-->
      
  <!--  </div>-->
  <!--  <div class="label">-->
  <!--    <h7 style="font-size:1.5em;">Label</h7>-->
      
  <!--  </div>-->
  <!--  <div class="label">-->
      
  <!--  </div>-->
  <!--  <div class="label">-->
      
  <!--  </div>-->
  <!--</div>-->
  <div class="main">
  <?php if($tasklists) :?>
    <?php while($list = $tasklists->fetch_assoc()) :?>
      <div class="card" >
          <div  class="card__header">
            <h7 onclick="done(this.id);" class="task-title" id="<?=$list['task_id'];?>" done="0"><?=$list['task_name'];?></h7>
            <div class="card-ctrl">
              <img src="assets/images/edit.png" alt="logo" />
              <img src="assets/images/bin.png" alt="logo" /></div>
          </div>
          <div>
            <p class="date">
                <img src="assets/images/calendar-check.png" alt="logo" />
              
              <span class="date2">Mon, Apr 30</span></p>
            <p class="desc">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet dolore
            </p>
            <!--<div class="subtask">-->
            <!--  <div><img src="assets/images/right-arrow.png" alt="logo" /></div>-->
            <!--  <ul>-->
            <!--    <li>jdjkd</li>-->
            <!--    <li>dhdhjd</li>-->
            <!--    <li>jdjd</li>-->
            <!--    <li>sds</li>-->
            <!--    <li>dsds</li>-->
            <!--  </ul>-->
              
            <!--</div>-->
          </div>
          <div class="tags">
          <p class="tag">#shopping</p>
          </div>
      </div>
    <?php endwhile ?>
  <?php  else :?>
    <p>There are no list :(</p>
  <?php endif; ?>
    
  </div>
</div>         

<!--<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>-->
<!--<script>-->
<!--  var elem = document.querySelector('.main');-->
<!--  var msnry = new Masonry( elem, {-->
<!--  itemSelector: '.card',-->
<!--  columnWidth: 200-->
<!--  });-->
  

<!--</script>-->
<?php include "include/footer.php"; ?>