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
    
<title>LMD Developments - Contact</title>
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
        
        <section class="contact-image">
        </section>
        
        <div class="container">
          <form action="action_page.php" method="post">

            <label name="name">Full Name</label>
            <input type="text" id="name" name="name" class="contactUsInput" placeholder="Your name..">
              
            <label name="mail">Email</label>
            <input type="text" id="mail" name="mail" class="contactUsInput" placeholder="example@example.com">
            
            <!--<label for="How">How did you hear about us?</label>
                <select id="How" name="how" class="contactUsInput">
                  <option value="Facebook">Facebook</option>
                  <option value="Google">Google</option>
                  <option value="Recommendation">Recommendation</option>
                  <option value="University">University Fair</option> 
                  <option value="Other">Other</option> 
                </select>-->
              
            <label name="Subject">Subject</label>
            <textarea id="subject" class="contactUsInput" name="subject" placeholder="Insert text..." style="height:40px"></textarea>

            <label name="Message">Message</label>
            <textarea id="message" class="contactUsInput"  name="message" placeholder="Insert text..." style="height:200px"></textarea>

            <input type="submit" name="submit" value="Submit">
            <br>
              <div class="zoom"></div>
            <br>

          </form>
        </div>
        
        
        
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