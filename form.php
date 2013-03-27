<?php include 'mailer_live.php'?>
<!DOCTYPE html>
<html>

<head>
	<link href="form_style.css" rel="stylesheet" type="text/css">
	<title>This is a form page to be included at staar & FCAT</title>
</head>

<body>
	<div class="wrapper" id="form_container">
		
		<form method="POST" action="<?php htmlentities($_SERVER['PHP_SELF']); ?>">
		<div id="legend" ><span class="required">*</span><p> - Indicates Required Field</p></div>
		<div id="error_top" ><?php echo $errorTop;?></div>
		<formfield class="container" id="sample_select">
			<div class="main_dish" id="sample_pair">
				<h4><span class="required">*</span>Select your Sample Test</h4>
					<div class="item_input" id="selector_box">
						<select name="sample_test">
					<option value="" disable selected>Please Select a test...</option>
                    <option value="STAAR3Math.pdf">STAAR Grade 3 Math Test</option>

                    <option value="STAAR3Reading.pdf">STAAR Grade 3 Reading Test</option>
                    
                    <option value="STAAR3ReadingSpanish.pdf">STAAR Grade 3 Reading Spanish Test</option>
                   
                    <option value="STAAR3MathSpanish.pdf">STAAR Grade 3 Math Spanish Test</option>
                    
                    <option value="STAAR4Math.pdf">STAAR Grade 4 Math Test</option>
                    
                    <option value="STAAR4MathSpanish.pdf">STAAR Grade 4 Math Spanish Test</option>
                    
                    <option value="STAAR4Reading.pdf">STAAR Grade 4 Reading Test</option>
                    
                    <option value="STAAR4ReadingSpanish.pdf">STAAR Grade 4 Reading Spanish Test</option>
                   
                    <option value="STAAR4Writing.pdf">STAAR Grade 4 Writing Test</option>

                    <option value="STAAR5Reading.pdf">STAAR Grade 5 Reading Test</option> 
                    
                    <option value="STAAR5Math.pdf">STAAR Grade 5 Math Test</option>
                    
                    <option value="STAAR5MathSpanish.pdf">STAAR Grade 5 Math Spanish Test</option>
                    
                    <option value="STAAR5Science.pdf">STAAR Grade 5 Science Test</option>
                    
                    <option value="STAAR5ScienceSpanish.pdf">STAAR Grade 5 Science Spanish Test</option>

                    <option value="STAAR6Reading.pdf">STAAR Grade 6 Reading Test</option>
                    
                      <option value="STAAR6Math.pdf">STAAR Grade 6 Math Test</option>

                    <option value="STAAR7Reading.pdf">STAAR Grade 7 Reading Test</option>
                    
                    <option value="STAAR7Writing.pdf">STAAR Grade 7 Writing Test</option>
                    
                     <option value="STAAR7Math.pdf">STAAR Grade 7 Math Test</option>

                    <option value="STAAR8Reading.pdf">STAAR Grade 8 Reading Test</option>
                    
                    <option value="STAAR8Math.pdf">STAAR Grade 8 Math Test</option>
                    
                    <option value="STAAR8Science.pdf">STAAR Grade 8 Science Test</option>
                    
                    <option value="STAAR8SocialST.pdf">STAAR Grade 8 Social Studies Test</option>
                    
                    <option value="STAARalgebra.pdf">STAAR Algebra I</option>
                    
                    <option value="STAARELAIPrompts.pdf">ELA I Sample Prompts</option>
                    
                    <option value="STAARELAIRevising.pdf">ELA I Revising & Editing</option>
                    
                    <option value="STAARReadingELAI.pdf">STAAR Reading ELA I</option>
                    
                    <option value="STAARGeometry.pdf">STAAR Geometry Test</option>
                    
                    <option value="STAARBiologyISample.pdf">STAAR Biology I Test</option>
                    
                    <option value="STAARWorldGeography.pdf">STAAR World Geography</option>
                    
                	<option value="testPrepSystems.html">Do Not Send me a Test</option>
						</select>
					</div>
				</div>	
			</formfield>

			<formfield class="container" id="about_you">
		 	<h4>About You</h4>

			<div class="about_you_section form_item" id="first_item">	
				<span class="label item" id="first_name"><span class="required">*</span>First Name</span>
				<div class="item" id="first_item">
					<input type="text" name="first_name" value="<?php echo htmlspecialchars($firstName);?>">
					<span class="error"><?php echo $nameFirstErr;?></span>
				</div>
			</div>

				<div class="about_you_section form_item" id="last_item">	
					<span class="label item" id="last_name"><span class="required">*</span>Last Name</span> 
					<div class="item" id="last_item">
						<input type="text" name="last_name" value="<?php echo htmlspecialchars($lastName);?>">
						<span class="error"><?php echo $nameLastErr;?></span>
					</div>
				</div>

			<div class="about_you_section form_item" id="title">	
				<span class="label item" id="job_title"><span class="required">*</span>Job Title </span>
				<div class="item" id="job_item">
						<select name="job_title">
							<option disabled selected>Please Select...</option>
							<option value="Teacher">Teacher</option>
							<option value="Principal">Principal</option>
							<option value="Vice Principal">Vice Principal</option>
							<option value="Administrator">Administrator</option>
							<option value="Other">Other</option>
						</select>
						<span class="error"><?php echo $jobTitleErr;?></span>
				</div>
			</div>

				<div class="about_you_section form_item" id="school_item">	
					<span class="label item" id="school_name"><span class="required">*</span>School Name</span> 
					<div class="item" id="school_item">
						<input type="text" name="school_name" value="<?php echo htmlspecialchars($schoolName);?>" placeholder="Full name of the School">
						<span class="error"><?php echo $schoolNameErr;?></span>
					</div>
				</div>

				<div class="about_you_section form_item" id="city_item">	
					<span class="label item" id="city_name"><span class="required">*</span>City</span> 
					<div class="item" id="city_input">
						<input type="text" name="city_name" value="<?php echo htmlspecialchars($city);?>">
						<span class="error"><?php echo $cityErr;?></span>
					</div>
				</div>

				<div class="about_you_section form_item" id="state_item">	
					<span class="label item" id="state_name"><span class="required">*</span>State</span> 
					<div class="item" id="state_input">
						<input type="text" name="state_name" value="<?php echo htmlspecialchars($state);?>">
						<span class="error"><?php echo $cityErr;?></span>
					</div>
				</div>

				<div class="about_you_section form_item" id="textarea_item">	
					<span class="label item" id="question_box">Questions? Comments?</span> 
					<div class="item" id="comment_item">
						<textarea rows="4" cols="50" name="comments" value="<?php echo htmlspecialchars($textarea);?>" placeholder="Have something to say?">
						</textarea>
					</div>
				</div>				

			</formfield>


		<formfield class="container" id="contact_deets">
			<h4>Contact Details</h4>

			<div class="contact_section form_item" id="number_item">
				<span class="label item" id="phone"><span class="required">*</span>Phone Number</span>
				<div>
				<input type="tel" name="phone_number" value="" placeholder="">
				</div>
			</div>

			<div class="contact_section form_item" id="email_item">
					<span class="label item" id="email"><span class="required">*</span>Email</span>
					<div class="item field" id="email_input">
					<input type="text" name="email_name" value="<?php echo htmlspecialchars($email);?>">
						<span class="error"><?php echo htmlspecialchars($emailErr);?></span>
					</div>
			</div>

			<div class="contact_section form_item" id="email_verify">
				<span class="label item" id="email_verify"><span class="required">*</span>Verify Email</span>
				<div class="" id="verify-email">
					<input type="text" name="email_verify" value="<?php echo htmlspecialchars($emailVerify);?>">
						<span class="error"><?php echo htmlspecialchars($emailVerifyErr);?></span>
				</div>

				<input checked id="email-signup" class="contact_section form_item" type="checkbox" name="email_list" value="yes"><span id="email-label" class="label item">Subscribe to our Newsletter? <br />Recieve the latest updates from STAAR Test Maker.</span></input>

			</div>
		</formfield>


		<formfield class="container" id="share_refer">
			<h4>Share This</h4>
			<p>Are you a teacher who would like us to contact your school administrators?  A parent that would like to put us in touch with your school?  Or if you know anyone who would appreciate what we do, please let us know. </p>
			<div class="share_section form_item" id="">
				<span class="label item" id="additional_email">Additional Email</span>
				<div class="item" id="">
					<input type="email" name="additional_email" value="" placeholder="">
				</div>
			</div>

			<div class="share_section form_item" id="">
				<span class="label item" id="additional_email_2">Additional Email</span>
				<div class="item" id="">
					<input type="email" name="additional_email_two" value="" placeholder="">
				</div>	
			</div>
		</formfield>

		<input type="submit" name="submit" value="Submit" id="carl">

</form>

	</div>

</body>
</html>