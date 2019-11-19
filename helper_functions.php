<?php
    $conn = mysqli_connect('localhost', 'root', 'Ankitpal*1828542146', 'appetite');
    if(isset($_POST['data'])) {
        $data = $_POST['data'];

        $order_no = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `ordered_items` order by `order_no` desc LIMIT 1"))['order_no'] + 1;

        foreach($data['item_id'] as $index => $id) {
            $item_details = mysqli_query($conn, "SELECT * FROM `menu_items` WHERE item_id = ".$id);
            $row = mysqli_fetch_assoc($item_details);
            $row['quantity'] = $data['item_quantity'][$index];
            mysqli_query($conn, "INSERT INTO `ordered_items`(`order_no`, `item_id`, `name`, `special_instructions`, `cost`, `quantity`) VALUES (".$order_no.",".$row['item_id'].",'".$row['name']."',1,".$row['cost'].",".$row['quantity'].")");
        }
        echo $order_no;
    }
    if(isset($_POST['time'])) {
            mysqli_query($conn, "UPDATE `ordered_items` SET `accepted`=".$_POST['accepted'].", `time`=".$_POST['time']." WHERE `order_no` = ".$_POST['order_no']);
            echo 1;
    }
    if(isset($_GET['order_no'])) {
        $query = mysqli_query($conn, "SELECT * FROM `ordered_items` WHERE `order_no` = ".$_GET['order_no']);
        $row = mysqli_fetch_array($query);
        $data = $row['time'];
        echo json_encode($data);
    }
?>