<?php 
include 'conn.php';

$data = array();
$sql = "SELECT * FROM crimes";
$result = $conn->query($sql);
if ($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
    }

echo json_encode($data)
?>