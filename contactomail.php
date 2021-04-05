<?php 
if(isset($_POST["submit"])): ?>
<h2>Mostrar datos enviados</h2>
Nombre : <?php isset($_POST["name"]) ? print $_POST["name"] : ""; ?> <br>
Mensaje : <?php isset($_POST["message"]) ? print $_POST["message"] : ""; ?> <br>
<?php endif; ?>