<?php
    $conn = mysqli_connect('localhost', 'root', 'Ankitpal*1828542146', 'appetite');
    if(isset($_GET['item_ids'])) {
        $data = array();
        $data['item_ids'] = explode(",", $_GET['item_ids']);
        $data['item_quantities'] = explode(",", $_GET['item_quantities']);
    }

    $starters = array();
    $main_course = array();
    $beverages = array();
    $drinks = array();
    $deserts = array();

    foreach($data['item_ids'] as $index => $id) {
        $item_details = mysqli_query($conn, "SELECT * FROM `menu_items` WHERE item_id = ".$id);
        $row = mysqli_fetch_assoc($item_details);
        switch($row['type']) {
            case "food":
                if($row['sub_type'] == "starter") {
                    $row['quantity'] = $data['item_quantities'][$index];
                    $starters[] = $row;
                }
                else {
                    $row['quantity'] = $data['item_quantities'][$index];
                    $main_course[] = $row;
                }
                break;
            case "beverage":
                $row['quantity'] = $data['item_quantities'][$index];
                $beverages[] = $row;
                break;
            case "drink":
                $row['quantity'] = $data['item_quantities'][$index];
                $drinks[] = $row;
                break;
            case "desert":
                $row['quantity'] = $data['item_quantities'][$index];
                $deserts[] = $row;
                break;
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../stylesheets/bootstrap-4.3.1-dist/css/bootstrap-grid.css">
        <link rel="stylesheet" href="../../stylesheets/bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="../../stylesheets/bootstrap-4.3.1-dist/css/bootstrap-reboot.css">
        <link rel="stylesheet" href="../../stylesheets/bootstrap-4.3.1-dist/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="../../stylesheets/bootstrap-4.3.1-dist/css/bootstrap.css">
        <link rel="stylesheet" href="../../stylesheets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../stylesheets/fontawesome-free-5.11.2-web/css/all.css">
        <script src="../../stylesheets/bootstrap-4.3.1-dist/js/bootstrap.bundle.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="../../stylesheets/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="../../stylesheets/bootstrap-4.3.1-dist/js/bootstrap.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="../../stylesheets/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="../../stylesheets/fontawesome-free-5.11.2-web/js/all.js"></script>
        <script src="../../script/jquery/jquery.js"></script>
        <link type="text/css" rel="stylesheet" href="../../stylesheets/dark-theme.css">
        <script src="../../script/scripts.js"></script>
        <script src="../../script/main.js"></script>
        <title>Appetite</title>
    </head>
    <body>
        
       
        <button class="scroll-btn" id="scroll-btn" title="Go to top"><span class="fa fa-chevron-up"></span></button>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <img src="../../images/logo2.png">
                        </center>
                    </div>
                </div>
            </div>
        </header>
       <main>
            <div class="container-fliud">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(!empty($starters)) { ?>
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading"> Starters</p>
                            <div class="items-container">
                                <div class="container-fluid">
                                    <?php foreach($starters as $item) { ?>
                                    <div class="row items <?php echo ($item['veg'])?'veg-items':'non-veg-items'; ?>">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="../../images/food-images/<?php echo $item['image']; ?>" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name"><?php echo $item['name'] ?></p>
                                            <div class="item-desc-container">
                                                <p class="item-desc"><?php echo $item['description'] ?></p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-starters-item<?php echo $item['item_id'] ?>-reduce-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>', true)" >-</button>
                                                <p class="quantity-text" id="quantity-starters-item<?php echo $item['item_id'] ?>"><?php echo $item['quantity'] ?></p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($main_course)) { ?>
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading"> Main Course</p>
                            <div class="items-container">
                                <div class="container-fluid">
                                    <?php foreach($main_course as $item) { ?>
                                    <div class="row items <?php echo ($item['veg'])?'veg-items':'non-veg-items'; ?>">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="../../images/food-images/<?php echo $item['image']; ?>" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name"><?php echo $item['name'] ?></p>
                                            <div class="item-desc-container">
                                                <p class="item-desc"><?php echo $item['description'] ?></p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-starters-item<?php echo $item['item_id'] ?>-reduce-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>', true)" >-</button>
                                                <p class="quantity-text" id="quantity-starters-item<?php echo $item['item_id'] ?>"><?php echo $item['quantity'] ?></p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($beverages)) { ?>
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading"> Beverages</p>
                            <div class="items-container">
                                <div class="container-fluid">
                                    <?php foreach($beverages as $item) { ?>
                                    <div class="row items <?php echo ($item['veg'])?'veg-items':'non-veg-items'; ?>">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="../../images/food-images/<?php echo $item['image']; ?>" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name"><?php echo $item['name'] ?></p>
                                            <div class="item-desc-container">
                                                <p class="item-desc"><?php echo $item['description'] ?></p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-starters-item<?php echo $item['item_id'] ?>-reduce-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>', true)" >-</button>
                                                <p class="quantity-text" id="quantity-starters-item<?php echo $item['item_id'] ?>"><?php echo $item['quantity'] ?></p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($drinks)) { ?>
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading"> Drinks</p>
                            <div class="items-container">
                                <div class="container-fluid">
                                    <?php foreach($drinks as $item) { ?>
                                    <div class="row items <?php echo ($item['veg'])?'veg-items':'non-veg-items'; ?>">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="../../images/food-images/<?php echo $item['image']; ?>" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name"><?php echo $item['name'] ?></p>
                                            <div class="item-desc-container">
                                                <p class="item-desc"><?php echo $item['description'] ?></p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-starters-item<?php echo $item['item_id'] ?>-reduce-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>', true)" >-</button>
                                                <p class="quantity-text" id="quantity-starters-item<?php echo $item['item_id'] ?>"><?php echo $item['quantity'] ?></p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($deserts)) { ?>
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading"> Deserts</p>
                            <div class="items-container">
                                <div class="container-fluid">
                                    <?php foreach($deserts as $item) { ?>
                                    <div class="row items <?php echo ($item['veg'])?'veg-items':'non-veg-items'; ?>">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="../../images/food-images/<?php echo $item['image']; ?>" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name"><?php echo $item['name'] ?></p>
                                            <div class="item-desc-container">
                                                <p class="item-desc"><?php echo $item['description'] ?></p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-starters-item<?php echo $item['item_id'] ?>-reduce-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>', true)" >-</button>
                                                <p class="quantity-text" id="quantity-starters-item<?php echo $item['item_id'] ?>"><?php echo $item['quantity'] ?></p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-starters-item<?php echo $item['item_id'] ?>')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="button-container">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <button type="button" class="btn btn-success proceed-button">ADD MORE</button>
                            </center>
                        </div>
                        <div class="col-md-6">
                                <center>
                                    <button type="button" class="btn btn-success proceed-button">PLACE ORDER</button>
                                </center>
                            </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <p>Powered by: SFOYO</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
