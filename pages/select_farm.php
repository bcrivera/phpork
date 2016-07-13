<!DOCTYPE html>
<html lang="en">
  <?php 
    session_start(); 
    require_once "../connect.php"; 
    require_once "../inc/dbinfo.inc"; 
    if(!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
      header("Location: /phpork/user"); 
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
    <script src="<?php echo HOST;?>/phpork/js/bootstrap.min.js"></script>
  </head> 

  <body> 
    <div class="container">
   <div class="page-header" data-trigger= "hover" data-toggle="tooltip" title="Click to go back to home page which is 'View', 'Insert' and 'Customize' " data-placement="bottom"> 
      <a href="<?php echo HOST;?>/phpork/encoder/home">
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
        <img src="<?php echo HOST;?>/phpork/images/Select Farm.png" class="img-responsive">
      </div>
      <div class="col-md-2 col-centered image2">
        <img src="<?php echo HOST;?>/phpork/images/Select House.png" class="img-responsive">
      </div>
      <div class="col-md-2 col-centered image2">
        <img src="<?php echo HOST;?>/phpork/images/Select Pen.png" class="img-responsive">
      </div>
      <div class="col-md-2 col-centered image3">
        <img src="<?php echo HOST;?>/phpork/images/Select Pig.png" class="img-responsive">
      </div>
    </div>

    <div class="row row-centered pos1 col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="lowerPanel">
        <span class="custom-dropdown2"> 
          <select id="dropdown" data-trigger= "hover" data-toggle="tooltip" title="Select the location/farm where the pig that you want to view/edit is located."> 
            <option selected="true" disabled="disabled" id="select">Select farm</option> 
          </select> 
        </span> 
        <br/> <br/>
        <button type="button" class="btn1" id="nextF" data-trigger= "hover" data-toggle="tooltip" title="Click to proceed to next page. (Select house)">
          Next <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </button>
      </div>
    </div>

    <div class="page-footer"> 
      Prototype Pork Traceability System || Copyright &copy; 2014 - <?php echo date("Y");?> UPLB || funded by PCAARRD 
    </div>
  </div>


    
    <script type="text/javascript"> 
      $(document).ready(function () {
        $('#nextF').on("click",function() {
          var location = $("#dropdown").val(); 
          if(location == null){
            alert("Select an option");
          }else if(location != "Farm"){ 
            window.location = "/phpork/farm/" +location;
          }
        });

      });
    </script>
     
    <script>
      $.ajax({
        url: '/phpork/gateway/location.php',
        type: 'post',
        data : {
          ddl_location: '1'
        },
        success: function (data) { 
          var data = jQuery.parseJSON(data); 
          for(i=0;i<data.length;i++){
            $("#dropdown").append($("<option></option>").attr("value",data[i].loc_id)
                          .attr("name","location")
                          .text("Farm " +data[i].loc_id)); 
          } 
        }    
      });
       $('#nextF').tooltip({trigger: "hover"});
       $('#dropdown').tooltip({trigger: "hover"});
       $('.page-header').tooltip({trigger: "hover"});
    </script>
  </body>
</html>

