<!doctype html>

<?php
//SETTING UP SOME VARIABLES
$dateIn = strtotime($data['campaign_start_date']);
$campaignStartDate = date('F, dS', $dateIn);
$campaignStartDateCountdown = date('Y/m/d', $dateIn);

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
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="./static/css/default.css" rel="stylesheet" type="text/css" />

    <meta name="google-translate-customization" content="cdf027e5440b9c8f-cb40fc80eac9fe21-g025a20baa11a5cbc-19"></meta>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
<body>
  <div style="height:16px;">&nbsp;</div>
  <div class="container">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1" style="text-align:center;">
        <div class="row">
          <div class="col-xs-12">
            <h2 class="superhero">Get ready for the 3rd Annual LRES PTO Superhero Fun Run!!!</h2>
            <p><u>Ready to unleash your child's inner superhero?</u> join the Lake Ridge Elementary School (LRES) Parent Teacher Organization (PTO) for the 3rd annual LRES PTO Superhero fun run!</p>
            </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <p>&nbsp;</p>
            <h4><strong>The donation drive will start <u><?php echo $campaignStartDate; ?></u></strong></h4>
            <div class="row">
              <div class="col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                  <div data-countdown="<?php echo $campaignStartDateCountdown; ?>" class="panel-body" style="font-weight:bold;font-size:1.5em;"></div>
                </div>
              </div>
            </div>
            <p>&nbsp;</p>
            <iframe src="https://player.vimeo.com/video/180177139" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <p>&nbsp;</p>
            <p class="">Come back here for the latest information on how to get involved</p>
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
  <!-- IE 10 Viewport Bug Fix -->
  <script src="../static/js/ie10-viewport-bug-workaround.js" type="text/javascript"></script>

  <script type="text/javascript">

    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime(''
    + '<span class="label label-info">%D</span> day%!D &nbsp;&nbsp;'
    + '<span class="label label-info">%H</span> hours &nbsp;&nbsp;'
    + '<span class="label label-info">%M</span> min &nbsp;&nbsp;'
    + '<span class="label label-info">%S</span> sec'));
      });
    });
  </script>


</body>
</html>
