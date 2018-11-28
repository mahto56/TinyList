<?php $title="TinyLists"?>
<link rel='stylesheet' href='assets/stylesheets/style.css' />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css"/>
    <link href="https://fonts.googleapis.com/css?family=Varela" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="assets/images/mark.png"/>
    <title><?=$title?></title>
<style type="text/css">
    /*html,body{*/
    /*   height:100%;*/
    /*}*/
    
    h1{
        font-size:5em;
        margin:5px 0;
        
    }
    #logo{
        padding:5px 0;
    }
    
    #container{
        flex-direction:column;
    }
</style>
<div id="container">
    <h1 id="logo">
       <?=$title?>
    </h1>
    <h2>
        keep track of your life
    </h2>
      <div class="form-ctrl__wrapper">
            <input onclick="window.location='login.php'" type="button" value="Continue" class="form-ctrl form-submit"/>
      </div>
</div>