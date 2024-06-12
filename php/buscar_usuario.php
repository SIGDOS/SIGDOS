<?php
include("../php/conexion1.php");
?>
<html>

    <head>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-  scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrar Usuarios</title>
    <title>Registro</title>
    <link rel="stylesheet" href="../CSS/Modificar.css">

</head>

<body background="../image/background.jpg">
<HEADER>
    <h1>Administrar Usuarios</h1>
</HEADER>

<section class="contenido">
 <?php
 $busqueda=strtolower( $_REQUEST['busqueda']);
 if(empty($busqueda)){
     header('location: ../admin_user.php');
 }
 ?>
    <form action="../php/buscar_usuario.php" method="get" class="form_busqueda">
        <input type="text" class="busqueda" name="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>"></input>
        <input type="submit" value="Buscar" class="btn_buscar"></input>

    </form>
    <table>
        <thead>
        <th>ID</th>
        <th>Usuario</th>
        <th>Correo</th>
        <th>ROL</th>
        <th>Nombre y Apellido</th>
        <th><span></span></th>
        </thead>
        <?php
        //
        $rol='';
        if ($busqueda=='General'){
            $rol="OR rol like '%1%'" ;
        }
        if ($busqueda=='General'){
            $rol="OR rol like '%2%'" ;
        }
        $sql_register=mysqli_query($mysqli,"SELECT COUNT(*) AS total_registro FROM user 
                                                            WHERE (
                                                            id LIKE '%$busqueda%' or 
                                                            username LIKE '%$busqueda%' OR
                                                            email LIKE '%$busqueda%'  
                                                            $rol );");
        $result_register=mysqli_fetch_array($sql_register);
        $total=$result_register['total_registro'];
        $por_pagina=10;
        if (empty($_GET['pagina'])){
            $pagina=1;
        }else{
            $pagina=$_GET['pagina'];
        }
        $desde=($pagina-1)* $por_pagina;
        $total_paginas=ceil($total/$por_pagina);


        //consulta
        $query = mysqli_query($mysqli, "SELECT u.id,u.username, u.password, u.email,u.name,u.lastname, r.rol 
                                FROM user u INNER JOIN roles r ON u.id_rol=r.id 
                                WHERE (
                                u.id LIKE '%$busqueda%' OR 
                                u.username LIKE '%$busqueda%' OR
                                u.email LIKE '%$busqueda%' OR
                                r.rol LIKE '%$busqueda%' )  
                                 order by id asc
                                LIMIT $desde,$por_pagina");
        $result = mysqli_num_rows($query);
        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tbody id="content">
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']." ".$data['lastname']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['rol']; ?></td>
                <td><a href="edit_usuario.php?id=<?php echo $data['id']; ?> ">Editar</a></td>
                  <?php if ($data['id'] != 1) { ?>
                <td><a href="eliminar_usuario.php?id=<?php echo $data['id']; ?>">Eliminar</a></td>
                 <?php  }  ?>
             </tr>
                </tbody>
                <?php

            }
        }
        ?>

    </table>
    <?php
    if($total!=0){


    ?>
    <div class="paginador">
        <ul>
            <?php if ($pagina!=1){

                ?>
                <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<</a></li>
                <li><a href="?pagina=<?php echo $pagina-1 ?>&busqueda=<?php echo $busqueda; ?>">|<<</a></li>
                <?php
            }
            for ($i=1;$i<=$total_paginas;$i++){
                if ($i==$pagina){
                    echo '<li class="seled">'.$i.'</li>';
                }else{
                    echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';}

            }
            if ($pagina!=$total_paginas){
                ?>
                <li><a href="?pagina=<?php echo $pagina+1 ?>&busqueda=<?php echo $busqueda; ?>">>>|</a></li>
                <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?>">>|</a></li>
            <?php } ?>
        </ul>
    </div>
  <?php }?>
    </form>
</section>
<footer>
    <section>
        <a href="#titulo">Ir al inicio </a>
        <a href="mailto:Enzoeliud1010@gmail.com "> Contactame Aqui</a>
    </section>
    <p>Copyright 2023</p>
</footer>

</body>

</html>