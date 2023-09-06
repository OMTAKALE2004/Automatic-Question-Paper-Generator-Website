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
$c=$_SESSION['subject'];
$d=$_SESSION['numfields'];
$e=$_SESSION['time'];
$exname=$_SESSION['exname'];
$image=$_SESSION['image'];
$_FILES['image']=$image;



if(isset($_FILES['image']))  //Image upload code[logo of insitute]
{
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];
  $allowed_image_extension = array("png","jpg","jpeg");
  $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); 
            
  if($file_size<=5000000 && in_array($file_extension,$allowed_image_extension) )
  {
    move_uploaded_file($file_tmp,"Question paper generator/".$file_name);

?>
  <table width="850px" border="2" celspacing="0" cellpadding="0" align="center">
    <tr>
      <th><?php print "<img src='".$file_name."' height='90px' width='85px' />"; ?></th>
      <th><?php print "<center><u><h1>$a</h1></u></center>";?></th>
    </tr>
</table>
<?php
}
else{
  echo"Check file size of logo it should be less than 5MB <br>";
  
  echo" You entered wrong logo file .$file_extension not supported <br>";
  echo"Check your file type.File type should be .jpg, .jpeg, .png  <br>";
     }
}
  print "<center><h2>($exname)</h2></center>";
 ?>

   
<?php
     $tmarks=0;
        for($x=1;$x<=$d;$x++)
            {
             
              $mark1=$_POST['submark'.$x.''];
              $subquestion1=$_POST['sb'.$x.''];
                $optional1=$_POST['opqu'.$x.''];
                $tmarks=$tmarks+($mark1*$subquestion1)-($optional1*$mark1);
              
            }
            
?>
<!-- table for date,marks,subject -->
<table width="850px" border="0" celspacing="0" cellpadding="0" align="center">
  <tr>
      <th align="left"><?php print " <h4>  &nbsp &nbsp &nbsp &nbsp Subject:- $c</h4>";?></th>
      <th align="right"><?php print "  <h4>  Exam Duration:- $e Hrs</h4>";?></th>
    </tr>
    <tr>
          
       <th align="left" ><?php print "<h4>  &nbsp &nbsp &nbsp &nbsp Date:- $b</h4>";?></th>
        <th align="right"><?php print "<h4>Marks:- $tmarks  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   </h4>";?></th>
     </tr>
</table>


<HR size="3" color="black" width="80%">

<table width="850px" border="0" cellspacing="0" cellpadding="20" align="center">
  <tr>
      <th></th><th></th><th></th>
      <th align=left>Module</th>
       <th align=left>CO</th>
      <th align=left>Marks</th> 
     
  </tr>

<?php
      
      $displayedquestion=array();
     

   for($i=1;$i<=$d;$i++)
     {
      if(empty($_POST['c'.$i.'']))
      {
      
        echo"Select atleast one module for Qno$i <br>";
       
      }

      else{

      
      
      $inst=$_POST['inst'.$i.''];
        $mark=$_POST['submark'.$i.''];
        $subquestion=$_POST['sb'.$i.''];
       
        $optional=$_POST['opqu'.$i.''];

        $solve=$subquestion-$optional;
        if($optional>=$subquestion)
        {
          echo "You entered optional questions more than subquestions in Qno. $i";
        }
        else{
        
        

?>
    <tr>
         <th><?php echo "Q".$i ?></th><th></th>
<?php
     if($optional==0){
 ?>
        <th align=left colspan=3><?php echo $inst."   [All Compulsory]"; ?></th>
<?php                }
      else { 
?>
        <th align=left colspan=3><?php echo $inst."   [Solve any $solve]"; ?></th>
 <?php     }
 ?>
    </tr> 
<?php 
      //query for selecting subject and module and marks
    include('database.php');
    switch($c)
        {
          case "Analysis of Algorithms" :
                                          $selmod=$_POST['c'.$i.''];
                                          $selmod=implode("','",$selmod);  
                                          $query1 = "SELECT  * FROM aoa WHERE module IN ('$selmod') AND Marks='$mark' order by rand() ";
                                          $result = $conn->query($query1);
                                         
                                          break;

          case "Micro Processor" :
                                    $selmod=$_POST['c'.$i.''];
                                    $selmod=implode("','",$selmod);
                                    $query1 = "SELECT DISTINCT * FROM mp WHERE module IN ('$selmod') AND Marks='$mark' order by rand() ";
                                    $result = $conn->query($query1);
                                  
                                    
                                    break;
                                    

                      
                      
          case "Database Management System":
                                              $selmod=$_POST['c'.$i.''];
                                              $selmod=implode("','",$selmod);  
                                              $query1 = "SELECT * FROM dbms WHERE module IN ('$selmod') AND Marks='$mark'  order by rand()";
                                              $result = $conn->query($query1);
                                              break;
          case "Operating System":
                                              $selmod=$_POST['c'.$i.''];
                                              $selmod=implode("','",$selmod);  
                                              $query1 = "SELECT * FROM os WHERE module IN ('$selmod') AND Marks='$mark' order by rand()";
                                              $result = $conn->query($query1);
                                              break;

          case "Engineering Maths 4":
                                                $selmod=$_POST['c'.$i.''];
                                                $selmod=implode("','",$selmod);  
                                                $query1 = "SELECT * FROM maths4 WHERE module IN ('$selmod') AND Marks='$mark' order by rand()";
                                                $result = $conn->query($query1);
                                                break;
      
        }
  
          
        
      if ($result->num_rows > 0)
      {  
          $sn=1;
          
          
          for($sn=1;$sn<=$subquestion;$sn++)
          {   
            
?>
     <tr>
              <td></td>
              <td><?php echo $sn; ?> </td><td>
<?php
            
          a:
                    $data = $result->fetch_assoc()
          
            
?>
 
 
    
        
<?php 
               if(!in_array($data['srno'],$displayedquestion))
                  {
                       
                    echo $data['Questions']; 
?>      </td>

        <td><?php echo 'M'.$data['module']; ?> </td>
        <td><?php echo 'CO'.$data['module']; ?> </td>
        <td align=center><?php echo $data['Marks'];?></td>
        
<?php   if($data['image']!=NULL)
        { 
?>
        <tr>
              <td> </td> <td></td>
            <td>
<?php  // code to decode image in database
          print '<img src="data:image;base64,'.base64_encode($data['image']).'" height="200px" width="300px" />';
   
       }
        
   ?>      </td>
        </tr>

<?php 
       $displayedquestion[]=$data['srno'];          
      
                 }
                 else 
                      {
                          goto a;
                       }

        }
        
        
?>
    </tr>
   
   
<?php
      }
      else 
      { 
?>
    <tr>
        <td colspan="8">No data found</td>
    </tr>

 <?php } 
         }
        }
      } 
      
      
 ?>

  </table>
  
 
 <div id="buttonContainer">
 <button id="printButton" onclick="window.print()">Print Question Paper</button></div>


</body>
<html>
 
