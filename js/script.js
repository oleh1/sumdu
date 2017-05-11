jQuery(document).ready(function(){
  
  /*header*/  
  jQuery("#header .lang li").mouseover(function(){
    jQuery("#header .lang li").css("display", "block");
    jQuery("#header div.lang li.active_lang").css("display", "none");
  });
  jQuery("#header .lang ul").mouseout(function(){
    jQuery("#header .lang li").css("display", "none");
    jQuery("#header .lang li.active_lang").css("display", "block");
  });
  /*header*/

  /*reply_p*/
  if(jQuery(".one_content").children(".depth-10")){
    jQuery(".depth-10 .reply_p").css({
      "display":"none"
    })
  }
  /*reply_p*/

  /*list_themes*/
  if(jQuery(".table_style")){
    jQuery(".table_style").parent().next().detach();
    jQuery(".table_style").parent().next().detach();
  }

  jQuery(".group_select").change(function () {
    var t = jQuery(this);
    ajaxurl = '/wp-admin/admin-ajax.php';
    jQuery.post(
      ajaxurl,
      {
        'action': 'group_select',
        'group': t
      },
      function(result){

      }
    );
  });
  /*list_themes*/
});


