<?php
include './customer_home.php';
require '../Db/connection.php';

$database = new connection(); 

try {
    $conn = $database->getConnection();

    $search_product_name = isset($_GET['search_product_name']) ? $_GET['search_product_name'] : '';
    $search_product_category = isset($_GET['search_product_category']) ? $_GET['search_product_category'] : '';

    $select_sql = "SELECT * FROM product WHERE 1=1"; 

    if (!empty($search_product_name)) {
        $select_sql .= " AND Product_name LIKE '%$search_product_name%'";
    }
    if (!empty($search_product_category)) {
        $select_sql .= " AND Product_category = '$search_product_category'";
    }

    $stmt = $conn->prepare($select_sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<style>
    .menu {

        padding: 70px 0;
        margin-top: 5px;
        margin-left: 50px;
    }

    .menu h1 {
        font-size: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
    }

    .menu h1 span {
        color: #fac031;
        margin-left: 15px;
        font-family: mv boli;
    }

    .menu h1 span::after {
        content: '';
        width: 100%;
        height: 2px;
        background: #fac031;
        display: block;
        position: relative;
        bottom: 15px;
    }

    .menu .menu_box {
        width: 95%;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-gap: 15px;
    }

    .menu .menu_box .menu_card {
        width: 325px;
        height: 480px;
        padding-top: 10px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        background-color: gray;
        border: 2px solid white;
    }

    .menu .menu_box .menu_card .menu_image {
        width: 300px;
        height: 245px;
        margin: 0 auto;
        overflow: hidden;
    }

    .menu .menu_box .menu_card .menu_image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: 0.3s;
    }

    .menu .menu_box .menu_card .menu_image:hover img {
        transform: scale(1.1);
    }

    .menu .menu_box .menu_card .small_card {
        width: 45px;
        height: 45px;
        float: right;
        position: relative;
        top: -240px;
        right: -8px;
        opacity: 0;
        border-radius: 7px;
        transition: 0.3s;
    }

    .menu .menu_box .menu_card:hover .small_card {
        position: relative;
        top: -240px;
        right: 20px;
        opacity: 1;
    }

    .menu .menu_box .menu_card .small_card i {
        font-size: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 50px;
        color: #000;
        cursor: pointer;
        text-shadow: 0 0 6px #000;
        transition: 0.2s;
    }

    .menu .menu_box .menu_card .small_card i:hover {
        color: #fac031;
    }

    .menu .menu_box .menu_card .menu_info h2 {
        width: 60%;
        text-align: center;
        margin: 10px auto 10px auto;
        font-size: 25px;
        color: #fac031;
    }

    .menu .menu_box .menu_card .menu_info p {
        text-align: center;
        margin-top: 8px;
        line-height: 21px;
    }

    .menu .menu_box .menu_card .menu_info h3 {
        text-align: center;
        margin-top: 10px;
    }

    .menu .menu_box .menu_card .menu_info .menu_icon {
        color: #fac031;
        text-align: center;
        margin: 10px 0 10px 0;

    }

    .menu .menu_box .menu_card .menu_info .menu_btn {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: white;
        background: #000;
        padding: 8px 10px;
        margin: 0 80px;
        transition: 0.3s;
    }

    form {
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    input[type="text"],
    select {
        padding: 8px;
        margin-right: 10px;
        border-radius: 4px;
        border: 1px solid white;
        font-size: 16px;
        flex: 1;
        background-color: gray;
        margin-top: 10px;
        width: 400px;
        height: 40px;
    }

    select {
        min-width: 150px;
    }

    button[type="submit"],
    button#clearBtn {
        padding: 8px 16px;
        height: 39px;
        width: 120px;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: pointer;
        transition: 0.3s ease;
        margin-left: 10px;
        font-size: large;      
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    button#clearBtn {
        background-color: #f44336;
        color: #fff;
    }

    button#clearBtn:hover {
        background-color: #d32f2f90;
    }

    .menu .menu_box .menu_card .menu_info .menu_btn:hover {
        background-color: #333;
    }
</style>

<center>
    <form method="GET" action="" style="margin-top: 15px;">
        <input type="text" name="search_product_name" placeholder="Search by Product Name">
        <select name="search_product_category">
            <option value="">Select Category</option>
            <?php
            $select_categories_sql = "SELECT DISTINCT Product_category FROM product";
            $stmt_categories = $conn->prepare($select_categories_sql);
            $stmt_categories->execute();
            $categories = $stmt_categories->fetchAll(PDO::FETCH_COLUMN);
            foreach ($categories as $category) {
                echo "<option value='$category'>$category</option>";
            }
            ?>
        </select>
        <button type="submit">Search</button>
        <button type="button" id="clearBtn">Clear</button>
    </form>
</center>

<div class="menu">
    <div class="menu_box">
        <?php
        foreach ($products as $product) {
        ?>
            <div class="menu_card">
                <div class="menu_image">
                    <img src="<?php echo $product['Product_image']; ?>" alt="<?php echo $product['Product_name']; ?>">
                </div>
                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="menu_info">
                    <h2><?php echo $product['Product_name']; ?></h2>
                    <h3>Rs. <?php echo $product['Product_price']; ?>.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="add_to_cart.php?customer_name=<?php echo isset($_SESSION['customer_name']) ? $_SESSION['customer_name'] : ''; ?>&product_id=<?php echo $product['Product_id']; ?>" class="menu_btn" onclick="addItemToCart()">Add to Cart</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<script>
    // JavaScript for form submission (Optional)
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const clearBtn = document.getElementById('clearBtn');

        clearBtn.addEventListener('click', function() {
            // Reset all form fields
            form.reset();
            form.submit();
        });
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const productName = form.elements['search_product_name'].value;
            const productCategory = form.elements['search_product_category'].value;

            form.submit();
        });
    });

    function addItemToCart(){
        alert("Item successfully added to cart");
    }
</script>
<?php
include '../footer.php';
?>
