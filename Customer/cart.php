<?php
include './customer_home.php';
require '../Db/connection.php';

$database = new connection();

try {
    $conn = $database->getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_item'])) {

        $delete_id = $_POST['delete_item'];

        $delete_sql = "DELETE FROM cart WHERE product_id = :product_id AND `customer_name` = :customer_name";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bindParam(':product_id', $delete_id);
        $delete_stmt->bindParam(':customer_name', $_SESSION['customer_name']);
        $delete_stmt->execute();
    }

    $select_sql = "SELECT * FROM cart WHERE `customer_name` = :customer_name";
    $stmt = $conn->prepare($select_sql);
    $stmt->bindParam(':customer_name', $_SESSION['customer_name']);
    $stmt->execute();

    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
<style>
    table {
        margin-top: 3%;
        width: 60%;
        margin-left: 20%;
        border-collapse: collapse;
        text-align: center;
        border: 1px solid white;
        background-color: gray;
    }

    th {
        background-color: #fac031;
    }

    th,
    td {
        padding: 8px;
        border: 1px solid black;
    }

    .cart_img {
        width: 100px;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .pay-now-btn {
        text-align: right;
        margin-top: 20px;
        margin-right: 20%;
    }

    .pay-now-btn button {
        background-color: #fac031;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 10px;
    }

    .pay-now-btn button:hover {
        background-color: #b48307;
    }

    .pay-now-btn a {
        text-decoration: none;
        color: black;
        font-size: large;
    }

    .delete_button {
        background-color: red;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_amount = 0; // Initialize total amount variable
        foreach ($cart_items as $cart) :
            $product_id = $cart['product_id'];
            $product_query = "SELECT * FROM product WHERE product_id = :product_id";
            $product_stmt = $conn->prepare($product_query);
            $product_stmt->bindParam(':product_id', $product_id);
            $product_stmt->execute();
            $product = $product_stmt->fetch(PDO::FETCH_ASSOC);

            if ($product) :
                $subtotal = $cart['quantity'] * $product['Product_price'];
                $total_amount += $subtotal; // Accumulate subtotal to total amount
        ?>
                <tr>
                    <td><?php echo $product['Product_name']; ?></td>
                    <td><img src="<?php echo $product['Product_image']; ?>" alt="Product Image" class="cart_img"></td>
                    <td><?php echo $cart['quantity']; ?></td>
                    <td>Rs.<?php echo $product['Product_price']; ?>.00</td>
                    <td>Rs.<?php echo number_format($subtotal, 2); ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="delete_item" value="<?php echo $product_id; ?>">
                            <button class="delete_button" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php else : ?>
                <tr>
                    <td colspan="6">Product not found</td>
                </tr>
        <?php
            endif;
        endforeach;
        ?>
        <tr>
            <td colspan="4" align="right"><strong>Total:</strong></td>
            <td><strong>Rs.<?php echo number_format($total_amount, 2); ?></strong></td>
            <td></td>
        </tr>
    </tbody>
</table>
<div class="pay-now-btn">
    <button type="button"><a href="./menu_and_order.php">Continue shopping</a></button>
    <button type="button"><a href="./checkout.php">Continue</a></button>
</div>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<?php
include '../footer.php';
?>