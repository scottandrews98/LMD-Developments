<?php 
        session_start();
        include('connection.php');

        // when user click login button
        if (isset($_POST['submit'])) {
            global $connection;
            
            // if user does not enter a username and password 
            if (empty($_POST['username']) || empty($_POST['password'])) {
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter A Username And Password")';
                echo '</script>';
            }else{
                $username = mysqli_real_escape_string($connection, $_POST['username']);
                $password = mysqli_real_escape_string($connection, $_POST['password']);
                
                // gets all usernames and passwords from database
                $sql = mysqli_query($connection, "SELECT AdminUsername, AdminPassID, AdminLevel FROM Admins WHERE Admins.AdminUsername = '$username' AND Admins.AdminPassID = '$password'");
                
                // gets the amount of rows returned
                $rows = mysqli_num_rows($sql);
                
                // if rows equel 1
                if($rows == 1){
                    
                    // set session variables to username and password entered
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    
                    // goes through the row results and assigns them to variables
                    while($row = mysqli_fetch_assoc($sql)) {
                        $level = $row['AdminLevel']; 
                        $_SESSION['level'] = $level;
                        
                        // if admin level is equel to 1 then take then to admin level 1 page when if it equels 2 take them to the admin level 2 page
                        if($level == 1){
                            //header('location: http://lmddevelopments.scottandrews27.worcestercomputing.com/adminLevel1.php');
                            header('location: adminLevel1.php');
                        }else if($level == 2){
                            //header('location: http://lmddevelopments.scottandrews27.worcestercomputing.com/adminLevel2.php');
                            header('location: adminLevel2.php');
                        }
                    }
                }else{
                    // if username and password is wrong
                    echo '<script type="text/javascript">';
                    echo 'alert("Username Or Password Wrong")';
                    echo '</script>';
                }
                mysqli_close($connection);
            }
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
<script src="javascript.js"></script>
<title>LMD Developments - Login </title>

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
            <div class="logincontainer">
            <div id="formHeader2">
                <h2 id="formHeaderText">Admin Login</h2>
            </div>    
        
            <form method="post" action="adminLogin.php">
            
                 <label id="adminLabel">Username</label>
			     
                 <input type="text" maxlength="20" name="username" class="contactUsInput" />
    
                 <label id="adminLabel">Password</label>
                
                 <input type="password" maxlength="20" name="password" class="contactUsInput" />
                 <br/>
                 <br/>    
                 <button type="submit" name="submit" id="submitButton2">Login</button>
                 <br/>
            </form>
            </div>
            <br>
            <br>
            <br>
		
    </main>
    
    <footer id="faqfooter">
        
        <div class="footer-sm">
            <a  href="#" class="fa fa-facebook"></a>
            <a  href="#" class="fa fa-linkedin"></a>
        </div>
        <br>
        <p id="pfooter"><a href="adminlogin.php">Administration</a></p>
    </footer>
    
</body>

<html>