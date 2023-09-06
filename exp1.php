 <!DOCTYPE html>
<html>
<head>
	<title>Automatic Paper</title>
	<style>
  @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Josefin+Sans:ital@1&family=Rokkitt&display=swap');

		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			
		}
		body{
		
			/* background-color:#8ca2de;
			background-image: linear-gradient(to up right,#4e31aa,#2f58cd); */
			background-image: url(gradient_2.jpg);
			background-size:cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
			font-family: 'Rokkitt', serif;
			}
			.container{
			width:700px;
			background-color: #fff;
			opacity:.9;
			box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
			/* background-image: linear-gradient(to left,#8ca2de,#b086f0); */
			margin-left: 26%;
			margin-top: 5%;
			margin-bottom: 5%;
			font-size: 1.4rem;
			border-radius: 5px;
			padding:30px;
			
		}
		label{
			color: navy;
			padding:20px;
		}
		.text{
			margin: 10px;
			margin-left:20px;
			width: 500px;
			font-size:20px;
			font-family: 'Poppins', sans-serif; 
			height: 30px;
			border:none;
			background-color:transparent;
			border-bottom: 2px solid navy;
		}
		
		
		.number{
			margin-left: 0px;
			width:100px;
			border:none;
			background-color:transparent;
			border-bottom: 2px solid #3A1078;
			height:20px;
		}
		.number2{
		
			width:100px;
			border:none;
			background-color:transparent;
			border-bottom: 2px solid #3A1078;
			height:20px;
		}
		.INPUT{
			border-radius: 5px;
			height: 30px;
			font-size: 17px;
			/* border:2px solid #3A1078; */
			border:none;
			background-color: transparent;
		}
		select option{
			background-color: #8ca2de;
			color:#3A1078
		}
		input.check{
			color:#3A1078;
			width:20px;
			height:20px;
			cursor: pointer;
			border-radius:50%;
			border:2px solid red;
			background-color: #3A1078;
		}
		.place{
			color:#3A1078;
			font-size: 60px;
		}
		.btn{
			margin-left: 43%;
			margin-top:1.7%;
			margin-bottom: auto;
			width: 70px;
			font-size:20px;
			height: 40px;
			color: #fff;
			border-radius: 3px;
			border:none;
			background-color: transparent;
			font-family: cursive;
			cursor:pointer;
		}
		.backbtn{
			width:100%;
			background-color: navy;
			height:60px;
		}
		
		</style>
</head>

<body>
	

<div class="container">

<?php
if(empty($_POST['subject']))
{
	echo"Please choose Subject in previous page";
}
else{
session_start();
$_SESSION['collname'] = $_POST['collname'];
$_SESSION['date'] = $_POST['date'];
$_SESSION['subject'] = $_POST['subject'];
$_SESSION['numfields'] = $_POST['numfields'];
$_SESSION['time'] = $_POST['time'];
$_SESSION['exname']=$_POST['exname'];
$_SESSION['image']=$_FILES['image'];


$d=$_POST['numfields'];



echo'<form  action="output.php" method="post">';



for($i=1;$i<=$d;$i++)
{
	echo '<label for="inst'.$i.'">Instruction for Question '.$i.':</label>';
	 		echo '<input type="text" name="inst'.$i.'" id="inst'.$i.'"  class="text"  required/><br />';
	

	echo 'Select modules<br>';
	echo '<label for="c'.$i.'">M1:</label>';
	echo '<input type="checkbox" name="c'.$i.'[]" value="1"class="check"  >';

	echo '<label for="c'.$i.'">M2:</label>';
	echo '<input type="checkbox" name="c'.$i.'[]" value="2" class="check"  >';

	echo '<label for="c'.$i.'">M3:</label>';
	echo '<input type="checkbox" name="c'.$i.'[]" value="3" class="check"  >';

	echo '<label for="c'.$i.'">M4:</label>';
	echo '<input type="checkbox" name="c'.$i.'[]" value="4" class="check">';

	echo '<label for="c'.$i.'">M5:</label>';
	echo '<input type="checkbox" name="c'.$i.'[]" value="5" class="check">';

	echo '<label for="c'.$i.'">M6:</label>';
	echo '<input type="checkbox" name="c'.$i.'[]" value="6" class="check">';
	echo'<br>';
	echo'<br>';

	echo '<label for="sb'.$i.'">Number of Subquestion for Q'.$i.':</label>';
	echo '<input type="number" name="sb'.$i.'" id="sb'.$i.'" class="number" min="1" max="10"  required/><br />';

echo'<label for="submark'.$i.'">Marks for each subquestion in Q'.$i.':</label>';
	echo'<select name="submark'.$i.'" id="sub" class="INPUT" >
	<option disabled hidden selected >Choose Marks</option>
	<option >2</option>
	<option >5</option>
	
	<option >10</option>
	</select>';
	
	echo'<br>';
	echo '<label for="opqu'.$i.'">Number of optional subquestion for Q'.$i.':</label>';
	 		echo '<input type="number" name="opqu'.$i.'" id="opqu'.$i.'" class="number2" required /><br />';

			 echo'<br><br>';
                
}




echo '<div class="backbtn">

<input type="submit" value="Submit" class="btn" />
</div>';
	 	echo '</form>';
}
?>
</div>



</body>
</html>
