jQuery(document).ready(function(){

  /*data_base*/
  jQuery(".off_on").click(function(){
    if(jQuery(".can-toggle #b").attr("checked") != "checked"){
      jQuery("#tabs td").append("<div class='edit_form'><div>Редагувати</div></div>");
    }else if(jQuery(".can-toggle #b").attr("checked") == "checked"){
      jQuery("#tabs .edit_form").detach();
      jQuery("#tabs .add_cancel").detach();
      jQuery("#tabs td input").detach();
      jQuery("#tabs .v").css("display", "block");
    }
  });

  jQuery("body").on("click", ".edit_form div",function(){
    var t,v,w,i;
    t = jQuery(this);
    v = t.closest("td").find( jQuery(".v") );
    v.css("display", "none");
    w = t.closest("td").outerWidth();
    w = w - 24;
    t.closest(".edit_form").before("<input type='text'>");
    i = t.closest("td").find( jQuery("input") );
    i.val(v.text());
    i.outerWidth(w);
    t.closest(".edit_form").css("display", "none");
    t.closest("td").append("<div class='add_cancel'><div class='add'>Змінити</div><div class='cancel'>Відмінити</div></div>");
  });

  jQuery("body").on("click", "#tabs .cancel",function(){
    var t,v,i,b;
    t = jQuery(this);
    v = t.closest("td").find( jQuery(".v") );
    v.css("display", "block");
    i = t.closest("td").find( jQuery("input") );
    i.detach();
    b = t.closest("td").find( jQuery(".edit_form") );
    b.css("display", "block");
    t.parent().detach();
  });
  
  jQuery("body").on("click", "#tabs .add",function(){
    var t,td,table,id_name,id,text,l;
    t = jQuery(this);
    td = t.closest("td").attr("data-td");
    table = t.closest("tr").attr("data-table");
    id_name = t.closest("tr").attr("data-id_name");
    id = t.closest("tr").attr("data-id");
    text = t.closest("td").find( jQuery("input") );
    text = text.val();
    l = t.closest("td").find( jQuery("input") );
    l.before("<div class='l'><div class='overlay-loader'><div class='loader'><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div>");

    var ajaxurl,l_d,i,v,b,a_c;
    ajaxurl = '/wp-admin/admin-ajax.php';
    jQuery.post(
      ajaxurl,
      {
        'action': 'edit_form',
        'td': td,
        'table': table,
        'id_name': id_name,
        'id': id,
        'text': text
      },
      function(result){
        l_d = t.closest("td").find( jQuery(".l") );
        l_d.detach();
        i = t.closest("td").find( jQuery("input") );
        i.detach();
        v = t.closest("td").find( jQuery(".v") );
        v.css("display", "block");
        v.text(result);
        b = t.closest("td").find( jQuery(".edit_form") );
        b.css("display", "block");
        a_c = t.closest("td").find( jQuery(".add_cancel") );
        a_c.detach();
      }
    );

  });
  /*data_base*/

  /*warning_system*/
  jQuery("body").on("click", ".add_group",function(){
    var l,a;
    l = jQuery(".lo");
    a = jQuery(".add_group");
    l.show();
    a.hide();
    ajaxurl = '/wp-admin/admin-ajax.php';
    jQuery.post(
      ajaxurl,
      {
        'action': 'add_group',
        'text': jQuery(".add_group_i").val(),
        'id': jQuery(".add_group_i").attr('data-id')
      },
      function(result){
        jQuery(".content_warning_group").html(result);
        l.hide();
        a.show();
      }
    );
  });

  jQuery("body").on("click", ".delete_group",function(){
    var t, n;
    t = jQuery(this);
    t.hide();
    n = t.prev();
    n.show();
  });

  jQuery("body").on("click", ".sure .n",function(){
    var t, n;
    t = jQuery(this);
    n = t.closest(".sure");
    n.next().show();
    n.hide();
  });

  jQuery("body").on("click", ".sure .y",function(){
    var t = jQuery(this);
    ajaxurl = '/wp-admin/admin-ajax.php';
    jQuery.post(
      ajaxurl,
      {
        'action': 'delete_group',
        'id': t.closest(".warning_grop").attr("data-id")
      },
      function(result){
        t.closest(".warning_grop").detach();
      }
    );
  });

  jQuery("body").on("click", ".add_mail",function(){
    var t = jQuery(this);
    ajaxurl = '/wp-admin/admin-ajax.php';
    jQuery.post(
      ajaxurl,
      {
        'action': 'add_mail',
        'text': t.parent().prev().val(),
        'id_group': t.parent().prev().attr('data-id_group')
      },
      function(result){
        jQuery(".content_warning_group").html(result);
      }
    );
  });

  jQuery("body").on("click", ".delete_mail",function(){
    var t = jQuery(this);
    ajaxurl = '/wp-admin/admin-ajax.php';
    jQuery.post(
      ajaxurl,
      {
        'action': 'delete_mail',
        'id': t.closest(".delete_mail").attr("data-id")
      },
      function(result){
        t.parent().detach();
      }
    );
  });

  jQuery("body").on("click", ".send_message",function(){
    var t = jQuery(this);
    t.parent().next().show();
    ajaxurl = '/wp-admin/admin-ajax.php';
    jQuery.post(
      ajaxurl,
      {
        'action': 'send_message',
        'mails': t.parent().prev().find( jQuery(".message") ).attr('data-mails'),
        'data-id_group': t.parent().prev().prev().prev().prev().prev().prev().attr('data-id_group'),
        'subject_send': t.parent().prev().prev().prev().prev().find( jQuery(".subject_send") ).val(),
        'name_send': t.parent().prev().prev().prev().find( jQuery(".name_send") ).val(),
        'mail_send': t.parent().prev().prev().find( jQuery(".mail_send") ).val(),
        'message': t.parent().prev().find( jQuery(".message") ).val()
      },
      function(result){
        t.parent().next().hide();
      }
    );
  });
  /*warning_system*/

});