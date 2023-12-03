<?php

    session_start();

    # $db = new SQLite3('../sqlite/dummybase.db');

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
    }else{

    }

 
    #|-------------------------------
    #| REGISTER USER
    #|
    if (isset($_POST['reg_user']))
    {
        //|-  receive all input values from the form 
        //|
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


        //|- form validation: ensure that the form is correctly filled | #Security_layer
        //|
        if (empty($username)) { array_push($errors, "Username is required"); }
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($password_1)) { array_push($errors, "Password is required"); }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        //---------------------
        //|- Querying the database if user already exist
        //|



        //-----
    }
