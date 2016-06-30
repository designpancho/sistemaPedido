<?php if($cantidad==0):?>
        <p>NO HAY DISCO ALMACENADO</p>
<?php else:?>
        <table class="qw2">
            <th>id_disco</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Interprete</th>
            <th>Fecha Creacion</th>
            <th>Valor</th>
            <?php $i=0; foreach ($resultado as $fila):?>
            <tr>
                <td><?php echo $fila->id_disco?></td>
                <td><?php echo $fila->nombre_disco?></td>
                <td><?php echo $fila->descripcion_disco?></td>
                <td><?php echo $fila->interprete_disco?></td>
                <td><?php echo $fila->fecha_disco?></td>
                <td><?php echo $fila->valor_disco?></td>
                <td>
                    <button id="editar<?php echo $i?>" onclick="editar(<?php echo $fila->id_disco?>);">editar</button>
                </td>
                <td>
                    <button id="eliminar2<?php echo $i?>" onclick="eliminar(<?php echo $fila->id_disco?>);">eliminar</button>
                </td>
            </tr>
            <?php $i++; endforeach;?>
        </table>       
        
<?php endif;?>

        <input type="hidden" id='oculto' value='<?php echo $i?>'/>        