<?php
    $conn = mysqli_connect('localhost', 'root', 'Ankitpal*1828542146', 'appetite');
    $starters = mysqli_query($conn, "select * from menu_items where type = 'food' and sub_type = 'starter'");
    $main_course = mysqli_query($conn, "select * from menu_items where type = 'food' and sub_type = 'main course'");
    $beverages = mysqli_query($conn, "select * from menu_items where type = 'beverage'");
    $drinks = mysqli_query($conn, "select * from menu_items where type = 'drink'");
    $deserts = mysqli_query($conn, "select * from menu_items where type = 'desert'");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylesheets/bootstrap-4.3.1-dist/css/bootstrap-grid.css">
        <link rel="stylesheet" href="stylesheets/bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="stylesheets/bootstrap-4.3.1-dist/css/bootstrap-reboot.css">
        <link rel="stylesheet" href="stylesheets/bootstrap-4.3.1-dist/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="stylesheets/bootstrap-4.3.1-dist/css/bootstrap.css">
        <link rel="stylesheet" href="stylesheets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="stylesheets/fontawesome-free-5.11.2-web/css/all.css">
        <script src="stylesheets/bootstrap-4.3.1-dist/js/bootstrap.bundle.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="stylesheets/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="stylesheets/bootstrap-4.3.1-dist/js/bootstrap.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="stylesheets/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="stylesheets/fontawesome-free-5.11.2-web/js/all.js"></script>
        <script src="script/jquery/jquery.js"></script>
        <link type="text/css" rel="stylesheet" href="stylesheets/dark-theme.css">
        <script src="script/scripts.js"></script>
        <script src="script/main.js"></script>
        <title>Appetite</title>
    </head>
    <body>
        
       
        <button class="scroll-btn" id="scroll-btn" title="Go to top"><span class="fa fa-chevron-up"></span></button>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <img src="images/logo2.png">
                        </center>
                    </div>
                </div>
            </div>
        </header>
       <main>
            <div class="container-fliud">
                <div class="row" id="menu-btn-container">
                    <div class="col-md-3">
                        <center>
                            <button type="button" class="menu-button" id="food-menu-btn"><img src="stylesheets/fontawesome-free-5.11.2-web/svgs/solid/utensils.svg"><span class=""></span></button>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <button type="button" class="menu-button" id="beverages-menu-btn"><img src="stylesheets/fontawesome-free-5.11.2-web/svgs/solid/coffee.svg"><span class=""></span></button>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <button type="button" class="menu-button" id="drinks-menu-btn"><img src="stylesheets/fontawesome-free-5.11.2-web/svgs/solid/glass-martini-alt.svg"><span class=""></span></button>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <button type="button" class="menu-button" id="deserts-menu-btn"><img src="stylesheets/fontawesome-free-5.11.2-web/svgs/solid/ice-cream.svg"><span class=""></span></button>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Rounded switch -->
                        <div class="veg-only-btn-container">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round" onclick="displayVegOnly()"></span>
                            </label>

                            <label> Veg only</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading" onclick="collapseMenuCards('submenu-heading-1')"><span class="fas fa-minus" id="submenu-heading-1-icon"></span> Starters</p>
                            <div class="items-container"  id="submenu-heading-1">
                                <div class="container-fluid">
                        <?php
                            while($row = mysqli_fetch_assoc($starters)) {
                                if($row['type'] == "food" && $row['sub_type'] == "starter") {?>
                                    <div class="row items <?php echo ($row['veg']) ? 'veg-items': 'non-veg-items'; ?>">
                                    <div class="col-sm-3">
                                        <center>
                                            <img src="images/food-images/<?php echo $row['image'] ?>" class="rounded item-img">
                                        </center>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="item-name"><?php echo $row['name'] ?></p>
                                        <div class="item-desc-container">
                                            <p class="item-desc"><?php echo $row['description'] ?></p>
                                            <select class="item-desc-helper">
                                                <option class="item-desc-helper-option">extra cheese</option>
                                                <option class="item-desc-helper-option">extra toppings</option>
                                                <option class="item-desc-helper-option">salad</option>
                                                <option class="item-desc-helper-option">cream salad</option>
                                            </select>
                                        </div>
                                         
                                            <p class="item-price">₹<?php echo $row['cost'] ?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="quantity-btn-container">
                                            <button type="button" class="btn btn-danger quantity-btn" id="quantity-starters-item<?php echo $row['item_id'] ?>-reduce-btn" onclick="updateQuantity('quantity-starters-item<?php echo $row['item_id'] ?>', true)" disabled>-</button>
                                            <p class="quantity-text" id="quantity-starters-item<?php echo $row['item_id'] ?>">0</p>
                                            <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-starters-item<?php echo $row['item_id'] ?>')">+</button>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                            }
                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading" onclick="collapseMenuCards('submenu-heading-2')"><span class="fas fa-minus" id="submenu-heading-2-icon"></span> Main Course</p>
                            <div class="items-container" id="submenu-heading-2">
                                <div class="container-fluid">
                                <?php
                            while($row = mysqli_fetch_assoc($main_course)) {
                                if($row['type'] == "food" && $row['sub_type'] == "main course") {?>
                                    <div class="row items <?php echo ($row['veg']) ? 'veg-items': 'non-veg-items'; ?>">
                                    <div class="col-sm-3">
                                        <center>
                                            <img src="images/food-images/<?php echo $row['image'] ?>" class="rounded item-img">
                                        </center>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="item-name"><?php echo $row['name'] ?></p>
                                        <div class="item-desc-container">
                                            <p class="item-desc"><?php echo $row['description'] ?></p>
                                            <select class="item-desc-helper">
                                                <option class="item-desc-helper-option">extra cheese</option>
                                                <option class="item-desc-helper-option">extra toppings</option>
                                                <option class="item-desc-helper-option">salad</option>
                                                <option class="item-desc-helper-option">cream salad</option>
                                            </select>
                                        </div>
                                         
                                            <p class="item-price">₹<?php echo $row['cost'] ?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="quantity-btn-container">
                                            <button type="button" class="btn btn-danger quantity-btn" id="quantity-starters-item<?php echo $row['item_id'] ?>-reduce-btn" onclick="updateQuantity('quantity-starters-item<?php echo $row['item_id'] ?>', true)" disabled>-</button>
                                            <p class="quantity-text" id="quantity-starters-item<?php echo $row['item_id'] ?>">0</p>
                                            <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-starters-item<?php echo $row['item_id'] ?>')">+</button>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                            }
                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading" onclick="collapseMenuCards('submenu-heading-3')"><span class="fas fa-minus" id="submenu-heading-3-icon"></span> Beverages</p>
                            <div class="items-container" id="submenu-heading-3">
                                <div class="container-fluid">
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/1.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item1-reduce-btn" onclick="updateQuantity('quantity-maincourse-item1', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item1">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item1')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/2.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item2-reduce-btn" onclick="updateQuantity('quantity-maincourse-item2', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item2">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item2')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/3.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item3-reduce-btn" onclick="updateQuantity('quantity-maincourse-item3', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item3">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item3')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items non-veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/4.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item4-reduce-btn" onclick="updateQuantity('quantity-maincourse-item4', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item4">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item4')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/5.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item5-reduce-btn" onclick="updateQuantity('quantity-maincourse-item5', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item5">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item5')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/6.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item6-reduce-btn" onclick="updateQuantity('quantity-maincourse-item6', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item6">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item6')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/7.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item7-reduce-btn" onclick="updateQuantity('quantity-maincourse-item7', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item7">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item7')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading" onclick="collapseMenuCards('submenu-heading-4')"><span class="fas fa-minus" id="submenu-heading-4-icon"></span> Drinks</p>
                            <div class="items-container" id="submenu-heading-4">
                                <div class="container-fluid">
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/1.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item1-reduce-btn" onclick="updateQuantity('quantity-maincourse-item1', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item1">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item1')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/2.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item2-reduce-btn" onclick="updateQuantity('quantity-maincourse-item2', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item2">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item2')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/3.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item3-reduce-btn" onclick="updateQuantity('quantity-maincourse-item3', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item3">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item3')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items non-veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/4.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item4-reduce-btn" onclick="updateQuantity('quantity-maincourse-item4', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item4">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item4')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/5.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item5-reduce-btn" onclick="updateQuantity('quantity-maincourse-item5', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item5">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item5')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/6.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item6-reduce-btn" onclick="updateQuantity('quantity-maincourse-item6', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item6">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item6')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/7.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-maincourse-item7-reduce-btn" onclick="updateQuantity('quantity-maincourse-item7', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-maincourse-item7">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-maincourse-item7')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card submenu-container">
                            <p class="card-heading submenu-heading" onclick="collapseMenuCards('submenu-heading-5')"><span class="fas fa-minus" id="submenu-heading-5-icon"></span> Deserts</p>
                            <div class="items-container" id="submenu-heading-5">
                                <div class="container-fluid">
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/D1.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-deserts-item1-reduce-btn" onclick="updateQuantity('quantity-deserts-item1', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-deserts-item1">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-deserts-item1')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/D2.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-deserts-item2-reduce-btn" onclick="updateQuantity('quantity-deserts-item2', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-deserts-item2">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-deserts-item2')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/D3.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-deserts-item3-reduce-btn" onclick="updateQuantity('quantity-deserts-item3', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-deserts-item3">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-deserts-item3')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/D4.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-deserts-item4-reduce-btn" onclick="updateQuantity('quantity-deserts-item4', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-deserts-item4">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-deserts-item4')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/D5.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-deserts-item5-reduce-btn" onclick="updateQuantity('quantity-deserts-item5', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-deserts-item5">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-deserts-item5')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/D6.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-deserts-item6-reduce-btn" onclick="updateQuantity('quantity-deserts-item6', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-deserts-item6">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-deserts-item6')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row items veg-items">
                                        <div class="col-sm-3">
                                            <center>
                                                <img src="images/food-images/D7.jpg" class="rounded item-img">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="item-name">Item 1</p>
                                            <div class="item-desc-container">
                                                <p class="item-desc">(the example of the desc goes here....)</p>
                                                <select class="item-desc-helper">
                                                    <option class="item-desc-helper-option">extra cheese</option>
                                                    <option class="item-desc-helper-option">extra toppings</option>
                                                    <option class="item-desc-helper-option">salad</option>
                                                    <option class="item-desc-helper-option">cream salad</option>
                                                </select>
                                            </div>
                                             
                                                <p class="item-price"> ₹1000 </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="quantity-btn-container">
                                                <button type="button" class="btn btn-danger quantity-btn" id="quantity-deserts-item7-reduce-btn" onclick="updateQuantity('quantity-deserts-item7', true)" disabled>-</button>
                                                <p class="quantity-text" id="quantity-deserts-item7">0</p>
                                                <button type="button" class="btn btn-danger quantity-btn" onclick="updateQuantity('quantity-deserts-item7')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-container">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <button type="button" class="btn btn-success proceed-button">PROCEED ORDER</button>
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