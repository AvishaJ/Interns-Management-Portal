<!doctype html>
<html>
<head>
	<title>Job Application</title>
	<link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body onload="form.reset();">
	<h1>Internship Application</h1><hr>
	<h3>Fill the form below to apply for internship</h3>
	<div id="content">
	<form name="reg" action="mail.php" method="POST" enctype="multipart/form-data">
		<label >Name</label><br>
		<input type="text" name="name" required><br>
		<label>Email</label><br>
		<input type="email" name="email" required><br>
		<label>Phone Number</label><br>
		<input type="text" name="phone" required><br>
		<label>Age</label><br>
		<input type="number" name="age" required><br>
		<label> Gender</label><br>
		<label>Female</label>
		<input type="radio" name="gender" value="female">
		<label>Male</label>
		<input type="radio" name="gender" value="male"><br><br>
		<label>Previous experience</label><br>
		<textarea rows="10" cols="50" name="experience" required></textarea><br>
		<label>Upload Resume</label><br>
		<input type="file" name="resume"><br><br>
		<div id="button">
		<input type="submit" name="submit" value="Submit" id="submit">
	</div>
	</form>
</div>
</body>
</html>