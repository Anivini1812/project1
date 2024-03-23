
<?php
include("include\dbconnect.php"); 
extract($_POST);
session_start();
$email= $_SESSION['un'];
$id=$_REQUEST['id'];
$qrys1="select * from  vehicle_details where id='$id'";
$result = $conn->query($qrys1);
while($row = $result->fetch_assoc())
{
$blossom_name=$row['vehicle_name'];  
$type=$row['vehicle_type'];  
$price=$row['price'];  
$color=$row['color'];  
$offere=$row['offere'];  
$size=$row['quantity'];  
$fname=$row['fname'];  
} 

  if(isset($Submit))
{
$quantity=$_REQUEST['quantity'];
$total= $_REQUEST['amount'];
echo $min=$size-$quantity;


$up_fees="update vehicle_details set quantity='$min'  where id='$id'"; 

if($conn->query($up_fees) === TRUE){
}


$sql = "SELECT id FROM user_booking order by id ASC";

 $sid=0;
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) 
  {
       $sid=$row['id'];
  }
    $sid=$sid+1;
    
   $qrys1="insert into user_booking values($sid,'$email','$blossom_name','$type','$price','$quantity','$fname','0','$total')";
  if ($conn->query($qrys1) === TRUE) {
  ?>
<script language="javascript" type="text/javascript">
alert("Booking Successfully");
window.location.href="user_home.php";
</script>
<?php   
 }
 else
{
    
?>
<script language="javascript" type="text/javascript">
alert("Failed");
 
</script>
<?php 
}
$conn->close();
}
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>In Industry an Industrial Category Bootstrap responsive Website Template | About :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="In Industry Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.js"></script>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
<!-- banner -->
	<div class="banner-1">
			<div class="header-top">
				<div class="container">
					<div class="header-top-left">
					 
					</div>
					<div class="w3layouts-logo">
							<h1>
							<a href="#">E-Vehicle</a>
							</h1>
				  </div>
						<div class="wthreesearch">
						 
						</div>
				</div>
			</div>
			<div class="header">
				<div class="container">
					<div class="top-nav">
						<nav class="navbar navbar-default">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!--navbar-header-->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right">
									<li><a href="user_home.php">Home</a></li>
									<li><a href="user_vehicle.php"  class="active">Vehicle</a></li>
									<li><a href="user_booking.php">Booking</a></li>
					 
									<li><a href="index.php">Logout</a></li>
								</ul>	
								<div class="clearfix"> </div>	
							</div>
						</nav>
					</div>
					
					<div class="clearfix"> </div>
				</div>
			</div>
	</div>
<!-- //banner -->
	<!-- about -->
	<!-- main-textgrids -->
	<div class="main-textgrids">
		<div class="container">
		<div class="w3l-heading">
				<h2 class="w3ls_head">vehicle details </h2>
		  </div>
		  <form name="form1" method="post" action="">
		    <table width="51%" height="270" border="0" align="center">
              <tr>
                <td width="35%">&nbsp;</td>
                <td width="25%">Id</td>
                <td width="27%"><?php echo $id;?>&nbsp;</td>
                <td width="13%">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Blossom Name </td>
                <td><?php echo $blossom_name;?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td rowspan="5"><img src="upload/<?php echo $fname;?>" width="95" height="95"></td>
                <td>Type</td>
                <td><?php echo $type;?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Price</td>
                <td><?php echo $price;?>
                    <label>
                    <input type="hidden" name="textfield" id="price" value="<?php echo $price;?>">
                  </label></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <tr>
                <td>Quantity</td>
                <td><input name="quantity" type="number" id="quantity" onChange="myFunction()">                </td>
                <td>&nbsp;</td>
              </tr>
              <script>
	function myFunction()
	 {
	 var x = document.getElementById("quantity").value;
	 
	 var x1 = document.getElementById("price").value;
 
	 
	 var z=x*x1;
	 document.getElementById("amount").value=z;
	 }
	        </script>
              <tr>
                <td height="30">Total Amount </td>
                <td><input name="amount" type="text" id="amount" readonly=""></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Card No </td>
                <td><input name="card_no" type="number" id="card_no" required="">                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Holder Name </td>
                <td><input name="holder_name" type="text" id="holder_name"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>CVV</td>
                <td><input name="cvv" type="number" id="cvv"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Ex-Date</td>
                <td><input name="ex_date" type="date" id="ex_date"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="Submit" value="Submit">
                </label></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
		    <p>&nbsp;</p>
			   <p>&nbsp;</p>
	      </form>
			 
		</div>
	</div>
	
	
	<!-- //main-textgrids -->
	<!-- different --><!-- //different -->
	<!-- team -->
	<!-- //team -->
    <!-- //about -->
    <!-- subscribe -->
    <!-- //subscribe -->
    <!-- footer -->
<div class="w3-agile-footer">
		<div class="container">
			<div class="footer-grids">
			  <div class="clearfix"> </div>
		  </div>
			<div class="agileits-w3layouts-copyright">
				<p>All Rights Reserved | Design by <a href="#"> Admin</a> </p>
			</div>
		</div>
</div>
	<!-- //footer -->
	<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					In Industry
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<img src="images/s12.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->
</body>	
</html>