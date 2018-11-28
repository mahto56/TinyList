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

<div id="container">
  <h2>You have <?=$count['count(*)']?> pending tasks! </h2>
 
  <div class="main">
  <!--<div class="form-ctrl__wrapper">-->
  <!--            <input onclick="alert('not implemented!');" type="button" value="+" class="form-ctrl form-submit round"/>-->
  <!--  </div>-->
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

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
  var elem = document.querySelector('.main');
  var msnry = new Masonry( elem, {
  // options
  itemSelector: '.card',
  columnWidth: 200
  });
  
  // element argument can be a selector string
  //   for an individual element
  var msnry = new Masonry( '.main', {
  // options
  });

</script>
<?php include "include/footer.php"; ?>