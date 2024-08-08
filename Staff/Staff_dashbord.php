<?php
include './Staff_header.php';

?>

<section>
    <style>
        .dashboard-links {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../Images/staff.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
        }

        .dashboard-button {
            margin-bottom: 10px;
            display: block;
            width: 25%;
            margin-left: 3%;
        }

        .dashboard-button a {
            text-decoration: none;
            color: black;
            font-weight: 600;
            display: block;

        }

        .dashboard-button a:hover {
            text-decoration: none;
            color: white;
            display: block;
            background-color: #b48307;

        }

        .dashboard-button {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background-color: #fac031;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .dashboard-button:hover {
            background-color: #b48307;
        }

        img {
            background-size: cover;
        }

        p {
            text-align: center;
            font-size: 200PX;
            color: rgba(240, 248, 255, 0.3)
        }
    </style>

    <div class="dashboard-links">
        <p>STAFF</p>
        <button class="dashboard-button"><a href="./table_booking.php">view table booking</a></button>
        <button class="dashboard-button"><a href="./view_customer_order.php">view customer orders</a></button>
        <button class="dashboard-button"><a href="./view_dishes.php">view available Dishes</a></button>
        <button class="dashboard-button"><a href="./manage_customer_review.php">customer review</a></button>
    </div>
</section>

</body>

</html>