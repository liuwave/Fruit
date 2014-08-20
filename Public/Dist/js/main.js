/**
 * Created by Administrator on 14-7-11.
 */


// 计算对象长度
function objectLength(o){
    var n, count = 0;
    for(n in o){
        if(o.hasOwnProperty(n)){
            count++;
        }
    }
    return count;
}

$('#listsTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');

});
$("#page-cart #shopcart .top_is_checked").click(function(e){
    var oc=JSON.parse(localStorage.getItem(storageName));
    if($(this).prop("checked")){
    $("#page-cart #shopcart .goodList .is_checked").attr("checked",true);
        for(k in oc){
            oc[k].gIsChecked=true;
        }
    }else{
        $("#page-cart #shopcart .goodList .is_checked").attr("checked",true);
        for(k in oc){
            oc[k].gIsChecked=false;
        }
    }
    localStorage.setItem(storageName,JSON.stringify(oc));
    fruitFreshCookieCart();

});
$('.footer .btn').click(function(e){

   $(this).parents(".footer")
       .find(".btn")
       .removeClass("menu-active")

    $(this).addClass("menu-active");




    switch ($(this).attr("id")){
        case "btn-menu-cart":{


        }

    }
});


function fruitFreshCookie(){


    if(!!localStorage.getItem(storageName)){
        var c=JSON.parse(localStorage.getItem(storageName));

        $(".footer #btn-menu-cart #cartCount").html(objectLength(c).toString());

    }
}


function fruitFreshCookieCart(){

    $("#page-cart #shopcart .goodList").remove();
    $("#page-cart #shopcart .top_is_checked").attr("checked",true);
    var cartPrice=0.0;
    var tempPrice=0.0;
    var checkedCount=0;

    if(!!localStorage.getItem(storageName)){
        var c=JSON.parse(localStorage.getItem(storageName));
		if(objectLength(c)<=0){
			$("#no-fruit").remove();
		}
		
		
        console.log(c);
        for(var k in c){
            var cartBaseGood=$("#page-cart #shopcart .base-cartList")
                .clone().removeClass("base-cartList hidden")
                .attr({"id":k,"data-fruit-check":c[k].gCheckCode})
                .addClass("goodList");
            if(c[k].gCount<=1){
                cartBaseGood.find(".goodMinus").addClass("disabled");
                c[k].gCount=1;
            }else{
                cartBaseGood.find(".goodMinus").removeClass("disabled");
            }

            var tempPrice=parseInt(c[k].gCount)*parseFloat(c[k].gPrice);

            cartBaseGood.find(".media-object").attr("src",c[k].gImg)
                .end().find(".media-heading").html(c[k].gName)
                .end().find(".goodPrice").html(c[k].gPrice)
                .end().find(".goodUnit").html(c[k].gUnit)
                .end().find(".goodCount").val(c[k].gCount)
                .end().find(".sub-total").html(tempPrice.toFixed(2))
                .end().find(".is_checked").attr("checked",c[k].gIsChecked)
                .click(function(e){
                    console.log($(this));
                    var oc=JSON.parse(localStorage.getItem(storageName));
                    var goodId=$(this).parents(".goodList").attr("id");
                    oc[goodId].gIsChecked=$(this).prop("checked");
                    localStorage.setItem(storageName,JSON.stringify(oc));
                    fruitFreshCookieCart();

                })
                .end().find(".goodPlus").click(function (e) {
                    $(this).prevAll(".goodMinus").removeClass("disabled");
                    var goodsId = $(this).parents(".goodList").attr("id");
                    var countSpan = $(this).prev();
                    if (!localStorage.getItem(storageName)) {

                    }else{
                        var c=JSON.parse(localStorage.getItem(storageName));
                        if(!!c[goodsId]){
                            c[goodsId].gCount++;
                            countSpan.val(c[goodsId].gCount);
                            localStorage.setItem(storageName,JSON.stringify(c));
                        }
                    }
                    fruitFreshCookieCart();

                })
                .end().find(".goodMinus").click(function (e) {

                    var goodsId = $(this).parents(".goodList").attr("id");
                    var countSpan = $(this).next();

                    if (!localStorage.getItem(storageName)) {
                        $(this).parents(".panel-footer").popover({
                            "content":"购物车为空",
                            "trigger":"manual",
                            "placement":"top"
                        });
                        $(this).parents(".panel-footer").popover('toggle');
                        //fruitFreshCookieCart();
                    }else{
                        var c=JSON.parse(localStorage.getItem(storageName));
                        if(!!c[goodsId]){
                            c[goodsId].gCount--;

                            if( c[goodsId].gCount<=1){
                                $(this).addClass("disabled");
                            }

                            countSpan.val(c[goodsId].gCount);

                            localStorage.setItem(storageName,JSON.stringify(c));
                        }
                    }
                    fruitFreshCookieCart();
                })
                .end().find(".btn-del").attr("data-target",".model-btn-"+k)
                .end().find(".modal-del").addClass("model-btn-"+k)
                .find(".btn-qdel").click(function(e){
                    var oc=JSON.parse(localStorage.getItem(storageName));
                    var goodId=$(this).parents(".goodList").attr("id");
                    delete oc[goodId];
                    localStorage.setItem(storageName,JSON.stringify(oc));

                    fruitFreshCookie();
                    fruitFreshCookieCart();
                    $("body").removeClass("modal-open");
                    $(".modal-backdrop").remove();
                    $(this).parents(".goodList").remove();
                });

                 cartBaseGood.find("a").attr("href",c[k].gUrl);




            $("#page-cart #shopcart>.container-fluid #shop").after(cartBaseGood);


            if(!cartBaseGood.find(".is_checked").prop("checked")){
                $("#page-cart #shopcart .top_is_checked").attr("checked",false);
            }else{
                checkedCount++;
                console.log(tempPrice);
                cartPrice=cartPrice+ tempPrice;
            }


        }


        localStorage.setItem(storageName,JSON.stringify(c));
        $("#page-cart-go #cart-price").html(cartPrice.toFixed(2));
        $("#page-cart-go #cart-count").html(checkedCount);
        $(".footer #btn-menu-cart #cartCount").html(objectLength(c).toString());

    }




}

$(".goodPlus").click(function(e){
    var countSpan = $(this).prev();
    var counts = parseInt(countSpan.val())+1;
    if(counts>0){
        $(this).prevAll(".goodMinus").removeClass("disabled");
        countSpan.val(counts.toString());
    }else{
        $(this).prevAll(".goodMinus").addClass("disabled");
        countSpan.val(0);
    }

});
$(".goodMinus").click(function(e){
    var countSpan = $(this).next();
    var counts = parseInt(countSpan.val())-1;
    if(counts>0){
        $(this).prevAll(".goodMinus").removeClass("disabled");
        countSpan.val(counts.toString());
    }else{
        $(this).prevAll(".goodMinus").addClass("disabled");
        countSpan.val(0);
    }

});