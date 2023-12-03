<?php

    session_start();

    # $db = new SQLite3('../sqlite/dummybase.db');

    $db_path = '../../sqlite/dummybase.db';

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

