<section class="user_modify"  id="editarChildresn">
            <div class="contenid">

                <form method="post" class="form_add" id="form_add=<?php echo $f['id'];?>">
                <table>
                    <tr>
                        <td>Nombre</td>
                        <td> <input type="text" id="fNombre" name="name" values="<?php echo $f['name']; ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Apellidos </td>
                        <td> <input type="text" id="fapellido" name="lastname" values="<?php echo $f[2]; ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Nombre de usuario</td>
                        <td> <input type="text" id="username" name="username" values="<?php echo $f[$o->get_username()]; ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Fecha de nacimiento </td>
                        <td> <input type="date" id="fecha" name="date" values="<?php echo $o->get_date(); ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Telefono </td>
                        <td> <input type="text" id="tlf" name="tlf" values="<?php echo $o->get_tlf(); ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Centro Hospitalario </td>
                        <td><input type="text" id="centroh" name="id_hospital_loc" values="<?php echo $o->get_id_hospital_loc(); ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Cargo</td>
                       <td> 
							<select name="id_cargo">
								<option  values="<?php echo $o->get_cargo(); ?>"> Seleccione </option>
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
							?>
							</select>
                        </td></tr>
                 
                    <tr>
                        <td>Correo</td>
                        <td><input type="email" id="fCorreo" name="email" values="<?php echo $o->get_email(); ?>"> </input> </td>
                    </tr>
                    
                    <tr>
                        <td>Contrase&ntilde;a</td>
                        <td><input type="password" id="fContrasena" name="password" values="<?php echo $o->get_password(); ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Departamento</td>
                        <td>
							<select name="id_departamento">
								<option  values="<?php echo $o->get_id_departamento(); ?>"> Seleccione </option>
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
								<option values="<?php echo $o->get_id_rol(); ?>"> </option>
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
                <a href=" ">Cancelar</a>
                <button type="submit" name="agregar">Guardar</button>
        </form>
        </div>
        </section>