<?php
require '../Db/connection.php';
session_start();

if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $database = new connection();
    $conn = $database->getConnection();

    try {
        $delete_sql = "DELETE FROM user_admin_staff WHERE user_id = :user_id";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $_SESSION['success'] = 'User deleted successfully';
        header('Location: manage_users.php');
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    header('Location: manage_users.php');
    exit();
}
?>
