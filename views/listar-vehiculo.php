<tr class="align-items-center">
    <td scope="row" class="align-items-center"><?php echo $num++; ?></td>
    <td scope="row" class="align-items-center"><?php echo $b['modelo_vehiculo']; ?></td>
    <td class="align-items-center"><?php echo $b['color_vehiculo']; ?></td>
    <td class="align-items-center"><?php echo number_format($b['precio_vehiculo'], 2, ',', '.'); ?></td>
    <td class="text-center align-items-center"><a href="datos-vendedor.php?id=<?php echo $b['id_usuario_vendedor_FK']; ?>" ><button class="btn btn-info"><i class="fas fa-user-tie me-1"></i>Ver datos</button></a></td>
</tr>