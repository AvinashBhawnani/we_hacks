<!DOCTYPE html>
<html>
<head>
  <title>CAREER GUIDANCE SYSTEM</title>             

   
  <link rel="stylesheet" type="text/css" href="css/form.css">

  <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/heading.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/button.css">
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="css/table.css">
  <link rel="stylesheet" type="text/css" href="css/ulli.css">


</head>
<body style="background-image: none;">
        <h1>CAREER GUIDANCE SYSTEM</h1>


  <ul>
    
        <li><a href="test.php?q=1" >Amplitude test</a></li>    
        <li><a href="test.php?q=2">History</a></li>
        <li><a href="">View College</a></li>
        <li><a href="">Fields Available</a></li>
        <li><a href="download.php">E-book Download</a></li>
    
  </ul>


<?php
include_once 'config.php';
?>


<?php
include_once 'config.php';
session_start();
  if(!(isset($_SESSION['username']))){
header("location:login.php");

}
else
{
$username=$_SESSION['username'];

include_once 'config.php';

}?>


   
         
<!--container start-->


<!--home start-->
<?php if(@$_GET['q']==1) {

include_once 'config.php';

echo '<span style="float:right;margin:10em;margin-bottom:2em; margin-right:1em;color:orange;
text-decoration:none;font-size:20px;position:abolute;">
&nbsp;Hello, 
<a href="#" style="text-decoration:none;">'.$username.'</a>&nbsp;|||&nbsp;
<a href="user/logout.php?q=test.php" style="text-decoration:none;">&nbsp;Signout</a>
</span>';

$result = mysqli_query($db,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '
<table>
<tr>
<td><b>S.N.</b></td>
<td><b>Topic</b></td>
<td><b>Total question</b></td>
<td><b>Marks</b></td>
<td><b>Time limit</b></td>
<td></td>
</tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $title = $row['title'];
  $total = $row['total'];
  $sahi = $row['sahi'];
  $time = $row['time'];
  $eid = $row['eid'];
$q12=mysqli_query($db,"SELECT score FROM history WHERE eid='$eid' AND username='$username'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);  
if($rowcount == 0){
  echo '<tr>
  <td>'.$c++.'</td>
  <td>'.$title.'</td>
  <td>'.$total.'</td>
  <td>'.$sahi*$total.'</td>
  <td>'.$time.'&nbsp;min</td>
  <td><b><a href="test.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'"style="margin:0px;background:#99cc32;text-decoration:none;">&nbsp;<span class="title1"><b>Start</b></span></a></b></td>
  </tr>';
}
else
{
echo '<tr style="color:#99cc32">
<td>'.$c++.'</td>
<td>'.$title.'&nbsp;<span title="This quiz is already solve by you"</span></td>
<td>'.$total.'</td><td>'.$sahi*$total.'</td>
<td>'.$time.'&nbsp;min</td>
<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'"  style="margin:0px;background:red;text-decoration:none;"><span></span>&nbsp;<span><b>Restart</b></span></a></b></td>
</tr>';
}
}
$c=0;
echo '</table></div></div>';

}?>


<!--quiz start-->
<?php
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($db,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div class="panel" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<h6 style="color:orange;font-weight:bold;">Question &nbsp;'.$sn.'&nbsp;::</h6><br /><h6 style="color:black;margin-top:0;font-weight:bold;">'.$qns.'</h6>';
}
$q=mysqli_query($db,"SELECT * FROM options WHERE qid='$qid' " );
echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST" style="margin-top:5em;background-color:white;">';

while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<input type="radio" name="ans" required="" value="'.$optionid.'" >&nbsp&nbsp; <span style="font-size:18px;"> '.$option.'</span><br /><br />';
}
echo'<br /><button style="background-color:orange" type="submit">Submit</button></form></div>';
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}


//result display
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($db,"SELECT * FROM history WHERE eid='$eid' AND username='$username' " )or die('Error157');
echo  '
<center><h6 style="margin-top:6em; font-weight:bold; color:orange; font-size:32px;">Result</h6><center><br />
<table style="font-size:20px;font-weight:1000;width:50%;margin-top:0;">';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
echo '
<tr style="color:#66CCFF">
<td>Total Questions</td>
<td>'.$qa.'</td>
</tr>

      <tr style="color:#99cc32">
      <td>right Answer</td>
      <td>'.$r.'</td></tr>

    <tr style="color:red">
    <td>Wrong Answer</td>
    <td>'.$w.'</td>
    </tr>

    <tr style="color:#66CCFF">
    <td>Score&nbsp;</td>
    <td>'.$s.'</td>
    </tr>';
}
$q=mysqli_query($db,"SELECT * FROM rank WHERE  username='$username' " )or die('Error157');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$rec=$row['rec'];
if ($rec>50) {
  # code...
  $r="Proceed";
  echo '<tr style="color:#99cc32"><td>Recommended:&nbsp;</td><td><a href="college.php"style="color:orange;font-size:24px;">'.$r.'</a></td></tr>';
}else{
  $take="Take another quiz";
  echo '<tr style="color:#99cc32"><td>Recommended:&nbsp;</td><td><a href="test.php?q=1"style="font-size:24px;color:orange;">'.$take.'</a></td></tr>';
}


}
echo '</table></div>';
}
?>
<!--quiz end-->
<?php


//history start
if(@$_GET['q']== 2) 
{
  include_once 'config.php';

echo '<span style="float:right;margin:10em;margin-bottom:2em; margin-right:1em;color:orange;
text-decoration:none;font-size:20px;position:abolute;">
&nbsp;Hello, 
<a href="#" style="text-decoration:none;">'.$username.'</a>&nbsp;|||&nbsp;
<a href="user/logout.php?q=test.php" style="text-decoration:none;">&nbsp;Signout</a>
</span>';

$q=mysqli_query($db,"SELECT * FROM history WHERE username='$username' ORDER BY date DESC " )or die('Error197');
echo  '<table>
<tr style="color:red"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$eid=$row['eid'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
$q23=mysqli_query($db,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');
while($row=mysqli_fetch_array($q23) )
{
$title=$row['title'];
}
$c++;
echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
}
echo'</table></div>';
}

?>
<!--Footer start-->
<footer>

<a href="#" target="" data-toggle="modal" data-target="#home">Read More</a>
</footer>

<?php 
echo'
<div class="modal fade title1" id="home">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 12em;background-color: #212529;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:#fff; text-decoration: none;font-size: 32px;">Welcome to our site</span></h4>
      </div>
    
      <div class="modal-body" style="background-color: white;padding: 2em;">
        <p>
    <div class="row">
    
    <h5 style="float: left;"><b>Amplitute test:</b>This part contains a series of tests that are of general uestions which a user is expected to take.After test completion a score is calculated for each test. Based on those results the system manipulates and calculates the best career for that user.</h5>

    <h5 style="float: left;"><b>College View:</b>After completion of tests and automation of the recommended course, the user can search for a high learning institution using the course in this part.</h5>

    <h5 style="float: left;"><b>Fields Available:</b>This part contains fields that a user can venture in after graduation. According to a certain course, a user can view the fields available after pursing a particular course.</h5>

    <h5 style="float: left;"><b>Ebook Download:</b>The system also includes an eBooks page where a user can click and download career guidance eBooks. These eBooks are to facilitate a user with more information on careers.</h5>
   
      </div>
    </p>
      </div>';
      ?>
</body>
</html>
