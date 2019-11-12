
            function displayVegOnly() {
                $(".non-veg-items").toggle("fast");
            }

            function collapseMenuCards(id) {
                $("#"+id).slideToggle(250);
                if($("#"+id+"-icon").attr("class") == "svg-inline--fa fa-plus fa-w-14") {
                    $("#"+id+"-icon").attr("class", "svg-inline--fa fa-minus fa-w-14");
                }
                else {
                    $("#"+id+"-icon").attr("class", "svg-inline--fa fa-plus fa-w-14");
                }
            }

            function updateQuantity(id, reduce=false) {
                var current_quantity = $("#"+id).text();
                if(reduce) {
                    $("#"+id).text(parseInt(current_quantity)-1);
                    if($("#"+id).text() != 0) {
                        $("#"+id+"-reduce-btn").prop("disabled" ,false);
                    }
                    else {
                        $("#"+id+"-reduce-btn").prop("disabled" ,true);
                    }
                }
                else {
                    $("#"+id).text(parseInt(current_quantity)+1);
                    $("#"+id+"-reduce-btn").prop("disabled" ,false);
                }
            }

            function scrollToPosition(position) {
                $("html,body").animate({scrollTop:position}, 800, 'swing');
            }

            function removeItem(id) {
                $("#"+id).toggle("fast");
            }

            $(document).ready(function() {
                var scroll_height = parseInt($("header").css("height")) + parseInt($(".veg-only-btn-container").css("height")) - parseInt($("#menu-btn-container").css("height"));
                var food_scroll_height = scroll_height;
                var beverages_scroll_height = food_scroll_height + parseInt($("#submenu-heading-1").css("height")) + parseInt($("#submenu-heading-2").css("height")) + parseInt($(".submenu-heading").css("height")) + parseInt($(".submenu-heading").css("height"));
                var drinks_scroll_height = beverages_scroll_height + parseInt($("#submenu-heading-3").css("height")) + parseInt($(".submenu-heading").css("height"));
                var deserts_scroll_height =  drinks_scroll_height + parseInt($("#submenu-heading-4").css("height")) + parseInt($(".submenu-heading").css("height"));
                $(document).scroll(function() {
                    var scroll_position = $(document).scrollTop();
                    if(scroll_position > 280) {
                        $("#scroll-btn").fadeIn("fast");
                    }
                    else {
                        $("#scroll-btn").fadeOut("fast");
                    }
                    if(scroll_position > parseInt($("header").css("height"))) {
                        $("#menu-btn-container").css({"position": "fixed", "width": "100%", "top": "0px", "padding": "10px 0px 5px 0px", "z-index": "1000", "background-image": "url('../images/background-images/bg4.jpeg')"});
                        $(".menu-button img").css({"width": "30px", "height": "30px"});
                    }
                    else {
                        $("#menu-btn-container").css({"position": "unset", "width": "100%", "top": "0px", "padding": "0px", "z-index": "0", "background-image": "url()"});
                        $(".menu-button img").css({"width": "40px", "height": "40px"});
                    }
                });
                $("#scroll-btn").click(function() {
                    scrollToPosition(0);
                });
                $("#food-menu-btn").click(function() {
                    scrollToPosition(food_scroll_height);
                });
                $("#beverages-menu-btn").click(function() {
                    scrollToPosition(beverages_scroll_height);
                });
                $("#drinks-menu-btn").click(function() {
                    scrollToPosition(drinks_scroll_height);
                });
                $("#deserts-menu-btn").click(function() {
                    scrollToPosition(deserts_scroll_height);
                });
            });

            var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 1000); // Change image every 2 seconds
}