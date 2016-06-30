$(document).ready(function(){
   $("#addDisco").button({
       icons:{secondary:"ui-icon-plus"},
       text:true       
   }).tooltip({
       position:{
           my:"left top",
           at:"right+5 top-5"           
       }
       
   });
   $("#addDiscoModal").dialog({
       modal:true, autoOpen:false, width:400,
       buttons:{
           "Guardar":function(){
               $(this).dialog("close");
               if(parseInt($("#addValor").val())<=0 ){
                    mensajes("Complete Campo Valor","error");
                   
               }else{
                   addDisco();
                   //location.reload();
               }
           }
           
       }
       
       
   });
   $("#editarModal").dialog({
           modal:true, autoOpen:false, width:400, 
            buttons:{
           "Guardar":function(){
               $(this).dialog("close");
               if(parseInt($("#addValor").val())<=0 ){
                    mensajes("Complete Campo Valor","error");
                   
               }else{
                   addDisco();
                   //location.reload();
               }
           }
           
       } 
    });
   
    actualizaTabla();
   
});
function actualizaTabla(){
    $.post(
            base_url+"Welcome/actualizaTabla",{},
    function(pagina,datos){
     $("#divCRUD").html(pagina,datos);  
      disenoBotones();
      mensajes("Datos Actualizados","Ok");
    });
    
    
}

function disenoBotones(){
    for(i=0; i<parseInt($("#oculto").val());i++){
        $("#editar"+i).button({
           icons:{secondary:"ui-icon-pencil"},
           text:false
        }).tooltip({
       position:{
           my:"left top",
           at:"right+5 top-5"           
       }
      });
      $("#eliminar2"+i).button({
           icons:{secondary:"ui-icon-trash"},
           text:false
        }).tooltip({
       position:{
           my:"left top",
           at:"right+5 top-5"           
       }
      });
        
    }    
}

function eliminar2(id_disco){
    $.post(
            base_url+"Welcome/eliminarDisco",
            {id_disco:id_disco},
            function(){
                actualizaTabla();
                //location.reload();
//                mensajes("Dato Eliminada","Error");
            });
}
//
function editar(id_disco){
   $.post(
            
            base_url+"Welcome/editarDisco",{},
            function(pagina,datos){
                $("#editarModal").html(pagina,datos);
                validaDiscoID(id_disco);
               $("#editarModal").dialog({title:"EDITAR DISCO"});
               $("#editarModal").dialog("open");
            }    
    
    );
          
    
    
    
}

function mensajes(msj,tipo){
    $("#mensajes").hide();
    $("#mensajes").html("<p class='msj"+tipo+"'>"+msj+"</p>");
    $("#mensajes").fadeIn(100).delay(600).fadeOut(1000);
    
}

function agregarDisco(){
    $.post(
            
            base_url+"Welcome/agregarDisco",{},
            function(pagina,datos){
               $("#addDiscoModal").html(pagina,datos);
               $("#addDiscoModal").dialog({title:"Agregar Nuevo Disco"});
               $("#addDiscoModal").dialog("open");
            }    
    
    );
    
    
}

function addDisco(){
    $.post(
           base_url+"Welcome/addDisco",
            {
             id_disco:$("#addid_Disco").val(),
             nombre:$("#addnombre").val(),
             descripcion:$("#addDescripcion").val(),
             interprete:$("#addIntegrante").val(),
             fecha:$("#addFecha").val(),
             valor:$("#addValor").val() 
       
           },function(){
               actualizaTabla();
           }         
            
            
            );
    
    
}

function validaDiscoID(id_disco){
    $.post(
           base_url+"Welcome/validaIdDisco",
           {id_disco:id_disco},
           function(datos){
             $("#addid_Disco").val(datos.id_disco);     
             $("#addnombre").val(datos.nombre_disco);
             $("#addDescripcion").val(datos.descripcion_disco);
             $("#addIntegrante").val(datos.interprete_disco);
             $("#addFecha").val(datos.fecha_disco);
             $("#addValor").val(datos.valor_disco);
           },'json'
            
            
            );
    
    
}