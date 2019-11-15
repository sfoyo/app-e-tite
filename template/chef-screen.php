<?php
    session_start();
    $conn = mysqli_connect('localhost', 'dpankur', 'dpankur07', 'appetite');

    $orders = array();
    $items = mysqli_query($conn, "SELECT * FROM `ordered_items`");

    while($row = mysqli_fetch_array($items)) {
        $orders[] = $row;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../stylesheets/bootstrap-4.3.1-dist/css/bootstrap-grid.css">
        <link rel="stylesheet" href="../stylesheets/bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="../stylesheets/bootstrap-4.3.1-dist/css/bootstrap-reboot.css">
        <link rel="stylesheet" href="../stylesheets/bootstrap-4.3.1-dist/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="../stylesheets/bootstrap-4.3.1-dist/css/bootstrap.css">
        <link rel="stylesheet" href="../stylesheets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../stylesheets/fontawesome-free-5.11.2-web/css/all.css">
        <script src="../stylesheets/bootstrap-4.3.1-dist/js/bootstrap.bundle.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="../stylesheets/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="../stylesheets/bootstrap-4.3.1-dist/js/bootstrap.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="../stylesheets/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
        <script src="../stylesheets/fontawesome-free-5.11.2-web/js/all.js"></script>
        <script src="../script/jquery/jquery.js"></script>
        <link type="text/css" rel="stylesheet" href="../stylesheets/dark-theme.css">
        <script src="../script/scripts.js"></script>
        <script src="../script/main.js"></script>
        <title>Chef Screen</title>
    </head>
    <body>
        
        <button class="scroll-btn" id="scroll-btn" title="Go to top"><span class="fa fa-chevron-up"></span></button>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <img src="../images/logo-images/logo2.png">
                        </center>
                    </div>
                </div>
            </div>
        </header>
       <main>
            <div class="container-fliud">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card submenu-container">
                            <p class="card-heading chef-screen-heading"> Table No. 1</p>
                            <div class="items-container">
                                <div class="container-fluid">
                                    <?php foreach($orders as $order) { ?>
                                        <?php if($order['accepted']) { ?>
                                            <div class="row items" id="table-1-item-<?php echo $order['item_id']; ?>">
                                                <div class="col-sm-8">
                                                    <p class="chef-screen-item-name"><?php echo $order['name']; ?></p>
                                                    <p class="special-request">special requests:  <?php echo $order['special_instructions']; ?></p>
                                                </div>
                                                <div class="col-sm-2">
                                                    <p class="number-of-items"> <b> X <?php echo $order['quantity']; ?></b> </p>
                                                </div>
                                                <div class="col-sm-2">
                                                    <center><button type="button" class="btn btn-success chef-screen-tick" onclick="removeItem('table-1-item-<?php echo $order['item_id']; ?>')">Done</button></center>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                    <div class="new-order-container">
                                        <div class="row items time-indicator">
                                            <div class="col-sm-3">
                                                <center>
                                                    <button type="button" class="btn btn-success" onclick="acceptOrder(<?php echo $order['item_id']; ?>, 5, true)">05:00</button>
                                                </center>
                                            </div>
                                            <div class="col-sm-3">
                                                <center>
                                                    <button type="button" class="btn btn-success" onclick="acceptOrder(<?php echo $order['item_id']; ?>, 10, true)">10:00</button>
                                                </center>
                                            </div>
                                            <div class="col-sm-3">
                                                <center>
                                                    <button type="button" class="btn btn-success" onclick="acceptOrder(<?php echo $order['item_id']; ?>, 15, true)">15:00</button>
                                                </center>
                                            </div>
                                            <div class="col-sm-3">
                                                <center>
                                                    <button type="button" class="btn btn-success" onclick="acceptOrder(<?php echo $order['item_id']; ?>, 20, true)">20:00</button>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="row items" id="table-1-item-<?php echo $order['item_id']; ?>">
                                            <div class="col-sm-9">
                                                <p class="chef-screen-item-name"><?php echo $order['name']; ?></p>
                                                <p class="special-request">special requests:  <?php echo $order['special_instructions']; ?></p>
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="number-of-items"> <b> X <?php echo $order['quantity']; ?></b> </p>
                                            </div>
                                        </div>
                                    </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
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