<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

    if(isset($_POST['cpass']) && 
        isset($_POST['new_pass']) &&
        isset($_POST['cnew_pass'])){
        
        include "../../db_conn.php";
        $cpass = $_POST['cpass'];
        $new_pass = $_POST['new_pass'];
        $cnew_pass = $_POST['cnew_pass'];
        $id = $_SESSION['admin_id'];

        if (empty($cpass)) {
            $em = "Current Password is required.";
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        }else if(empty($new_pass)) {
            $em = "New Password is required.";
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        }else if(empty($cnew_pass)) {
            $em = "Password must be the same.";
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        }else if($cnew_pass != $new_pass) {
            $em = "Passwords did not match.";
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        }
        
        $sql = "SELECT password FROM admin WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        $password = $stmt->fetch();

        echo $password;

        // if(password_verify($cpass, $new_pass)) {
        //     $em = "Passwords did not match.";
        //     header("Location: ../profile.php?perror=$em#cpassword");
        //     exit;
        // }

        // if ($res) {
        //     $_SESSION['username'] = $username;
        //     $sm = "Successfully edited!";
        //     header("Location: ../profile.php?psuccess=$sm#cpassword");
        //     exit;
        // }else {
        //     $em = "Unknown error occurred.";
        //     header("Location: ../profile.php?perror=$em#cpassword");
        //     exit;
        // }

    }else {
        header("Location: ../profile.php");
	    exit;
    }

}else {
	header("Location: ../admin-login.php");
    //echo "test!!";
	exit;
} ?>