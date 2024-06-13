<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGDOS</title>
    <link rel="shortcut icon" href="Img/sigdos.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/Normalize.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="Bootstrap/node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
  <style>/* style.css */

    </style>
</head>
<body>
    <div class="contenedor">
        
        <?php include_once('Comunes/nabar.php'); ?>

        <?php include_once('Acciones/user_add.php'); ?>

        <section class="contenedor_section">
            <div class="contenido">
                <header class="section_header">
                    <h2>Usuario</h2>
                    <button id="abrir-modal"><i class="bi bi-person-fill-add"></i></button>
                </header>
                <form action="php/buscar_usuario.php" method="get" class="form_busqueda">
                    <input type="text" class="busqueda" name="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>"></input>
                    <input type="submit" value="Buscar" class="btn_buscar"></input>
                </form>
                <table>
                    <thead class="table_header">
                        <tr>
                            <th>ID</th>
                            <th>Nombre y Apellido</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>ROL</th>
                            <th>Opciones</th>                            
                        </tr>
                    </thead>
                    <?php
						if(isset($m)){
                            foreach ( $m as $f) {			
					?>
                    <tbody id="table_body">
					<tr>
                        <td><?php echo $f['id']; ?></td>
                        <td><?php echo $f['name']." ".$f['lastname']; ?></td>
                        <td><?php echo $f['username']; ?></td>
                        <td><?php echo $f['email']; ?></td>
                        <td><?php echo $f['rol']; ?></td>
                        <td><a href="#form_add=<?php echo $f['id'];?>">Editar</a></td>
                        <td><button type="submit">Eliminar</button></td>
                    </tr>


                    </tbody>


                    
                    <?php
							}
						}
					?>
                    </table>
                </form>
            </div>
        </section>

        <?php include_once('Comunes/footer.php'); ?>

    </div>
    <script>
        

  const modal = document.getElementById('modal');
  const abrirModal = document.getElementById('abrir-modal');
  const cerrarModal = document.getElementById('cerrar-modal');
  
  abrirModal.addEventListener('click', () => {
    modal.style.display = 'block';
  });
  
  cerrarModal.addEventListener('click', () => {
    modal.style.display = 'none';
  });
  
  // Opcional: Cerrar el modal al hacer clic fuera del contenido
  window.addEventListener('click', (event) => {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
    </script>
</body>
</html>