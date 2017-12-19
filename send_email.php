<?php
    //Comprobamos que se haya presionado el boton enviar
    if(isset($_POST['send'])){
        //Guardamos en variables los datos enviados
        $nombre = $_POST['nombre'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];
        
        ///Validamos del lado del servidor que el nombre y el email no estén vacios
        if($nombre == ''){
            echo "Debe ingresar su nombre";
            }
        else if($email == ''){
            echo "Debe ingresar su email";
            }else{
            $para = "jorge.rodriguez.r@gmail.com";//Email al que se enviará
            $asunto = "Contacto para su sitio web";//Puedes cambiar el asunto del mensaje desde aqui
            //Este sería el cuerpo del mensaje
            $mensaje = "
            <table border='0' cellspacing='3' cellpadding='2'>
                <tr>
                    <td width='30%' align='left' bgcolor='#f0efef'><strong>Name:</strong></td>
                    <td width='80%' align='left'>$nombre</td>
                </tr>
                <tr>
                    <td align='left' bgcolor='#f0efef'><strong>Subject:</strong></td>
                    <td align='left'>$subject</td>
                </tr>
                <tr>
                    <td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
                    <td align='left'>$email</td>
                </tr>
                <tr>
                    <td align='left' bgcolor='#f0efef'><strong>Message:</strong></td>
                    <td align='left'>$mensaje</td>
                </tr>
            </table>
            ";
        
            //Cabeceras del correo
            $headers = "From: $nombre <$email>\r\n"; //Quien envia?
            $headers .= "X-Mailer: PHP5\n";
            $headers .= 'MIME-Version: 1.0' . "\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
        
        //Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
        if(mail($para, $asunto, $mensaje, $headers)){
            echo "Su mensaje se ha enviado correctamente";
            echo "<br />";
            echo '<a href="../index.html">Volver</a>';
            }else{
            echo "Hubo un error en el envío inténtelo más tarde";
            }
        }
    }
?>