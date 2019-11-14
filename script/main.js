
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

function getData() {
    var item_ids = [];
    var item_quantitys = [];
    var total_items = $(".quantity-text").length;
    for (var i = 0; i < total_items; i++) {
        var item = $(".quantity-text:eq(" + i + ")");
        if (parseInt(item.text()) != 0) {
            item_ids.push(item.attr("id").match(/(\d+)/)[0]);
            item_quantitys.push(parseInt(item.text()));
        }
    }
    var data = { item_id:item_ids, item_quantity:item_quantitys };
                return data;
            }

            $(document).ready(function() {
                var scroll_height = parseInt($("header").css("height")) + parseInt($(".veg-only-btn-container").css("height")) - parseInt($("#menu-btn-container").css("height"));
                var food_scroll_height = scroll_height;
                var beverages_scroll_height = food_scroll_height + parseInt($("#submenu-heading-1").css("height")) + parseInt($("#submenu-heading-2").css("height")) + parseInt($(".submenu-heading").css("height")) + parseInt($(".submenu-heading").css("height"));
                var drinks_scroll_height = beverages_scroll_height + parseInt($("#submenu-heading-3").css("height")) + parseInt($(".submenu-heading").css("height"));
                var deserts_scroll_height =  drinks_scroll_height + parseInt($("#submenu-heading-4").css("height")) + parseInt($(".submenu-heading").css("height"));
                $(document).scroll(function() {
                    var scroll_position = $(document).scrollTop();
                    if(scroll_position > 380) {
                        $("#scroll-btn").fadeIn("fast");
                    }
                    else {
                        $("#scroll-btn").fadeOut("fast");
                    }
                    if(scroll_position > parseInt($("header").css("height"))) {
                        $("#menu-btn-container").css("display", "inline-flex");
                    }
                    else {
                        $("#menu-btn-container").css("display", "none");
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
                $("#food-menu-btn-top").click(function() {
                    scrollToPosition(food_scroll_height);
                });
                $("#beverages-menu-btn-top").click(function() {
                    scrollToPosition(beverages_scroll_height);
                });
                $("#drinks-menu-btn-top").click(function() {
                    scrollToPosition(drinks_scroll_height);
                });
                $("#deserts-menu-btn-top").click(function() {
                    scrollToPosition(deserts_scroll_height);
                });

                $("#proceed-btn").click(function() {
                    var data = getData();
                    var item_ids = data['item_id'];
                    var item_quantities = data['item_quantity'];
                    window.location.assign("http://localhost/Project/app-e-tite/template/review-order.php/?item_ids="+item_ids+"&item_quantities="+item_quantities);
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
                
                

/*             $(document).ready(function() {
                var scroll_height = parseInt($("header").css("height")) + parseInt($(".veg-only-btn-container").css("height")) - parseInt($("#menu-btn-container").css("height"));
                var food_scroll_height = scroll_height;
                var beverages_scroll_height = food_scroll_height + parseInt($("#submenu-heading-1").css("height")) + parseInt($("#submenu-heading-2").css("height")) + parseInt($(".submenu-heading").css("height")) + parseInt($(".submenu-heading").css("height"));
                var drinks_scroll_height = beverages_scroll_height + parseInt($("#submenu-heading-3").css("height")) + parseInt($(".submenu-heading").css("height"));
                $(document).scroll(function() {
                    var scroll_position = $(document).scrollTop();
                    if(scroll_position > 380) {
                        $("#scroll-btn").fadeIn("fast");
                    }
                    else {
                        $("#scroll-btn").fadeOut("fast");
                    }
                    if(scroll_position > parseInt($("header").css("height"))) {
                        $("#menu-btn-container").css("display", "inline-flex");
                    }
                    else {
                        $("#menu-btn-container").css("display", "none");
                    }
                }); 
            }); */


/*             function scrollToPosition(position) {
                $("html,body").animate({scrollTop:position}, 800, 'swing');
            } */

            $(document).scroll(function() {
                if($(document).scrollTop() + $(document).height() == $(document).height()) {
                    alert("bottom!");
                }
            });

            /* $(document).on("scroll", function() {
                var scrollHeight = $(document).height();
                var scrollPosition = $(document).height() + $(document).scrollTop();
                if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
                    $("#button-container").css("position", "relative","bottom", "90%");
                    alert("bottom!");
                }
            }); */

function myFunction() {
    location.replace("review-order.html")
  }
