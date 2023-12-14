<?php include('server.php') ?>

<head>
    <title>Dummy shop</title>
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
    
    <!-- Custom Theme files -->
    <link href="../css/loginSignup.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Dummy shop</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">

                <!-- my code -->
                <form action="signup.php" method="post"> <!-- updated-->
                    <input class="text" type="text" name="username" placeholder="Username" required=""></br>
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    
                    </br>
                    <input class="text" type="password" name="password_1" placeholder="Password" required="">
                    <input class="text w3lpass" type="password" name="password_2" placeholder="Confirm Password" required="">
                
                
                    <input type="submit" name="reg_user" value="Register">
                </form>
              
            </div>
        </div>
    
        
    </div>
    <!-- //main -->
</body>

</html>
