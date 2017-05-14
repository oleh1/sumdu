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
    jQuery('.data_table_themes').detach();
    jQuery('.lists_b_m').css({'display':'block'});
    var t = jQuery(this);
    ajaxurl = '/wp-admin/admin-ajax.php';
    jQuery.post(
      ajaxurl,
      {
        'action': 'group_select_bachelor_master',
        'group': t.val(),
        'level': t.attr('data-level')
      },
      function(result){
        jQuery('.lists_b_m').css({'display':'none'});
        jQuery('.data_table_themes').detach();
        jQuery('.table_style > tbody').append(result);
      }
    );
  }).trigger("change");
  /*list_themes*/

  /*protection_schedule*/
  if(jQuery(".table_style2")){
    jQuery(".table_style2").parent().next().detach();
    jQuery(".table_style2").parent().next().detach();
  }

  jQuery(".group_select2").change(function () {
    jQuery('.data_table_themes2').detach();
    jQuery('.lists_b_m').css({'display':'block'});
    var t = jQuery(this);
    ajaxurl = '/wp-admin/admin-ajax.php';
    jQuery.post(
      ajaxurl,
      {
        'action': 'group_select_bachelor_master2',
        'group': t.val(),
        'level': t.attr('data-level')
      },
      function(result){
        jQuery('.lists_b_m').css({'display':'none'});
        jQuery('.data_table_themes2').detach();
        jQuery('.table_style2 > tbody').append(result);
      }
    );
  }).trigger("change");
  /*protection_schedule*/
});


