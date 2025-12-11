<?php
  
   include_once '../model/TipoActividades/RegistroDeTipoDeActividadesModel.php'; 
class RegistroDeTiposDeActividadesController{
        
       public function getCreate(){
            $obj = new RegistroDeTipoDeActividadesModel();
            $sql= "SELECT * FROM estado_actividad";
            $estados = $obj->select($sql);
            include_once '../view/tipoActividades/registroTipoDeActividades.php';
        } 

        public function postCreate(){
            $obj = new RegistroDeTipoDeActividadesModel();

            $id_actividad  = $_POST['id_actividad'];
            $nombre_actividad  = $_POST['nombre_actividad'];
            $id_estado_actividad = $_POST['id_estado_actividad'];
          
            $sql = "INSERT INTO actividad (id_actividad, nombre_actividad, id_estado_actividad)
            VALUES ('$id_actividad', '$nombre_actividad', '$id_estado_actividad')";

            
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {
                echo "actividad registrada  exitosamente";
                //redirect(getUrl("","",""));

            }else{
                echo "error en la insercion";
            }
        }
    }
?>