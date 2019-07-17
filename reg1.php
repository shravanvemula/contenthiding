<?php
	
	$error="";
	$result="";
	$flag=0;
	if(isset($_POST["submit"]))
	{
		
		
		if(!($_POST['firstname']))
		{
		
			$error.="<br>Please Enter Your first name";
			
		
		}
		if(!($_POST['lastname']))
		{
		
			$error.="<br>Please Enter Your last name";
			
		
		}
		if(!($_POST['dob']))
		{
		
			$error.="<br>Please Enter Your Date Of Birth";
			
		
		}
		
		
		if(!($_POST['EMAIL']))
		{
		
			$error.="<br>Please Enter Your email";
		}
		
		if(!($_POST['MOBILE']))
		{
		
			$error.="<br>Please Enter Your Mobile number";
			
		
		}
		if(!($_POST['CON']))
		{
		
			$error.="<br>Please Enter Your Country";
			
		
		}
		
		if(!($_POST['CIT']))
		{
		
			$error.="<br>Please Enter Your City";
		
		}
		if(!($_POST['DIS']))
		{
		
			$error.="<br>Please Enter Your Distirct";
			
		
		}
		if(!($_POST['AGE']))
		{
		
			$error.="<br>Please Enter Your Age";
			
		
		}
		if(!($_POST['password']))
		{
		
			$error.="<br>Please Enter Your password";
			
		
		}
		if($_POST['password']!="" AND $_POST['cpassword']!="" AND strcmp($_POST['password'],$_POST['cpassword'])!=0)
		{
			$error.="<br>Password and Confirm Password are not matching.";
			
		} 
		
		
		$flag=0;
		if($error!="")
		{
			
			$result='<div class="alert alert-danger">There are some errors'.$error.'</div>';
		}
		else
		{
			$flag=1;
			
		}
	
		
		
		if($flag)
		{
				$servername = "localhost";
				$username = "root";
				$password = "";
				$db = "project";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $db);
				
				// Check connection
				if ($conn->connect_error) 
				{
					die("Connection failed: " . $conn->connect_error);
				} 
				//$hashpwd=password_hash($_POST['password'],PASSWORD_DEFAULT);

				$query = "INSERT INTO `reg2` (`firstname`, `lastname`,`dob`,`MOBILE`,`EMAIL`,`CON`,`DIS`,`CIT`,`AGE`,`password`) VALUES('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['dob']."','".$_POST['MOBILE']."','".$_POST['EMAIL']."','".$_POST['CON']."','".$_POST['DIS']."','".$_POST['CIT']."','".$_POST['AGE']."','".$_POST['password']."') ";
				$result = $conn->query($query);

			   
				if($result)
				{
					 $result='<div class="alert alert-success">Registered Successfully</div>';
					 header('Location:login1.php');
					 
				}
				else 
					$result='<div class="alert alert-danger">Email already exists</div>';

		
		}
		
	}
	
		
	
		
?>


<html>
		<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style type="text/css">html,body
{
		height:100%;
		width:100%;
}

.container
{
	
	
	padding-top: 50px;
	position: relative;
	padding-left: 150px;
	
}
.emailform
{
	
	margin-top:10px;
	margin-left:200px;

}
textarea
{
	height:120px;
}

.submit
{ 
	padding-left:0px;
	
}
.white
{
	color:black;
}
.center
{
	text-align:center;
}


.index_anchor{
  height:15px;
  overflow: hidden;
  background-color:white; 
}

#heading{
	background-color:rgba(80, 204, 56, 1);
	margin:0px;
	height:100px;
	border-radius:5px;
	padding-top:25px;
	padding-left:125px;	
}

.index{
	overflow: hidden;
	background-color: rgba(80, 204, 56, 1);
	margin:0;
	width: auto;
	border-radius:5px;
	height:40px;
}
.index ul{
margin:0px;
position: relative;
list-style-type:none;
z-index: 597;


border-radius:5px;
}
.index ul li 
{
display: inline-block;
float: none;
min-height: 1px;
vertical-align: middle;
}
.index ul li.hover,
.index ul li:hover 
{
  position: relative;
  z-index: 599;
  cursor: default;
}
.index a {
  display: bloc;
  line-height: 1em;
  text-decoration: none;
}

.index ul li a{
display:inline-block;
line-height: 2;
background-color:#ooo;
font-family:arial;
padding: .2em 1em;
text-decoration:none;
color:#fff;

	}
	.index ul li a:hover{
		
background-color:#fff;
font-family:arial;
padding: .2em 1em;
text-decoration:none;
color:#000;

	
	}
	
h1{
    color:white;
    font-family:Viner Hand ITC;
    font-size:50px;
    margin-left:0px;
margin-right:160px;
margin-top: 0px;
margin-bottom:0px;
}

#footer{
	background-color:rgba(80, 204, 56, 1);
	height:50px;
	clear:both;
	border-radius:5px;
	margin:10;
}
</style>
<script type='text/javascript' src='jquery.min.js'></script>
<script>
// This function will be executed when the user scrolls the page.
$(window).scroll(function(e) {
	// Get the position of the location where the index starts.
	var index_anchor = $(".index_anchor").offset().top;

	// Check if the user has scrolled and the current position is after the index's start location and if its not already fixed at the top
	if ($(this).scrollTop() >= index_anchor && $('.index').css('position') != 'fixed')
	{    // Change the CSS of the index to hilight it and fix it at the top of the screen.
		$('.index').css({
			'background-color': 'rgba(80, 204, 56, 1)',
			
			'position': 'fixed',
			'top': '0px',
			'width':'100%',
		'border-radius':'50px'
		});
		
		// Changing the height of the index anchor to that of index so that there is no change in the overall height of the page.
		$('.index_anchor').css('height', '5px');
	}
	else if ($(this).scrollTop() < index_anchor && $('.index').css('position') != 'relative')
	{    // If the user has scrolled back to the location above the index anchor place it back into the content.

		// Change the height of the index anchor to 0 and now we will be adding the index back to the content.
		$('.index_anchor').css('height', '05px');

		// Change the CSS and put it back to its original position.
		$('.index').css({
			'background-color': 'rgba(80, 204, 56, 1)',
			
			'position': 'relative'
		});
		
	}
});

</script>

</head>

<body >


<div id="heading">
	
<h1 class="center white"> This is the Registration page </h1>
</div>

<br>
			
<p class="lead  white"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp In this page,User must fill all the fields and the details should be appropriate.</p>



<div class="index_anchor">
	
</div>
<div class="index">
<center>
<ul>
<li><a href="index.php"><i class="fa fa-home">&nbspHome</i></a></li>
<li><a href="login1.php"><i class="fa fa-user"> &nbspLogin</i></a></li>
</ul>
</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 emailform">
			
		
			<p class="lead center white">Please Register here </p>
			<?php echo $result; ?>
			<form method="post" class="center">
				
				<div class="form-group">
				
				<INPUT TYPE="TEXT" name="firstname" placeholder="Enter First Name.." id="name" class="form-control">
				</div>
				<div class="form-group">
				
				<INPUT TYPE="TEXT" name="lastname" placeholder="Enter last Name.." id="name" class="form-control">
				</div>
				<div class="form-group">
				
				<INPUT TYPE="TEXT" name="dob" placeholder="Enter Your Date of Birth (Ex:YYYY-MM-DD).. " id="name" class="form-control">
				</div>
				
				<div class="form-group">
				<INPUT TYPE="TEXT" NAME="MOBILE" placeholder="Enter Your Mobile Number" SIZE="25" id="phone" class="form-control">
				</div>
				<div class="form-group">
			
				<INPUT TYPE="text" NAME="EMAIL" placeholder="Enter your email" SIZE="46" id="email" class="form-control">
				</div>
				
				<!-- ADDRESS-->	
				<div class="form-group">
				<INPUT TYPE="TEXT" NAME="CON" placeholder="Enter Your Country.."  class="form-control" >
				</div>
				
				<div class="form-group">
				<INPUT TYPE="TEXT" NAME="DIS" placeholder="Enter Your Distirct.." class="form-control" >
				</div>
		
				<div class="form-group">
				<INPUT TYPE="TEXT" NAME="CIT" placeholder="Enter Your area" class="form-control">
				</div>
			
				<div class="form-group">
				<INPUT TYPE="TEXT" NAME="AGE" id="age" class="form-control" placeholder="Enter Your Age..">
				</div>
				
				<div class="form-group">
				<input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password...">
				</div>
			
				<div class="form-group">
				<input type="password" name="cpassword"  id="password" class="form-control" placeholder="Retype Your Password...">
				</div>
				

				<!-- SUBMIT-->
				<div class="form-group">
				<input type="submit" name="submit" value="submit" class="btn btn-success  btn-lg submit1">
				</div>
				
				
			</form>
			
			
			
			</div>
		</div>
	</div>








<div id="footer"></div>

</body>

</html>
