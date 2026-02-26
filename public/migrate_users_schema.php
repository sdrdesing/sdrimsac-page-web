<?php
include('config/database.php');

$queries = [
    "ALTER TABLE usuarios ADD COLUMN email VARCHAR(150) DEFAULT NULL",
    "ALTER TABLE usuarios ADD COLUMN password VARCHAR(255) DEFAULT NULL"
];

foreach($queries as $q){
    if($conn->query($q) === TRUE){
        echo "OK: $q\n";
    }else{
        echo "ERROR: " . $conn->error . " -- Query: $q\n";
    }
}

echo "Done\n";
?>