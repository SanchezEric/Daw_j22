<?php
	//Datos introducidos
	$min=$_REQUEST['minimo'];
	$max=$_REQUEST['maximo'];
	echo $min;
	echo $max;
	//realizamos la conexión con mysql
	$con = mysqli_connect('localhost', 'root', '', 'BD_exemple');
	//ejecutamos la consulta que devuelve todos los registros cuyo campo pro_preu (precio) sea igual o superior a 30
	
	$datos = mysqli_query($con, "SELECT * FROM producto WHERE pro_preu>=$min && pro_preu<=$max");

	if(mysqli_num_rows($datos)>0){
		//mostramos, registro a registro (en formato array) todos los campos de todos los productos que ha devuelto la consulta
		while($pro = mysqli_fetch_array($datos)){
			echo "$pro[pro_id] - $pro[pro_nom] - $pro[pro_descripcio] - $pro[pro_preu]<br/>";
		}
	} else {
		echo "No hay datos que mostrar";
	}
	//cerramos la conexión con la base de datos
	mysqli_close($con);
?>