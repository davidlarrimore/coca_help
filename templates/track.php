<?php
#SETTING UP SOME VARIABLES
$dateIn= strtotime($data['campaign_end_date']);
$campaignEndDate = date('F, dS',$dateIn);
$campaignEndDateCountdown = date('Y/m/d',$dateIn);

?>

<DOCTYPE html>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<html>
  <head>
    <base target="_parent" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">

    <!-- Reset -->
    <link rel="stylesheet" href="../bower_components/reset-css/reset.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css" >


    <!-- Custom CSS -->
    <link href="./static/css/default.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body ng-app="myApp">
  <div style="height:16px;">&nbsp;</div>
  <div class="container">
    <div class="row">
      <div class="col-xs-8" style="text-align:center;">
        <h2 class="superhero">Calling all Superheroes!</h2>
        <p>The 3rd annual LRES PTO Superhero Fun Run fundraiser has officially begun. want to know how to participate? keep reading.</p>
      </div>
      <div class="col-xs-4" style="text-align:center;">
        <div class="panel panel-info">
          <div class="panel-body">
            <div class=”cv-progress-bar”></div>
               <div data-countdown="<?php echo $campaignEndDateCountdown;?>" class="panel-body"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container" ng-controller="trackController">
    <div class="row">
      <div class="col-xs-8" style="text-align:center;">
        <p>
          <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select your Teacher <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
               <li role="menuitem" ng-repeat="team in teams">
                 <a href="{{settings.campaign_url}}/team/{{team.URL}}">{{team.Name}}'s Team</a>
              </li>
            </ul>
          </div>
        </p>
        <p>&nbsp;</p>
        <p><strong>The donation drive will end on <u><?php echo $campaignEndDate;?></u></strong></p>
        <div class="row">

        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
  <!-- Bootstrap JS -->
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Countdown -->
  <script src="../bower_components/jquery.countdown/dist/jquery.countdown.min.js" type="text/javascript"></script>
  <!-- AngularJS -->
  <script src="../bower_components/angular/angular.min.js" type="text/javascript"></script>


  <!-- ANGULAR LIBRARIES -->
  <script src="../bower_components/angular-animate/angular-animate.min.js"></script>
  <script src="../bower_components/angular-route/angular-route.min.js"></script>
  <script src="../bower_components/angular-resource/angular-resource.min.js"></script>
  <script src="../bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.6/angular-animate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.6/angular-cookies.min.js"></script>


  <!-- AngularJS App -->
  <script src="./static/js/app.js"></script>
  <script src="./static/js/controller.js"></script>



  <!-- IE 10 Viewport Bug Fix -->
  <script src="../static/js/ie10-viewport-bug-workaround.js" type="text/javascript"></script>




  <script type="text/javascript">

    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime(''
    + 'Only <span class="label label-info">%D</span> day%!D left!'));
      });
    });
  </script>


  <!-- CauseVox -->
  <script type="text/javascript" src="//js.causevox.com/v2"></script>


  <script type="text/javascript">
    CV.setDomain("funrun.lrespto.org");

    $( document ).ready(function() {
        console.log( "ready!" );
        $( "#teamPicker" ).change(function() {
          console.log("Picked: "+$( "#teamPicker option:selected" ).val());
          $("#teamButton").attr("href", "http://funrun.lrespto.org/"+$( "#teamPicker option:selected" ).val());
          // similar behavior as an HTTP redirect
          //window.location.replace("http://funrun.lrespto.org/"+$( "#teamPicker option:selected" ).val());
        });

    });
  </script>



</body>
</html>
