<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<!--[if lt IE 9]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]--> 
		
		<style>
			textarea
			{
				width : 100%;
			}
		</style>
	</head>
	
<?php
	if (isset($_POST['login']) && isset($_POST['password'])) {
		if ($_POST['login'] == "me" && $_POST['password'] == "pass") {
?>
		<form method="post" action="import.php">
			<p>
				<input type="radio" name="table" value="articles" id="articles" />
				<label for="articles">Articles</label>
				<input type="radio" name="table" value="photos" id="photos" checked="checked"/>
				<label for="photos">Photos</label>
			</p>
			<p>
				<label for="csv">Place the content of your .csv file here:</label><br />
				<textarea name="csv" id="csv" rows="20"></textarea>
			</p>
			<p><input type="submit" value="Submit" /></p>
		</form>
<?php
		}
		else {
?>
	<p>ACCES DENIED: invalid login/password. Try again</p>
	<form method="post" action="upload.php">
		<p>
			<label for="pseudo">Login</label>: <input type="text" name="login" id="login" required/>
			<label for="password">Password</label>: <input type="password"  name="password" id="password" required/>
			<input type="submit" value="Submit" />
		</p>
	</form>
<?php
		}
	}
	else{
?>
	<form method="post" action="upload.php">
		<p>
			<label for="pseudo">Login</label>: <input type="text" name="login" id="login" required/>
			<label for="password">Password</label>: <input type="password" name="password" id="password" required/>
			<input type="submit" value="Submit" />
		</p>
	</form>
<?php
	}
?>
	
</html>