<html>
<head>
<title>KML countdown</title>
<meta http-equiv="refresh" content="32">
<meta name="viewport" content="width=device-width">
<meta name="apple-mobile-web-app-capable" content="yes" />
<style type="text/css" media="screen">
   body {
     background-color:#000;
     color:#00CD00;
     font-family: Tahoma, Geneva, sans-serif;
     font-size:1.6em;
   }
  </style>

</head>
<body>
<?php
$urltoRichmond = "http://countdown.tfl.gov.uk/stopBoard/51750";
$urltoKingston  = "http://countdown.tfl.gov.uk/stopBoard/56822";

foreach (array($urltoRichmond,$urltoKingston) as $url) {

  $result= file_get_contents($url);
  $info =  (json_decode($result,true));
	print("<br/>Ashburnham Road Last updated: " . $info['lastUpdated'] . ".\n<br/>" );
  $line = 0;
  foreach ($info['arrivals'] as $bus ) {
  		++$line;
  		printf("%2d %3s  %-15s%2d\n<br/>",$line,$bus['routeName'],$bus['destination'],$bus['estimatedWait']);
  }
}

?>
</body>
</html>
