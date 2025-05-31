<?php
session_start();
//include 'connect.php';
require_once 'connect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<p id="intro">ROBCO INDUSTRIES UNIFIED OPERATING SYSTEM<br />COPYRIGHT 2075-2077 ROBCO INDUSTRIES<br />-Server 1-</p>
	<div id="wrapper">
	<div id="menu">
		<a class="item" href="/forum/index.php">Home</a> |
		<a class="item" href="/forum/create_topic.php">Create topic</a> |
		<a class="item" href="/forum/create_cat.php">Create a category</a> |
		
		<div id="userbar">
			<?php
				if(isset($_SESSION['signed_in']))
				{
					echo 'Hello ' . $_SESSION['user_name'] . ' Not you? <a href="logout.php">Log out</a>';
				}
				else
				{
					echo '<a href="signin.php">Sign in</a> or <a href="signup.php">Create an account</a>';
				}
			?>
		</div>
		<div id="content">