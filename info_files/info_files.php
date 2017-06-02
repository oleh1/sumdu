<div class="info_file">
<div class="in">dek2.zip</div><a class="in load_file" href="<?php echo get_template_directory_uri(); ?>/files/dek2.zip" download>Завантажити</a>

<div class="ii">Додаткова інформація</div>
<div>
  <span class="ss">&lt;div class="date_d_d author_d_d"&gt;&lt;/div&gt;</span> - вставити в запис в таб тексту щоб прибрати дату та автора.<br>
  <span class="ss">&lt;div class="date_d_d"&gt;&lt;/div&gt;</span> - вставити в запис в таб тексту щоб прибрати дату.<br>
  <span class="ss">&lt;div class="author_d_d"&gt;&lt;/div&gt;</span> - вставити в запис в таб тексту щоб прибрати автора.<br>
</div>

<div class="repository">Сховище файлів</div>
<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="filename"><br>
  <input type="submit" value="Завантажити"><br>
</form>

<?php
function FBytes($bytes, $precision = 2) {
  $units = array('B', 'KB', 'MB', 'GB', 'TB');
  $bytes = max($bytes, 0);
  $pow = floor(($bytes?log($bytes):0)/log(1024));
  $pow = min($pow, count($units)-1);
  $bytes /= pow(1024, $pow);
  return round($bytes, $precision).' '.$units[$pow];
}

$file_size = $_FILES["filename"]["size"];
$file_name = $_FILES["filename"]["name"];
$file_tmp_name = $_FILES["filename"]["tmp_name"];

if(is_uploaded_file($file_tmp_name)) {

  update_option($file_name, $file_size);
  move_uploaded_file($file_tmp_name, __DIR__.'/../download/'.$file_name);

}

$files = scandir( __DIR__.'/../download' );
$a = 2;
$i = 0;
foreach ($files as $f){
  $i++;
  if($i > $a) {
    echo '<div class="in">'.$f.'</div><div class="in size_file">'.FBytes((int)get_option($f), 0).'</div><a class="in load_file" href="'.get_template_directory_uri().'/download/'.$f.'" download>Завантажити</a><div data-file="'.$f.'" class="delete_file in">Видалити</div><br>';
  }
}
?>
</div>

<style>
  .ii{
    font-size: 25px;
    margin: 10px 0 10px 0;
    color: orangered;
  }
  .repository{
    font-size: 25px;
    margin: 10px 0 10px 0;
    color: darkslateblue;
  }
  .size_file{
    color: darkorange;
  }
  .load_file{
    cursor: pointer;
    color: green;
  }
  .info_file{
    font-size: 18px;
  }
  .in{
    display: inline-block;
    margin: 10px 10px 10px 0;
  }
  .delete_file{
    background: red;
    padding: 3px 5px;
    cursor: pointer;
    border-radius: 3px;
  }
  .delete_file:hover{
    opacity: 0.8;
  }
  .ss{
    color: #0000cc;
  }
</style>