<div id="tab2">
  <input type="radio" name="tabs2" id="n1" checked/>
  <label for="n1">Бакалавр</label>
  <input type="radio" name="tabs2" id="n2" />
  <label for="n2">Магистр</label>
  <div id="tabs2">
    <div>
      <?php include 'protection_schedule_bachelor.php'; ?>
    </div>
    <div>
      <?php include 'protection_schedule_master.php'; ?>
    </div>
  </div>
</div>

<style>
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