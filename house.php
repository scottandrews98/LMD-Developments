<?php
    include('connection.php');

    $price = 0;
    $style = "";
    $garden = "";
    $bedroom = 0;
    $parking = "";
    $rent = "";
    $postcode = "";
    $description = "";
    $latitude = 0.0;
    $longitude = 0.0;
    $imageOne = "";
    $imageTwo = "";
    $imageThree = "";
    $imageFour = "";
    $imageFive = "";
                    
    // run if post submit is run from the properties page
    if (isset($_POST['submit'])) {
        $houseID = $_POST['submit'];
        global $connection;    
        
        // select all information that the user will want to see about the house
        $otherInfomation = mysqli_query($connection, "SELECT House.StyleID, House.AreaID, Style.StyleName, Garden.GardenType, ParkingType.ParkingType, RentalType.RentalType, House.HouseAddress, House.BedroomNo, House.PricePCM, House.HousePostcode, House.HouseID, House.HouseDescription, House.Latitude, House.Longitude, House.HouseImageOne, House.HouseImageTwo, House.HouseImageThree, House.HouseImageFour, House.HouseImageFive FROM House INNER JOIN Style ON House.StyleID = Style.StyleID INNER JOIN Area ON House.AreaID = Area.AreaID INNER JOIN Garden ON House.GardenID = Garden.GardenID INNER JOIN ParkingType ON House.ParkingTypeID = ParkingType.ParkingTypeID INNER JOIN RentalType ON House.RentalTypeID = RentalType.RentalTypeID WHERE House.HouseID = $houseID");
                    
        while($row = mysqli_fetch_assoc($otherInfomation)) { 
            $price = $row["PricePCM"];
            $style = $row["StyleName"];
            $garden = $row["GardenType"];
            $bedroom = $row["BedroomNo"];
            $parking = $row["ParkingType"];
            $rent = $row["RentalType"];
            $postcode = $row["HousePostcode"];
            $description = $row["HouseDescription"];
            $latitude = $row["Latitude"];
            $longitude = $row["Longitude"];
            $imageOne = $row["HouseImageOne"];
            $imageTwo = $row["HouseImageTwo"];
            $imageThree = $row["HouseImageThree"];
            $imageFour = $row["HouseImageFour"];
            $imageFive = $row["HouseImageFive"];
        }
    }else{
       // take user to the properties page becuase they have not searched for a property
        header("Location:http://lmddevelopments.scottandrews27.worcestercomputing.com/properties.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>  
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" type="text/css" rel="stylesheet"/>     
<script src="javascript.js" type="text/javascript" defer></script>
    
<?php
    if (isset($_POST['submit'])) {
        $houseID = $_POST['submit'];

        global $connection;
               
        $order = mysqli_query($connection, "SELECT House.HouseAddress FROM House WHERE House.HouseID = $houseID");
                        
        while($row = mysqli_fetch_assoc($order)) { 
            echo "<title> LMD Developments: ".$row["HouseAddress"]."</title>";
        }
    }
?>

</head>   

<body>
<body>
    <div class="topnav" id="myTopnav">
    <a href="index.php" class="header"><img id="logo" src="images/logo.png" height="60" width="203"></a>
    <a href="faq.html">FAQ</a>
    <a href="about.html">About</a>
    <a href="contact.php">Contact</a>
    <a href="properties.php">Properties</a>
    <a href="index.php">Home</a>
    <a href="javascript:void(0);" style="font-size:45px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
    
    
    <main>
        
        <section class="house-image">
            <div id="headerText">
                <?php
                    if (isset($_POST['submit'])) {
                        $houseID = $_POST['submit'];

                        global $connection;
               
                        $order = mysqli_query($connection, "SELECT House.HouseAddress FROM House WHERE House.HouseID = $houseID");
                        
                        while($row = mysqli_fetch_assoc($order)) { 
                            echo "<h1 id='houseAddressHeader'> ".$row["HouseAddress"]."</h1>";
                        }
                        mysqli_close($connection);
                    }
                ?>
            </div>    
        </section>
        
        <section id="houseDisplay">
            
            <div id="houseImages">
                <div id="mainImageContainer">
                    <a href="<?php echo $imageOne; ?>" data-fancybox="gallery">
                        <img src="<?php echo $imageOne; ?>" id="mainImage">
                    </a>    
                </div>
                
                <div id="smallImages">
                    <a href="<?php echo $imageTwo; ?>" data-fancybox="gallery">
                        <img src="<?php echo $imageTwo; ?>" id="smallHouseImage">
                    </a>
                    
                    <a href="<?php echo $imageThree; ?>" data-fancybox="gallery">
                        <img src="<?php echo $imageThree; ?>" id="smallHouseImage">
                    </a>
                    
                    <a href="<?php echo $imageFour; ?>" data-fancybox="gallery">
                        <img src="<?php echo $imageFour; ?>" id="smallHouseImage">
                    </a>
                    
                    <a href="<?php echo $imageFive; ?>" data-fancybox="gallery">
                        <img src="<?php echo $imageFive; ?>" id="smallHouseImage">
                    </a>
                </div>
            
            </div>
            
            
            <div id="houseText">
                <div id="housePrice">
                    <h2 id="housePriceText">£<?php echo $price; ?> (PCM)</h2>
                </div>
                
                <div id="houseInfomation">
                    <p><?php echo $description; ?></p>
                    <p>Style: <?php echo $style; ?></p>
                    <p>Garden Type: <?php echo $garden; ?></p>
                    <p>Bedrooms: <?php echo $bedroom; ?></p>
                    <p>Parking: <?php echo $parking; ?></p>
                    <p>Rental Type: <?php echo $rent; ?></p>
                    <p>Postcode: <?php echo $postcode; ?></p>
                </div>    
            </div>
            
             <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/streetview?key=AIzaSyCWognylBB3liltVrK8WJO3vAjLq1m0Vvk&location=<?php echo $latitude.",".$longitude; ?>" allowfullscreen id="map"></iframe>
        </section>
        
    </main>  
    
    <footer id="faqfooter">

        <div class="footer-sm">
            <a  href="#" class="fa fa-facebook"></a>
            <a  href="#" class="fa fa-linkedin"></a>
        </div>
        <br>
        <p id="pfooter"><a href="adminLogin.php">Administration</a></p>
    </footer>
    
    <script type="text/javascript">
        // Controls the lightbox for the images in house.php
        $('[data-fancybox]').fancybox({
            buttons: [
                "close"
            ],
        });
    </script>
    
</body>

<html>