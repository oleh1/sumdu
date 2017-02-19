/*header*/
$(document).ready(function(){
  $("#header .lang li").mouseover(function(){
    $("#header .lang li").css("display", "block");
    $("#header div.lang li.active_lang").css("display", "none");
  });
  $("#header .lang ul").mouseout(function(){
    $("#header .lang li").css("display", "none");
    $("#header .lang li.active_lang").css("display", "block");
  });
});
/*header*/