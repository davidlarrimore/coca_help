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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">

    <!-- Reset -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
  <div class="container">
    <div class="row">
      <div class="col-xs-12" style="text-align:center;">
        <div class="row">
          <div class="col-xs-12">
            <h2 class="superhero">LETS GO!!!!!</h2>
          </div>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-3 col-xs-offset-9" style="text-align:center;">
        <div class="row">
          <div class="col-xs-12">
             <button class="cv-donate">Donate</button>
          </div>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 block" style="text-align:center;">
        <p>&nbsp;</p>
        <p><strong>The donation drive will end on <u><?php echo $campaignEndDate;?></u></strong></p>
        <div class="row">
          <div class="col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
              <div data-countdown="<?php echo $campaignEndDateCountdown;?>" class="panel-body"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <!-- Countdown -->
  <script src="./static/js/jquery.countdown.min.js" type="text/javascript"></script>

  <script type="text/javascript">

    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime(''
    + 'Only <span class="label label-info">%D</span> day%!d left!'));
      });
    });
  </script>


  <!-- CauseVox -->
  <script type="text/javascript" src="//js.causevox.com/v2"></script>

  <script type="text/javascript">
    CV.setDomain("funrun.lrespto.org");
  </script>

</body>
</html>
