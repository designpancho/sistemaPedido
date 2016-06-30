<?php
class Modelo extends CI_Model{
    function cargaDisco(){
        $this->db->select("*");
        return $this->db->get("disco");
        
    }
    
    function eliminarDisco3($id_disco2){
        $this->db->where("id_disco",$id_disco2);
        $this->db->delete("disco");
        
    }
    function cargaDiscoID($id_disco){
        $this->db->select("*");
        $this->db->where("id_disco",$id_disco);
         return $this->db->get("disco");        
    }
    function insertarDisco($id_disco,$nombre_disco,$descripcion_disco,$interprete_disco,$fecha_disco,$valor_disco){
         $this->db->select("id_disco");
        $this->db->where("id_disco",$id_disco);
        $cant=$this->db->get("disco")->num_rows();
        
        if($cant==0){
            
            $datos=array(
                "id_disco"=>$id_disco,
                "nombre_disco"=>$nombre_disco,
                "descripcion_disco"=>$descripcion_disco,
                "interprete_disco"=>$interprete_disco,
                "fecha_disco"=>$fecha_disco,
                "valor_disco"=>$valor_disco 
            );
            $this->db->insert("disco",$datos);
            
            
        }else{
             $datos=array(               
                "nombre_disco"=>$nombre_disco,
                "descripcion_disco"=>$descripcion_disco,
                "interprete_disco"=>$interprete_disco,
                "fecha_disco"=>$fecha_disco,
                "valor_disco"=>$valor_disco 
            );
             $this->db->where("id_disco",$id_disco);
             $this->db->update("disco",$datos);
            
        }
        
        
    }
    
}
?>