<?php 
  global $base_url;
  $logo = $base_url . '/' . drupal_get_path('module', 'bps_core'). '/img/logo.png';
  $img_logo = '<img src="' . $logo . '" style="width: 120px;"/>';
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

  $address = '';
  $phone = '';
  $mobile = '';
  $branch_office = '';
  $contact = '';
  $email = '';

  $orden = node_load($node->field_el_orden['und'][0]['target_id']);
  print_r($orden);
  //$orden_equipo = $orden->nid;


  if (isset($node->field_ord_sucursal_id['und'][0]['value'])) {
  	$item_orden = field_collection_item_load($node->field_ord_sucursal_id['und'][0]['value']);
  	if (isset($item->field_city['und'][0]['value'])) {
  	  $city = $item->field_city['und'][0]['value'];
  	}
  	if (isset($item->field_addition_to_address['und'][0]['value'])) {
  	  $address = $item->field_addition_to_address['und'][0]['value'];
  	}
  	if (isset($item->field_address_telefono['und'][0]['value'])) {
  	  $phone = $item->field_address_telefono['und'][0]['value'];
  	}
  	if (isset($item->field_address_celular['und'][0]['value'])) {
  	  $mobile = $item->field_address_celular['und'][0]['value'];
  	}
  	if (isset($item->field_address_name['und'][0]['value'])) {
  	  $branch_office = $item->field_address_name['und'][0]['value'];
  	}
  	if (isset($item->field_address_contacto['und'][0]['value'])) {
  	  $contact = $item->field_address_contacto['und'][0]['value'];
  	}
  	if (isset($item->field_address_correo['und'][0]['value'])) {
  	  $email = $item->field_address_correo['und'][0]['value'];
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
		<br>
		<br>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CLIENTE:</td>
					<td style="width:450px;font-size:15px;padding:0;text-align:left;"><?php print $cliente->title;?></td>
					<td style="width:150px;font-size:15px;font-weight:bold;padding:0;text-align:left;">FECHA:</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;"><?php print $fecha_ingreso;?></td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">SUCURSAL:</td>
					<td style="width:450px;font-size:15px;padding:0;text-align:left;">LA FERCHO BOGOTA</td>
					<td style="width:150px;font-size:15px;font-weight:bold;padding:0;text-align:left;">PROVEEDOR:</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;"><?php print $proveedor;?></td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CONTACTO:</td>
					<td style="width:450px;font-size:15px;padding:0;text-align:left;">SURICATO</td>
					<td style="width:150px;font-size:15px;font-weight:bold;padding:0;text-align:left;">NIT/CC</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;"><?php print $nit_cc;?></td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">DIRECCION:</td>
					<td style="width:450px;font-size:15px;padding:0;text-align:left;">TABOGO</td>
					<td style="width:150px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CONCEPTO</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;"><?php print $concepto;?></td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">TELEFONO:</td>
					<td style="width:500px;font-size:15px;padding:0;text-align:left;">51-5555555</td>
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
				<tr style="height:130px;">
					<td style="width:225px;font-size:15px;padding:0;text-align:left;border:1px solid;"><?php print $orden_equipo;?></td>
					<td style="width:225px;font-size:15px;padding:0;text-align:left;border:1px solid;">colocar la referncia del equipo</td>
					<td style="width:225px;font-size:15px;padding:0;text-align:left;border:1px solid;">colocar marca del equipo</td>
					<td style="width:225px;font-size:15px;padding:0;text-align:left;border:1px solid;">colocar serial del equipo</td>
				</tr>
			</tbody>
		</table>

		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:500px;font-size:15px;padding:0;text-align:left;border:1px solid;vertical-align:top;" rowspan="2">OBSERVACIONES</th>
					<td style="width:200px;font-size:15px;padding:0;text-align:center;border:1px solid;">DPTO TECNICO</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:center;border:1px solid;">FIRMA CLIENTE</td>
				</tr>
				<tr>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;border:1px solid;">colocar la decripcion de la tabla</td>
					<td style="width:200px;height:130px;font-size:15px;padding:0;text-align:left;border:1px solid;">colocar la referncia del equipo</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>
