<?php

// Get All Users
function getAll($conn) {
    $sql = "SELECT id, fname, username FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}



// Delete By ID
function deleteById($conn, $user_id) {
    $sql = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$user_id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}