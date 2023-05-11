<?php
function updateWorkById()
{
    global $conn;

    if (isset($_POST['update']) && isset($_GET['edit-work']) && !empty($_GET['edit-work'])) {
        $id = $_GET['edit-work'];

        $work_name = $_POST['work_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $status = (int)$_POST['status'];

        $data['workMsg'] = [];
        $validation = false;
        if(empty($work_name)) {
            $data['workMsg'][] = 'Empty Work Name Field!';
        }
        if(empty($start_date)) {
            $data['workMsg'][] = 'Empty Starting Date Field!';
        }
        if(empty($end_date)) {
            $data['workMsg'][] = 'Empty Ending Date Field!';
        }
        if(empty($status)) {
            $data['workMsg'][] = 'Empty Status Field!';
        }
        if($start_date > $end_date) {
            $data['workMsg'][] = 'Starting Date is later than Ending Date';
        }

        if (empty($data['workMsg'])) {
            $validation = true;
        }
        /* validation */

        if ($validation) {
            /* sql query*/
            $query  = 'UPDATE todo SET ';
            $query .= "work_name ='$work_name', start_date ='$start_date', end_date ='$end_date', status =$status ";
            $query .= 'WHERE id =$id';

            $result = $conn->query($query);

            if ($result) {

                echo "<script>window.location='index.php'</script>";
            }
            /*sql query*/
        }
        return $data;
    }
}
