$(function(){

    $(".izl-rl").on("click",function(){
        if($(this).hasClass("active")){
            $(this).removeClass("active");
            $(".izl-rmenu").animate({
                "right":"20px"
            })
        }else{
            $(this).addClass("active");
            $(".izl-rmenu").animate({
                "right":"-72px"
            })
        }
    })
//	var tophtml="<div id=\"izl_rmenu\" class=\"izl-rmenu\"><a href=\"tencent://Message/?Uin=123456789&websiteName=sc.chinaz.com=&Menu=yes\" class=\"btn btn-qq\"></a><div class=\"btn btn-wx\"><img class=\"pic\" src=\"img/weixin.jpg\" onclick=\"window.location.href=\'http://%77%77%77%2e%73%75%63%61%69%6a%69%61%79%75%61%6e%2e%63%6f%6d\'\"/></div><div class=\"btn btn-phone\"><div class=\"phone\">400-0640-085</div></div><div class=\"btn btn-top\"></div></div>";
//	$("#top").html(tophtml);
	$("#izl_rmenu").each(function(){
		$(this).find(".btn-qq").mouseenter(function(){
			$(this).find(".qq").fadeIn("fast");
		});
		$(this).find(".btn-qq").mouseleave(function(){
			$(this).find(".qq").fadeOut("fast");
		});
		$(this).find(".btn-wx").mouseenter(function(){
			$(this).find(".pic").fadeIn("fast");
		});
		$(this).find(".btn-wx").mouseleave(function(){
			$(this).find(".pic").fadeOut("fast");
		});
		$(this).find(".btn-phone").mouseenter(function(){
			$(this).find(".phone").fadeIn("fast");
		});
		$(this).find(".btn-phone").mouseleave(function(){
			$(this).find(".phone").fadeOut("fast");
		});
		$(this).find(".btn-box1").mouseenter(function(){
			$(this).find(".box1").fadeIn("fast");
		});
		$(this).find(".btn-box1").mouseleave(function(){
			$(this).find(".box1").fadeOut("fast");
		});
		$(this).find(".btn-top").click(function(){
			$("html, body").animate({
				"scroll-top":0
			},"fast");
		});
	});
	var lastRmenuStatus=false;
	$(window).scroll(function(){//bug
		var _top=$(window).scrollTop();
		if(_top>200){
			$("#izl_rmenu").data("expanded",true);
		}else{
			$("#izl_rmenu").data("expanded",false);
		}
		if($("#izl_rmenu").data("expanded")!=lastRmenuStatus){
			lastRmenuStatus=$("#izl_rmenu").data("expanded");
			if(lastRmenuStatus){
				$("#izl_rmenu .btn-top").slideDown();
			}else{
				$("#izl_rmenu .btn-top").slideUp();
			}
		}
	});
});