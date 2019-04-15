<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
    <style type="text/css">
        body{
            background: black;
            color: white;
            font-family: verdana, sans-serif;
            font-size: 10px;
        }
        table{
            margin: 0 auto;
            text-align: center;
            margin-top: 50px;
            width: 750px;
        }
        thead, th, table, td{
            border: 1px solid white;
            border-collapse: collapse;
            border-spacing: 0;
            padding: 0.3em;
        }
        .titulos{
            font-size: 12px;
            background-color: #454545;
        }
        img{
            margin: 0 auto;
            text-align: center;
            display: block;
            margin-top: 40px;
        }
        input[type="text"]{
            border-radius: 7px;
            border: 0;
            margin: 0 auto;
            text-align: center;
            display: block;
            margin-top: 50px;
            width: 200px;
            padding: 0.5em;
        }
        input[type="submit"]{
            border: 0;
            border-radius: 7px;
            color: white;
            margin: 0 auto;
            text-align: center;
            display: block;
            margin-top: 20px;
            width: 100px;
            padding: 0.5em;
            background-color: #454545;
            font-size: 17px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <p>
            <img src="MiGPSBannerFlat.png">
        </p>
        <input type="text" name="user" placeholder="Ingrese Cuenta">
        <input type="submit" value="Buscar" name="click">
        <table>
            <thead>
                <tr class="titulos">
                    <th>Seleccion</th>
                    <th>Usuario</th>
                    <th>Modelo de Celular</th>
                    <th>Version App</th>
                    <th>Ultimo Acceso</th>
                    <th>Token</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_POST['click'])){
                    mostrarDatos();
                }
                ?>

            </tbody>
        </table>
    </form>
    
    <?php
    function mostrarDatos(){
        require_once 'conexion.php';
        $account = $_POST['user'];

        if(isset($_POST['user']) != empty($account)){
            $query = "SELECT * FROM tokensession WHERE accountID = '$account' ";

            $consulta1 = consultarSQL($query);

            while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
                echo "<tr>
                    <td>"."<input type='radio'>"."</td>
                    <td>".$fila['userID']."</td>
                    <td>".$fila['modelCel']."</td>
                    <td>".$fila['versionApp']."</td>
                    <td>".$fila['ultimoAcceso']."</td>
                    <td>".$fila['token']."</td>
                </tr>";
            }
        }else{
            echo "<p style='margin: 0 auto; 
                text-align: center; margin-top 30px;'>Ingrese una cuenta!, campo vacio!</p>";
        }
        
    } 

    ?>
</body>
</html>