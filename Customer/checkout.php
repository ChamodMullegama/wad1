<?php
include './customer_home.php';
include '../Db/connection.php';

$database = new connection();

try {
    $conn = $database->getConnection();
    if (!isset($_SESSION)) {
        session_start();
    }
    $select_sql = "SELECT * FROM cart WHERE `customer_name` = :customer_name";
    $stmt = $conn->prepare($select_sql);
    $stmt->bindParam(':customer_name', $_SESSION['customer_name']);
    $stmt->execute();
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total_amount = 0;
    foreach ($cart_items as $cart) {
        $product_id = $cart['product_id'];
        $product_query = "SELECT * FROM product WHERE product_id = :product_id";
        $product_stmt = $conn->prepare($product_query);
        $product_stmt->bindParam(':product_id', $product_id);
        $product_stmt->execute();
        $product = $product_stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $subtotal = $cart['quantity'] * $product['Product_price'];
            $total_amount += $subtotal;
        }
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: gray;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border: 1px solid black;
            background-color: gray;
        }

        th {
            background-color: #fac031;
            color: black;
        }

        .checkout_img {
            width: 80px;
            height: auto;
        }

        .total-row {
            font-weight: bold;
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: gray;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: white;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="tel"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container input[type="submit"] {
            margin-top: 30px;
            background-color: #fac031;
            width: 25%;
            color: black;
            border: none;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #b48307;
        }


        .login-status-message-error {
            color: #ff5555;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            background-color: #ffebee;
            transition: opacity 0.3s ease;
        }

        .login-status-message-success {
            font-weight: 300;
            color: #33cc33;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f0fff0;
            transition: opacity 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $cart) : ?>
                    <?php
                    $product_id = $cart['product_id'];
                    $product_query = "SELECT * FROM product WHERE product_id = :product_id";
                    $product_stmt = $conn->prepare($product_query);
                    $product_stmt->bindParam(':product_id', $product_id);
                    $product_stmt->execute();
                    $product = $product_stmt->fetch(PDO::FETCH_ASSOC);

                    if ($product) {
                        $subtotal = $cart['quantity'] * $product['Product_price'];
                    ?>
                        <tr>
                            <td><?php echo $product['Product_name']; ?></td>
                            <td><img src="<?php echo $product['Product_image']; ?>" alt="Product Image" class="checkout_img"></td>
                            <td><?php echo $cart['quantity']; ?></td>
                            <td>Rs.<?php echo $product['Product_price']; ?>.00</td>
                            <td>Rs.<?php echo number_format($subtotal, 2); ?></td>
                        </tr>
                    <?php } ?>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td colspan="4" align="right"><strong>Total:</strong></td>
                    <td><strong>Rs.<?php echo number_format($total_amount, 2); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <div class="form-container">
            <form method="post" action="payment_process.php" class="customer-info">
                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div class="login-status-message-success">' . $_SESSION['success'] . '</div>';
                    unset($_SESSION['success']);
                    session_destroy();
                }
                ?>
                <label for="customer_name">Name:</label>
                <input type="text" id="customer_name" name="customer_name" required>

                <label for="customer_email">Email:</label>
                <input type="email" id="customer_email" name="customer_email" required>

                <label for="customer_phone">Phone Number:</label>
                <input type="tel" id="customer_phone" name="customer_phone" required>

                <label for="customer_address">Address:</label>
                <input type="text" id="customer_address" name="customer_address" required>

                <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
                <input type="submit" value="Pay" name="submit">
            </form>
        </div>
    </div>

    <?php
    include '../footer.php';
    ?>
</body>

</html>