<html>
<meta name="viewport" content="width=device-width" />
<head>
<link rel="stylesheet" href="style_m.css">
</head>


<body>

 <div class="title">
 <p>  <p>
</div>
<div class = "container">

 <div class="title">
 <p>  <p>
</div> 

<?php


$zip = $_POST["zip"];
$make = $_POST["make"];
$radius = $_POST["radius"];

$url = "http://api.edmunds.com/api/dealer/v2/dealers/?zipcode={$zip}&radius={$radius}&make={$make}&pageSize=100&sortby=distance%3AASC&view=basic&api_key=rvs89n4j2nxkprf53x9vd89f" ;
 $make = json_decode(file_get_contents($url));
$rating = unrated;

foreach($make->dealers as $cc => $make->dealers) {
if($make->dealers->reviews->sales->overallRating == '0')
	$rating = 'unrated';
else
	$rating = 'Rating ' . $make->dealers->reviews->sales->overallRating . ' stars';

$dist = substr($make->dealers->distance,0,5).' Miles';


echo "
<table class='resultstable'>

 <tr>
      <TH colspan='3' >{$make->dealers->name}</TH>
      <TH> {$dist}</TH>
 </tr>

 <tr>
      <TH colspan='4' > <a  href='http://maps.google.com/?q={$make->dealers->address->latitude}, {$make->dealers->address->longitude}'>{$make->dealers->address->street}, {$make->dealers->address->city}, {$make->dealers->address->stateCode}</a></TH>
     
 </tr>

 <tr>
      <TH colspan='2' >Website: <a  href={$make->dealers->contactInfo->website}>{$make->dealers->contactInfo->website}</a></TH>
<TH colspan='1' >Ph: {$make->dealers->contactInfo->phone}</TH>
 <TH colspan='1' >{$rating}</TH>

 </tr>
</table>

<BR>

";

}
//var_dump($make);
?>



</div> 


</body>


