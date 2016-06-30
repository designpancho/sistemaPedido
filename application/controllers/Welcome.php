<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function __construct() {
        parent::__construct();
         $this->load->model("modelo");
    }
	public function index()
	{
		$this->load->view('header');
	}
         function actualizaTabla(){
            $datos = $this->modelo->cargaDisco();
            $data['cantidad']=$datos->num_rows();
            $data['resultado']=$datos->result();
            $this->load->view("simpleCRUD",$data);
            
        }
        
        function eliminarDisco(){
            $id_disco2 = $this->input->post("id_disco");
            $this->modelo->eliminarDisco3($id_disco2);
            
        }
        
        function agregarDisco(){
            $this->load->view("agregarDisco");
                       
        }
        function editarDisco(){
            $this->load->view("editarDisco");
                       
        }
        
        function addDisco(){
            
            
             $id_disco=$this->input->post("id_disco");
             $nombre_disco=$this->input->post("nombre");
             $descripcion_disco=$this->input->post("descripcion");
             $interprete_disco=$this->input->post("interprete");
             $fecha_disco=$this->input->post("fecha");
             $valor_disco=$this->input->post("valor");
             
             $this->modelo->insertarDisco($id_disco,$nombre_disco,$descripcion_disco,$interprete_disco,$fecha_disco,$valor_disco);
             
             
            
            
        }
        
        
        function validaIdDisco(){
            $id_disco=$this->input->post("id_disco");
            $respuesta=$this->modelo->cargaDiscoID($id_disco)->result();
            $nombre="";
            $descripcion="";
            $interprete="";
            $fecha="";
            $valor="";
            foreach ($respuesta as $fila):
                $nombre=$fila->nombre_disco;
                $descripcion=$fila->descripcion_disco;
                $interprete=$fila->interprete_disco;
                $fecha=$fila->fecha_disco;
                $valor=$fila->valor_disco;
                
            endforeach;
            
            echo json_encode(array(
               "id_disco"=>$id_disco,
                "nombre_disco"=>$nombre,
                "descripcion_disco"=>$descripcion,
                "interprete_disco"=>$interprete,
                "fecha_disco"=>$fecha,
                "valor_disco"=>$valor
             ));
            
            
            
            
        }
}
