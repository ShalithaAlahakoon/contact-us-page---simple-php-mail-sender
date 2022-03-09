<?php 
        $nameErr = $emailErr = $subjectErr = $messageErr = $phoneErr ="";
        $name = $email = $subject = $message = $phone = "";

    if (isset($_POST['submit'])) {
        $name   = $_POST['name'];
        $email      = $_POST['email'];
        $subject    = $_POST['subject'];
        $message    = $_POST['message'];
        $phone      = $_POST['phone'];

        if(empty($name)){
             $nameErr = "Name is required";
             echo '<script>alert("Name is required!")</script>';

        }
        elseif (empty($email)) {
            $emailErr = "Email is required";
             echo '<script>alert("Email is required!")</script>';
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
              echo '<script>alert("Invalid email format!")</script>';
            }
        elseif (empty($message)) {
            $emailErr = "Message is required";
             echo '<script>alert("Message is required!")</script>';
        }
        else{
        $to             = "shalitha97068@gmail.com,{$email}";
        $mail_subject   = 'Message from test site.';
        $email_body     = 'Message from Contact Us page of the test website.<br>';
        $email_body    .= "<b>From</b> {$name} <br>";
        $email_body    .= "<b>Subject</b> {$subject} <br>";
        $email_body    .= "<b>Email</b> {$email} <br>";
         $email_body    .= "<b>Phone Number</b> {$phone} <br><br>";
        $email_body    .= '<b>Message</b><br>' . nl2br(strip_tags($message));

        $header = "From:{$email}\r\nContent-type: text/html;";

        $send_mail_result = mail($to, $mail_subject, $email_body, $header);

        if ($send_mail_result) {

            echo '<script>alert("Message sent !")</script>';

        }
        else{
            
            echo '<script>alert("Message sent failed!")</script>';
        }
        }
    }
 ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact us - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <style>
         .error {color: #FF0000;}
    </style>
    
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand" href="index.html">Global Edulink&nbsp;</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Contact us</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <header class="masthead" style="background-image: url(&quot;assets/img/contact.jpg&quot;);filter: contrast(200%);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>Contact Us</h1><span class="subheading">Have questions? We have answers.</span></div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <p>Want to get in touch? Fill out the form below to send me a message and We will get back to you as soon as possible!</p>
                <p><span class="error">* required field</span></p>
                <form id="contactForm" name="sentMessage" novalidate="novalidate" method="post">
                    <div class="control-group">
                        <span class="error">* <?php echo $nameErr;?></span>
                        <div class="form-group floating-label-form-group controls"><label>Name</label>
                            <input class="form-control" type="text" id="name" required="" placeholder="Name" name="name" value="<?php echo($name) ?>"><small class="form-text text-danger help-block"></small></div>
                    </div>
                    <div class="control-group">
                        <span class="error">* <?php echo $emailErr;?></span>
                        <div class="form-group floating-label-form-group controls"><label>Email Address</label><input class="form-control" type="email" id="email" required="" placeholder="Email Address" name="email" value="<?php echo($email) ?>"><small class="form-text text-danger help-block"></small></div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls"><label>Phone Number</label><input class="form-control" type="tel" id="phone" required="" placeholder="Phone Number" name="phone" value="<?php echo($phone) ?>"><small class="form-text text-danger help-block"></small></div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls"><label>Subject</label><input class="form-control" type="text" id="subject" required="" placeholder="Subject" name="subject" value="<?php echo($subject) ?>"><small class="form-text text-danger help-block"></small></div>
                    </div>
                    <div class="control-group">
                        <span class="error">* <?php echo $messageErr;?></span>
                        <div class="form-group floating-label-form-group controls mb-3"><label>Message</label><textarea class="form-control" id="message" data-validation-required-message="Please enter a message." required="" placeholder="Message" rows="5" name="message" value="<?php echo($message) ?>"></textarea><small class="form-text text-danger help-block"></small></div>
                    </div>
                    <div id="success"></div>
                    <div class="form-group">
                        <button class="btn btn-primary" id="submit" type="submit" name="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></li>
                        <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></li>
                        <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-github fa-stack-1x fa-inverse"></i></span></li>
                    </ul>
                    <p class="text-muted copyright">Copyright@Globle Edulink 2021</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/clean-blog.js"></script>
</body>

</html>