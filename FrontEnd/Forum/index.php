<?php
    session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
     <script src="bootstrap/js/bootstrap.min.js" ></script>
 </head>

 <body>
     <div class="container">
     	<div class="nav navbar"></div>
         
         <p>Hello World!</p>
         <?php if(isset($_SESSION["user"])){ echo "<p>hello ".$_SESSION["user"]."</p>"; } ?>
    </div>
 </body>
 </html>