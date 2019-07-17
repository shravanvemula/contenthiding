 <?php  
  session_start();
	require 'connect.inc.php'; 
	$connect = mysqli_connect("localhost", "root", "", "project"); 
 ?> 



<!DOCTYPE html>
<html>
<head>
	<title>Photos</title>
	<meta charset="utf-8" />	    
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />	       
 <meta name="viewport" content="width=device-width, initial-scale=1" />	 
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="stylee.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  
	<style type="text/css">
		#heading{
	background-color: rgba(80, 204, 56, 1);
	margin:0px;
	height:150;
	border-radius:5px;
}

.index{
	
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
font-family:Art Nouveau;
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
    font-family:Art Nouveau;
    font-size:50px;
    margin-left:0px;
margin-right:160px;
margin-top: 0px;
margin-bottom:0px;
}
/*
ul {
  position: -webkit-sticky; /* Safari */
 /*
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
    position: fixed;
  top: 0;
  width: 100%;
}*/
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  /*position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
.active {
  background-color: #4CAF50;
}
/*--------------------------------------*/
.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 110px;
  left: 10px;
  background-color: #333;
  overflow-x: hidden;
  padding-top: 20px;
  font-family:Art Nouveau;
  color: white;

  
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: black;
  background-color: white;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

.upload
{
	margin-left:200px;
}
.img
{
	margin-left:400px;
}
	
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

/*--------------------------------------*/
	</style>
</head>

<body>
    <div id="heading">
    	<h3 align="center">Check out your photo here</h3>
    </div>
 <div class="index">
<center>
<ul>
	
  <li style="float:right;"> <a href="index.php">Log Out</a></li>
<li style="float:right;"> <a href="userspage.php">Home</a></li>
</ul>
</div>
<div class="sidenav">
 
  <a href="others.php">Other Users</a>
</div>
<div class="main">
	<div class="alert alert-success" align="center"><h2>Profile Photo</h2></div>

 

     

                    <?php   
					
                    $query0 = "SELECT * FROM reg2 WHERE id = '".$_SESSION['id']."'";
                    $result0 = mysqli_query($connect, $query0);
                    while($val = mysqli_fetch_array($result0)){

                $query = "SELECT * FROM photos WHERE id='".$val['id']."' ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);
                
                $row = mysqli_fetch_array($result);
                
                     echo '    
                                    <div style="float:left;"><img id="'.$row['id'].'"  src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="500px" width="500px" align="center" class="img" />  
                                    

                                
                                 
                     ';  
                }  
            
                ?>       
 
    </div>


 </div>
  

                  
<script src="jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 
 <script>  
 $(function(){  
      $("#insert").click(function(){ 
			alert('clkj'
           var image_name = $("#image").val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $("#image").val().split(".").pop().toLowerCase();  
                if(jQuery.inArray(extension, ["gif","png","jpg","jpeg"]) == -1)  
                {  
                     alert("Invalid Image File");  
                     $("#image").val("");  
                     return false;  
                }  
           }  
      });  
 });  
</script>  
</body>
</html>