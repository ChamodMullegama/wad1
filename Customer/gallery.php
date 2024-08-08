<?php
require '../Db/connection.php';
include './customer_home.php';

function getGalleryImages()
{
    $database = new connection();
    $conn = $database->getConnection();

    $query = "SELECT * FROM gallery";
    $stmt = $conn->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$galleryImages = getGalleryImages();
?>

<section class="section_gallery">
    <style>
        .gallary {
            width: 100%;
            padding: 70px 0;
            
        }

        .gallary h1 {
            font-size: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gallary h1 span {
            margin-left: 15px;
            color: #fac031;
            font-family: mv boli;
        }

        .gallary h1 span::after {
            content: '';
            width: 100%;
            height: 2px;
            background: #fac031;
            display: block;
            position: relative;
            bottom: 15px;
        }

        .gallary .gallary_image_box {
            width: 95%;
            margin: 10px auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 30px;
      
        }

        .gallary .gallary_image_box .gallary_image {
            display: flex;
            align-items: center;
            justify-content: center;
            background: black;
            position: relative;
            border: 2px solid white;
            overflow: hidden;
            height: 250px; 
        }

        .gallary .gallary_image_box .gallary_image img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            transition: .3s;
        }

        .gallary .gallary_image_box .gallary_image:hover img {
            opacity: 0.4;
        }

        .gallary .gallary_image_box .gallary_image h3 {
            position: absolute;
            font-size: 35px;
            color: #fac031;
            font-family: polo;
            z-index: 5;
            opacity: 0;
            transition: 0.3s;
        }

        .gallary .gallary_image_box .gallary_image:hover h3 {
            opacity: 1;
        }

        .gallary .gallary_image_box .gallary_image p {
            position: absolute;
            width: 80%;
            text-align: center;
            color: #fac031;
            line-height: 22px;
            opacity: 0;
            z-index: 5;
            transition: 0.3s;
            font-size: 25px;
            font-weight: 400;
        }

        .gallary .gallary_image_box .gallary_image:hover p {
            opacity: 1;
        }

        .gallary .gallary_image_box .gallary_image .gallary_btn {
            position: absolute;
            bottom: 10px;
            color: #000;
            background: #fac031;
            padding: 7px 25px;
            text-decoration: none;
            opacity: 0;
            transform: translateY(20px);
            z-index: 5;
            transition: 0.3s;
        }

        .gallary .gallary_image_box .gallary_image:hover .gallary_btn {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <div class="gallary" id="Gallary">
        <div class="gallary_image_box">
            <?php foreach ($galleryImages as $image) : ?>
                <div class="gallary_image">
                    <img src="<?php echo $image['gallery_image']; ?>" alt="Gallery Image">
                    <p><?php echo $image['gallery_discrition']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section>
    
</section>
<?php
 include '../footer.php';
 ?>


