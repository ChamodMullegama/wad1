<?php
require '../Db/connection.php';
include './customer_home.php';
?>


<?php
include '../Db/connection.php'; 

$database = new connection();
try {
   $conn = $database->getConnection();
   $select_sql = "SELECT * FROM services";
   $stmt = $conn->prepare($select_sql);
   $stmt->execute();
   $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

   echo 'Error: ' . $e->getMessage();
}
?>

<section class="section-services">

    <div class="services-container">
        <?php $count = 0; ?>
        <?php foreach ($services as $service) : ?>
            <div class="service-item">
                <div class="service-name"><?php echo $service['service_name']; ?></div>
                <a target="_blank" href="<?php echo $service['service_image']; ?>">
                    <img src="<?php echo $service['service_image']; ?>" alt="Service Image" class="service-image">
                </a>
                <div class="service-description"><?php echo $service['service_description']; ?></div>
            </div>
            <?php $count++; ?>
            <?php if ($count % 4 == 0) : ?>
                </div><div class="services-container">
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<style>
    .section-services-topic {
        text-align: center;
        margin: 30px 0;
        text-transform: capitalize;
        font-size: large;
        border: 1px solid black;
        border-radius: 10px;
        color: white;
        padding: 10px 0;
    }

    .section-services {
        width: 90%;
        margin: 0 auto;
        padding: 20px 0;
        margin-top: 40px;
    }

    .services-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .service-item {
        margin: 10px 0;
        border: 2px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        background-color: gray;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        width: calc(25% - 20px);
    }

    .service-item:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        transform: scale(1.03);
    }

    .service-image {
        width: auto;
        height: 250px;
        display: block;
        transition: transform 0.3s ease-in-out;
    }

    .service-description {
        padding: 15px;
        text-align: center;
        font-size: 14px;
        color: #444;
        color:white;
    }

    .service-name {
        font-size: 20px;
        font-weight: 400;
        text-align: center;
        padding: 10px;
        background-color: #fac031;
    }

    @media only screen and (max-width: 1200px) {
        .service-item {
            width: calc(33.33% - 20px);
        }
    }

    @media only screen and (max-width: 900px) {
        .service-item {
            width: calc(50% - 20px);
        }
    }

    @media only screen and (max-width: 600px) {
        .service-item {
            width: calc(100% - 20px);
        }
    }
</style>
<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>

<?php
 include '../footer.php';
 ?>
