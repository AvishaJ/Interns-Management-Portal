<?php
include_once('conn.php');

if(isset($_POST["submit"]))
{
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$experience=$_POST["experience"];

$file = $_FILES['resume'];
$file_name = $file['name'];
$file_type = $file ['type'];
$file_size = $file ['size'];
$file_path = $file ['tmp_name'];
if($file_name!="" && ($file_type="pdf") && $file_size<=614400)

if(move_uploaded_file($file_path,'upload/'.$file_name))

$sql=mysqli_query($conn,"insert into interns(name,email,ph,age,gender,exp,resume) values('$name','$email','$phone','$age','$gender','$experience','$file_name')");
if($sql)
    {
	    echo "<script>alert('Successfully Registered.');</script>";
    }

     //Trigger Email
   
    $path = 'upload/' . $_FILES["resume"]["name"];
    move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
    $message = '

    Dear Interviewer, A new application for internship has been submitted by '. $_POST["name"] .' Details are shown in table below anlong with resume attached at bottom of email. Kindly open your portal to schedule an interview if you are intrested.

    Admins Portal: 
    
		<h3 align="center">Applicant Details</h3>
		<table border="0.2" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td width="30%">Name</td>
				<td width="70%">' . $_POST["name"] . '</td>
			</tr>
			<tr>
				<td width="30%">Address</td>
				<td width="70%">' . $_POST["email"] . '</td>
			</tr>
			<tr>
				<td width="30%">Email Address</td>
				<td width="70%">' . $_POST["ph"] . '</td>
			</tr>
			<tr>
				<td width="30%">Age</td>
				<td width="70%">' . $_POST["age"] . '</td>
			</tr>
            <tr>
				<td width="30%">Age</td>
				<td width="70%">' . $_POST["gender"] . '</td>
			</tr>
			<tr>
				<td width="30%">Gender</td>
				<td width="70%">' . $_POST["exp"] . '</td>
			</tr>
			
		</table>
	';

    require 'class/class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();                                //Sets Mailer to send message using SMTP

// ADD YOUR DETAILS HERE

    $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '465';                                //Sets the default SMTP server port
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'forsendingemails814@gmail.com';                    //Sets SMTP username
    $mail->Password = 'NehalJayesh@80';                    //Sets SMTP password
    $mail->SMTPSecure = 'ssl';                            //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = 'forsendingemails814@gmail.com';                    //Sets the From email address for the message
    $mail->FromName = 'Avisha Jain';                //Sets the From name of the message
    $mail->AddAddress('avisha9619@gmail.com', 'Avisha Jain');        //Adds a "To" address

// ADD YOUR DETAILS HERE
    
    $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);                            //Sets message type to HTML
    $mail->AddAttachment($path);                    //Adds an attachment from a path on the filesystem
    $mail->Subject = 'Application for INTERNSHIP';                //Sets the Subject of the message
    $mail->Body = $message;                            //An HTML or plain text message body
    if ($mail->Send())                                //Send an Email. Return true on success or false on error
    {
        $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
        unlink($path);
    } else {
        $message = '<div class="alert alert-danger">There is an Error</div>';
    }

}
?>