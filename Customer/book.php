<?php
include "../Customer/customer_home.php"
?>
<section id="Order">
    <style>
        .order {
            width: 100%;
            height: 100vh;
            padding: 70px 0;
            background-image: url(image/bg2.jpg);
            background-size: cover;
            background-position: center;
        }

        .order h1 {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            font-size: 55px;
        }

        .order h1 span {
            color: #fac031;
            margin-right: 15px;
            font-family: mv boli;
        }

        .order h1 span::after {
            content: '';
            width: 100%;
            height: 2px;
            background: #fac031;
            display: block;
            position: relative;
            bottom: 15px;
        }

        .order .order_main {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .order .order_main .order_image img {
            width: 600px;
        }

        .order .order_main form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 0 10px;
        }

        .order .order_main form .input p {
            line-height: 25px;

        }

        .order .order_main form .input {
            margin: 5px;
        }

        .order .order_main form .input input,
        .order .order_main form select {
            width: 300px;
            height: 35px;
            padding: 0 10px;
            border: 2px solid #cccccc;
            background: #eeeeee;
            outline: none;
            border-radius: 3px;
        }

        .order .order_main form .input input:focus,
        .order .order_main form select:focus {
            border: 2px solid #fac031;
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

        p {
            color: white;
        }

        button {
            padding: 10px 0;
            background: #fac031;
            color: white;
            width: 50%;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: black;
            font-size: large;
            cursor: pointer;
        }

        button:hover {
            background: #b48307;
        }

        form {
            border: 2px solid white;
            padding: 20px;
        }
    </style>
    <div class="order">
        <h1><span>Booking Your</span>Table</h1>

        <div class="order_main">
            <div class="order_image">
                <img src="../Images/order_image.png">
            </div>
            <form action="./book_inc.php" method="POST">

                <div class="input">
                    <p>Name</p>
                    <input type="text" id="name" name="customer_name" placeholder="Name" required>
                </div>
                <div class="input">
                    <p>Email</p>
                    <input type="email" id="email" name="customer_email" placeholder="Email" required>
                </div>
                <div class="input">
                    <p>Phone</p>
                    <input type="tel" id="phone" name="customer_phone" placeholder="Phone" required>
                </div>
                <div class="input">
                    <p>Date</p>
                    <input type="date" id="date" name="booking_date" required>
                </div>
                <div class="input">
                    <p>Time</p>
                    <input type="time" id="time" name="booking_time" required>
                </div>
                <div class="input">
                    <p>Table</p>
                    <select name="table_id" class="box" required>
                        <option value="table 1">Table 1</option>
                        <option value="table 2">Table 2</option>
                        <option value="table 3">Table 3</option>
                        <option value="table 4">Table 4</option>
                        <option value="table 5">Table 5</option>
                        <option value="table 6">Table 6</option>
                        <option value="table 7">Table 7</option>
                        <option value="table 8">Table 8</option>
                    </select>
                </div>
                <div class="input">
                    <p>Number of Guests</p>
                    <input type="number" id="guests" name="guests" placeholder="Number of Guests" required>
                </div>
                <div class="input">
                    <p>Massage</p>
                    <input type="text" id="massage" massage="customer_massage" placeholder="massage" required>
                </div>
                <button type="submit" name="submit">submit</button>

            </form>
        </div>
    </div>
</section>
<br><br><br><br><br>
<?php
include '../footer.php';
?>