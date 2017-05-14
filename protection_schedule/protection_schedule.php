<div id="tab2">
  <input type="radio" name="tabs2" id="n1" checked/>
  <label for="n1">Бакалавр</label>
  <input type="radio" name="tabs2" id="n2" />
  <label for="n2">Магистр</label>
  <img class="load_p" src="<?php echo get_template_directory_uri(); ?>/images/load.gif">
  <div id="tabs2">
    <div>
      <?php include 'protection_schedule_bachelor.php'; ?>
    </div>
    <div>
      <?php include 'protection_schedule_master.php'; ?>
    </div>
  </div>
</div>
<?php $cur_user_id = get_current_user_id(); ?>
<style>
  .color_<?php echo $cur_user_id; ?>{
    background: greenyellow;
  }
  
  .del_date_time{
    width: 14px;
    padding-top: 4px;
    cursor: pointer;
  }

  .table_style_p_b th:first-child,
  .table_style_p_m th:first-child{
    width: 75px;
  }

  .error_p_b,
  .error_p_m{
    display: inline-block;
    margin: 0 0 0 15px;
    font-size: large;
    color: red;
  }
  
  .load_p{
    position: absolute;
    top: 14px;
    display: none;
    left: 200px;
  }

  .add_date_time{
    padding: 3px 7px 6px 7px;
    border-radius: 5px;
    background: gold;
  }
  .add_date_time:hover{
    opacity: 0.8;
  }
  
  .p{
    cursor: pointer;
    display: inline-block;
  }
  
  .table_style_p_b,
  .table_style_p_m{
    word-break: normal;
    margin: 10px 0 0 0;
  }
  .table_style_p_b th,
  .table_style_p_m th{
    padding: 0 3px;
    background: #E3F2FD;
    font-size: 12px;
    text-align: center;
    border: 1px solid darkgreen;
  }
  .table_style_p_b td,
  .table_style_p_m td{
    padding: 0 3px;
    background: rgba(9, 212, 0, 0.04);
    font-size: 14px;
    text-align: center;
    border: 1px solid darkgreen;
  }
  .s_g_p_b,
  .s_g_p_m{
    margin: 10px 0 0 0;
  }
  
  #tab2{margin: 20px 0 0 0;}
  #tab2>input{display: none;}
  #tab2>label{
    border-radius: 5px;
    margin: 0 5px 5px 0;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    float: left;
    padding: 5px 10px;
    background: khaki;
  }
  #tab2>label:hover{
    background: seagreen;
  }
  #tabs2{
    clear: both;
  }
  #tabs2>div{
    display: none;
  }
  #n1:checked ~ #tabs2 > div:nth-of-type(1),
  #n2:checked ~ #tabs2 > div:nth-of-type(2){
    display: block;
  }

  #tab2 > input:checked + label {
    background: seagreen;
  }
</style>