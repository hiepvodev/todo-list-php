<?php

/* edit data */
function editWorkById()
{
    global $conn;
    $data=[];
    if(isset($_GET['edit-work']) && !empty($_GET['edit-work']) ) {
        
        $id = $_GET['edit-work'];
        /* sql query*/
        $query = 'SELECT * ';
        $query .= 'FROM todo ';
        $query .= 'WHERE id=$id'; 

        $result = $conn->query($query);
        $data = $result->fetch_assoc();

    }
    return $data; 
}  
?>