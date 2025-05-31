<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) 
    && $_GET['comment_id']) {

    $id = $_GET['comment_id'];

    include_once("data/comment.php");
	include_once("../db_conn.php");
	$res = deleteCommentById($conn, $id);
        if ($res) {
            $sm = "Successfully deleted!";
            header("Location: comment.php?success=$sm");
            exit;
        }else {
            $em = "Error occurred: Failed to delete post!";
            header("Location: comment.php?error=$em");
            exit;
        }

}else {
	header("Location: ../admin-login.php");
	exit;
} ?>