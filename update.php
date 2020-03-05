<?php
require 'config.php';
session_start();
$username=$_SESSION['username'];


//remove quiz
if(@$_GET['q']== 'rmquiz') {
$eid=@$_GET['eid'];
$result = mysqli_query($db,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['qid'];
$r1 = mysqli_query($db,"DELETE FROM options WHERE qid='$qid'") or die('Error');
$r2 = mysqli_query($db,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
}
$r3 = mysqli_query($db,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($db,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($db,"DELETE FROM history WHERE eid='$eid' ") or die('Error');

header("location:dash.php?q=5");
}




//add quiz
if(@$_GET['q']== 'addquiz') {
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$total = $_POST['total'];
$sahi = $_POST['right'];
$wrong = $_POST['wrong'];
$time = $_POST['time'];
$tag = $_POST['tag'];
$desc = $_POST['desc'];
$id=uniqid();
$q3=mysqli_query($db,"INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");

header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}



//add question
if(@$_GET['q']== 'addqns') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];
$ch=@$_GET['ch'];

for($i=1;$i<=$n;$i++)
 {
 $qid=uniqid();
 $qns=$_POST['qns'.$i];
$q3=mysqli_query($db,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=mysqli_query($db,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($db,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($db,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($db,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=mysqli_query($db,"INSERT INTO answer VALUES  ('$qid','$ansid')");

 }
header("location:dash.php?q=0");
}


//quiz start
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$ans=$_POST['ans'];
$qid=@$_GET['qid'];
$q=mysqli_query($db,"SELECT * FROM answer WHERE qid='$qid' " );
while($row=mysqli_fetch_array($q) )
{
$ansid=$row['ansid'];
}
if($ans == $ansid)
{
$q=mysqli_query($db,"SELECT * FROM quiz WHERE eid='$eid' " );
while($row=mysqli_fetch_array($q) )
{
$sahi=$row['sahi'];
}
if($sn == 1)
{
$q=mysqli_query($db,"INSERT INTO history VALUES('$username','$eid' ,'0','0','0','0',NOW())")or die('Error');
}
$q=mysqli_query($db,"SELECT * FROM history WHERE eid='$eid' AND username='$username' ")or die('Error115');

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$r=$row['sahi'];
}
$r++;
$s=$s+$sahi;
$q=mysqli_query($db,"UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'")or die('Error124');

} 
else
{
$q=mysqli_query($db,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');

while($row=mysqli_fetch_array($q) )
{
$wrong=$row['wrong'];
}
if($sn == 1)
{
$q=mysqli_query($db,"INSERT INTO history VALUES('$username','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
}
$q=mysqli_query($db,"SELECT * FROM history WHERE eid='$eid' AND username='$username' " )or die('Error139');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
}
$w++;
$s=$s-$wrong;
$q=mysqli_query($db,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  username = '$username' AND eid = '$eid'")or die('Error147');
}
if($sn != $total)
{
$sn++;
header("location:test.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
}
else if( $_SESSION['key']!='sunny7785068889')
{
$q=mysqli_query($db,"SELECT score FROM history WHERE eid='$eid' AND username='$username'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($db,"SELECT * FROM rank WHERE username='$username'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{
	$per=($r/$sn)*100;

	if ($per>50) {
		# code...
		$rec=$per;
		$q2=mysqli_query($db,"INSERT INTO rank (`username`,`score`,`rec`,`time`) VALUES('$username','$s','$rec',NOW())")or die('Error165');

	}

}


else
{
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$s+$sun;//accumulate total score
$per=($r/$sn)*100;
$rec=$per;
$q=mysqli_query($db,"UPDATE `rank` SET `score`=$sun,`rec`=$rec ,time=NOW() WHERE username= '$username'")or die('Error174');

}
header("location:test.php?q=result&eid=$eid");
}
else
{
header("location:test.php?q=result&eid=$eid");
}
}

//restart quiz
if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
$eid=@$_GET['eid'];
$n=@$_GET['n'];
$t=@$_GET['t'];
$q=mysqli_query($db,"SELECT score FROM history WHERE eid='$eid' AND username='$username'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($db,"DELETE FROM `history` WHERE eid='$eid' AND username='$username' " )or die('Error184');
$q=mysqli_query($db,"SELECT * FROM rank WHERE username='$username'" )or die('Error161');
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$sun-$s;
$q=mysqli_query($db,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'")or die('Error174');
header("location:test.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
}

?>



