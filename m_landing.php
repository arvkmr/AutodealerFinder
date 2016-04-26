<html>
<meta name="viewport" content="width=device-width" />
<head>
<link rel="stylesheet" href="style_m.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</head>

function Load() {

}


</script>




<body onClick="Load()" >



<div class = "container">

 <div class="centre">
    <div class="title">
 
 <p> Auto Finder</p>
     
    </div>
  </div>
   
 <hr>
  <div class="row">
   
    
   
    <div class="centre">
      <h2>Auto Finder</h2>
         </div>
  </div>
 <hr>
<br>
<br>
  <div id = "car1" class="incontainer">
 <h2>Please select your options</h2> <br>

<?php 
// Get rest of the data, and print zipcode again

$zip = $_POST["zip"];
echo "<h3>Your are searching around zip code {$zip} </h3>

<form action='/~akumar/carfinder/m_list.php' method='post'>

<label for='zip'>Your Zipcode</label>
<input id = 'zip', name='zip', value='{$zip}', type= 'number'>
<br>
<label for='distance'>Max dealer distance (Miles) </label>
<input id = 'distance', name='radius', value='10', type= 'number'>
<br>
<label for='make'>Select vehicle make</label>
<select id = 'make' name= 'make'>"
;

// The data is obtained through edmunds api

$url = "http://api.edmunds.com/api/vehicle/v2/makes?fmt=json&api_key=hgzg46ecpksqagxxzznkerjv";
$make = json_decode(file_get_contents($url));

// Fill the make results in the dropdown list

foreach($make->makes as $cc => $make->makes) {
    echo "<option value = {$make->makes->niceName} > {$make->makes->name} </option>";

}
?>

</select>
 <br> <br><br>

<input type='submit' value='Get dealers list'>
</form>

</div>
  </body>
</html>