$(function() {
    
    $('.dropdown-submenu a.drop').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
    
    /*
    $(".jump_to").on("click", function() {
        var id = $(this).attr("href");
        var hamburger = $("#hamburger");
        var headerDiv = $("#header");
        $("html, body").animate({
            scrollTop: $(id).offset().top - 110
        }, "slow");
        if($(hamburger).hasClass("is-active")) {
            $(hamburger).removeClass("is-active");
            $(headerDiv).removeClass("show");
        }
        return false;
    });
    
    if(window.location.hash) {
        var wrapHash = $(window.location.hash).offset().top;
        setTimeout(function() {
            if(window.location.hash != '#faq_h2' && window.location.hash != '#connection') {
                $("html, body").animate({
                    scrollTop: wrapHash - 110
                }, "slow");
            } else {
                $('body, html').scrollTop(($(window).scrollTop() - 110));
            }
        }, 100);
    }
    
    $("#hamburger").on("click", function() {
        var headerDiv = $("#header");
        if($(this).hasClass("is-active")) {
            $(this).removeClass("is-active");
            $(headerDiv).removeClass("show");
        } else {
            $(this).addClass("is-active");
            $(headerDiv).addClass("show");
        }
        return false;
    });
        
    $(".product-cart").on("change", function() {
        
            var prod_id = $(this).attr("data-product-id");
            
            var count = $("#input_count_" + prod_id).val();
            
            var prod_obj = $("#product-" + prod_id);
            var prod_price = $("option:selected", prod_obj).val();
            var prod_price_sum = count * prod_price;
            $("#actial-price-" + prod_id).text(prod_price_sum);
            
        return false;
    });
    
    $(document).on("click", ".minus", function () {
        var $input = $(this).parents(".input-group").find("input");
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        
        var prod_id = $(this).attr("data-product_id");
        var prod_obj = $("#product-" + prod_id);
        var prod_price = $("option:selected", prod_obj).val();
        var prod_price_sum = count * prod_price;
        $("#actial-price-" + prod_id).text(prod_price_sum);
    });
    
    $(document).on("click", ".plus", function () {
        var $input = $(this).parents(".input-group").find("input");
        var count = parseInt($input.val()) + 1;
        $input.val(count);
        $input.change();
        
        var prod_id = $(this).attr("data-product_id");
        var prod_obj = $("#product-" + prod_id);
        var prod_price = $("option:selected", prod_obj).val();
        var prod_price_sum = count * prod_price;
        $("#actial-price-" + prod_id).text(prod_price_sum);
    });
    
    $(document).on("click", ".btn-pay", function() {
        var product_id = $(this).attr("data-product-id");
        if(product_id) {
            $("#form-" + product_id).submit();
        }
        return false;
    });
    
    $(document).on("click", ".btn-buy", function() {
        
        var dataId    = $(this).attr("data-product-id");
        var dataCount = $("#input_count_" + dataId).val();
        var dataType  = $("option:selected", $("#product-" + dataId)).attr("data-product-id");
        var dataSize  = $("option:selected", $("#product-" + dataId)).text();
        var dataCost  = $("#actial-price-" + dataId).text();
        
        $.ajax({
            type: "post",
            url: "/cart/cart_buy",
            dataType: "json",
            data: {
                id:    dataId,
                count: dataCount,
                type:  dataType,
                size:  dataSize,
                cost:  dataCost
            },
            success: function(data) {
                if(data.result == 1) {
                    
                    $("#buy_inner").html(data.html);
                    
                    $.fancybox.open({
                        src  : "#buy_div",
                        type : "inline"
                    });            
                    
                }
            }
        });
        
        return false;
    });
    
    $(".form-product").submit(function() {
        
        var product_id = $(this).attr("data-product-id");
        
        var dataId    = product_id;
        var dataCount = $("#input_count_" + product_id).val();
        var dataType  = $("option:selected", $("#product-" + product_id)).attr("data-product-id");
        
        $.ajax({
            type: "post",
            url: "/cart/cart_add",
            dataType: "json",
            data: {
                id:    dataId,
                count: dataCount,
                type: dataType
            },
            success: function(data) {
                if(data.result == 1) {
                    $("#cart_counter").html(data.count);
                    $("#cart_mini").css("visibility", "visible");
                }
            }
        });
        return false;
    });
    
    // Cart
    $(document).on("click", ".remove", function() {
        
        var delivery = $("#delivery").val();
        
        var thisElem = $(this);
        
        var cart_sum_pre = 0;
        
        var dataId   = $(this).attr("data-product-id");
        var dataType = $(this).attr("data-product-type");
        
        $.ajax({
            type: "post",
            url: "/cart/cart_empty",
            dataType: "json",
            data: {
                id:   dataId,
                type: dataType
            },
            success: function(data) {
                
                if(data.result == 1) {
                    
                    $(thisElem).parents(".cart").remove();
                    
                    if(delivery == 2) {
                        cart_sum_pre = (data.price / 100) * 5;
                        data.price_total = data.price_total - cart_sum_pre;
                    }
                    
                    $("#cart_sum").html(data.price);
                    $("#cart_sum_10").html(data.discount);
                    $("#cart_sum_pre").html(cart_sum_pre);
                    $("#cart_sum_total").html(data.price_total);
                }
            }
        });
        
    });
    
    $(document).on("click", ".price_btn_minus, .price_btn_plus", function() {
        
        var delivery = $("#delivery").val();
        
        var thisElem = $(this);
        
        var cart_sum_pre = 0;
        
        var dataId   = $(this).attr("data-product-id");
        var dataType = $(this).attr("data-product-type");
        var dataAct  = $(this).attr("data-product-act");
        var dataCost = $(this).attr("data-product-cost");
        
        $.ajax({
            type: "post",
            url: "/cart/cart_act",
            dataType: "json",
            data: {
                id:   dataId,
                type: dataType,
                act:  dataAct,
                cost: dataCost
            },
            success: function(data) {
                
                if(data.result > 0) {
                    
                    if(data.result == 1) {
                        $("#total_sum_" + dataId + "_" + dataType).html(data.cost);
                    }
                    if(data.result == 2) {
                        $(thisElem).parents(".cart").remove();
                    }
                    
                    if(delivery == 2) {
                        cart_sum_pre = (data.price / 100) * 5;
                        data.price_total = data.price_total - cart_sum_pre;
                    }
                    
                    $("#cart_sum").html(data.price);
                    $("#cart_sum_10").html(data.discount);
                    $("#cart_sum_pre").html(cart_sum_pre);
                    $("#cart_sum_total").html(data.price_total);
                    
                }
                
                
            }
        });
        
    });
    
    $("#delivery").on("change", function() {
        
        var delivery = $(this).val();
        var cart_sum_pre = 0;
        
        $.ajax({
            type: "post",
            url: "/cart/cart_details",
            dataType: "json",
            data: {
                delivery: delivery
            },
            success: function(data) {
                
                if(delivery == 2) {
                    cart_sum_pre = (data.price / 100) * 5;
                    data.price_total = data.price_total - cart_sum_pre;
                }
                
                $("#cart_sum").html(data.price);
                $("#cart_sum_10").html(data.discount);
                $("#cart_sum_pre").html(cart_sum_pre);
                $("#cart_sum_total").html(data.price_total);
                
            }
        });
        
    });
    
    $("#buy_delivery").on("change", function() {
        
        var delivery       = $(this).val();
        
        var dataPrice      = parseInt($("#buy_sum").text(), 10);
        var cart_sum_pre   = 0;
        var dataDiscount   = 0;
        var dataPriceTotal = 0;
                
        if(delivery == 2) {
            cart_sum_pre = (dataPrice / 100) * 5;
        }
        if(dataPrice >= 10000) {
            dataDiscount = (dataPrice / 100) * 5;
        }
        dataPriceTotal = dataPrice - (cart_sum_pre + dataDiscount);
        
        $("#buy_sum_10").text(dataDiscount);
        $("#buy_sum_pre").text(cart_sum_pre);
        $("#buy_sum_total").text(dataPriceTotal);
        
    });
    
    $("#manufacture_video img").hover(
        function() {
            $(this).attr("src", "/img/video_play.jpg");
        }, function() {
            $(this).attr("src", "/img/video_stop.jpg");
        }
    );
    
    $("#mask_phone").inputmask("+7 (999) 999-99-99", {
        placeholder: "+7 (___) ___-__-__",
        showMaskOnHover: false
    });
    
    $(".close").on("click", function() {
        $(this).parent().slideUp("slow", function() {
            $(this).remove();
        });
    });
    
    $("#form_send").on("click", function() {
        
        var formError = [];
        
        var formName    = $("#mask_name");
        var formPhone   = $("#mask_phone");
        var formAddress = $("#mask_address");
        
        if($(formAddress).val().length == 0) {
            formError.push("mask_address");
        }
        
        if($(formName).val().length == 0) {
            formError.push("mask_name");
        }
        
        if($(formPhone).val().length == 0) {
            formError.push("mask_phone");
        } else {
            var formPhoneCount = $(formPhone).val().match(/\d/g).join("").length;
            if(formPhoneCount != 11) {
                formError.push("mask_phone");
            }
        }
        
        if(formError.length > 0) {
            
            $("#" + formError[0]).focus();
            
            $("html, body").animate({
                scrollTop: $("#" + formError[0]).offset().top - 110
            }, "slow");
            
            return false;
        }
        
        $(".form_send")[0].submit();
    });
    
    $("[data-fancybox]").fancybox({
        clickContent: false
    });
    
    */
        
});