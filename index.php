<html>
<meta name="viewport" content="width=device-width" />
<head>
<link rel="stylesheet" href="style.css">

<script type="text/javascript">

function OnSubmitForm()
{

// This function selects which page to call next, mobile or desktop

	var  temp = document.getElementById('os').selectedIndex;

  if(temp == '0')
  {
   document.myform.action = "/~akumar/carfinder/m_landing.php";
  }
  else
{
    document.myform.action ="/~akumar/carfinder/landing.php";
  }
  return true;
}
</script>


</head>


<body>

 <div class="title">
 <p>  <p>
</div>
<div class = "container">

 <div class="title">
 <p>  <p>
</div>
<form  name='myform' onsubmit="return OnSubmitForm();" method='post'>
<?php

// Gettting Zip code based on IP address. 

$ip = $_SERVER['REMOTE_ADDR'];

echo " <h3>Your IP Address is {$ip} </h3>";
echo "<br><br>";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
echo "<label for='vtype1'>Detected Zip Code</label>

 <input id = 'zip' name='zip' value={$details->postal} >
                     ";
echo "{$details->city}, {$details->region}";

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

// Function Identifies the Platform

    global $user_agent;

    $os_platform    =   'Unknown OS';

    $os_array       =   array(
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'Mobile - iPhone',
                            '/ipod/i'               =>  'Mobile - iPod',
                            '/ipad/i'               =>  'Mobile - iPad',
                            '/android/i'            =>  'Mobile - Android',
                            '/blackberry/i'         =>  'Mobile - BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function getBrowser() {

// Function Identifies the browser

    global $user_agent;

    $browser        =   'Unknown';

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}


$user_os        =   getOS();
$user_browser   =   getBrowser();
$selected = ' ';
$selected1 = ' ';

//Used for setting default value

if (strpos($user_os , 'Mobile') !== FALSE)
    $selected = 'selected=\'selected\'';
else
    $selected1 = 'selected=\'selected\'';

echo 

"<br>
<label for='os'>Detected Platform</label>

<select id = 'os' name='mobile'>
<option id ='os1', {$selected}, value='true'>Mobile</option>
<option id ='os2', {$selected1}, value='false'>Desktop</option>
</select>
";
echo "$user_os ";

echo "on ";
echo "$user_browser ";

echo "<h3>Please make sure your info is correct and then press next button to proceed.<h3>";



?>

<input  type= 'submit' value = 'Next' onclick='document.pressed=this.value'>
</form>
<br> <br>

</div>
</body>