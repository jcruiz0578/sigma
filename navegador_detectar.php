<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];
 
function getBrowser($user_agent){
 
if(strpos($user_agent, 'MSIE') !== FALSE)
   return 'Internet explorer';
 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'Internet explorer';
 elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'Mozilla Firefox';
 elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'Chrome';
 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "Opera Mini";
 elseif(strpos($user_agent, 'Opera') !== FALSE)
   return "Opera";
 elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "Safari";
 else
   return 'No hemos podido detectar su navegador';
 
 
}
 
 
$navegador = getBrowser($user_agent);
/* 
echo "El navegador con el que estás visitando esta web es: ".$navegador;
 echo "</br>";

echo $xfn1 = "1978-03-05";
 echo "</br>";
//echo $xfn1= date ("05/03/1978");
echo "</br>";


echo "FECHA TRANSFORMADA: ". $xfn = date("d/m/Y", strtotime($xfn1));
 echo "</br>";
 echo "FECHA TRANSFORMADA2: ". $xfn = date("d-m-Y", strtotime($xfn1));
 echo "</br>";

echo "</br>";
 echo "FECHA TRANSFORMADA PARA BD: ". $xfnBD = date("Y-m-d", strtotime($xfn));
 echo "</br>";
 echo "FECHA TRANSFORMADA PARA BD2: ". $xfnBD = date("Y/m/d", strtotime($xfn));
 echo "</br>";
*/

?>