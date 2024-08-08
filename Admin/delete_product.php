<?php
require '../Db/connection.php';
session_start();

if (isset($_POST['delete_product'])) {


    $product_id = $_POST['product_id'];
    $database = new connection();
    $conn = $database->getConnection();

    try {
        $delete_sql = "DELETE FROM product WHERE Product_id = :product_id";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();

        $_SESSION['success'] = 'dishes deleted successfully';
        header('Location: manage_product.php');
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    header('Location: product_management_page.php');
    exit();
}
?>
