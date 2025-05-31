<?php
include 'connect.php';
include 'header.php';

echo "<br /><h2>Sign in</h2><br /><br />";

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	echo "You are already signed in, you can <a href='signout.php'>sign out</a> if you want";
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo "<form method='post' action=''>
			Username: <input type='text' name='user_name' /><br />
			Password: <input type='password' name='user_pass'><br />
			<input type='submit' value='Sign in' />
		</form>";
	}
	else
	{
		$errors = array();
		
		if(!isset($_POST['user_name']))
		{
			$errors[] = 'Username field cannot be empty';
		}
		
		if(!isset($_POST['user_pass']))
		{
			$errors[] = 'Incorrect password';
		}
		
		if(!empty($errors))
		{
			echo 'Some things went wrong';
			echo '<ul>';
			foreach($errors as $key => $value)
			{
				echo '<li>' . $value . '</li>';
			}
			echo '</ul>';
		}
		else
		{
			$sql = "SELECT
						user_id,
						user_name,
						user_level
					FROM
						users
					WHERE
						user_name = '". mysql_real_escape_string($_POST['user_name']) ."'
					AND
						user_pass = '". sha1($_POST['user_pass']) ."'";
						
			$result = mysql_query($sql);
			if(!$result)
			{
				echo 'Some things went wrong';
			}
			else
			{
				if(mysql_num_rows($result) == 0)
				{
					echo 'wrong user/password combination ';
				}
				else
				{
					$_SESSION['signed_in'] = true;
					
					while($row = mysql_fetch_assoc($result))
					{
						$_SESSION['user_id']	= $row['user_id'];
						$_SESSION['user_name']	= $row['user_name'];
						$_SESSION['user_level']	= $row['user_level'];
					}
					
					echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to Home';
				}
			}
		}
	}
}

echo '</div>';
include 'footer.php';
?>