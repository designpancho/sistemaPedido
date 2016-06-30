<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DUPLIDI.CL</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>jquery/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/hojaEstilo.css">
        
        <script type="text/javascript" src="<?php echo base_url()?>jquery/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>jquery/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/funciones.js"></script>
	<script type="text/javascript">
        
        var base_url='<?php echo base_url()?>index.php/';
        
        </script>
</head>
<body>
    
   
    <div id="pagina">
        
        <div id="header"></div>
        <div id="content">
            
            <button id="addDisco" onclick="agregarDisco()">Agregar Disco</button>
            <div id="addDiscoModal" ></div>
            <div id="divCRUD"></div>
            <div id="mensajes"></div>
            <div id="editarModal"></div>
        </div>
        <div id="footer"></div>      
        
    </div>
 </body>
</html>