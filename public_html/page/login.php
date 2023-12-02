<html>

    <head>
        <title>Dummy Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }

        </script>

        <!-- Scripts for re-captcha -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!-- Custom Theme files -->
        <link href="../css/loginSignup.css" rel="stylesheet" type="text/css" media="all" />
        <!-- //Custom Theme files -->
        <!-- web font -->
        <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
        <!-- //web font -->
    </head>


    
    <body>
        <h1>Dummy Shop</h1>
        <!-- My code below  -->
        <form action="login.php" method="post"> <!-- added-->
            <input class="text email text-center" type="text" name="username" placeholder="Username" required=""> <!-- updated -->
            <input class="text" type="password" name="password" placeholder="Password" required="">
            <div class="wthree-text">
                <label class="anim">
                </label>
                <div class="clear"> </div>
            </div>
            
           
            <!-- Log-In button -->
            <input type="submit" value="Log In" name="login_user">  
            </form>
    </body>

        
</html>