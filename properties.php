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
<script src="javascript.js"></script>
<title>LMD Developments - Properties</title>

</head>
    
    <?php 
        
        include('connection.php');
    
    ?>

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
        
        <section class="property-image">
        </section>
        
        <section id="search">
            <form method="post" action="properties.php" id="searchForm">
                <div id="formInput">
                    <h4 id="searchHeadings">House Style</h4>
                    <select name="HouseStyle" id="searchSelect">
                         <?php
                            global $connection;
                            $sql = mysqli_query($connection, "SELECT * FROM Style");

                            while($row = mysqli_fetch_assoc($sql)) {
                                $id = $row['StyleName'];
                                $TableID = $row['StyleID'];    
                                echo "<option value='$TableID'>$id</option>";
                            }
                        ?> 
                    </select>
                </div>
                
                <div id="formInput">
                    <h4 id="searchHeadings">House Area</h4>
                    <select name="HouseArea" id="searchSelect">
                        <?php
                            global $connection;
                            $sql = mysqli_query($connection, "SELECT AreaName, AreaID FROM Area");

                            while($row = mysqli_fetch_assoc($sql)) {
                                $id = $row['AreaName'];
                                $TableID = $row['AreaID'];    
                                echo "<option value='$TableID'>$id</option>";
                            }
                        ?> 
                    </select>
                </div>
                
                <div id="formInput">
                    <h4 id="searchHeadings">Garden Type</h4>
                    <select name="Garden" id="searchSelect">
                        <?php
                            global $connection;
                            $sql = mysqli_query($connection, "SELECT * FROM Garden");

                            while($row = mysqli_fetch_assoc($sql)) {
                                $id = $row['GardenType'];
                                $TableID = $row['GardenID'];    
                                echo "<option value='$TableID'>$id</option>";
                            }
                        ?>
                    </select>
                </div>
                <div id="formInput">
                    <h4 id="searchHeadings">Number Of Beds</h4>
                    <select name="Bedrooms" id="searchSelect">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>    
                </div>
                
                <div id="formInput">
                    <h4 id="searchHeadings">Minumum Price</h4>
                    <select name="MinimumPrice" id="searchSelect">
                        <option value="0" selected>£0</option>
                        <option value="100">£100</option>
                        <option value="200">£200</option>
                        <option value="300">£300</option>
                        <option value="400">£400</option>
                        <option value="500">£500</option>
                        <option value="600">£600</option>
                        <option value="800">£800</option>
                    </select>    
                </div>
                
                <div id="formInput">
                    <h4 id="searchHeadings">Maximum Price</h4>
                    <select name="MaximumPrice" id="searchSelect">
                        <option value="0">£0</option>
                        <option value="100">£100</option>
                        <option value="200">£200</option>
                        <option value="300">£300</option>
                        <option value="400">£400</option>
                        <option value="500">£500</option>
                        <option value="600">£600</option>
                        <option value="800" selected>£800</option>
                    </select>    
                </div>  
            
                <button id="submitSearch" type="submit" name="submit">Search</button>
                
            </form>
        </section>
        
        <section id="houseResults">
            <?php
                // run if search has been run from above
                if (isset($_POST['submit'])) {
                    $houseStyle = $_POST['HouseStyle'];
                    $houseArea = $_POST['HouseArea'];
                    $garden = $_POST['Garden'];
                    $bedroomNumber = $_POST['Bedrooms'];
                    $minimumPrice = $_POST['MinimumPrice'];
                    $maximumPrice = $_POST['MaximumPrice'];
            
                    global $connection;
                // select all data needed for the house page
                    $order = mysqli_query($connection, "SELECT House.StyleID, House.AreaID, Style.StyleName, House.HouseAddress, House.BedroomNo, House.PricePCM, House.HouseID, House.HouseImageOne FROM House INNER JOIN Style ON House.StyleID = Style.StyleID INNER JOIN Area ON House.AreaID = Area.AreaID WHERE Style.StyleID = $houseStyle AND Area.AreaID = $houseArea AND House.GardenID = $garden AND House.BedroomNo = $bedroomNumber AND House.PricePCM >= $minimumPrice AND House.PricePCM <= $maximumPrice");
                    
                    // if no houses return from search
                    if(mysqli_num_rows($order) <= 0){
                        echo "<br/><label id='errorLabel'>Sorry No Houses Match Your Search</label><br/>";
                    }else{
                        while($row = mysqli_fetch_assoc($order)) { 
                            echo "<div id='houseBlock'><div id='imageBlock'><img id='houseImage' src='" .$row["HouseImageOne"] ."'/></div><div id='detailsBlock'><h1>" .$row["HouseAddress"] ."</h1><h3>Bedrooms: ".$row["BedroomNo"] ."</h3><h3>Price (PCM) : £".$row["PricePCM"] ."</h3> <form method='post' action='house.php'><button id='houseButton' name='submit' type='submit' value=".$row["HouseID"] .">More Details</button></form></div></div>";
                        }
                    }
                }
            
                // runs if users search from the homepage
                if (isset($_POST['homePageSubmit'])) {
                    $houseArea = $_POST['HouseArea'];
                    $maximumPrice = $_POST['MaximumPrice'];

                    global $connection;
                    
                    $order = mysqli_query($connection, "SELECT House.StyleID, House.AreaID, Style.StyleName, House.HouseAddress, House.BedroomNo, House.PricePCM, House.HouseID, House.HouseImageOne FROM House INNER JOIN Style ON House.StyleID = Style.StyleID INNER JOIN Area ON House.AreaID = Area.AreaID WHERE Area.AreaID = $houseArea AND House.PricePCM <= $maximumPrice");
                    
                    // if query returns no results
                    if(mysqli_num_rows($order) <= 0){
                        echo "<br/><label id='errorLabel'>Sorry No Houses Match Your Search</label><br/>";
                    }else{
                        while($row = mysqli_fetch_assoc($order)) { 
                            echo "<div id='houseBlock'><div id='imageBlock'><img id='houseImage' src='" .$row["HouseImageOne"] ."'/></div><div id='detailsBlock'><h1>" .$row["HouseAddress"] ."</h1><h3>Bedrooms: ".$row["BedroomNo"] ."</h3><h3>Price (PCM) : £".$row["PricePCM"] ."</h3> <form method='post' action='house.php'><button id='houseButton' name='submit' type='submit' value=".$row["HouseID"] .">More Details</button></form></div></div>";
                        }
                    }
                }
            
                // runs if users click on the search for city centre properties on home page
                if(isset($_GET['cityCentre'])){
                    global $connection;
                    
                    $location = $_GET['cityCentre'];
                    
                    $orders = mysqli_query($connection, "SELECT House.StyleID, House.AreaID, Style.StyleName, House.HouseAddress, House.BedroomNo, House.PricePCM, House.HouseID, House.HouseImageOne FROM House INNER JOIN Style ON House.StyleID = Style.StyleID INNER JOIN Area ON House.AreaID = Area.AreaID WHERE Area.AreaID = 2");
                    
                    if(mysqli_num_rows($orders) <= 0){
                        echo "<br/><label id='errorLabel'>Sorry No Houses Match Your Search</label><br/>";
                    }else{
                        while($row = mysqli_fetch_assoc($orders)) { 
                            echo "<div id='houseBlock'><div id='imageBlock'><img id='houseImage' src='" .$row["HouseImageOne"] ."'/></div><div id='detailsBlock'><h1>" .$row["HouseAddress"] ."</h1><h3>Bedrooms: ".$row["BedroomNo"] ."</h3><h3>Price (PCM) : £".$row["PricePCM"] ."</h3> <form method='post' action='house.php'><button id='houseButton' name='submit' type='submit' value=".$row["HouseID"] .">More Details</button></form></div></div>";
                        }
                        mysqli_close($connection);
                    }
                }
            ?>
        </section>
        
        <section id="advancedSearchButton">
            <button id="showAdvanced" name="showAdvancedSearch" onclick="location.href = 'propertiesAdvancedSearch.php';">Show Advanced Search</button>
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
    
</body>

<html>