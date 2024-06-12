<?php
include("php/conexion1.php");

?>
<html>

        <head>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Usuario Desabilitados</title>
        <title>Registro</title>
        <link rel="stylesheet" href="CSS/Modificar.css">

    </head>

    <body >
        <HEADER>
            <h1>Usuario Desabilitados</h1>
        </HEADER>
       
        <section class="contenido">

        </form>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nombre y Apellido</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>ROL</th>
                        <th>Opciones</th>
                        <th><span></span></th>
                    </thead>
                    <?php
                 
                    //paginador
                     $sql_register=mysqli_query($mysqli,"SELECT COUNT(*) AS total_registro FROM user WHERE estatu=0");
                    $result_register=mysqli_fetch_array($sql_register);
                    $total=$result_register['total_registro'];
                    $por_pagina=20;
                    if (empty($_GET['pagina'])){
                        $pagina=1;
                    }else{
                        $pagina=$_GET['pagina'];
                    }
                    $desde=($pagina-1)* $por_pagina;
                    $total_paginas=ceil($total/$por_pagina);


                    //consulta
                    $query = mysqli_query($mysqli, "SELECT u.id,u.username, u.password, u.email,u.name,u.lastname, r.rol 
                                FROM user u INNER JOIN roles r ON u.id_rol=r.id WHERE estatu=0 order by id asc
                                                                            LIMIT $desde,$por_pagina");
                      $result = mysqli_num_rows($query);
                      if ($result > 0) {
                        $i=1;
                          while ($data = mysqli_fetch_array($query)) {
                      ?>
                              <tbody id="content">
                                  <tr>
                                      <td><?php echo $i; ?></td>
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
                        $i++;
                          }
                          
                      }
                      ?>
                  </table>
                <div class="paginador">
                    <ul>
                         <?php if ($pagina!=1){

                         ?>
                        <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
                        <li><a href="?pagina=<?php echo $pagina-1 ?>">|<<</a></li>
                       <?php
                         }
                        for ($i=1;$i<=$total_paginas;$i++){
                            if ($i==$pagina){
                                echo '<li class="seled">'.$i.'</li>';
                            }else{
                            echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';}

                        }
                        if ($pagina!=$total_paginas){
                       ?>
                        <li><a href="?pagina=<?php echo $pagina+1 ?>">>>|</a></li>
                        <li><a href="?pagina=<?php echo $total_paginas; ?>">>|</a></li>
                        <?php } ?>
                    </ul>
                </div>
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