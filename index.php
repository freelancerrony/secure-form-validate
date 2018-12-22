<?php include 'header.php'; ?>

<?php
 $nameErr = $emailErr = $websiteErr = $msgErr = $genderErr = "";
$name = $email = $website = $msg = $gender = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (empty($_POST['name'])) {
		$nameErr = "Name must not be empty!!";
	}else{
		$name    = Validation($_POST['name']);
		// check if name only contains letters & whitespace
		if (!preg_match("/^[a-zA-Z]*$/", $name)) {
			$nameErr = "only letters and white space allowed";
		}
	}if (empty($_POST['email'])) {
		$emailErr = "Email must not be empty!!";
	}else{
		$email   = Validation($_POST['email']);
		//check email address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}if (empty($_POST['website'])) {
		$websiteErr = "Website must not be empty!!";
	}else{
		$website = Validation($_POST['website']);
		// check if URL address syntex is valid (this regular expression also allows dashes in the URL)
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
          $websiteErr = "Invalid URL";}
	}if (empty($_POST['msg'])) {
		$msgErr = "Message must not be emtpy!!";
	}else{
		$msg     = Validation($_POST['msg']);
	}if (empty($_POST['gender'])) {
		$genderErr = "Gender Must not be empty!!";
	}else{
		$gender  = Validation($_POST['gender']);
	}
	
}

function Validation($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}





?>
<?php 
echo "Name: ".$name;
echo "<br/>";
echo "Email: ".$email;
echo "<br/>";

echo "Webiste: ".$website;
echo "<br/>";

echo "Message: ".$msg;
echo "<br/>";

echo "Gender: ".$gender;
echo "<br/>";

 ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
<table>
	<tr>
		<td>Name:</td>
		<td>
			<input type="text" name="name" placeholder="your name..." value="<?php echo $name; ?>">
			<?php if ($nameErr) {echo "<span style='color:red;'>$nameErr</span>";} ?>
	    </td>
	</tr>
	<tr>
		<td>Email:</td>
		<td>
			<input type="text" name="email" placeholder="your email..." value="<?php echo $email; ?>">
		<?php if ($emailErr) {echo "<span style='color:red;'>$emailErr</span>";} ?>
	    </td>
	</tr>
	<tr>
		<td>Website:</td>
		<td>
			<input type="text" name="website" placeholder="your website..." value="<?php echo $website; ?>">
			<?php if ($websiteErr) {echo "<span style='color:red;'>$websiteErr</span>";} ?>
	    </td>
	</tr>
	<tr>
		<td>Message:</td>
		<td>
			<textarea name="msg" id="" placeholder="put your message" cols="22" rows="4"></textarea>
			<?php if ($msgErr) {echo "<span style='color:red;'>$msgErr</span>";} ?>
		</td>
	</tr>
	<tr>
		<td>Gender</td>
		<td>
			<input type="radio" name="gender" value="Female">Female
			<input type="radio" name="gender" value="Male">Male
			<?php if ($genderErr) {echo "<span style='color:red;'>$genderErr</span>";} ?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Submit"><td>
	</tr>
</table>
</form>















		
<?php include 'footer.php' ?>	