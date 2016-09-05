<?php
// Routes

/*****************
*     ROUTES     *
*****************/
$app->any('/', function ($request, $response, $args) {
    $campaignStartDateString = strtotime($this->get('settings')['campaign']['campaign_start_date']);
    $campaignStartDate = date('Y-m-d', $campaignStartDateString);

    $campaignEndDateString = strtotime($this->get('settings')['campaign']['campaign_end_date']);
    $campaignEndDate = date('Y-m-d', $campaignEndDateString);

    $todaysDate = date('Y-m-d');

    $this->logger->addInfo('Start Date: '.$campaignStartDate);
    $this->logger->addInfo('End Date: '.$campaignEndDate);
    $this->logger->addInfo('Todays Date: '.$todaysDate);
  //echo($todaysDate);

  $data = [
            'todays_date' => $todaysDate,
            'campaign_url' => $this->get('settings')['campaign']['url'],
            'campaign_start_date' => $campaignStartDate,
            'campaign_end_date' => $campaignEndDate,
          ];

  //TODO: Make sure that only data necessary is going to the particular views....I.E. File Data
  if ($todaysDate > $campaignEndDate) {
      $theView = 'closeout.phtml';
  } elseif ($todaysDate > $campaignStartDate) {
      $theView = 'track.phtml';
  } else {
      $theView = 'prepare.phtml';
  }

    $this->logger->addInfo('View: '.$theView);

    return $this->renderer->render($response, $theView, $data);
});

$app->any('/api/teams', function ($request, $response, $args) {
    $this->logger->addInfo('API Teams');

    $dir = new DirectoryIterator('data');
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()) {
            $thisFileName = $fileinfo->getFilename();
            if (fnmatch('Teams*.csv', $thisFileName)) {
                //$app->logger->addInfo("Found Team Data File: ".$thisFileName);
          $teamFileName = $fileinfo->getFilename();
            }
        }
    }

    if (is_null($teamFileName)) {
        //$this->logger->addError("Could not find Team File");
    }

    $file = fopen('./data/'.$teamFileName, 'r');
    $counter = 0;
    $teamData = [];
    $thisRow;
    $teamLabels;

    while (!feof($file)) {
        $thisRow = fgetcsv($file);
      //Skip Empty Rows
      if (!empty($thisRow)) {
          $thisRowAsObjects = [];
          if ($counter == 0) {
              $teamLabels = $thisRow;
          } else {
              foreach ($teamLabels as $key => $value) {
                  $thisRowAsObjects[clean($value)] = trim($thisRow[$key]);
              }
              array_push($teamData, $thisRowAsObjects);
          }
      }
        ++$counter;
    }
    fclose($file);
  //$logger->info("Test");

  $data = ['author' => 'davidlarrimore@gmail.com', 'version' => .1, 'data' => $teamData];
    $newResponse = $response->withHeader('Content-type', 'application/json');
    $newResponse = $newResponse->withJson($data);

    return $newResponse;
});

$app->any('/api/donations', function ($request, $response, $args) {
    $this->logger->addInfo('API Donations');

    $dir = new DirectoryIterator('data');
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()) {
            $thisFileName = $fileinfo->getFilename();
            if (fnmatch('Donations*.csv', $thisFileName)) {
                //$app->logger->addInfo("Found Team Data File: ".$thisFileName);
          $teamFileName = $fileinfo->getFilename();
            }
        }
    }

    if (is_null($teamFileName)) {
        //$this->logger->addError("Could not find Team File");
    }

    $file = fopen('./data/'.$teamFileName, 'r');
    $counter = 0;
    $teamData = [];
    $thisRow;
    $teamLabels;

    while (!feof($file)) {
        $thisRow = fgetcsv($file);
      //Skip Empty Rows

      if (!empty($thisRow)) {
          $thisRowAsObjects = [];
          if ($counter == 0) {
              $teamLabels = $thisRow;
          } else {
              foreach ($teamLabels as $key => $value) {
                  $labelName = clean($value);
                  $rowData = trim($thisRow[$key]);
                  $this->logger->addInfo('Row #'.$counter.', Column #'.$key.' : '.$value.' - '.trim($thisRow[$key]));

                  if (in_array($labelName, array('amount', 'donated_at', 'students_name', 'teachers_name'))) {
                      if (strcmp($labelName, 'teachers_name')) {
                          $this->logger->addInfo($labelName.' - '.$rowData);
                          $thisRowAsObjects['grade'] = substr(trim($thisRow[$key - 1]), 0, strpos(trim($thisRow[$key - 1]), ' - '));
                          $thisRowAsObjects['name'] = substr(trim($thisRow[$key - 1]), strpos(trim($thisRow[$key - 1]), ' - ') + 3, strlen(trim($thisRow[$key - 1])))."'s Class";
                      }
                      $thisRowAsObjects[$labelName] = $rowData;
                  }
              }
              array_push($teamData, $thisRowAsObjects);
          }
      }
        ++$counter;
    }
    fclose($file);
  //$logger->info("Test");

  $data = ['author' => 'davidlarrimore@gmail.com', 'version' => .1, 'data' => $teamData];
    $newResponse = $response->withHeader('Content-type', 'application/json');
    $newResponse = $newResponse->withJson($data);

    return $newResponse;
});

$app->any('/api/settings', function ($request, $response, $args) {
    $this->logger->addInfo('API Settings');

    $campaignStartDateString = strtotime($this->get('settings')['campaign']['campaign_start_date']);
    $campaignStartDate = date('Y-m-d', $campaignStartDateString);

    $campaignEndDateString = strtotime($this->get('settings')['campaign']['campaign_end_date']);
    $campaignEndDate = date('Y-m-d', $campaignEndDateString);

    $todaysDate = date('Y-m-d');

    $this->logger->addInfo('Start Date: '.$campaignStartDate);
    $this->logger->addInfo('End Date: '.$campaignEndDate);
    $this->logger->addInfo('Todays Date: '.$todaysDate);
  //echo($todaysDate);

  $data = ['author' => 'davidlarrimore@gmail.com',
           'version' => .1,
            'data' => [
            'todays_date' => $todaysDate,
            'campaign_url' => $this->get('settings')['campaign']['url'],
            'campaign_funding_goal' => $this->get('settings')['campaign']['campaign_funding_goal'],
            'campaign_start_date' => $campaignStartDate,
            'campaign_end_date' => $campaignEndDate,
          ], ];

    $newResponse = $response->withHeader('Content-type', 'application/json');
    $newResponse = $newResponse->withJson($data);

    return $newResponse;
});

function clean($string)
{
    $string = str_replace(' ', '_', $string); // Replaces all spaces with underscores.
   $string = preg_replace('/[^A-Za-z0-9\_]/', '', $string); // Removes special chars.
   return strtolower($string);
}
