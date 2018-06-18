<?php


require_once 'connection.php'; // подключаем скрипт
 
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

if ( isset( $_GET['id'] ) ) {
  // Здесь $id номер изображения
  $id = (int)$_GET['id'];
  if ( $id > 0 ) {
    $query = "SELECT `content` FROM `carusel` WHERE `id`=".$id;
    // Выполняем запрос и получаем файл
    $res = mysql_query($query);
    if ( mysql_num_rows( $res ) == 1 ) {
      $image = mysql_fetch_array($res);
      // Отсылаем браузеру заголовок, сообщающий о том, что сейчас будет передаваться файл изображения
      header("Content-type: image/*");
      // И  передаем сам файл
      echo $image['content'];
    }
  }
}

// закрываем подключение
mysqli_close($link);
?>




<div class="conteiner">
    <div class="row">   </div>
</div>