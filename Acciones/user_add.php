
<section id="modal">
            <div  class="modal-contenido">
            <span id="cerrar-modal" class="cerrar-modal">&times;</span>
                <form method="post" class="form_add" id="form_add">
                <table>
                    <tr>
                        <td>Nombre</td>
                        <td> <input type="text" id="fNombre" name="name"> </input> </td>
                    </tr>
                    <tr>
                        <td>Apellidos </td>
                        <td> <input type="text" id="fapellido" name="lastname"> </input> </td>
                    </tr>
                    <tr>
                        <td>Nombre de usuario</td>
                        <td> <input type="text" id="username" name="username"> </input> </td>
                    </tr>
                    <tr>
                        <td>Fecha de nacimiento </td>
                        <td> <input type="date" id="fecha" name="date"> </input> </td>
                    </tr>
                    <tr>
                        <td>Telefono </td>
                        <td> <input type="text" id="tlf" name="tlf"> </input> </td>
                    </tr>
                    <tr>
                        <td>Centro Hospitalario </td>
                        <td><input type="text" id="centroh" name="id_hospital_loc"> </input> </td>
                    </tr>
                    <tr>
                        <td>Cargo</td>
                       <td> 
							<select name="id_cargo">
								<option value="0"> Seleccione </option>
								<?php
							    if(isset($cargo)){
								foreach ( $cargo as $f) {			
								
						        ?>
					        
                                <option value="<?php echo $f['id'];?>">
                                <?php echo $f['cargo'];?>	
                                </option>

					           <?php
							   }
							  }
							?>git
							</select>
                        </td></tr>
                 
                    <tr>
                        <td>Correo</td>
                        <td><input type="email" id="fCorreo" name="email"> </input> </td>
                    </tr>
                    
                    <tr>
                        <td>Contrase&ntilde;a</td>
                        <td><input type="password" id="fContrasena" name="password"> </input> </td>
                    </tr>
                    <tr>
                        <td>Departamento</td>
                        <td>
							<select name="id_departamento">
								<option value="0"> Seleccione </option>
								<?php
							    if(isset($dpt)){
								foreach ( $dpt as $f) {			
								
						        ?>
					        
                                <option value="<?php echo $f['id'];?>">
                                <?php echo $f['nombre_dpt'];?>	
                                </option>

					           <?php
							   }
							  }
							?>
							</select>
                        </td>
                    </tr>
                    <tr>
                        <td>Rol</td>
                        <td>
							<select name="id_rol">
								<option value="0"> Seleccione </option>
								<?php
							    if(isset($rol)){
								foreach ( $rol as $f) {			
								
						        ?>
					        
                                <option value="<?php echo $f['id'];?>">
                                <?php echo $f['rol'];?>	
                                </option>

					           <?php
							   }
							  }
							?>
							</select>
                        </td>
                    </tr>

                </table>
                <button id="cerrar-modal">Cancelar</button>
                <button type="submit" name="agregar">Guardar</button>
        </form></div>
        </section>