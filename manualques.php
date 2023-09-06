<!DOCTYPE html>
<html>
    <head>
        <title>Manual Paper</title>
        <style>
        @import url("https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Dancing+Script:wght@700&family=Josefin+Sans:ital@1&family=Poppins&family=Rokkitt&display=swap");
      @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Comfortaa:wght@300;700&family=Dancing+Script:wght@700&family=Inspiration&family=Josefin+Sans:ital@1&family=Poppins&family=Rokkitt&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Comfortaa:wght@300;700&family=Dancing+Script:wght@700&family=Inspiration&family=Josefin+Sans:ital@1&family=Poppins&family=Rokkitt&display=swap');
      
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
        background-image: url(back1.jpg);
        background-size: 1570px 800px;
        background-repeat: no-repeat;
        background-attachment: fixed;
        color: #fff;
        font-family: "Comfortaa", cursive;
      }
      .container {
        overflow-x: hidden;
        overflow-y: auto;
        padding: 50px;
        width: 800px;
        font-size: 1.4rem;
        height: 580px;
        margin-left: 28%;
        margin-top: 9%;
        border: 2px;
        background: rgba(65, 101, 162, 0.04);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(65, 101, 162, 0.48);
      }
        .container::-webkit-scrollbar {
            display: none;
     } 
        .container::-webkit-scrollbar {
        display: none; 
    }
      .txt {
        width: 600px;
        margin-left: 30px;
        height: 30px;
        color: #fff;
        font-size: 20px;
        background-color: transparent;
        border: none;
        border-bottom: 2px solid #138fdc;
      }
      .number {
        margin-left: 20px;
        width: 100px;
        border: none;
        color: white;
        background-color: transparent;
        border-bottom: 2px solid #138fdc;
        height: 30px;
      }
      .btn {
        margin-left: 43%;
        margin-top: 5%;
        margin-bottom: auto;
        width: 90px;
        font-size: 20px;
        height: 50px;
        color: #fff;
        border-radius: 5px;
        margin-bottom: 40px;
        border: 1px solid white;
        background-color: transparent;
        font-family: "Comfortaa", cursive;
        cursor: pointer;
      }
      .btn:hover {
        
        color: #fff;
        font-size: 25px;
        border: 1px solid white;
      }
      .backbtn {
        width: 100%;
        background-color: transparent;
        height: 40px;
        padding-top: 10px;

      }
    </style>
    </head>
    <body>
        
<div class="container">

<?php

session_start();
$_SESSION['collname'] = $_POST['collname'];
$_SESSION['date'] = $_POST['date'];
$_SESSION['sub'] = $_POST['sub'];
$_SESSION['nomque'] = $_POST['nomque'];
$_SESSION['time'] = $_POST['time'];
$_SESSION['exname']=$_POST['exname'];
$_SESSION['image']=$_FILES['image'];

$a=$_POST['nomque'];

echo'<form action="manualques2.php" method="post">';
for($i=1;$i<=$a;$i++)
{
    echo '<label for="inst'.$i.'">Instruction for Question '.$i.':</label>';
	 		echo '<input type="text" name="inst'.$i.'"  class="txt" required><br><br>';

             echo '<label for="nosub'.$i.'">Number of Subquestion'.$i.':</label>';
             echo '<input type="number" name="nosub'.$i.'" min="1" max="10" class="number" required><br /><br><br>';
             
            
           
}
echo'<div class="backbtn"><input type="submit" class="btn" value="Submit" /></div>';
echo'</form>';
?>
</form>
</body>
</html>