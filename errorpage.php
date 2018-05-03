<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, inital-scale=1.0">
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
<script src="javascript.js"></script>
    
<title>LMD Developments</title>
</head> 

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
        
        <section class="notfound-image"></section>
        
        <div class="container">
          <form method="post" action="properties.php">
              
            <label for="how">Please select an area of Worcester</label>
              <br/>
                <select name="HouseArea" id="how">
                        <?php
                            include('connection.php');
                            global $connection;
                            // Get AreaName and AreaID from the table Area
                            $sql = mysqli_query($connection, "SELECT AreaName, AreaID FROM Area");
                            
                            // While they're are results being returned
                            while($row = mysqli_fetch_assoc($sql)) {
                                $id = $row['AreaName'];
                                $TableID = $row['AreaID'];    
                                // Place onto the webpage the option value to go with the select
                                echo "<option value='$TableID'>$id</option>";
                            }
                            mysqli_close($connection);
                        ?> 
              </select>
              <br/>
              <label for="How">Please select a price range (PCM)</label>
                <select id="How" name="MaximumPrice">
                  <option value="300">£300</option>
                  <option value="400">£400</option>
                  <option value="500">£500</option>
                  <option value="600">£600</option> 
                  <option value="700">£700</option> 
                </select>

            <input type="submit" value="Search" name="homePageSubmit">
            <br>
              <div class="zoom"></div>
            <br>

          </form>
        </div>
        
    </main>
    
    <footer id="faqfooter">
        
        <div class="footer-sm">
            <a  href="https://www.facebook.com/LMD-Developments-LTD-1575804509354661/" class="fa fa-facebook"></a>
            <a  href="https://www.linkedin.com/in/liam-mcdermott-7a730676/" class="fa fa-linkedin"></a>
        </div>
        <br>
        <p id="pfooter"><a href="adminLogin.php">Administration</a></p>
        
    </footer>
    
</body>

<html>