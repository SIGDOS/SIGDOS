<?php
    if(is_file('Modelo/'.$p.'.php')){
        require_once('Modelo/'.$p.'.php');
        if(is_file('Vista/'.$p.'.php')){
            $o = new usuario();
            if(isset($_POST)){
                    
                    $o->set_name($_POST['name']);
                    $o->set_lastname($_POST['lastname']);
                    $o->set_username($_POST['username']);
                    $o->set_email($_POST['email']);
                    $o->set_password($_POST['password']);
                    $o->set_date($_POST['date']);
                    $o->set_tlf($_POST['tlf']);
                    $o->set_id_rol($_POST['id_rol']);
                    $o->set_id_cargo($_POST['id_cargo']);
                    $o->set_id_departamento($_POST['id_departamento']);
                    $o->set_id_hospital_loc($_POST['id_hospital_loc']);

                    if(isset($_POST['agregar'])){
                        $r = $o->agregar();
                    }
                    elseif(isset($_POST['busqueda'])){
                        $b = $o->buscar();
                    }
                    elseif(isset($_POST['madificar'])){
                        $r = $o->modificar();
                    }
                    elseif(isset($_POST['eliminar'])){
                        $b = $o->eliminar();
                    }

                    $m = $o->mostrar();
                    $dpt = $o->dpt();
                    $cargo = $o->cargo();
                    $rol = $o->rol();
                    
            }
            require_once('Vista/'.$p.'.php');	
        }	
        else{
            echo "FALTA LA VISTA";
        }
    }
    else{
        echo "FALTA DEFINIR LA CLASE";
    }
?>