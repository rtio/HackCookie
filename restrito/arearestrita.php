<?php
session_start();
if(@$_SESSION['adm'] == 'adm@123'){
	echo "Usr logado!!".$_SESSION['adm'];
}else{
	echo "Urs n logado";
}
?>