<?php
session_start();
// sifrar variables que se enviaran por post
$cod = "SI";
$cod = base64_encode($cod);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
       

    </head>
    <body>
        <form action="distribuidor_consulta.php?consultar_seccion=<?php echo $cod ?>" method="POST"> 

     

     <!--<input pattern="[0-9]{8,}" name="cedula" id="cedula" autocomplete="off" maxlength="10" size="10" 
         placeholder="Cedula ID" required> -->
          

                 <div id='contenidos' class='fluid' align='center'>
                   
                    </div>
            

            <select id="anno" name="anno" class="form-control"style="width: auto; font-size: 12px">
                <option value="N/A">N/A</option>
                <option value="1ER AÑO">1ER AÑO</option>
                <option value="2DO AÑO">2DO AÑO</option>
                <option value="3ER AÑO">3ER AÑO</option>
                <option value="4TO AÑO CS">4TO AÑO CS</option>
                <option value="5TO AÑO CS">5TO AÑO CS</option>
            </select>

            <select id="seccion" name="seccion" class="form-control" style="width: 80px; ">
                <option value="Todas">Todas</option> 
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>    
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
            </select>
            <button id="enviar" type="submit" name="submit" class="btn btn-success" style="font-size: 16px; height: 40px"  >
                <span class="glyphicon glyphicon-inbox"></span>  Consultar</button>
        </form>



    </body>
</html>