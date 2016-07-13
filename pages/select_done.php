<!DOCTYPE html>
<html lang="en">
  <?php 
    session_start(); 
    require_once "../connect.php"; 
    require_once "../inc/dbinfo.inc"; 
    if(!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
      header("Location:  /phpork/user"); 
    }
   include "../inc/functions.php"; 
    $db = new phpork_functions (); 
  ?> 

  <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Pork Traceability System</title> 

    <link rel="stylesheet" href="<?php echo HOST;?>/phpork/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo HOST;?>/phpork/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo HOST;?>/phpork/css/bootstrap-theme.css">
    <link rel="stylesheet" href="<?php echo HOST;?>/phpork/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo HOST;?>/phpork/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="<?php echo HOST;?>/phpork/css/style_select.css"> 

    <script src="<?php echo HOST;?>/phpork/js/jquery-2.1.4.js" type="text/javascript"></script> 
    <script src="<?php echo HOST;?>/phpork/js/jquery-latest.js" type="text/javascript"></script> 
    <script src="<?php echo HOST;?>/phpork/js/jquery.min.js" type="text/javascript"></script> 
     <script src="<?php echo HOST;?>/phpork/js/jquery-latest.min.js" type="text/javascript"></script> 
    <script src="<?php echo HOST;?>/phpork/js/bootstrap.js" type="text/javascript"></script> 
    <script src="<?php echo HOST;?>/phpork/js/bootstrap.min.js" type="text/javascript"></script> 
  </head> 

  <body> 
    <div class="page-header" data-trigger= "hover" data-toggle="tooltip" title="Click to go back to home page which is 'View', 'Insert' and 'Customize' " data-placement="bottom"> 
      <a href="/phpork/encoder/home" >
        <img class="img-responsive" src="<?php echo HOST;?>/phpork/images/Header1.png"> 
      </a>
    </div>

    <form class="form-horizontal col-xs-10 col-sm-10 col-md-10 col-lg-10"  method="post" action="/phpork/out" style="width:50%;float:right;"> 
      <div class="form-group logout" > 
        <input type="text" class="col-xs-6 col-sm-5" readonly style="text-align: left; border: 2px solid; border-color: #83b26a;" value="<?php echo $_SESSION['username'];?>"> 
        <div class="col-xs-1 col-sm-1" style="left: -1%;"> 
          <button type="submit" class="btn btn-primary btn-sm" >Logout</button> 
        </div> 
      </div> 
    </form> 
    
    <div class="row row-centered pos col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-md-2 col-centered image1">
        <img src="<?php echo HOST;?>/phpork/images/Selected Farm.png" class="img-responsive">
      </div>
      <div class="col-md-2 col-centered image2">
        <img src="<?php echo HOST;?>/phpork/images/Selected House.png" class="img-responsive">
      </div>
      <div class="col-md-2 col-centered image2">
        <img src="<?php echo HOST;?>/phpork/images/Selected Pen.png" class="img-responsive">
      </div>
      <div class="col-md-2 col-centered image3">
        <img src="<?php echo HOST;?>/phpork/images/Selected Pig.png" class="img-responsive">
      </div>
    </div>

    <div class="step-content active col-xs-12"> 
      <?php
        $pig = $_GET['pig'];
        $p = $_GET['pen'];
        $h = $_GET['house'];
        $l = $_GET['location']; 
        echo "<input type='hidden' value='$l' name='loc' id='locid'/>"; 
        echo "<input type='hidden' value='$h' name='house' id='houseid'/>";
        echo "<input type='hidden' value='$p' name='pen' id='penid'/>"; 
        echo "<input type='hidden' value='$pig' name='pig' id='pigid'/>"; 
      ?>
    </div>

    <div class="row row-centered pos1 col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="lowerPanel1">
        <button type="button" class="btn1" id="back"  data-trigger= "hover"data-toggle="tooltip" title="Click to go back to the previous page. (Select pig)">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back
        </button>
        <button type="button" class="btn1" id="view" data-trigger= "hover" data-toggle="tooltip" title="Click to view/edit the details of the pig that you selected.">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> View Pig Details
        </button> 
      </div>
    </div>

    <div class="page-footer"> 
      Prototype Pork Traceability System || Copyright &copy; 2014 - <?php echo date("Y");?> UPLB ||funded by PCAARRD 
    </div>

   
    <script type="text/javascript"> 
      $(document).ready(function () {
        $('#view').on("click",function() {
          var pig = $('#pigid').val();
          var penno = $("#penid").val();
          var houseno = $("#houseid").val(); 
          var location = $("#locid").val(); 
          window.location ="/phpork/view/farm/house/pen/pig/" +location+ "/" +houseno+ "/" +penno+ "/" +pig;
        });

        $('#back').on("click",function() {
          var penno = $("#penid").val();
          var houseno = $("#houseid").val(); 
          var location = $("#locid").val(); 
          window.location = "/phpork/farm/house/pen/" +location+ "/" +houseno+ "/" +penno; 
        });
        $('#back').tooltip({trigger: "hover"});
         $('#view').tooltip({trigger: "hover"}); 
         $('.page-header').tooltip({trigger: "hover"});
      }); 
    </script> 
  </body>
</html>