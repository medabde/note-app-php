<?php 
    $conn = new mysqli("localhost", "root", "", "notes");
    if ($conn->connect_error)die("Connection failed: " . $conn->connect_error); 

    $query = "SELECT ID FROM lesnotes";
    $result = mysqli_query($conn, $query);

    if(empty($result)) {
        $query = "CREATE TABLE lesnotes (
                    ID int(11) AUTO_INCREMENT,
                    note varchar(1000) NOT NULL,
                    PRIMARY KEY  (ID)
                    )";
        $result = mysqli_query($conn, $query);
    }

?>