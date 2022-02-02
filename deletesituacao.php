
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERT</title>
</head>
<body>
    <?php
        //metodo de segurança dentro do php
        require './inc/Config.inc.php';

        $conn = new Conn();

        //jogando a variavel sem usar o form
        $idsituacao = 1;
        
        


        try {
            
            $cadastro = "DELETE FROM tblsituacaousuario WHERE idsituacao=:idsituacao";

            

            $cadastrar = $conn->getConn()->prepare($cadastro);

            $cadastrar = $conn->getConn()->prepare($cadastro);
            $cadastrar->bindParam(':idsituacao',$idsituacao, PDO::PARAM_STR);
            $cadastrar->execute();
        
            if($cadastrar->rowCount())
                echo "Deletado com sucesso";
        
            
            else {
                echo "nao deletou <br>";
                var_dump($cadastrar);
                var_dump($conn);
                var_dump($cadastro);

                
            };

            
        } catch (Exception $e) {
            echo "Deu erro:".$e->getMessage;
        }
    ?>
</body>
</html>