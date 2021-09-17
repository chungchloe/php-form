<?php
	if(isset($_POST['submit']))
	{		
        //First Name
		if(strlen($_POST['firstname']) > 1)
		{
			$firstname = $_POST['firstname'];
		}
		else
		{
			$errors['firstname'] = "Please enter in a full name";
		}
        //Last Name
		if(strlen($_POST['lastname']) > 1)
		{
			$lastname = $_POST['lastname'];
		}
		else
		{
			$errors['lastname'] = "Please enter in a full name";
		}
		
		//Email
		if(strlen($_POST['email']) > 1)
		{
			$email = $_POST['email'];
	
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$email = $email;
			}
			else
			{
				$errors['email'] = "Please enter in a valid email address";
			}
		}
		else
		{
			$errors['email'] = "Please enter in an email address";
		}
		
		//Phone
		if(strlen($_POST['phone']) > 1)
		{
			$phone = $_POST['phone'];
		}
        
		//Input
        if(strlen($_POST['firstcomp']) > 1)
		{
			$firstcomp = $_POST['firstcomp'];
		}
        if(strlen($_POST['secondcomp']) > 1)
		{
			$secondcomp = $_POST['secondcomp'];
		}
        if(strlen($_POST['thirdcomp']) > 1)
		{
			$thirdcomp = $_POST['thirdcomp'];
		}
        if(strlen($_POST['firstfave']) > 1)
		{
			$firstfave = $_POST['firstfave'];
		}
        if(strlen($_POST['secondfave']) > 1)
		{
			$secondfave = $_POST['secondfave'];
		}
        if(strlen($_POST['thirdfave']) > 1)
		{
			$thirdfave = $_POST['thirdfave'];
		}
        if(strlen($_POST['budget']) > 1)
		{
			$budget = $_POST['budget'];
		}
        
        //Textarea
        if(strlen($_POST['company']) > 1)
		{
			$company = $_POST['company'];
		}
        if(strlen($_POST['target']) > 1)
		{
			$target = $_POST['target'];
		}
        if(strlen($_POST['mood']) > 1)
		{
			$mood = $_POST['mood'];
		}
        if(strlen($_POST['content']) > 1)
		{
			$content = $_POST['content'];
		}
        if(strlen($_POST['sections']) > 1)
		{
			$sections = $_POST['sections'];
		}
        if(strlen($_POST['keywords']) > 1)
		{
			$keywords = $_POST['keywords'];
		}
        if(strlen($_POST['platforms']) > 1)
		{
			$platforms = $_POST['platforms'];
		}
        
        //Select
        if(isset($_POST['deadline_year']))
        {
            $deadline_year = $_POST['deadline_year'];  //  Displaying Selected Value
        }
        if(isset($_POST['deadline_month']))
        {
            $deadline_month = $_POST['deadline_month'];  //  Displaying Selected Value
        }
        
        //radio
        $domain = $_POST['domain'];
        $host = $_POST['host'];
        $ip = $_POST['ip'];
        $re = $_POST['re'];
        $feed = $_POST ['feed'];
        $share = $_POST ['share'];
        
        //checkbox
        if (isset($_POST['ecommerce']))
        {
            $ecommerce = 'ecommerce-add';
        }
        else {
            $ecommerce = 'no-ecommerce';
        }
        if (isset($_POST['membership']))
        {
            $membership = 'membership-add';
        }
        else {
            $membership = 'no-membership';
        }
        
        //Error, Mail
		if($errors < 1)
		{
			//echo 'no errors';
			include("includes/class.phpmailer.php");
			
			$mail = new PHPMailer;
			
			$mail->setFrom($email, $firstname);
			$mail->addAddress("chloeyochung@gmail.com");     // Add a recipient
			
			if (isset($_POST['info']))
            {
                $mail->addAddress(email);
            }
            
            $mail->addReplyTo($email, $firstname);
            
            $mail->isHTML(true); // Set email format to HTML
			
			$mail->Subject = 'New message from ' . $firstname;
			
			$mail->Body    = "
			
				<h2>Message Details</h2>				
				<p>Their Name:  ". $firstname . " " . $lastname ." </p>
				<p>Their Email: {$email} </p>
				<p>Their Phone Number:  {$phone} </p>
				<p>Re-Design: {$re} </p>
                <p>Company Description: {$company} </p>
                <p>Target Market: {$target} </p>
                <p>Competing Site1: {$firstcomp} </p>
                <p>Competing Site2: {$secondcomp} </p>
                <p>Competing Site3: {$thirdcomp} </p>
                <p>Favourite Sit1: {$firstfave} </p>
                <p>Favourite Site2: {$secondfave} </p>
                <p>Favourite Site3: {$thirdfave} </p>
                <p>Mood: {$mood} </p>
                <p>Content: {$content} </p>
                <p>Additional Content: ". $ecommerce . " ". $membership ." </p>
                <p>Deadline Year: {$deadline_year} </p>
                <p>Deadline Year: {$deadline_month} </p>
                <p>Budget: {$budget} </p>
                <p>Maintenance: {$sections} </p>
                <p>Domain and Hosting: {$domain} </p>
                <p>Domain and Hosting2: {$host} </p>
                <p>Domain and Hosting3: {$ip} </p>
                <p>Domain and Hosting4: {$sitename} </p>
                <p>Keywords: {$keywords} </p>
                <p>Social Media: {$feed} </p>
                <p>Social Media: {$share} </p>
                <p>Platforms: {$platforms} </p>
			
			";
			
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} 
			else 
			{
			    $success = '<p class="success">Thanks ' .$firstname. ', Your form has been sent successfully. We will be in touch shortly.</p>';
			}
		}
		else
        {
			$errorMsg = '<p class="error">Please fill form fields outlined with red before submitting</p>';
		}
		
	}

?>
<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <title>Website Questionnaire</title>
            
            <!-- Adds CSS3 Media Queries to older browsers such as IE5+ -->
            <script src="js/css3-mediaqueries.js"></script>
            
            <!--Stylesheet-->
            <link rel="stylesheet" href="css/reset.css">
            <link rel="stylesheet" href="css/style.css">
            
            <!--Icon-->
            <link rel="icon" href="http://chloeychung.com/images/logo-small.png">
            
        </head>
    
    <body>
        
        <h1>Website Questionnaire</h1>
        
        <div id="wrapper">        	
        
        <?= $success; ?>
        <?= $errorMsg; ?>
            
        	<!--Form Start-->
            <form novalidate action="index.php" method="post" id="register">
            <fieldset>
                <legend>Website Questionnaire</legend>                                
                
                <ul>
                    <!--Basic Info-->
                        <h2>Basic Information</h2>
                            <h3>How may we contact you?</h3>                        
                        <li>
                        	<label for="firstname">First Name</label>
                        	<input type="text" name="firstname" id="firstname" tabindex="100" placeholder="First Name" value="<?php echo $firstname; ?>" class="<?php if((isset($_POST['submit']))&&(strlen($_POST['firstname'])<2)) {echo 'error';} ?>">
                        </li>
                        <li>
                        	<label for="lastname">Last Name</label>
                        	<input type="text" name="lastname" id="lastname" tabindex="150" placeholder="Last Name" value="<?php echo $lastname; ?>" class="<?php if((isset($_POST['submit']))&&(strlen($_POST['lastname'])<2)) {echo 'error';} ?>">
                        </li>
                        <li>
                        	<label for="email">Email Address</label>
                        	<input type="email" name="email" id="email" tabindex="200" placeholder="Valid Email Address" value="<?php echo $email; ?>" class="<?php if(((isset($_POST['submit']))&&(strlen($_POST['email'])<2)) || (isset($_POST['submit'])) && (!filter_var($email, FILTER_VALIDATE_EMAIL))) {echo 'error';} ?>">
                        </li>
                        <li>
                        	<label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" tabindex="250" placeholder="Work/Company Phone Number" value="<?php echo $phone; ?>">
                        </li>                       
                    <!--Re-Design?-->
                    <li class="full_width">                    
                    	<h2>Re-Design?</h2>                        
                    	<h3>Is this site a re-deisgn of an existing site?</h3>
                        	<input type="radio" name="re" id="yesre" tabindex="300" value="yes" <?php $domain == 'yes' ? 'checked':'' ;?>><label for="re">Yes</label>
                            <input type="radio" name="re" id="nore" tabindex="350" value="no" <?php $domain == 'no' ? 'checked':'' ;?>><label for="re">No</label>
                    </li>
                    <!--Company Description-->
                     <li class="full_width">
                        <h2><label for="company">Company Description</label></h2>
                        <textarea id="company" name="company" tabindex="400" placeholder="Please give a brief overview of the company."><?php echo $company; ?></textarea>
                    </li>
                    <!--Target Market-->
                    <li class="full_width">
                        <h2><label for="target">Target Market</label></h2>
                        <textarea id="target" name="target" tabindex="450" placeholder="Who will visit this site? Describe your potential clients. (i.e. young, old, demographics, etc.)"><?php echo $target; ?></textarea>
                    </li>
                    <!--Competing Sites-->
                    <li class="full_width">
                        <h2>Websites of Your Closest Competition</h2>
                        <h3>Please include at least three links of sites of your competition. What would you like to do differently or better?</h3>                  
                        	<label for="firstcomp">1.</label>
                        	<input type="text" name="firstcomp" id="firstcomp" tabindex="500" placeholder="sites of your competition" value="<?php echo $firstcomp; ?>">
                        	<label for="secondcomp">2.</label>
                        	<input type="text" name="secondcomp" id="secondcomp" tabindex="550" placeholder="sites of your competition" value="<?php echo $secondcomp; ?>">
                        	<label for="thirdcomp">3.</label>
                        	<input type="text" name="thirdcomp" id="thirdcomp" tabindex="600" placeholder="sites of your competition" value="<?php echo $thirdcomp; ?>">
                    </li>
					<!--Liked Sites-->
                    <li class="full_width">
                        <h2>Favourite Sites</h2>
                    	<h3>Please include at least 3 links of sites of your competition. What do you like and don't like about them? What would you like to do differently or better?</h3>                  
                        	<label for="firstfave" class="fave">1.</label>
                        	<input type="text" name="firstfave" id="firstfave" tabindex="610" placeholder="sites you like" value="<?php echo $firstfave; ?>">
                        	<label for="secondfave" class="comp">2.</label>
                        	<input type="text" name="secondfave" id="secondfave" tabindex="620" placeholder="sites you like" value="<?php echo $secondfave; ?>">
                        	<label for="thirdfave" class="comp">3.</label>
                        	<input type="text" name="thirdfave" id="thirdfave" tabindex="630" placeholder="sites you like" value="<?php echo $thirdfave; ?>">
                    </li>              
                    <!--Mood-->
                    <li class="full_width">
                        <h2><label for="mood">Mood</label></h2>
                        <h3>Do you already have an idea of what you want your website to look like - could you provide images/examples?</h3>
                        <textarea id="mood" name="mood" tabindex="650" placeholder="Write keywords or include links for images"><?php echo $mood; ?></textarea>
                     </li>
                    <!--Content-->
                    <li class="full_width">                    
                    	<h2>Content</h2>                        
                    	<h3>What pages would you like on your site?</h3>
                        	<textarea id="content" name="content" tabindex="700" placeholder="Please indicate which pages you would like to have. (i.e. Home, Contact Us, etc.)"><?php echo $content; ?></textarea>
                    </li>
                    <!--Additions-->
                    <li class="full_width">                    
                    	<h2>Additional Content</h2>                        
                    	<h3>For your site, are you going to need..</h3>
                        	<input type="checkbox" name="ecommerce" id="ecommerce" tabindex="750" value="Ecommerce" <?php $add == 'Ecommerce' ? 'checked':'' ;?>><label>Ecommerce (to sell products)</label>
                            <input type="checkbox" name="membership" id="membership" tabindex="800" value="membership" value="membership" <?php $add == 'membership' ? 'checked':'' ;?>><label>Membership of any kind</label>
                    </li>
                    <!--Deadline-->
                    <li>    
                        <h2><label for="deadline">Deadline</label></h2>
                         <select id="deadline_year" name="deadline_year" tabindex="850">
                            <option value="2015" <?php $deadline_year == '2015' ? 'checked':'' ;?>>2015</option>
                            <option value="2016" <?php $deadline_year == '2016' ? 'checked':'' ;?>>2016</option>
                            <option value="2017" <?php $deadline_year == '2017' ? 'checked':'' ;?>>2017</option>
                            <option value="2018" <?php $deadline_year == '2018' ? 'checked':'' ;?>>2018</option>
                            <option value="Year" <?php $deadline_year == 'Year' ? 'checked':'' ;?> selected>Year</option>
                        </select>
                         <select id="deadline_month" name="deadline_month" tabindex="900">
                            <option value="Jan" <?php $deadline_month == 'Jan' ? 'checked':'' ;?>>January</option>
                            <option value="Feb" <?php $deadline_month == 'Feb' ? 'checked':'' ;?>>February</option>
                            <option value="March" <?php $deadline_month == 'March' ? 'checked':'' ;?>>March</option>
                            <option value="April" <?php $deadline_month == 'April' ? 'checked':'' ;?>>April</option>
                            <option value="May" <?php $deadline_month == 'May' ? 'checked':'' ;?>>May</option>
                            <option value="June" <?php $deadline_month == 'June' ? 'checked':'' ;?>>June</option>
                            <option value="Juy" <?php $deadline_month == 'July' ? 'checked':'' ;?>>July</option>
                            <option value="Aug" <?php $deadline_month == 'Aug' ? 'checked':'' ;?>>August</option>
                            <option value="Sep" <?php $deadline_month == 'Sep' ? 'checked':'' ;?>>September</option>
                            <option value="Oct" <?php $deadline_month == 'Oct' ? 'checked':'' ;?>>Octoboer</option>
                            <option value="Nov" <?php $deadline_month == 'Nov' ? 'checked':'' ;?>>November</option>
                            <option value="Dec" <?php $deadline_month == 'Dec' ? 'checked':'' ;?>>December</option>
                            <option value="Month" <?php $deadline_month == 'Month' ? 'checked':'' ;?> selected>Month</option>
                        </select> 
                        </li>     
                    <!--Budget-->
                    <li>
                        <h2><label for="budget">Budget</label></h2>
                        <input type="text" id="budget" name="budget" tabindex="950" placeholder="What is your budget?" value="<?php echo $budget; ?>">
                    </li>
                    <!--Maintenacne-->
                    <li class="full_width">                    
                    	<h2>Maintenance</h2>                        
                    	<h3><label for="sections">Will there be sections that need regular updating? Which ones?</label></h3>
                        <textarea id="sectoins" name="sections" tabindex="1000" placeholder="Which sections will need regular updating?"><?php echo $sections; ?></textarea>
                    </li>
                    <!--Domain and Hosting-->
                    <li class="full_width">
                    <h2>Domain and Hosting</h2>
                    <h3>Do you alreday own a domain name? (i.e. www.website.com)</h3>
                        <input type="radio" name="domain" id="yesdomain" tabindex="1500" value="yes" <?php $domain == 'yes' ? 'checked':'' ;?>><label for="domain">Yes</label>
                        <input type="radio" name="domain" id="nodomain" tabindex="2000" value="no" <?php $domain == 'no' ? 'checked':'' ;?>><label for="domain">No</label>
                    <h3>Do you have a hosting account already? (This is where the computer files live.)</h3>
                    	<input type="radio" name="host" id="yeshost" tabindex="2500" value="yes" <?php $host == 'yes' ? 'checked':'' ;?>><label for="host">Yes</label>
                        <input type="radio" name="host" id="nohost" tabindex="3000" value="no" <?php $host == 'no' ? 'checked':'' ;?>><label for="host">No</label>
                    <h3>If yes, do you have the login/IP information?</h3>
                    	<input type="radio" name="ip" id="yesip" tabindex="3500" value="yes" <?php $ip == 'yes' ? 'checked':'' ;?>><label for="ip">Yes</label>
                        <input type="radio" name="ip" id="noip" tabindex="4000" value="no" <?php $ip == 'no' ? 'checked':'' ;?>><label for="ip">No</label>
                    <h3>If no, what names would you like?</h3>
                    	<input type="text" name="sitename" id="sitename" tabindex="4500" placeholder="What would you like your site name to be?" value="<?php echo $sitename; ?>">
                    </li>                   
                    <!--Keywords-->
                    <li class="full_width">
                    	<h2>Search Keywords</h2>
                        <h3><label for="keywords">If you were to search your business on the internet, what words/phrases would you search for?</label></h3>
                        <textarea id="keywords" name="keywords" tabindex="5000" placeholder="What are some examples of search keywords?"><?php echo $keywords; ?></textarea>
                    </li>
                    <!--Social Media-->
                    <li class="full_width">
                    <h2>Social Media</h2>
                    <h3>Would you like to include any links/feeds from social networking sites?</h3>
                        <input type="radio" name="feed" id="yesfeed" tabindex="5500" value="yes" <?php $feed == 'yes' ? 'checked':'' ;?>><label for="feed">Yes</label>
                        <input type="radio" name="feed" id="nofeed" tabindex="6000" value="no" <?php $feed == 'no' ? 'checked':'' ;?>><label for="feed">No</label>
                    <h3>Would you like to include share/like buttons for the social networking pages on your site?</h3>
                        <input type="radio" name="share" id="yesshare" tabindex="6500" value="yes" <?php $share == 'yes' ? 'checked':'' ;?>><label for="share">Yes</label>
                        <input type="radio" name="share" id="noshare" tabindex="7000" value="no" <?php $share == 'no' ? 'checked':'' ;?>><label for="share">No</label>
                    </li>
                    <!--Platforms-->
                    <li class="full_width">
                    <h2>Platforms</h2>
                    <h3>Would you like any specific versions of your site (mobile optimized version, etc.)?</h3>
                    <textarea id="platforms" name="platforms" tabindex="8000" placeholder="If yes, please indicate."><?php echo $platforms; ?></textarea>
                    </li>
                    <!--Info to your email?-->
                    <li class="full_width">
                    <h2>Thank You!</h2>
                    
                    <!--Submit-->
                    <li class="full_width">
                        <input type="submit" name="submit" value="Send" tabindex="10000" id="submit">
                    </li>
                </ul>
            </fieldset>       
            </form>
            
        </div><!--wrapper--> 
        
    </body>
</html>
