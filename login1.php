<?php
	require 'connect.inc.php';
	session_start();
	
	$error="";
	$result="";
	$flag=0;
	$email="";
	$password="";
	
	if(isset($_POST["submit"]))
	{
		
		if(!($_POST["email"]))
		{
		
			$error.="<br>Please Enter Your email";
			$flag=1;
		}
		
		
		if(!($_POST['password']))
		{
		
			$error.="<br>Please Enter Your password";
			$flag=1;
			
		
		}
		if($flag==1)
		{
			$result='<div class="alert alert-danger">There are some errors'.$error.'</div>';
		}
				
		
		
		if($flag==0)
		{
				$email=$_POST['email'];
				
				
				$password=$_POST['password'];
				
				
				if(!empty($email)&&!empty($password))
				{
					
					 $conn = mysqli_connect('localhost','root','');
						 
					 mysqli_select_db($conn,'project');
					 
					 $sql = "select * from reg2 where EMAIL='$email'";
					 
					 $records = mysqli_query($conn,$sql);
						
					if($row = mysqli_fetch_array($records))
					{
						
						
						if(strcmp($password,$row['password'])==0)
						{	
							
							$_SESSION['id']=$row['id'];
							header('Location:userspage.php');
						

						}
						else
						{
							$result='<div class="alert alert-danger">Password and Mail Id do not match</div>';

						}
					
					}
					else
					{
						$result='<div class="alert alert-danger">Failed to login'.$error.'</div>';
					}
									
				}
						
				else
				{
					$result='<div class="alert alert-danger">Failed to login'.$error.'</div>';
				}
								
				
		}
	}
	
	
		
?>



<html>
		<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<style type="text/css">html,body
{
		height:100%;
		width:100%;
}

.container
{
	
	
	background-size:cover;
	position: relative;
	padding-top:0px;
	padding-left:130px;
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

.submit1
{ 
	padding-left:50px;
	
}
.white
{
	color:black;
}
.center
{
	text-align:center;
}


.index_anchor
{
  height:5px;
  background-color:white; 
}

#heading
{
	background-color:rgba(80, 204, 56, 1);
	margin:0px;
	height:150;
	border-radius:5px;
	padding-top:40px;
	padding-left:125px;	
}

.index
{
	
	background-color: rgba(80, 204, 56, 1);
	margin:0;
	width: auto;
	border-radius:5px;
}
.index ul{
margin:0px;
position: relative;
list-style-type:none;
z-index: 597;

border-radius:5px;
}
.index ul li {
display: inline-block;
float: none;
min-height: 1px;
vertical-align: middle;
}
.index ul li.hover,
.index ul li:hover {
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
	
h1
{
    color:white;
    font-family:Viner Hand ITC;
    font-size:50px;
    margin-left:0px;
margin-right:160px;
margin-top: 0px;
margin-bottom:0px;
}

#footer
{
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
<h1 class="center white"> This is the Login page </h1>
</div>
<br>
			
<p class="lead  white"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp In this page,User must fill the two fields and the Email ID and Password should be matched.</p>


</div>
 


<div class="index_anchor">
</div>
<div class="index">
<center>
<ul>
<li><a href="index.php"><i class="fa fa-home">&nbspHome</i></a></li>
<li><a href="reg1.php"><i class="fa fa-book"> &nbspRegister</i></a></li>
</ul>
</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 emailform">
			
			
			
			<p class="lead center white">Please Log In here </p>
				<?php echo $result; ?>
			
			<form method="post" class="center" action="login1.php" >
				
				<div class="form-group">
				
					<input type="text" name="email" class="form-control" placeholder="Enter email.."/>
					
				</div>
				
				<div class="form-group">
				
					<input type="password" name="password" class="form-control" placeholder="Enter Password.."/>
					
				</div>
				
				<div class="form-group submit1">
					<input type="submit" value="Log in" name="submit" class="btn btn-success  btn-lg" />
				</div>
				
				
				
			</form>
			
			<p class="lead center white"><a href="forgot.php">Forgot Password?</a> </p>
			<p class="lead center white">New User? <a href="reg1.php">Register Here</a> </p>
			
			</div>
		</div>
	</div>
	

				




<div id="footer"></div>

</body>

</html>
