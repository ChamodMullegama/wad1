<?php
require '../Db/connection.php';
session_start();

if (isset($_POST['delete_product'])) {

    $id = $_POST['id'];
    $database = new connection();
    $conn = $database->getConnection();

    try {
        $delete_sql = "DELETE FROM gallery WHERE id = :id";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $_SESSION['success'] = 'Gallery deleted successfully';
        header('Location: manage_gallery.php');
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    header('Location: manage_gallery.php');
    exit();
}


?>