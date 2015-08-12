<?php 
if(isset($_POST) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message'])){
	
	mail('matthieu.crochez@gmail.com', 'subject', 'body');
}


?>