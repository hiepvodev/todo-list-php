<?php
function deleteWorkById()
{
    global $conn; 
  
    if (isset($_GET['delete-work']) && !empty($_GET['delete-work'])) {
        $id = $_GET['delete-work'];
        
        /* sql query*/
        $query  = 'DELETE FROM todo ';
        $query .= 'WHERE id =$id';

        $result = $conn->query($query);

        if ($result) {
            echo "<script>window.location='index.php'</script>";
        } 
    }
}
