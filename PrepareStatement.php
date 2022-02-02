
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
        $situacao = 'ativo';
        $criadoem = '2022-01-04' ;
        
        $modificadoem = '2022-01-04';
        


        try {
            
            $cadastro = "INSERT INTO tblsituacaousuario(situacao,criadoem,modificadoem) VALUES (:situacao,:criadoem,:modificadoem)";

            

            $cadastrar = $conn->getConn()->prepare($cadastro);

            //PDO::PARAM_STR so permite strings no parametro verificado.

            $cadastrar->bindParam(':situacao',$situacao, PDO::PARAM_STR);

            $cadastrar->bindParam(':criadoem',$criadoem,PDO::PARAM_STR);

            $cadastrar->bindParam(':modificadoem',$modificadoem,PDO::PARAM_STR);

            $cadastrar->execute();

            if($cadastrar->rowCount())

                echo "Cadastrado com sucesso!";

            else {
                echo "nao cadastrou <br>";
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