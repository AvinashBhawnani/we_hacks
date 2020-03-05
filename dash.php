<!DOCTYPE html>

<title>CareerGuidanceSystem</title>


  <link rel="stylesheet" type="text/css" href="css/form.css">

  <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/heading.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/button.css">
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="css/ulli.css">
  <link rel="stylesheet" type="text/css" href="css/table.css">

</head>

<body style="background-image: none;">

      <h1>CAREER GUIDANCE SYSTEM</h1>


<?php
include_once 'config.php';
?>


<?php
include_once 'config.php';
session_start();
  if(!(isset($_SESSION['username']))){
header("location:registrar.php");

}
else
{
$username=$_SESSION['username'];
$email=$_SESSION['email'];



}?>



<!-- admin start-->

<!--navigation menu-->

  
    <!-- Collect the nav links, forms, and other content for toggling -->
      <ul>
        <li><a href="dash.php?q=0">Home</a></li>
        <li><a href="ebook.php">E-book Upload</a></li> 
        <li><a href="infoupload.php">College Update</a></li> 
        <li><a href="field.php">Field Update</a></li> 
		    <li><a href="dash.php?q=2">Ranking</a></li>
        <li><a href="#">Quiz</a>
          <ul>
            <li><a href="dash.php?q=4">Add Quiz</a></li>
            <li><a href="dash.php?q=5">Remove Quiz</a></li>			
          </ul>
        </li>		
      </ul>
       

<!--container start-->

<!--home start-->

<?php if(@$_GET['q']==0) {

include_once 'config.php';

echo '<span style="float:right;margin:10em;margin-bottom:2em; margin-right:1em;color:orange;
text-decoration:none;font-size:20px;position:abolute;">
&nbsp;Hello, 
<a href="#" style="text-decoration:none;">'.$username.'</a>&nbsp;|||&nbsp;
<a href="logout.php" style="text-decoration:none;">&nbsp;Signout</a>
</span>';

$result = mysqli_query($db,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<table>
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $title = $row['title'];
  $total = $row['total'];
  $sahi = $row['sahi'];
    $time = $row['time'];
  $eid = $row['eid'];
  echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>


<?php
//ranking start
if(@$_GET['q']== 2) 
{

include_once 'config.php';

echo '<span style="float:right;margin:10em;margin-bottom:2em; margin-right:1em;color:orange;
text-decoration:none;font-size:20px;position:abolute;">
&nbsp;Hello, 
<a href="#" style="text-decoration:none;">'.$username.'</a>&nbsp;|||&nbsp;
<a href="logout.php" style="text-decoration:none;">&nbsp;Signout</a>
</span>';
$q=mysqli_query($db,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '
<table style="margin-top:5em;">
<tr style="color:red">
<td><b>Rank</b></td>
<td><b>Username</b></td>
<td><b>Gender</b></td>
<td><b>Email</b></td>
<td><b>Score</b></td>
</tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['username'];
$s=$row['score'];
$q12=mysqli_query($db,"SELECT * FROM users WHERE username='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$username=$row['username'];
$gender=$row['gender'];
$email=$row['email'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$username.'</td><td>'.$gender.'</td><td>'.$email.'</td><td>'.$s.'</td>';
}
echo '</table></div></div>';}

?>


<!--home closed-->


<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 


<form name="form" action="update.php?q=addquiz"  method="POST" style="margin-top:20em;">

<h2>Enter Quiz Details</h2>


<!-- Text input-->
<div class="input-group">
  <label for="name"></label>  
  <input id="name" name="name" required="" placeholder="Enter Quiz title"type="text" style="margin-right:3em;">
</div>



<!-- Text input-->
<div class="input-group">
  <label for="total"></label>  
  <input id="total" name="total" required="" placeholder="Enter total number of questions" type="number">
</div>

<!-- Text input-->
<div class="input-group">
  <label for="right"></label>  
  <input id="right" name="right" required="" placeholder="Enter marks on right answer" min="0" type="number">
</div>

<!-- Text input-->
<div class="input-group">
  <label for="wrong"></label>  
  <input id="wrong" name="wrong" required="" placeholder="Enter minus marks on wrong answer without sign" min="0" type="number">
</div>

<!-- Text input-->
<div class="input-group">
  <label  for="time"></label>  
  <input id="time" name="time" required="" placeholder="Enter time limit for test in minute" min="1" type="number">
</div>


    <button type="submit">Submit</button>


</form>';



}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 

<form name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST" style="margin-top:20em;"><h2>Enter Question Dttetails</h2>';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '
<b>Question number&nbsp;'.$i.'&nbsp;:</><br />
<!-- Text input-->
<div class="input-group">
  <label for="qns'.$i.' "></label>  
  <textarea rows="3" cols="27" name="qns'.$i.'" class="form-control" required="" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>

</div>
<!-- Text input-->
<div class="input-group">
  <label for="'.$i.'1"></label>  
  <input id="'.$i.'1" name="'.$i.'1" required="" placeholder="Enter option a" type="text">
</div>

<!-- Text input-->
<div class="input-group">
  <label for="'.$i.'2"></label>  
  <input id="'.$i.'2" name="'.$i.'2" required="" placeholder="Enter option b" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="input-group">
  <label  for="'.$i.'3"></label>  
  <input id="'.$i.'3" name="'.$i.'3" required="" placeholder="Enter option c" type="text">
</div>
<!-- Text input-->
<div class="input-group">
  <label  for="'.$i.'4"></label>  
  <input id="'.$i.'4" name="'.$i.'4" required="" placeholder="Enter option d" type="text">
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '
        <button type="submit">Submit</button>


</form></div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==5) {

include_once 'config.php';

echo '<span style="float:right;margin:10em;margin-bottom:2em; margin-right:1em;color:orange;
text-decoration:none;font-size:20px;position:abolute;">
&nbsp;Hello, 
<a href="#" style="text-decoration:none;">'.$username.'</a>&nbsp;|||&nbsp;
<a href="logout.php" style="text-decoration:none;">&nbsp;Signout</a>
</span>';

$result = mysqli_query($db,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<table>
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" style="margin:0px;background:red;color:#fff;padding:5px;text-decoration:none;"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>


<!--container closed-->

</body>
</html>
