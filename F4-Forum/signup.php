<?php
include 'connect.php';
include 'header.php';

echo "<br /><h2>Create an account</h2><br /><br />";

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	echo "<form style='padding-left: 25px;' method='post' action=''>
		Username: <input style='background-color:#003300; opacity: .4; margin-left: 55px;' type='text' name='user_name' /><br /><br />
		Password: <input style='background-color:#003300; opacity: .4; margin-left: 55px;' type='password' name='user_pass'><br /><br />
		Password again: <input style='background-color:#003300; opacity: .4;' type='password' name='user_pass_check'><br /><br />
		E-mail: <input style='background-color:#003300; opacity: .4; margin-left: 72px;' type='email' name='user_email'><br /><br />
		<input style='background-color:#003300; opacity: .4;' type='submit' value='Create account' /><br /><br />
	</form>";
}
else
{
	$errors = array();
	
	if(isset($_POST['user_name']))
	{
		if(!ctype_alnum($_POST['user_name']))
		{
			$errors[] = 'Username already taken';
		}
		if(strlen($_POST['user_name']) > 30)
		{
			$errors[] = 'Username cannot be longer then 30 characters';
		}
	}
	else
	{
		$errors[] = 'Username cannot be empty';
	}
	
	if(isset($_POST['user_pass']))
	{
		if($_POST['user_pass'] != $_POST['user_pass_check'])
		{
			$errors[] = 'Passwords did not match';
		}
	}
	else
	{
		$errors[] = 'Password cannot be empty';
	}
	
	if(!empty($errors))
	{
		echo "Multiple thing went wrong try again later";
		echo "<ul>";
		foreach($errors as $key => $value)
		{
			echo "<li>" . $value . "</li>";
		}
		echo "</ul>";
	}
	else
	{
		$sql = "INSERT INTO
						users(user_name, user_pass, user_email, user_date, user_level)
					VALUES('". mysql_real_escape_string($_POST['user_name']) ."',
							'". sha1($_POST['user_pass']) ."',
							'". mysql_real_escape_string($_POST['user_email']) ."',
							NOW(),
							0)";
				
		$result = mysql_query($sql);
		if(!$result)
		{
			echo "Something went wrong";
		}
		else
		{
			echo "Succesfully created your account you can now <a href='signin.php'>sign in</a>";
		}
	}
}

echo '</div>';

include 'footer.php';
?>