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
      
      input[type="file"] {
        width: 300px;
      }
      input[type="file"]::file-selector-button {
        margin-right: 10px;
        width: 120px;
        border: none;
        height: 35px;
        margin-left: 20px;
        background: #0b2447;
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
        transition: background 0.2s ease-in-out;
      }
      input[type="file"]::file-selector-button:hover {
        background: #012659;
        border: 1px solid #5900ff;
        transition: 0s;
        box-shadow: rgb(115, 0, 255) 0px 50px 30px -10px;
      }
      select option{
			background-color: #8ca2de;
			color:#3A1078
		}
      input.check{
			color:#3A1078;
			width:20px;
            margin-left: 30px;
			height:20px;
			cursor: pointer;
			border-radius:50%;
			border:2px solid red;
			background-color: #3A1078;
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
$_SESSION['collname'] = $_SESSION['collname'];
$_SESSION['date'] = $_SESSION['date'];
$_SESSION['sub'] = $_SESSION['sub'];
$_SESSION['nomque'] = $_SESSION['nomque'];
$_SESSION['time'] = $_SESSION['time'];
$_SESSION['exname']=$_SESSION['exname'];
$_SESSION['image']=$_SESSION['image'];

$a=$_SESSION['nomque'];

echo'<form action="manpaper.php" method="post" enctype="multipart/form-data">';
for($i=1;$i<=$a;$i++)
{
    $_SESSION['nosub'.$i.'']=$_POST['nosub'.$i.''];
    
    $subque=$_POST['nosub'.$i.''];
   
    $_SESSION['inst'.$i.'']=$_POST['inst'.$i.''];
    echo 'Question '.$i.'';
    echo'<br>';
    echo'<br>';

    for($k=1;$k<=$subque;$k++)
             {
                
                echo '<label for="subque'.$i.''.$k.'">Subquestion'.$k.':</label>';
	 		        echo '<input type="text" name="subque'.$i.''.$k.'" class="txt" required><br><br>';

                    echo' <label for="image'.$i.''.$k.'">Upload image (if required):</label>';
                    echo'<input type="file"  name="image'.$i.''.$k.'"><br><br>';

                     echo '<label for="module'.$i.''.$k.'">Enter module no :</label>';
                     echo '<input type="number" name="module'.$i.''.$k.'"  min="1" max="6"  class="number" required ><br><br>';

                     echo '<label for="mark'.$i.''.$k.'">Enter mark of sub question'.$k.':</label>';
                    echo '<input type="number" name="mark'.$i.''.$k.'"  min="1" max="10" class="number"  required><br><br>';

                    echo 'Is this a optional question?';
                    echo '<label for="c'.$i.''.$k.'"></label>';
                    echo '<input type="checkbox" name="c'.$i.''.$k.'[]" value="1" class"check" >';

                    echo'<br><br><br><br>';
                
             }
            

            
}
echo'<div class="backbtn" ><input type="submit" class="btn" value="Submit" /></div>';
echo'</form>';
?>
</div>
</body>
</html>