<?php
    require_once('modelo/datos.php');
    class usuario extends datos
    {
        //atributos de la clase, todos privados
        private $name;
        private $lastname;
        private $username;
        private $email;
        private $password;
        private $date;
        private $tlf;
        private $id_rol;
        private $id_cargo;
        private $id_departamento;
        private $id_hospital_loc;
        
        //metodos para colocar valores en los atributos
        function set_name($name){ $this->name = trim($name); }
        function set_lastname($lastname){ $this->lastname = trim($lastname); }
        function set_username($username){ $this->username = trim($username); }
        function set_email($email){ $this->email = trim($email); }
        function set_password($password){ $this->password = trim($password); }
        function set_date($date){ $this->date = trim($date); }
        function set_tlf($tlf){ $this->tlf = trim($tlf); }
        function set_id_rol($id_rol){ $this->id_rol = trim($id_rol); }
        function set_id_cargo($id_cargo){ $this->id_cargo = trim($id_cargo); }
        function set_id_departamento($id_departamento){ $this->id_departamento = trim($id_departamento); }
        function set_id_hospital_loc($id_hospital_loc){ $this->id_hospital_loc = trim($id_hospital_loc); }

        function get_name(){ return $this->name; }
        function get_lastname(){ return $this->lastname; }
        function get_username(){ return $this->username;  }
        function get_email(){ return $this->email; }
        function get_password(){  return $this->password; }
        function get_date(){ return $this->date; }
        function get_tlf(){ return $this->tlf; }
        function get_id_rol(){ return $this->id_rol; }
        function get_id_cargo(){ return $this->id_cargo; }
        function get_id_departamento(){ return $this->id_departamento; }
        function get_id_hospital_loc(){ return $this->id_hospital_loc; }

        
        //metodos que ejecuta la clase, son publicos
        
        function agregar(){
            $b = $this->Busca("Select * from user where username = '$this->username' OR email = '$this->email'");
            $r = "Registro Exitoso ";
            if($b){
                $r = "El correo o usuario ya existe";
            }
            else{
                $e = $this->Ejecuta("Insert into user ( name, 
                                                        lastname, 
                                                        username, 
                                                        email, 
                                                        password, 
                                                        date, 
                                                        tlf,
                                                        id_rol,
                                                        id_cargo,
                                                        id_departamento,
                                                        id_hospital_loc )
                                            values ( '$this->name',
                                                    '$this->lastname',
                                                    '$this->username',
                                                    '$this->email',
                                                    '$this->password',
                                                    '$this->date',
                                                    '$this->tlf',
                                                    '$this->id_rol',
                                                    '$this->id_cargo',
                                                    '$this->id_departamento',
                                                    '$this->id_hospital_loc' )","registro_id_seq");
            }
            return $r;
        }

        function buscar(){
            $b = $this->Busca("SELECT u.id,u.username, u.password, u.email,u.name,u.lastname, r.rol 
                                FROM user u INNER JOIN roles r ON u.id_rol=r.id 
                                WHERE ( u.id LIKE '%$busqueda%' OR 
                                        u.username LIKE '%$busqueda%' OR
                                        u.email LIKE '%$busqueda%' OR
                                        r.rol LIKE '%$busqueda%' )  
                                order by id asc
                                LIMIT $desde,$por_pagina");
            $r = "";
            if($b){

                $this->set_id($b[0][0]);
                $this->set_name($b[0][1]);
                $this->set_lastname($b[0][2]);
                $this->set_username($b[0][3]);
                $this->set_email($b[0][4]);
                $this->set_id_rol($b[0][5]);

            }
            else{
                $r = "BUSQUEDA NO ENCONTRADA ";
            }

            return $b;
        }

        function editar(){
            $b = $this->Busca("SELECT * FROM user WHERE id = '$this->id'");
            if(!$b){
                $r = " EL USUARIO NO SE HA ENCONTRADO ";
            }
            else{
                $e = $this->Ejecutar("UPDATE user  set  name='$this->name',
                                                        lastname='$this->lastname',
                                                        username='$this->username',
                                                        email='$this->email',
                                                        password='$this->password',
                                                        date='$this->date',
                                                        tlf='$this->tlf',
                                                        id_rol='$this->id_rol',
                                                        id_cargo='$this->id_cargo',
                                                        id_departamento='$this->id_departamento',
                                                        id_hospital_loc='$this->id_hospital_loc'
                                                    where id='$this->id'","");
            } 
            return $r;
        }
        
        function mostrar(){
            $m = $this->Busca("SELECT u.id,u.name,u.lastname,u.username,u.email,r.rol
                                FROM user u
                                INNER JOIN roles r
                                ON u.id_rol = r.id");
            return $m;
        }

        function cargo(){
            $cargo = $this->Busca("SELECT id, cargo FROM cargo ORDER BY cargo ASC");
            return $cargo;
        }
        function dpt(){
            $dpt = $this->Busca("SELECT id, nombre_dpt FROM departamento ORDER BY nombre_dpt ASC");
            return $dpt;
        }
        function rol(){
            $rol = $this->Busca("SELECT id, rol FROM roles ORDER BY rol ASC");
            return $rol;
        }
        
    }
?>