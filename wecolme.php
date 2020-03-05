<!--home start-->
<?php if(@$_GET['q']==0) {

include_once 'config.php';

echo '<span style="float:right;margin:5em;margin-right:10em;color:orange;background-color:#212529;
text-decoration:none;font-size:54px;position:abolute;">
&nbsp;Welcome, 
<a href="#" style="color:white;">'.$username.'.</a>&nbsp;
</span>

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



}?>