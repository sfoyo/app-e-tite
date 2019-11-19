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
                <title>After order</title>
            </head>
    <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <img src="../../images/logo-images/logo2.png">
                        </center>
                    </div>
                </div>
            </div>
        </header>
    <body>
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">  
                        <center>
                            <p class="time">00:00</p>
                        </center>
                    </div>
                </div>
        <div class="row section all-set">
            <div class="col-md-12">  
                <center>
                        <p>
                            Now Sit Back and Relax
                        </p>
                    </center>
            </div>
        </div>
                <div class="row">
                    <div class="col-md-12">
                        <center>
                             <img src="../../images/gif-images/gif4.gif" style="
                                width: 600px;
                                height: 500px;
                                color: red;
                                margin-top: -120px;
                                box-shadow: 0px 0px 21px 26px #7d4221;
                            ">
                            <!--<span class="fas fa-pizza-slice fa-spin"></span>-->
                        </center>
                    </div>
                </div>
                <div class="row section after-order-screen">
                    <div class="col-md-12">
                        <center>
                            <p>
                                Your order is being prepared....
                            </p>
                        </center>
                    </div>
                </div>  
                        <div class="button-container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                            <a href="http://algos.epizy.com/CosAlgos/"><button type="button" class="btn btn-success explore-more">EXPLORE MORE</button></a>
                                        </center>
                                    </div>
                                </div>
                        </div>  
            </div>
        </main>
           <!-- <footer>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Powered by: SFOYO</p>
                            </div>
                        </div>
                    </div>
                </footer>
           -->
           <script>
               $(document).ready(function() {
                   setInterval(function() {
                    $.ajax({
                        type: "GET",
                        url: "http://localhost/Project/app-e-tite/helper_functions.php/?order_no=<?php echo $_GET['order_no']; ?>",
                        success: function(result) {
                            var data = JSON.parse(result);
                            $(".time").text(data+":00");
                        }
                    });
                   }, 1000);
               });
           </script>
    </body>
</html>