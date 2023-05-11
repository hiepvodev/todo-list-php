<?php
function createWork()
{
    global $conn;   
    if (isset($_POST['add'])) 
    {
        /* validation */
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
        if(empty($data['workMsg'])) {
            $validation = true;
        }
        if($validation) {
            /* insert query*/
            $query  = 'INSERT INTO todo';
            $query .= '(work_name, start_date, end_date, status) ';
            $query .= "VALUES ('$work_name', '$start_date', '$end_date', $status)";

            $result = $conn->query($query);
            if ($result) {
                $data['success'] = 'Work is added successfully';
            }
        }
        return $data;
    }
}
?>