<?php

    session_start();

    #|-----------------
    #| Custom logs | Inspired from:  https://www.tutorialrepublic.com/php-tutorial/php-error-handling.php
    #|
    ini_set('error_log', '../../logs/my_logs.log');
    error_reporting(E_ALL);
    $seq_num = 0;

    error_log("======= START ============== ");

    function add_log($message) {
        global $seq_num;
        $seq_num ++ ;
        error_log("| " . $seq_num . " :" . $message."\n");
    }

    
    #| $db = new SQLite3('../sqlite/dummybase.db');
    #|
    $config = parse_ini_file("../../my_config.ini", true);
    $enable_db_connection_test = $config['General_Settings']['enable_database_connection_test'];

    /* // teste below:
        echo "db_1[ ";
        echo $enable_db_connection_test ;
        echo " ] ";
    //--
    */

    #|-------------------------------
    #| DATABASE CONNECTION 
    #|
    $db_path = '../../sqlite/dummybase.db';

    if($enable_db_connection_test == "true"){

        try {
            // Attempt to connect to the SQLite database
            $db = new SQLite3($db_path);
        
            // Execute a test query - for example, querying the SQLite master table
            $result = $db->query('SELECT name FROM sqlite_master WHERE type="table"');
        
            // Check if the query was successful
            if ($result) {
                echo "Connection successful. Tables in the database:";
                while ($row = $result->fetchArray()) {
                    echo "\n - " . $row['name'];
                }
            } else {
                echo "Query failed.";
            }
        } catch (Exception $e) {
            // Catch and display any errors in connection or querying
            echo "Error: " . $e->getMessage();
        }
    }

 
    #|-------------------------------
    #| REGISTER USER
    #|
    if (isset($_POST['reg_user']))
    {
        //|-  receive all input values from the form 
        //|
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        //|- Vulnaribility: form validation removed 
        //|
       

        //---------------------
        //|- Querying the database if user already exist
        //| Vulnerable SQL query | Insecure
        //|

        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
        $result = $db->query($user_check_query);

        $uservar = $result->fetchArray(SQLITE3_ASSOC);
        if ($uservar) {
            if ($uservar['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($uservar['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

           // Register user if there are no errors
        if (count($errors) == 0) {
            $password = $password_1 ; // <-- Vulnaribility :  Password not incrypted

            // Vulnerable SQL query for insertion
            $insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            $db->query($insert_query);
          
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: user.php');
        }

        // ulnaribility: Database connection remains open
  
       
    }
?>