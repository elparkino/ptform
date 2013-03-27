<?php
// mail variables
//$recipient = "ahodson@progresstesting.com, jsmith@progresstesting.com, showard@progresstesting.com, act@fcattestmaker.com, laura_bresko@yahoo.com, ";
$recipient = "pjones@progresstesting.com, mateo@progresstesting.com, ";
$subject = "TX Sample Test Request";
$redirect = Trim(stripslashes($_POST['redirect']));
$first_name = Trim(stripslashes($_POST['first_name']));
$last_name = Trim(stripslashes($_POST['last_name']));
$job = Trim(stripslashes($_POST['job_title']));
$school_name = Trim(stripslashes($_POST['school_name']));
$city = Trim(stripslashes($_POST['city_name']));
$state = Trim(stripslashes($_POST['state_name']));
$phone = Trim(stripslashes($_POST['phone_number']));
$comments = Trim(stripslashes($_POST['textarea']));
$email = Trim(stripslashes($_POST['email_name']));
$principal = Trim(stripslashes($_POST['additional_email']));
$colleague = Trim(stripslashes($_POST['additional_email_two']));
$email_from = "From: " . $first_name . " " . $last_name . "<" . $email . ">";
$ip = $_SERVER['REMOTE_ADDR'];
$code = date("mdHms"); 

$headers = "From: " . '"STAAR Test Maker" <staar@STAARtestmaker.com>';

$fileatt = "sampleTests/" . Trim(stripslashes($_POST['sample_test']));
$fileatt_type = "application/pdf";
$fileatt_name = Trim(stripslashes($_POST['sample_test']));
$file = fopen($fileatt,'rb');
$data = fread($file,filesize($fileatt));
fclose($file);

$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

// validation
$validationOK=true;
if (Trim($first_name)=="") $validationOK=false;
if (Trim($school_name)=="") $validationOK=false;
if (Trim($city)=="") $validationOK=false;
if (Trim($state)=="") $validationOK=false;
if (Trim($phone)=="") $validationOK=false;
if (Trim($email)=="") $validationOK=false;


//if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) $validationOK=false;
//if (!$validationOK) {
//	print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
//	exit;
//}

// prepare email body text for admin notice
$Body1 .= "\n";
$Body1 .= "A sample test was requested from STAAR Test Maker.\n";
$Body1 .= "The following information was submitted:\n";
$Body1 .= "----------------------------------------------------\n";
$Body1 .= "Discount Code: ";
$Body1 .= $code;
$Body1 .= "\n";
$Body1 .= "Department: ";
$Body1 .= $fileatt_name;
$Body1 .= "\n";
$Body1 .= "Name: ";
$Body1 .= $first_name;
$Body1 .= "\n";
$Body1 .= "Title: ";
$Body1 .= $job;
$Body1 .= "\n";
$Body1 .= "Company: ";
$Body1 .= $school_name;
$Body1 .= "\n";
$Body1 .= "City: ";
$Body1 .= $city;
$Body1 .= "\n";
$Body1 .= "Telephone: ";
$Body1 .= $phone;
$Body1 .= "\n";
$Body1 .= "Email: ";
$Body1 .= $email;
$Body1 .= "\n";
$Body1 .= "Shared Email One: ";
$Body1 .= $principal;
$Body1 .= "\n";
$Body1 .= "Shared Email Two: ";
$Body1 .= $colleague;
$Body1 .= "\n";
$Body1 .= "\n";
$Body1 .= "Comments: ";
$Body1 .= $comments;
$Body1 .= "\n";
$Body1 .= "IP Address: ";
$Body1 .= $ip;
$Body1 .= "\n";
$Body1 .= "\n----------------------------------------------------\n";
$Body1 .= "Please do not reply to this email!\n";

// mail header
$Body2 = "--{$mime_boundary}\n" . "Content-Type:text/html; charset=us-ascii\n" . "Content-Transfer-Encoding: 7bit\n\n\n";
$Body2 .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">' . "\n";
$Body2 .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
$Body2 .= "\n<html>\n<body>\n";
// image tag
/*$Body2 .= '<img src="http://www.staartestmaker.com/images/STAAR-Test-Maker.png
" style="align:left; padding:0 10px 10px 0; width:361px; height:72px;"><br>';*/
// prepare email body text for the visitor
$Body2 .= "<p>Thank you for your interest in our <b>STAAR Test Maker </b>website.\n";
$Body2 .="  The sample test ";
$Body2 .= $fileatt_name;
$Body2 .= " is attached to this email, with our compliments.</p>\n";
$Body2 .="<p style='color:red'><b>Save $150 for your school with DISCOUNT CODE: $code</b></p>";
$Body2 .="<p><b>STAAR Test Maker</b> is the best choice for teacher and student <b>TESTING SUCCESS!</b></p>\n";
$Body2 .="<ul>";
$Body2 .="<li><b>Create standards-aligned tests in the STAAR format with a few clicks of the mouse</li>\n";
$Body2 .="<li>View reports by student, class, and even district progress by <b>ALL tested STAAR standards</b></li>\n";
$Body2 .="<li>Create color-coded reports with our included Progress Monitoring system.</li>\n";
$Body2 .="<li>Use automated scoring options</li>\n";
$Body2 .="<li>Progress monitoring reports satisfy state and federal reporting requirements under NCLB</li>\n";
$Body2 .="</ul>";
$Body2 .="<center><br><i>Our outstanding features and testing database are a must for every teacher seeking to improve their effectiveness in the classroom!</center>\n";
$Body2 .="<a href='http://www.STAARTestMaker.com/blog/'>Check out our STAAR Test Maker blog, where you can get more info, materials, and ask questions.</a><br/>\n";
$Body2 .="<br><br>Experience <b>STAAR Test Maker</b> with an interactive 30-minute Webinar with a member of our dedicated sales team.\n";
$Body2 .="<br><br>To schedule, contact: jsmith@progresstesting.com or showard@progresstesting.com\n";
$Body2 .="<br><br>For more than 10 years, our company has been at the forefront of the formative assessment movement, providing affordably priced programs that allows every teacher and child to benefit.\n";
$Body2 .="<p>Call us today to find out more: (800)-930-TEST.</p>\n";
$Body2 .="Yours in Education,</font><br/>\n";
$Body2 .="Jonathan Smith<br/>\n";
$Body2 .="Sean Howard<br/>\n";
$Body2 .="(800) 930-TEST (8378)<br/>\n";
$Body2 .="jsmith@progresstesting.com<br/>\n";
$Body2 .="showard@progresstesting.com<br/>\n";
$Body2 .="<a href='http://www.STAARTestMaker.com'>STAARTestMaker.com</a><br/>\n";
$Body2 .="<p>P.S. Low enrollment schools (200 students or fewer), you qualify for a special discount. Call us Today to learn more!</p>\n";
$Body2 .= "<hr>\n<ul>\n";
$Body2 .= "<li><b>Test Requested:</b> ";
$Body2 .= $fileatt_name;
$Body2 .= "</li>\n";
$Body2 .= $ip;
$Body2 .= "</li>\n</ul>\n<hr>\n";
$Body2 .= "<p><b>Please do not reply to this email!</b></p>";
$Body2 .= "\n</body>\n</html>";
$Body2 .= "\n\n\n\n";   
$data = chunk_split(base64_encode($data));
$Body2 .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatt_type};\n" .
" name=\"{$fileatt_name}\"\n" .
"Content-Disposition: attachment; filename=\"{$fileatt_name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}--\n"; 

$headers .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";

// mail header
$Body3 = "--{$mime_boundary}\n" . "Content-Type:text/html; charset=us-ascii\n" . "Content-Transfer-Encoding: 7bit\n\n\n";
$Body3 .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">' . "\n";
$Body3 .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
$Body3 .= "\n<html>\n<body>\n";
// image tag
$Body3 .= '<img src="http://www.staartestmaker.com/images/STAAR-Test-Maker.png
" style="align:left; padding:0 10px 10px 0; width:361px; height:72px;"><br>';
// prepare email body text for the principal
$Body3 .= "Your Teacher: \n";
$Body3 .= $first_name . " " . $last_name;
$Body3 .= "\n<p>has just visited the <b>STAAR Test Maker </b>website.</p>\n";
$Body3 .="<p>They downloaded a sample test for ";
$Body3 .= $fileatt_name;
$Body3 .= " and wanted to share it with you, too. It's attached to this email, with our compliments.</p>\n";
$Body3 .="<p>Please visit our website <a href='http://www.STAARTestMaker.com'>STAARTestMaker.com</a> to learn more about how  <b>STAAR Test Maker</b> can help you and ";
$Body3 .= $first_name . " " . $last_name;
$Body3 .=" meet your school's progress monitoring needs.</p>\n";
$Body3 .="<p><b>STAAR Test Maker </b>is the most effective and affordable way to monitor student progress in your school.</p>\n";
$Body3 .="<ul>";
$Body3 .="<li>Create standards-aligned tests in the STAAR format with a few clicks of the mouse</li>\n";
$Body3 .="<li>View reports by student, class, and even district progress by ALL tested STAAR standards</li>\n";
$Body3 .="<li>Create color-coded reports with our included Progress Monitoring system.</li>\n";
$Body3 .="<li>Use automated scoring options</li>\n";
$Body3 .="<li>Progress monitoring reports satisfy state and federal reporting requirements under NCLB</li>\n";
$Body3 .="</ul>";
$Body3 .="<br><center><p><i>Our outstanding features and testing database are a must for every teacher seeking to improve their effectiveness in the classroom!</p></center>\n";
$Body3 .="<br>Experience <b>STAAR Test Maker</b> with Live Personalized 30-minute web demo with a member of our dedicated sales team.\n";
$Body3 .="<br><br>♦ To schedule, contact: jsmith@progresstesting.com or showard@progresstesting.com\n";
$Body3 .="<br><br>For more than 10 years, our company has been at the forefront of the formative assessment movement, providing affordably priced programs that allows every teacher and child to benefit.\n";
$Body3 .="<p>Call us today to find out more: (800)-930-TEST.</p>\n";
$Body3 .="Yours in Education,</font><br/>\n";
$Body3 .="Jonathan Smith<br/>\n";
$Body3 .="Sean Howard<br/>\n";
$Body3 .="(800) 930-TEST (8378)<br/>\n";
$Body3 .="jsmith@progresstesting.com<br/>\n";
$Body3 .="showard@progresstesting.com<br/>\n";
$Body3 .="<a href='http://www.STAARTestMaker.com'>STAARTestMaker.com</a><br/>\n";
$Body3 .="<p>P.S. Low enrollment schools (200 students or fewer), you qualify for a special discount. Call us Today to learn more!</p>\n";
$Body3 .= "<hr>\n<ul>\n";
$Body3 .= "<li><b>Test Requested:</b> ";
$Body3 .= $fileatt_name;
$Body3 .= "</li>\n";
$Body3 .= $ip;
$Body3 .= "</li>\n</ul>\n<hr>\n";
$Body3 .= "<p><b>Please do not reply to this email!</b></p>";
$Body3 .= "\n</body>\n</html>";
$Body3 .= "\n\n\n\n"; 
$Body3 .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatt_type};\n" .
" name=\"{$fileatt_name}\"\n" .
"Content-Disposition: attachment; filename=\"{$fileatt_name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}--\n"; 

// mail header
$Body4 = "--{$mime_boundary}\n" . "Content-Type:text/html; charset=us-ascii\n" . "Content-Transfer-Encoding: 7bit\n\n\n";
$Body4 .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">' . "\n";
$Body4 .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
$Body4 .= "\n<html>\n<body>\n";
// image tag
$Body4 .= '<img src="http://www.staartestmaker.com/images/STAAR-Test-Maker.png
" style="align:left; padding:0 10px 10px 0; width:361px; height:72px;"><br><br>';
// prepare email body text for the colleague
$Body4 .= "Your Colleague: \n";
$Body4 .= $first_name . " " . $last_name;
$Body4 .= "\n<p>has just visited the <a href='http://www.STAARTestMaker.com'>STAAR Test Maker</a> website.</p>\n";
$Body4 .="<p>They downloaded a sample test for ";
$Body4 .= $fileatt_name;
$Body4 .= " and wanted to share it with you, too. It's attached to this email, with our compliments.</p>\n";
$Body4 .="<p>Please visit our website <a href='http://www.STAARTestMaker.com'>STAARTestMaker.com</a> to learn more about how <b>FCAT Test Maker PRO</b> can help you.</p>\n";
$Body4 .="<ul>";
$Body4 .="<li>Create benchmark tests in STAAR format with a few clicks of the mouse</li>\n";
$Body4 .="<li>View reports on student and class progress by <i>ALL</i> tested STAAR Standards</li>\n";
$Body4 .="<li>Quickly create reliable benchmark tests with STAAR TestMaker PRO</li>\n";
$Body4 .="<li>Create color-coded reports</li>\n";
$Body4 .="<li>Use automated scoring options</li>\n";
$Body4 .="<li>Progress monitoring reports satisfy state and federal reporting requirements under NCLB</li>\n";
$Body4 .="</ul>";
$Body4 .="<center><br><i>Our outstanding software and test item bank are a must for every teacher seeking to improve their effectiveness in the classroom!</center>\n";
$Body4 .="<br><br>Experience <b>STAAR Test Maker PRO from the comfort of your office</b> with an interactive 30-minute Webinar.  To schedule one, please contact: jsmith@progresstesting.com\n";
$Body4 .="<br><br>For more than 10 years, our company has been at the forefront of the formative assessment movement, providing affordably priced programs that allows every teacher and child to benefit.\n";
$Body4 .="<p>Call us today to find out more: (800)-930-TEST.</p>\n";
$Body4 .="Yours in Education,</font><br/>\n";
$Body4 .="Jonathan Smith<br/>\n";
$Body4 .="Sean Howard<br/>\n";
$Body4 .="(800) 930-TEST (8378)<br/>\n";
$Body4 .="jsmith@progresstesting.com<br/>\n";
$Body4 .="showard@progresstesting.com<br/>\n";
$Body4 .="<a href='http://www.STAARTestMaker.com'>STAARTestMaker.com</a><br/>\n";
$Body4 .="<p>P.S. Low enrollment schools (200 students or fewer), you qualify for a special discount. Call us Today to learn more!</p>\n";
$Body4 .= "<hr>\n<ul>\n";
$Body4 .= "<li><b>Test Requested:</b> ";
$Body4 .= $fileatt_name;
$Body4 .= "</li>\n";
$Body4 .= $ip;
$Body4 .= "</li>\n</ul>\n<hr>\n";
$Body4 .= "<p><b>Please do not reply to this email!</b></p>";
$Body4 .= "\n</body>\n</html>";
$Body4 .= "\n\n\n\n";  
$Body4 .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatt_type};\n" .
" name=\"{$fileatt_name}\"\n" .
"Content-Disposition: attachment; filename=\"{$fileatt_name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}--\n";

// send email to admin
$success1 = mail($recipient, $subject, $Body1, $email_from);

// send email to visitor
$success2 = mail($email, $subject, $Body2, $headers);

// send email to Additional One
$success3 = mail($additional_email_one, $subject, $Body3, $headers);

// send email to two
$success4 = mail($additional_email_two, $subject, $Body4, $headers);

// redirect to success page or redirect to error page

if ($success1 && $success2){
	print "<meta http-equiv=\"refresh\" content=\"0;URL=sent.html\">";
}
//else{
//	print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
//}
?>