<!doctype html>
<?php
   #SETTING UP SOME VARIABLES
   $dateIn= strtotime($data['campaign_end_date']);
   $campaignEndDate = date('F, dS',$dateIn);
   $campaignEndDateCountdown = date('Y/m/d',$dateIn);

   ?>
<html lang="en">
   <head>
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
   <body ng-app="myApp" ng-controller="trackController">
      <div style="height:16px;">&nbsp;</div>
      <div class="container">
         <div class="row">
            <div class="col-xs-9">
               <div class="row">
                  <div class="col-xs-12" style="text-align:center;">
                     <h2 class="superhero">Calling all Superheroes!</h2>
                   <p>The 3rd annual LRES PTO Superhero Fun Run fundraiser has officially begun. want to know how to participate? keep reading.</p>
                  </div>
               </div>
               <div class="row" style="text-align:center;">
                  <div class="col-xs-4 col-xs-offset-1"><a href="{{settings.campaign_url}}/signup" class="btn btn-primary">Create a Fundraiser Page!</a></div>
                  <div class="col-xs-2">OR</div>
                  <div class="col-xs-4">
                     <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select your Teacher <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                           <li role="menuitem" ng-repeat="team in teams">
                              <a href="{{settings.campaign_url}}/team/{{team.url}}">{{team.grade}} - {{team.name}}</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xs-3" style="text-align:center;">
               <div class="panel panel-info">
                  <div class="panel-heading">Progress Tracker</div>
                  <div class="panel-body" ng-cloak>
                     <div class="">
                        <uib-progressbar class="progress-striped active" max="settings.campaign_funding_goal" value="settings.current_funding_amount" type="{{type}}"><i>{{ pct_of_funding_total }}%</i></uib-progressbar>
                     </div>
                     <hr/>
                     <div data-countdown="<?php echo $campaignEndDateCountdown;?>" class="panel-body"></div>
                  </div>
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
      <script src="../bower_components/angular-filter/dist/angular-filter.min.js"></script>
      <script src="../bower_components/angular-resource/angular-resource.min.js"></script>
      <script src="../bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
      <script src="../bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
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
