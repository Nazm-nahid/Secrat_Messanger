<?php
	//CHECK LOGIN VALIDATION
	include ('login_validation.php');
	
	$fb_url= "https://facebook.com/sharer/?u=";
	$my_url= "tikitaka.gq/msg.php?id=".$user_table;
	$url= $fb_url.$my_url;
?>


<!DOCTYPE html>
<html>

<head>
	<title>টিকিটাকা</title>
	<link rel="shortcut icon" href="favicon.png" type="image/png" media="all">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    <link rel="stylesheet" href="st.css" type="text/css" media="all">
    <link rel="stylesheet" href="copy.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .tooltip {
  position: relative;
  display: inline-block;
}


.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: 2px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  background-color: #555;
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: 2px;
  border-width: 5px;
  border-style: solid;
  
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}


    </style>



</head>

<body>
<div class="login-wrap">
	<div class="login-html">
	    	<h1> <b><i> টিকিটাকা</b></i> </h1>

			<div class='nav'> 

    			<ul>
      				<li><?php
		
						$great="<h3>hello ".$gt."</h3>";
						echo $great; 
					?>
					</li>
				      <li><a href="login.php" class="but">Sign Out</a></li>
    			</ul>
	
	
			</div>
			<div class="card">
			 <p>
			 	<input type="text" value="http://tikitaka.gq/msg.php?id=<?php echo $user_table; ?>" id="myInput" style="width: 160px;border: none;background-color: #8a867d; height: auto ;color:#fff;padding: 10px ;
                 margin-left: 75px;">
				 	<div class="tooltip">
					<button onclick="myFunction()" onmouseout="outFunc()" style="background-color: #8a867d;; 
						  border: none;
						  color: white;
						  padding: 5px 5px;
						  text-align: center;
						  text-decoration: none;
						  cursor: pointer;
						  font-size: 14px;
						  ">
					  <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
					  <b>Copy link</b>
					  </button>
					</div>
                    
				 
			 	<script>
					function myFunction() {
					  var copyText = document.getElementById("myInput");
					  copyText.select();
					  copyText.setSelectionRange(0, 99999);
					  document.execCommand("copy");
					  
					  var tooltip = document.getElementById("myTooltip");
					  tooltip.innerHTML = "Copied ";
					}

					function outFunc() {
					  var tooltip = document.getElementById("myTooltip");
					  tooltip.innerHTML = "Copy to clipboard";
					}
				</script>
                <br>
				<a href="<?php echo $url; ?>" style="background-color: #8a867d;; 
						  border: none;
						  color: white;
						  padding-top: 2px ;
						  padding-left:5px;
						  padding-right: 5px;
						  padding-bottom: 5px;
                          margin-top: 5px;
						  text-align: center;
						  text-decoration: none;
						  display: inline-block;
						  
						  cursor: pointer;" >  Share <i class="fa fa-facebook" style="background-color:#29487d; padding: 2px 2px;"></i> </a> 

                          <form action="home.php" method ="get" >
			 	<input type="submit" name="post" value="Messages" style="background-color: #8a867d; 
						  border: none;
						  color: white;
                          margin-top: 5px;
						  padding: 5px 3px;
						  text-align: center;
						  text-decoration: none;
						  cursor: pointer;
						  font-size: 14px;
                          font-weight: bold;
						  ">
			 </form>
				<p style="width: 160px; background-color: #8a867d;;padding: 10px;margin-left:75px;margin-top:-105px;margin-right:7px; color:#fff; font-size: 10px; ">
                <b>বন্ধুদের সাথে যুক্ত হতে শেয়ার করো ফেসবুকেঃ</b></br>
                
                Share <i class="fa fa-facebook" style="background-color:#29487d; padding: 2px 2px;"></i> বাটনে ক্লিক করে </br>
                অথবা Copy link এ ক্লিক করে লিঙ্কটি কপি করে তোমার ফেসবুক প্রোফাইলে শেয়ার করো। </br>
               

					<b >বন্ধুদের দেয়া ম্যাসেজ দেখতে Messages বাটনে ক্লিক করো</b>
				
			 	
			 </p>
			 
			 </div>
			 
 	</div>
 </div>
</body>
</html>