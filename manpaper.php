<!DOCTYPE html>
<html>
  <head><title>Question Paper Generator</title>
  <style>
		@media print {
			button#printButton {
				display: none;
        
			}
		}
    #buttonContainer {
			display: flex;
			justify-content: center;
      width: 100%;
      height: 60px;
      
      
		}
		button#printButton {
			margin-top: 20px;
      color:black;
      background:skyblue;
      font-size:15px;
      border: 2px solid black;
      border-radius: 10px;
		}
</style></head>
  <body>
<?php
session_start();
$a=$_SESSION['collname'];
$b=$_SESSION['date'];
$c=$_SESSION['sub'];
$d=$_SESSION['nomque'];
$e=$_SESSION['time'];
$exname=$_SESSION['exname'];
$image=$_SESSION['image'];
$_FILES['image']=$image;


  


$qmarks=0;
for($x1=1;$x1<=$d;$x1++)
{
    $subque=$_SESSION['nosub'.$x1.''];
    for($i1=1;$i1<=$subque;$i1++)
            {
              if(isset($_POST['c'.$x1.''.$i1.'']))
              {
                $op=$_POST['mark'.$x1.''.$i1.''];
                
                 $marks=$_POST['mark'.$x1.''.$i1.''];
                $qmarks=$marks+$qmarks-$op;
                 if($qmarks==0){
                  echo"ERROR!!!!!!!!!!!!!!!!!!!!!!!<br>";
                  echo"Number of optional question should be less than no. of subquestion<br>";
                 }
            
              }
              else{
                      $marks=$_POST['mark'.$x1.''.$i1.''];
                      $qmarks=$marks+$qmarks;
                  }
            }
        }

if(isset($_FILES['image']))  //Image upload code
{
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];
            
  if($file_size<=5000000 )
  {
    move_uploaded_file($file_tmp,"Question paper generator/".$file_name);

    ?>
  <table width="850px" border="0" celspacing="0" cellpadding="0" align="center">
    <tr>
      <th><?php print "<img src='".$file_name."' height='90px' width='85px' />"; ?></th>
      <th><?php print "<center><u><h1>$a</h1></u></center>";?></th>
    </tr>
</table>
<?php
}
else{
  echo"Enter image with size less than 5MB";
     }
}
  print "<center><h2>($exname)</h2></center>";
 ?>
 <table width="850px" border="0" celspacing="0" cellpadding="0" align="center">
    <tr>
    <th align="left"><?php print " <h4>  &nbsp &nbsp &nbsp &nbsp Subject:- $c</h4>";?></th>
      <th align="right"><?php print "  <h4>  Time:- $e Hrs</h4>";?></th>
    </tr>
    <tr>
          
       <th align="left" ><?php print "<h4>  &nbsp &nbsp &nbsp &nbsp Date:- $b</h4>";?></th>
        <th align="right"><?php print "<h4>Marks:- $qmarks &nbsp &nbsp &nbsp &nbsp   </h4>";?></th>
     
    </tr>
</table>
<HR size="3" color="black" width="80%">
<table width="850px" border="0" cellspacing="0" cellpadding="20" align="center">
<tr>
      <th></th><th></th><th></th>
      <th align=left>Module</th>
      <th align=left>Marks</th> 
  </tr>
<?php
        for($x=1;$x<=$d;$x++)
        {
            $inst=$_SESSION['inst'.$x.''];
            ?>
            
                <tr>
                  <th><?php print'Q'.$x;?></th><th></th>
                  <th colspan=3 align="left"><?php print $inst;?></th>
                                                  
                </tr>
                <?php
           
            $subque=$_SESSION['nosub'.$x.''];
           // echo $subque;
            for($i=1;$i<=$subque;$i++)
            {  
              
                $subquestion=$_POST['subque'.$x.''.$i.''];
                $marks=$_POST['mark'.$x.''.$i.''];
                $module=$_POST['module'.$x.''.$i.''];
                $image=$_FILES['image'.$x.''.$i.''];
                $_FILES['image'.$x.''.$i.'']=$image;
                if(isset($_FILES['image'.$x.''.$i.'']))  //Image upload code
                    {
                      $file_name = $_FILES['image'.$x.''.$i.'']['name'];
                      $file_size = $_FILES['image'.$x.''.$i.'']['size'];
                      $file_tmp = $_FILES['image'.$x.''.$i.'']['tmp_name'];
                      $file_type = $_FILES['image'.$x.''.$i.'']['type'];
                      if($file_size<5000000)
                      {
                        move_uploaded_file($file_tmp,"image/".$file_name);
                      }
                    }
                
                
                ?>
                      
                    <tr>
                        <td></td>
                        <td><?php print $i;?></td>
                        <td><?php print $subquestion; ?></td>
                        <td><?php print 'M'.$module;?></td>
                        <td> <?php print $marks ; ?></td>
                        <?php
                        if(isset($_FILES['image'.$x.''.$i.'']) && !empty($_FILES['image'.$x.''.$i.'']['name'])){ ?>
                        <tr><td></td><td></td><td><?php print "<img src='".$file_name."' height='100px' width='250px' />"; ?></td></tr>
                        <?php }
              
                        ?>
                    </tr>
                      
                    
                        <?php 
                        
                      

            
          }
            ?>
           
            <?php
        }
        ?>
         </table>
         <div id="buttonContainer">
 <button id="printButton" onclick="window.print()">Print Question Paper</button></div>


</body>
<html>