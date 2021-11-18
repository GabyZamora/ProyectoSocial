<?php
date_default_timezone_set("America/El_Salvador");
switch( @$_GET["mod"] ){
  case 'info':
    $Section = 'presentacion/info.php';
    break;
  default:
  $Section = 'presentacion/menu.php';
  break;
}
?>
<!----HTML main--->
<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="Cardel Decoration" content="width=device-width,initial-scale=1.0">
      <title>Productos Naturales Aura</title>
      <link rel="shortcut icon" href="images/logoaura2.jpeg.ico">
  </head>
  <body>
    <div id="DivMainIndex" style='position: relative; margin: 0 auto 0 auto;'>
    <?php
    require_once $Section;
    ?>
  </body>
</html>