<?php 
  global $base_url;
  $logo = $base_url . '/' . drupal_get_path('module', 'bps_core'). '/img/logo.png';
  $img_logo = '<img src="' . $logo . '" style="width: 200px;"/>';
  $node = $variables['node'];


  $fecha = format_date(time(),'long');
  if (isset($node->created)) {
  	$fecha = format_date($node->created,'custom','j').' de '.format_date($node->created,'custom','F').' del '.format_date($node->created,'custom','Y');
  }
  $cliente = node_load($node->field_el_cliente['und'][0]['target_id']);
  $fecha_ingreso = date_create($node->field_el_fecha_ingreso['und'][0]['value']);
  $fecha_ingreso = date_format($fecha_ingreso,'Y-m-d');
  $proveedor = $node->field_el_proveedor['und'][0]['value'];
  $proveedor = $node->field_el_proveedor['und'][0]['value'];
  $nit_cc = $node->field_el_nit_cc_proveedor['und'][0]['value'];
  $concepto = $node->field_el_concepto['und'][0]['value'];
  $observaciones = $node->field_el_obs_ing['und'][0]['value'];
  $dpto = $node->field_el_depto_tec['und'][0]['value'];
	$consecutivo_ingreso = $node->field_consecutivo_doc['und'][0]['value'];

	$item = node_load($node->field_orden['und'][0]['target_id']);
	$orden_consecutivo = $item->field_consecutivo_doc['und'][0]['value'];
	$orden_equipo = $item->field_ord_equipo['und'][0]['value'];
	$orden_modelo = $item->field_ord_modelo['und'][0]['value'];
	$orden_marca =  $item->field_ord_marca['und'][0]['value'];
	$orden_serial = $item->field_ord_serial['und'][0]['value'];	
  if (isset($item->field_ord_sucursal_id['und'][0]['value'])) {
  	$item_sucursal = field_collection_item_load($item->field_ord_sucursal_id['und'][0]['value']);
  	if (isset($item_sucursal->field_city['und'][0]['value'])) {
  	  $city = $item_sucursal->field_city['und'][0]['value'];
  	}
  	if (isset($item_sucursal->field_addition_to_address['und'][0]['value'])) {
  	  $address = $item_sucursal->field_addition_to_address['und'][0]['value'];
  	}
  	if (isset($item_sucursal->field_address_telefono['und'][0]['value'])) {
  	  $phone = $item_sucursal->field_address_telefono['und'][0]['value'];
  	}
  	if (isset($item_sucursal->field_address_celular['und'][0]['value'])) {
  	  $mobile = $item_sucursal->field_address_celular['und'][0]['value'];
  	}
  	if (isset($item_sucursal->field_address_name['und'][0]['value'])) {
  	  $branch_office = $item_sucursal->field_address_name['und'][0]['value'];
  	}
  	if (isset($item_sucursal->field_address_contacto['und'][0]['value'])) {
  	  $contact = $item_sucursal->field_address_contacto['und'][0]['value'];
  	}
  	if (isset($item_sucursal->field_address_correo['und'][0]['value'])) {
  	  $email = $item_sucursal->field_address_correo['und'][0]['value'];
  	}
  }

?>
<html>
	<head></head>
	<body>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:200px;font-size:20px;padding:0;text-align:center;" rowspan="2"><?php print $img_logo;?></td>
					<td style="width:600px;font-size:16px;font-weight:bold;padding:0;text-align:left;">INGRESO DE EQUIPOS A LABORATORIO</td>
				</tr>
			</tbody>
		</table>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:900px;font-size:15px;font-weight:bold;padding:0;text-align:right;"><?php print "OT: ".$orden_consecutivo." Consecutivo: ".$consecutivo_ingreso ;?></td>
				</tr>
			</tbody>
		</table>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CLIENTE:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $cliente->title;?></td>
					<td style="width:130px;font-size:15px;font-weight:bold;padding:0;text-align:left;">FECHA:</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"><?php print $fecha_ingreso;?></td>
				</tr>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">SUCURSAL:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $city;?></td>
					<td style="width:130px;font-size:15px;font-weight:bold;padding:0;text-align:left;">PROVEEDOR:</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"><?php print $proveedor;?></td>
				</tr>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CONTACTO:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $contact;?></td>
					<td style="width:130px;font-size:15px;font-weight:bold;padding:0;text-align:left;">NIT/CC</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"><?php print $nit_cc;?></td>
				</tr>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">DIRECCION:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $address;?></td>
					<td style="width:130px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CONCEPTO</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"><?php print $concepto;?></td>
				</tr>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">TELEFONO:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $phone;?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<th style="width:225px;font-size:15px;padding:0;text-align:center;border:1px solid;">DESCRIPCION</th>
					<th style="width:225px;font-size:15px;padding:0;text-align:center;border:1px solid;">REFERENCIA</th>
					<th style="width:225px;font-size:15px;padding:0;text-align:center;border:1px solid;">MARCA</th>
					<th style="width:225px;font-size:15px;padding:0;text-align:center;border:1px solid;">SERIAL</th>
				</tr>
				<tr style="height:115px;">
					<td style="width:225px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $orden_equipo;?></td>
					<td style="width:225px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $orden_modelo;?></td>
					<td style="width:225px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $orden_marca;?></td>
					<td style="width:225px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $orden_serial;?></td>
				</tr>
			</tbody>
		</table>
		<div style="page-break-before:always;">
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:500px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;" rowspan="2">OBSERVACIONES:<br><?php print $observaciones;?></th>
					<td style="width:200px;font-size:15px;padding:0;text-align:center;border:1px solid;">DPTO TECNICO</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:center;border:1px solid;">FIRMA CLIENTE</td>
				</tr>
				<tr>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $dpto;?></td>
					<td style="width:200px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;"></td>
				</tr>
			</tbody>
		</table>
		</div>
<?php
	if ($node->field_el_salida['und'][0]['value'] == '1'){
		$fecha_salida = date_create($node->field_el_fecha_salida['und'][0]['value']);
		$fecha_salida = date_format($fecha_ingreso,'Y-m-d');
		$observaciones = $node->field_el_obs_sal['und'][0]['value'];
?>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:200px;font-size:20px;padding:0;text-align:center;" rowspan="2"><?php print $img_logo;?></td>
					<td style="width:600px;font-size:16px;font-weight:bold;padding:0;text-align:left;">SALIDA DE EQUIPOS DE LABORATORIO</td>
				</tr>
			</tbody>
		</table>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:900px;font-size:15px;font-weight:bold;padding:0;text-align:right;"><?php print "OT: ".$orden_consecutivo;?></td>
				</tr>
			</tbody>
		</table>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CLIENTE:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $cliente->title;?></td>
					<td style="width:130px;font-size:15px;font-weight:bold;padding:0;text-align:left;">FECHA:</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"><?php print $fecha_ingreso;?></td>
				</tr>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">SUCURSAL:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $city;?></td>
					<td style="width:130px;font-size:15px;font-weight:bold;padding:0;text-align:left;">PROVEEDOR:</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"><?php print $proveedor;?></td>
				</tr>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CONTACTO:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $contact;?></td>
					<td style="width:130px;font-size:15px;font-weight:bold;padding:0;text-align:left;">NIT/CC</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"><?php print $nit_cc;?></td>
				</tr>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">DIRECCION:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $address;?></td>
					<td style="width:130px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CONCEPTO</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"><?php print $concepto;?></td>
				</tr>
				<tr>
					<td style="width:110px;font-size:15px;font-weight:bold;padding:0;text-align:left;">TELEFONO:</td>
					<td style="width:360px;font-size:15px;padding:0;text-align:left;"><?php print $phone;?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<th style="width:225px;font-size:15px;padding:0;text-align:center;border:1px solid;">DESCRIPCION</th>
					<th style="width:225px;font-size:15px;padding:0;text-align:center;border:1px solid;">REFERENCIA</th>
					<th style="width:225px;font-size:15px;padding:0;text-align:center;border:1px solid;">MARCA</th>
					<th style="width:225px;font-size:15px;padding:0;text-align:center;border:1px solid;">SERIAL</th>
				</tr>
				<tr style="height:115px;">
					<td style="width:225px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $orden_equipo;?></td>
					<td style="width:225px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $orden_modelo;?></td>
					<td style="width:225px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $orden_marca;?></td>
					<td style="width:225px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $orden_serial;?></td>
				</tr>
			</tbody>
		</table>

		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:500px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;" rowspan="2"><br>OBSERVACIONES:<?php print $observaciones;?></th>
					<td style="width:200px;font-size:15px;padding:0;text-align:center;border:1px solid;">DPTO TECNICO</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:center;border:1px solid;">FIRMA CLIENTE</td>
				</tr>
				<tr>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;"><?php print $dpto;?></td>
					<td style="width:200px;height:115px;font-size:15px;padding:0;text-align:left;border:1px solid;"></td>
				</tr>
			</tbody>
		</table>
<?php
	}
?>
	</body>
</html>
