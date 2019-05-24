<?php
/** In this we are going to autoincrement the student id, directly from database */

    // create a connection to database
    $conn = mysqli_connect('localhost', 'root', '', 'studentdb');

    if (!$conn) die("Error: " . mysqli_connect_error($conn));

    $idnumber = 0; // initialise the first variable to store the student id number = 0

    // step 1 : check existence of ANY records in the table
    $sql = "SELECT * FROM `student_table`";
    $result = mysqli_query($conn, $sql);

    if (!result) {
        echo "sql error 01";
    } else {
        
        $row = mysqli_num_rows($result);
        if ($rows == 0) {   // if there are no records in the current table, then ...
            $id = 1000;   // initialize the first admission number of choice ,eg Admission No: 1000
        } else {    // in case there are no previous records in the select table, then.. 
            
            $sql = "SELECT * FROM `student_table` ORDER BY `student_id` DESC LIMIT 1";  // select data in the database ordering it by the student id numbers from the last entered to the first ie in descending order
            $result = mysqli_query($conn, $sql);

            if(!result){
                echo "sql error 02";
            } else {
                $data = mysqli_fetch_assoc($resultCheck);    // get the data from db
                $dbId = $data['student_id']; // get the last entered student id number in the student and store it in variable $dbId
                $id = $dbId + 1;     // set the value of the next id number by incrementing by one
            }
        }

        $idnumber = $id;    // now the value of the current student id number

    }