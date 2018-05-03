<?php 
    include('connection.php');
    // start php session
    session_start();
    // if there is a username then run
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username']; 
        $password = $_SESSION['password'];
        $level = $_SESSION['level'];
        
        $sql = mysqli_query($connection, "SELECT AdminUsername, AdminPassID, AdminLevel, AdminFirstName, AdminLastName FROM Admins WHERE Admins.AdminUsername = '$username' AND Admins.AdminPassID = '$password' AND Admins.AdminLevel = $level");
        
        // returns the number of rows that this query comes back with
        $rows = mysqli_num_rows($sql);
        // if there is more than or equel to one row returned and the users admin level is equel to 2
        if($rows >= 1 && $level == 1){
            //header('location: adminLogin.php');
            // take user to the login page.
            header('location: http://lmddevelopments.scottandrews27.worcestercomputing.com/adminLogin.php');
        }else{
            // else get the values first name and last name and assign them to variables.
            while($row = mysqli_fetch_assoc($sql)) { 
                $firstName = $row["AdminFirstName"];
                $lastName = $row["AdminLastName"];
            }
        }
    }else{
        // if no session value is returned for username then take user to login
        header('location: http://lmddevelopments.scottandrews27.worcestercomputing.com/adminLogin.php');
        //header('location: adminLogin.php');
    }
    
    // if user has pressed the logout buttton
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: http://lmddevelopments.scottandrews27.worcestercomputing.com/adminLogin.php');
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
<script src="javascript.js" type="text/javascript" defer></script>    
<title>LMD Developments - Admin Level 2</title>

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
    
    
<section class="adminSectionImage">
            <div id="headerText">
                <?php
                    echo "<h1 id='houseAddressHeader'> Welcome ".$firstName.' '.$lastName."</h1>";
                ?>
            </div> 
    </section>    
    
    <?php
        function houseAreas(){

            global $connection;
            $sql = mysqli_query($connection, "SELECT AreaName, AreaID FROM Area");
            
            // while there are reuslts from the query then run.
            while($row = mysqli_fetch_assoc($sql)) {
                $id = $row['AreaName'];
                $TableID = $row['AreaID'];
                // places results into a select box
                echo "<option value='$TableID'>$id</option>";
            }
        }

        function houseStyles(){

            global $connection;
            $sql = mysqli_query($connection, "SELECT * FROM Style");

            while($row = mysqli_fetch_assoc($sql)) {
                $id = $row['StyleName'];
                $TableID = $row['StyleID'];    
                echo "<option value='$TableID'>$id</option>";
            }
        }

        function parkingStyles(){

            global $connection;
            $sql = mysqli_query($connection, "SELECT * FROM ParkingType");

            while($row = mysqli_fetch_assoc($sql)) {
                $id = $row['ParkingType'];
                $TableID = $row['ParkingTypeID'];    
                echo "<option value='$TableID'>$id</option>";
            }
        }

        function rentType(){

            global $connection;
            $sql = mysqli_query($connection, "SELECT * FROM RentalType");

            while($row = mysqli_fetch_assoc($sql)) {
                $id = $row['RentalType'];
                $TableID = $row['RentalTypeID'];    
                echo "<option value='$TableID'>$id</option>";
            }
        }

        function gardenType(){

            global $connection;
            $sql = mysqli_query($connection, "SELECT * FROM Garden");

            while($row = mysqli_fetch_assoc($sql)) {
                $id = $row['GardenType'];
                $TableID = $row['GardenID'];    
                echo "<option value='$TableID'>$id</option>";
            }
        }

                //  start of update table functions

        function selectHouses(){
            global $connection;
            $sql = mysqli_query($connection, "SELECT HouseID, HouseAddress FROM House");

            while($row = mysqli_fetch_assoc($sql)) {
                $id = $row['HouseAddress'];
                $TableID = $row['HouseID'];    
                echo "<option value='$TableID'>$id</option>";
            }
        }


        // start of the delete table

        function deleteHouses(){
            global $connection;
            $sql = mysqli_query($connection, "SELECT HouseID, HouseAddress FROM House");

            while($row = mysqli_fetch_assoc($sql)) {
                $id = $row['HouseAddress'];
                $TableID = $row['HouseID'];    
                echo "<option value='$TableID'>$id</option>";
            }
        }
    
    
        function deleteUser(){
            global $connection;
            $sql = mysqli_query($connection, "SELECT Admins.AdminUsername, AdminID FROM Admins WHERE Admins.AdminLevel = 1");

            while($row = mysqli_fetch_assoc($sql)) {
                $id = $row['AdminUsername'];
                $TableID = $row['AdminID'];    
                echo "<option value='$TableID'>$id</option>";
            }
        }
    
        function updateUser(){
            global $connection;
            $sql = mysqli_query($connection, "SELECT Admins.AdminUsername, AdminID FROM Admins WHERE Admins.AdminLevel = 1");

            while($row = mysqli_fetch_assoc($sql)) {
                $id = $row['AdminUsername'];
                $TableID = $row['AdminID'];    
                echo "<option value='$TableID'>$id</option>";
            }
            mysqli_close($connection);
        }

        if (isset($_POST['addSubmit'])) {
            global $connection;

            $houseStyle = $_POST['houseStyle'];
            $houseArea = $_POST['houseArea'];
            $parking = $_POST['parking'];
            $rent = $_POST['rent'];
            $garden = $_POST['garden'];
            // take the input and turn everything into a string to avoid sql injection
            $houseAddress = mysqli_real_escape_string($connection, $_POST['address']);
            $housePostcode = mysqli_real_escape_string($connection, $_POST['postcode']);
            $bedroomNumber = $_POST['bedrooms'];
            $housePrice = $_POST['price'];
            $description = mysqli_real_escape_string($connection, $_POST["description"]);
            $latitude = mysqli_real_escape_string($connection, $_POST['latitude']);
            $longitude = mysqli_real_escape_string($connection, $_POST['longitude']);
            
            // the folder the images will be placed into once uploaded
            $directory = "houseImages/";
            // Creates a variable file which contains the name of the file.
            $file1 = $directory . basename($_FILES["fileToUploadOne"]["name"]);
            $file2 = $directory . basename($_FILES["fileToUploadTwo"]["name"]);
            $file3 = $directory . basename($_FILES["fileToUploadThree"]["name"]);
            $file4 = $directory . basename($_FILES["fileToUploadFour"]["name"]);
            $file5 = $directory . basename($_FILES["fileToUploadFive"]["name"]);
            // If ever set to true it means there has been an error uploading the image.
            $uploadError = false;
            
            // if file with name already exists then don't upload
            if (file_exists($file1) || file_exists($file2) || file_exists($file3) || file_exists($file4) || file_exists($file5)) {
                echo "<br/><h2 id='adminResult'>Sorry File Already Exists</h2>";
                $uploadError = true;
            }

            if ($uploadError == true){
                echo "<br/><h2 id='adminResult'>Images Could Not Be Uploaded</h2>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUploadOne"]["tmp_name"], $file1) && move_uploaded_file($_FILES["fileToUploadTwo"]["tmp_name"], $file2) && move_uploaded_file($_FILES["fileToUploadThree"]["tmp_name"], $file3) && move_uploaded_file($_FILES["fileToUploadFour"]["tmp_name"], $file4) && move_uploaded_file($_FILES["fileToUploadFive"]["tmp_name"], $file5)) {
                    
                    // turn the file name into a string
                    $file1String = (string) $file1;
                    $file2String = (string) $file2;
                    $file3String = (string) $file3;
                    $file4String = (string) $file4;
                    $file5String = (string) $file5;
                    
                    // the insert the data into houses
                    $order = "INSERT INTO House (StyleID, AreaID, ParkingTypeID, RentalTypeID, GardenID, HouseAddress, HousePostcode, BedroomNo, PricePCM, HouseDescription, Latitude, Longitude, HouseImageOne, HouseImageTwo, HouseImageThree, HouseImageFour, HouseImageFive) VALUES ('$houseStyle', '$houseArea', '$parking', '$rent', '$garden', '$houseAddress', '$housePostcode', '$bedroomNumber', '$housePrice', '$description', '$latitude', '$longitude', '$file1String', '$file2String', '$file3String', '$file4String', '$file5String')"; 
                    
                    if (mysqli_query($connection, $order)){
                        echo "<br/><h2 id='adminResult'>".$houseAddress." Added</h2>";
                        
                        $lastHouseID = mysqli_insert_id($connection);
                        
                        if(isset($_POST['WoodenFloors'])){
                            $order2 = mysqli_query($connection, "INSERT INTO HouseFeatureLink (FeatureID, HouseID) VALUES (1,'$lastHouseID')");
                        }
                        
                        if(isset($_POST['CentralHeating'])){
                            $order2 = mysqli_query($connection, "INSERT INTO HouseFeatureLink (FeatureID, HouseID) VALUES (2,'$lastHouseID')");
                        }
                        
                        if(isset($_POST['BasementRoom'])){
                            $order2 = mysqli_query($connection, "INSERT INTO HouseFeatureLink (FeatureID, HouseID) VALUES (3,'$lastHouseID')");
                        }
                    }else{
                        echo "<br/><h2 id='adminResult'>Input Data Not Valid</h2>";
                    }
                } else {
                    echo "<br/><h2 id='adminResult'>Sorry There Has Been An Error Uploading Your File</h2>";
                }
            }
        }
        
        // if the update form has been submitted
        if (isset($_POST['updateSubmit'])) {
            global $connection;

            $houseID = $_POST['addressID'];
            
            // gets current houses data for house that has been selected
            $sql = mysqli_query($connection, "SELECT HouseID, HouseAddress, BedroomNo, PricePCM, HouseDescription FROM House WHERE House.HouseID = $houseID");

            while($row = mysqli_fetch_assoc($sql)) {
                $oldBedroomNumber = $row['BedroomNo'];  
                $oldHouseDescription = $row['HouseDescription'];   
                $oldPrice = $row['PricePCM'];
            }

            $bedroomNumber = $_POST['bedrooms'];
            $housePrice = $_POST['price'];
            $description = mysqli_real_escape_string($connection, $_POST["description"]);
            
            // if user has left the field empty then assign the variable to the old value
            if (empty($bedroomNumber)) {
                $bedroomNumber = $oldBedroomNumber;
            }

            if (empty($housePrice)) {
                $housePrice = $oldPrice;
            }

            if (empty($description)) {
                $description = $oldHouseDescription;
                $description = mysqli_real_escape_string($connection, $description);
            }
            
            // query that updates the database with the new data
            $update = mysqli_query($connection, "UPDATE House SET BedroomNo = '$bedroomNumber', PricePCM = '$housePrice', HouseDescription = '$description' WHERE HouseID = $houseID");

            if($update){
                echo ("<br/><h2 id='adminResult'>House Succsesfully Updated</h2>");
            }else{
                echo ("<br/><h2 id='adminResult'>Input Data Not Valid</h2>");
            }
        }
        
        // runs if remove house form has been submitted
        if (isset($_POST['removeSubmit'])) {
            global $connection;

            $houseID = $_POST['addressID'];
            // gets data for house that has been selected
            $houseAddressQuery = mysqli_query($connection, "SELECT HouseAddress, HouseImageOne, HouseImageTwo, HouseImageThree, HouseImageFour, HouseImageFive FROM House WHERE HouseID = $houseID");

            while($row = mysqli_fetch_assoc($houseAddressQuery)) {
                $houseAddress = $row['HouseAddress'];
                $imageOne = $row['HouseImageOne'];
                $imageTwo = $row['HouseImageTwo'];
                $imageThree = $row['HouseImageThree'];
                $imageFour = $row['HouseImageFour'];
                $imageFive = $row['HouseImageFive'];
                // query runs that deletes all infomation from that house row
                $delete2 = mysqli_query($connection, "DELETE FROM HouseFeatureLink WHERE HouseID = $houseID");
                
                $delete = mysqli_query($connection, "DELETE FROM House WHERE HouseID = $houseID");

                // runs if query was succsesfull
                if($delete2 && $delete){
                    // lets users know what house has been deleted
                    echo '<br/><h2 id="adminResult">'.$houseAddress.' Deleted</h2>';
                    // deleted the image file from the server to save storage space
                    unlink($imageOne);
                    unlink($imageTwo);
                    unlink($imageThree);
                    unlink($imageFour);
                    unlink($imageFive);
                }else{
                    echo ("<br/><h2 id='adminResult'>Could Not Delete House</h2>" . mysqli_error($connection));
                }
            }         
        }
        
        // run if there is a new area added to the system
        if (isset($_POST['areaSubmit'])) {
            global $connection;

            $areaName = $_POST['areaName'];
            $areaTown = $_POST['areaTown'];
            $areaCounty = $_POST['areaCounty'];

            $sql = mysqli_query($connection, "SELECT AreaName FROM Area WHERE Area.AreaName = '$areaName'");

            $rows = mysqli_num_rows($sql);
            
            // if number of rows is equel to or more than 1. This stops there being 2 area names the same
            if($rows >= 1){
                echo '<br/><h2 id="adminResult">Area Already Exists</h2>';
            }else{
                // if not then insert the data into the area table
                $areaInsert = mysqli_query($connection, "INSERT INTO Area (AreaName, AreaTown, AreaCounty) VALUES ('$areaName', '$areaTown', '$areaCounty')");

                if($areaInsert){
                    echo '<br/><h2 id="adminResult">'.$areaName.' Inserted</h2>';
                }else{
                    echo "<br/><h2 id='adminResult'>Could Not Add Area</h2>";
                }
            }
        }
    
        // run where there is a new admin added
        if (isset($_POST['adminAddSubmit'])) {
            global $connection;

            $adminUsername = mysqli_real_escape_string($connection, $_POST['username']);
            $adminPassword = mysqli_real_escape_string($connection,$_POST['password']);
            $adminFirstName = mysqli_real_escape_string($connection,$_POST['firstName']);
            $adminLastName = mysqli_real_escape_string($connection,$_POST['lastName']);
            
            // get all the current admin usernames
            $sql = mysqli_query($connection, "SELECT AdminUsername FROM Admins WHERE Admins.AdminUsername = '$adminUsername'");

            $rows = mysqli_num_rows($sql);
            
            // if admin usernam already exists then don't add to database
            if($rows >= 1){
                echo '<br/><h2 id="adminResult">Username Already Exists</h2>';
            }else{
                // insert the admin into the database
                $adminInsert = mysqli_query($connection, "INSERT INTO Admins (AdminUsername, AdminPassID, AdminFirstName, AdminLastName, AdminLevel) VALUES ('$adminUsername', '$adminPassword', '$adminFirstName', '$adminLastName', 1)");
                
                if($adminInsert){
                    echo '<br/><h2 id="adminResult">'.$adminFirstName.' '.$adminLastName.' Inserted</h2>';
                }else{
                    echo "<br/><h2 id='adminResult'>Could Not Add Admin</h2>";
                }
            }
        }
    
        // run if an admin needs to be deleted
        if (isset($_POST['adminDeleteSubmit'])) {
            global $connection;
            
            $adminID = $_POST['adminUsernameSelect'];
            
            // get admin data from the database from the dropdown
            $sql = mysqli_query($connection, "SELECT AdminID, AdminFirstName, AdminLastName FROM Admins WHERE Admins.AdminID = $adminID");

            while($row = mysqli_fetch_assoc($sql)) {
                $firstName = $row['AdminFirstName'];  
                $lastName = $row['AdminLastName'];  
                
                // the delete query to delete the admin frm the database
                $deleteAdmin = mysqli_query($connection, "DELETE FROM Admins WHERE AdminID = $adminID");
                
                // if deletion was succsesfull
                if($deleteAdmin){
                    echo '<br/><h2 id="adminResult">User '.$firstName.' '.$lastName.' Deleted</h2>';
                }
            }
        }
    
        // if update admin password is run
        if (isset($_POST['updateAdminPassword'])) {
            global $connection;
            
            $adminID = $_POST['adminUsernameSelect'];
            $newPassword = mysqli_real_escape_string($connection, $_POST['newPassword']);
            
            $sql = mysqli_query($connection, "SELECT AdminID, AdminFirstName, AdminLastName FROM Admins WHERE Admins.AdminID = $adminID");

            while($row = mysqli_fetch_assoc($sql)) {
                $firstName = $row['AdminFirstName'];  
                $lastName = $row['AdminLastName'];  
                
                // updates the database for the selected user with the new password.
                $updateAdmin = mysqli_query($connection, "UPDATE Admins SET AdminPassID = '$newPassword' WHERE AdminID = $adminID");
            
                if($updateAdmin){
                    echo '<br/><h2 id="adminResult">User '.$firstName.' '.$lastName.' Password Updated</h2>';
                }
            }
        }
    ?>
    
    <main>
		<section>
            <form method="post" action="adminLevel2.php">
                <button type="submit" name="logout" id="logoutButton">Logout</button>
            </form>
            <br>
            
            <button onclick="topFunction()" id="scroll_button" title="Back up"><img src="images/top_icon.png" width="40" height="40"></button>
            
        <div class="container123">
            <div id="formHeader2">
                <h2 id="formHeaderText">Add New House</h2>
                </div> 
            <br>
          <form method="POST"	action="adminLevel2.php" enctype="multipart/form-data">

            <label>House Style</label>
            <select name="houseStyle">
                <?php
                    houseStyles();
                ?>
            </select>
            <br/>
            <label>House Area</label>
            <select name="houseArea">
                <?php
                    houseAreas();
                ?>
            </select>
            <br/>     
              
              <label>Parking Type</label>
            <select name="parking">
                <?php
                    parkingStyles();
                ?>
            </select>
              
              <br/>
            <label>Rent Type</label>
            <select name="rent">
                <?php
                    rentType();
                ?>
            </select>
            <br/>
              
              <label>Garden Type</label>
            <select name="garden">
                <?php
                    gardenType();
                ?>
            
            </select>
            
            <br/>
              
            <label>House Address</label>
            <input type="text" class="contactUsInput" maxlength="50" name="address" required/>
            <br/>

            <label>House Postcode</label>
            <input type="text" class="NumberInput" maxlength="10" name="postcode" required/>
            <br/>

            <label>Bedroom Number</label>
            <input class="NumberInput" name="bedrooms" required/>
            <br/>

            <label>Price PCM</label>
            <input class="NumberInput" name="price" required/>
            <br/>
            
            <label>House Description</label>
            <input class="HouseFormInput" name="description" maxlength="800" required/>
            <br/>
            
            <label>Latitude</label>
            <input class="NumberInput" name="latitude" required/>
            <br/>
            
            <label>Longitude</label>
            <input  class="NumberInput" name="longitude" required/>
            <br/>
              
            <label id="adminLabel">Wooden Floors</label>
                <input type="checkbox" value="1" name="WoodenFloors">
            <br/>
            
            <label id="adminLabel">Central Heating</label>
                <input type="checkbox" value="1" name="CentralHeating">
            <br/>
            
            <label id="adminLabel">Basement Room</label>
                <input type="checkbox" value="1" name="BasementRoom">
            <br/>     
            
            <label>Please upload 5 images</label>
            <br>
            <br>
			     <input type="file" id="adminUpload" name="fileToUploadOne" accept="image/*" />
			<br/>
        	
			<input type="file" name="fileToUploadTwo" accept="image/*" />
			<br/>
			
            <input type="file" name="fileToUploadThree" accept="image/*" />
			<br/>

            <input type="file" name="fileToUploadFour" accept="image/*" />
			<br/>
			
                <input type="file" name="fileToUploadFive" accept="image/*" />
			<br/>
            <br/>
            <button type="submit" name="addSubmit" id="submitButton2">Add New House</button>
			<br/>
              
          </form>
        </div>
            
            <div class="container1">
            <div id="formHeader2">
                <h2 id="formHeaderText">Update Houses</h2>
            </div> 

            <form method="post"	action="adminLevel2.php">
                <label id="adminLabel">House Addresses</label>
                <select name="addressID">
                    <?php
                        selectHouses();
                    ?>
                </select>
                <br/>	

                <label id="adminLabel">Bedroom Number</label>
                <input type="number" name="bedrooms" class="NumberInput" required/>
                <br/>

                <label id="adminLabel">Price PCM(£)</label>
                <input type="number" name="price" class="NumberInput" required/>
                <br/>

                <label id="adminLabel">House Description</label>
                <input type="text" name="description" class="contactUsInput" maxlength="800" required/>
                <br/>
                <br/>
                <button type="submit" name="updateSubmit" id="submitButton2">Update House</button>
                <br/>
            </form>
            </div>

            <div class="container1">
            <div id="formHeader2">
                <h2 id="formHeaderText">Delete Houses</h2>
            </div> 

                <form method="post"	action="adminLevel2.php">
                    <label id="adminLabel">House Addresses</label>
                    <select name="addressID">
                        <?php
                            deleteHouses();
                        ?>        
                    </select>
                    <br><br>	

                    <button type="button" id="submitButton2" class="delete">Delete House</button>
                    <br>
                    <br>



                    <label id="adminLabel" class="dialog">Are You Sure You Want To Delete This House?</label>
                    <br>
                    <br>
                    <button type="submit" name="removeSubmit" id="submitButton2" class="yes">Yes</button>
                    <button type="button" id="submitButton2" class="no">No</button>
                    <br/>
                </form>
            </div>
            
            <div class="container1">
            <div id="formHeader2">
                <h2 id="formHeaderText">Add New Area</h2>
            </div> 

            <form method="post"	action="adminLevel2.php">

                <label id="adminLabel">Area Name</label>
                <input type="text" name="areaName" class="contactUsInput" maxlength="50"/>
                <br/>

                <label id="adminLabel">Area Town</label>
                <input type="text" name="areaTown" class="contactUsInput" maxlength="50"/>
                <br/>

                <label id="adminLabel">Area County</label>
                <input type="text" name="areaCounty" class="contactUsInput" maxlength="50"/>
                <br/>
                <br/>
                <button type="submit" name="areaSubmit" id="submitButton2">Add Area</button>
                <br/>
            </form>
            </div>
            
            <div class="container1">
            <div id="formHeader2">
                <h2 id="formHeaderText">Add New Admin</h2>
            </div> 

            <form method="post"	action="adminLevel2.php">

                <label id="adminLabel">Admin Username</label>
                <input type="text" name="username" class="contactUsInput" maxlength="30" required/>
                <br/>

                <label id="adminLabel">Admin Password</label>
                <input type="text" name="password" class="contactUsInput" maxlength="50" required/>
                <br/>

                <label id="adminLabel">Admin First Name</label>
                <input type="text" name="firstName" class="contactUsInput" maxlength="30" required/>
                <br/>

                <label id="adminLabel">Admin Last Name</label>
                <input type="text" name="lastName" class="contactUsInput" maxlength="30" required/>
                <br/>
                <br/>
                <button type="submit" name="adminAddSubmit" id="submitButton2">Add User</button>
                <br>
                <br>
            </form>
            </div>
            
            <div class="container1">
            <div id="formHeader2">
                <h2 id="formHeaderText">Delete User</h2>
            </div> 

            <form method="post"	action="adminLevel2.php">

                <label id="adminLabel">Admin Username</label>
                <select name="adminUsernameSelect">
                    <?php
                        deleteUser();
                    ?>        
                </select>
                <br/>
                <br/>
                <button type="submit" name="adminDeleteSubmit" id="submitButton2">Delete User</button>
                <br/>
            </form>        
            </div>
            
            <div class="container1">
            <div id="formHeader2">
                <h2 id="formHeaderText">Update User Password</h2>
            </div> 

            <form method="post"	action="adminLevel2.php">

                <label id="adminLabel">Admin Username</label>
                <select name="adminUsernameSelect">
                    <?php
                        deleteUser();
                    ?>        
                </select>
                <label id="adminLabel">New Password</label>
                <input type="text" name="newPassword" class="contactUsInput" maxlength="50" required/>
                <br/>
                <br/>
                <button type="submit" name="updateAdminPassword" id="submitButton2">Update Password</button>
                <br/>
            </form>     
            </div>
            
		</section>
    </main>
    
    <script type="text/javascript">
        $(".dialog").hide();
        $(".yes").hide();
        $(".no").hide();
        
        $(".delete").click(function(){
            $(".delete").hide();
            $(".dialog").show();
            $(".yes").show();
            $(".no").show();
        });
        
        $(".no").click(function(){
            $(".delete").show();
            $(".dialog").hide();
            $(".yes").hide();
            $(".no").hide();
        });
    </script>
    
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