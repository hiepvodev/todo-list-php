<?php
/* Fetch data */
function getWork()
{
    global $conn; 
    $data['data'] = [];

    $query  = 'SELECT * ';
    $query .= 'FROM todo ORDER BY id DESC'; 

    $result = $conn->query($query);
        
    if ($result) {
        if($result->num_rows> 0) {
            $data['data'] = $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    return $data;
}

?>