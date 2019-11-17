<?php
    $conn = mysqli_connect('localhost', 'dpankur', 'dpankur07', 'appetite');
    if(isset($_POST['data'])) {
        $data = $_POST['data'];

        foreach($data['item_id'] as $index => $id) {
            $item_details = mysqli_query($conn, "SELECT * FROM `menu_items` WHERE item_id = ".$id);
            $row = mysqli_fetch_assoc($item_details);
            $row['quantity'] = $data['item_quantity'][$index];
            mysqli_query($conn, "INSERT INTO `ordered_items`(`item_id`, `name`, `special_instructions`, `cost`, `quantity`) VALUES (".$row['item_id'].",'".$row['name']."',1,".$row['cost'].",".$row['quantity'].")");
        }
    }
    if(isset($_POST['time'])) {
            mysqli_query($conn, "UPDATE `ordered_items` SET `accepted`=".$_POST['accepted'].", `time`=".$_POST['time']." WHERE `item_id` = ".$_POST['item_id']);
            echo 1;
    }
    if(isset($_GET['get_time'])) {
        $query = mysqli_query($conn, "SELECT * FROM `ordered_items`");
        $data = array();
        while($row = mysqli_fetch_array($query)) {
            $data[] = $row['time'];
        }
        print_r($data);
    }
?>