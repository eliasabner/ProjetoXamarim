<?php
   include "conexao.php";

//decodificar  em json
$json = file_get_contents('php://input');

// transformar os arquivos array 
$array = json_decode($json,true);


// query
$sql  = "INSERT INTO TB_CRUD(NOME, EMAIL, SENHA) ";
$sql .= " VALUES('".$array['Nome']. "' , ";
$sql .= " '".$array['Email']. "' , ";
$sql .= " '".$array['Senha']. "') ";
//echo $sql;	
  $resp = array( 0 =>'certo', 1=>'erro');

   if(mysqli_query($con, $sql)){
	    //codificar a respota 
	   echo  json_encode($resp[0],true);//{0:'certo'}
   }
    else{
		echo  json_encode($resp[1],true);//{0:'erro'}
	}

?>