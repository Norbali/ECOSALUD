<?php

    include_once '../model/Acceso/AccesoModel.php';

    class AccesoController{

        public function login(){
          
            $obj = new AccesoModel();

            $documento = $_POST['documento'];
            $contraseña = $_POST['contraseña'];

            $validaciones = true;
            $validacionDocumento = validarDocumento($documento); 
            $validacionesContraseña = validarContrasena($contrasena);

            if($validacionDocumento!="true"){
                $validaciones=false;
                $_SESSION['Error'] = $validacionDocumento;
                
                if(validarContraseña($contraseña)=="true"){
                    $validaciones=false;
                    $_SESSION['Error'] = $validacionesContraseña;
                }
            }
            if($validaciones){
                $sql = "SELECT * FROM usuarios WHERE documento = $documento AND contraseña = '$contraseña'";
                $usuario = $obj->select($sql);

                if(pg_num_rows($usuario)>0){
                    //dd ($usuario);
                    $idRol=0;
                    while($usu=pg_fetch_assoc($usuario)){
                        $_SESSION['documento'] = $usu['documento'];
                        $_SESSION['nombre'] = $usu['nombre'];
                        $_SESSION['rol'] = $usu['id_rol'];
                        $_SESSION['auth'] = "ok";
                        $idRol = $usu['id_rol'];
                    }

                    //consultar permisos
                    $sqlPermisos = "
                        SELECT m.nombre_modulo, a.nombre_accion FROM permisos p
                        INNER JOIN modulo m ON p.id_modulo = m.id_modulo
                        INNER JOIN acciones a ON p.id_accion = a.id_accion
                        WHERE p.id_rol = $idRol 
                    ";

                    $result = $obj->select($sqlPermisos);

                    $permisos = [];
                    while ($row = pg_fetch_assoc($result)) {
                        $modulo = $row['nombre_modulo'];
                        $accion = $row['nombre_accion'];
                        $permisos[$row['nombre_modulo']][] = $row['nombre_accion'];
                    }
                        $_SESSION['permisos'] = $permisos;

                        redirect("index.php");
                    
                }else{
                    $_SESSION['Error'] = "Credenciales invalidas";
                    redirect("login.php");
                }
            }
                
        }

        public function logout(){
            session_destroy();
            redirect("login.php");
        }

        public function cargarPermisos($idRol) {
            $obj = new AccesoModel();

            $sql = "
                SELECT m.nombre_modulo, a.nombre_accion FROM permisos p
                INNER JOIN modulo m ON p.id_modulo = m.id_modulo
                INNER JOIN acciones a ON p.id_accion = a.id_accion
                WHERE p.id_rol = $idRol
            ";

            $result = $obj->select($sql);

            $permisos = [];

            while ($row = pg_fetch_assoc($result)) {
                $modulo = $row['nombre_modulo'];
                $accion = $row['nombre_accion'];
                $permisos[$row['nombre_modulo']][] = $row['nombre_accion'];
            }

            $_SESSION['permisos'] = $permisos;
            
        }

        //VALIDAR CAMPOS
        function validarContrasena($contrasena) {
            $mensaje = "";

            if (strlen($contrasena) < 8) {
                $mensaje = "Debe tener mínimo 8 caracteres.";
            } elseif (!preg_match('/[A-Z]/', $contrasena)) {
                $mensaje = "Debe contener al menos una mayúscula.";
            } elseif (!preg_match('/[a-z]/', $contrasena)) {
                $mensaje = "Debe contener al menos una minúscula.";
            } elseif (!preg_match('/\d/', $contrasena)) {
                $mensaje = "Debe contener al menos un número.";
            } elseif (!preg_match('/[\W_]/', $contrasena)) {
                $mensaje = "Debe contener al menos un carácter especial.";
            } else {
                $mensaje = "true";
            }
            return $mensaje;
        }

        function validarDocumento($documento) {
            $mensaje = "";
            if (empty($documento)) {
                $mensaje = "El documento no puede estar vacío.";
            }
            
            elseif (!preg_match('/^[0-9]+$/', $documento)) {
                $mensaje = "El documento solo debe contener números.";
            }

            elseif (strlen($documento) < 9) {
                $mensaje = "El documento debe tener mínimo 6 dígitos.";
            }
            // Longitud máxima
            elseif (strlen($documento) > 10) {
                $mensaje = "El documento debe tener máximo 10 dígitos.";
            }
            else {
                $mensaje = "true";
            }

            return $mensaje;
        }

    }

?>