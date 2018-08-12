<?php 
  global $base_url;
  $logo = $base_url . '/' . drupal_get_path('module', 'bps_core'). '/img/logo.png';
  $img_logo = '<img src="' . $logo . '" style="width: 120px;"/>';
  $node = $variables['node'];


  $fecha = format_date(time(),'long');
  if (isset($node->created)) {
  	$fecha = format_date($node->created,'custom','j').' de '.format_date($node->created,'custom','F').' del '.format_date($node->created,'custom','Y');
  }
  $city = '';
  $address = '';
  $phone = '';
  $mobile = '';
  $branch_office = '';
  $contact = '';
  $email = '';
  if (isset($node->field_ord_sucursal_id['und'][0]['value'])) {
  	$item = field_collection_item_load($node->field_ord_sucursal_id['und'][0]['value']);
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

  
  $cliente = node_load($node->field_el_cliente['und'][0]['target_id']);
  $equipment = '';
  if (isset($node->field_ord_equipo['und'][0]['value'])){
		$equipment = $node->field_ord_equipo['und'][0]['value'];
	}
  $descripcion = '';
  if (isset($node->field_ord_descripcion['und'][0]['value'])){
		$descripcion = $node->field_ord_descripcion['und'][0]['value'];
	}
	$orden_servicio_contrato = '';
	$orden_servicio_garantia = '';
	$orden_servicio_facturable = '';
	
	if ($node->field_ord_servicio['und'][0]['value']==1){
		$orden_servicio_contrato = "X";
	} else if ($node->field_ord_servicio['und'][0]['value']==2){
		$orden_servicio_garantia = "X";
	} else if ($node->field_ord_servicio['und'][0]['value']==3){
		$orden_servicio_facturable = "X";
	}
	
	$campo = '';
	$laboratorio = '';
	if ($node->field_ord_realizado['und'][0]['value']=="1"){
		$laboratorio = 'X';
	} else if ($node->field_ord_realizado['und'][0]['value']=="2"){
		$campo = 'X';
	}

	$linea = '';
	$bypass = '';
	$fueralinea = '';
	if ($node->field_ord_datos_tecnicos['und'][0]['value']=="1"){
		$linea = 'X';
	} else if ($node->field_ord_datos_tecnicos['und'][0]['value']=="2"){
		$bypass = 'X';
	} else if ($node->field_ord_datos_tecnicos['und'][0]['value']=="3"){
		$fueralinea = 'X';
	}

	$voltaje = $node->field_ord_voltaje_bateria['und'][0]['value'];
	$corriente = $node->field_ord_corriente_bateria['und'][0]['value'];
	$marca = $node->field_ord_marca_bateria['und'][0]['value'];
	$cantidad = $node->field_ord_cantidad_bateria['und'][0]['value'];
	$metf1n = $node->field_ord_met_f1_n['und'][0]['value'];
	$metf2n = $node->field_ord_met_f2_n['und'][0]['value'];
	$metf3n = $node->field_ord_met_f3_n['und'][0]['value'];
	$metnt = $node->field_ord_met_n_t['und'][0]['value'];
	$metf1f2 = $node->field_ord_met_f1_f2['und'][0]['value'];
	$metf1f3 = $node->field_ord_met_f1_f3['und'][0]['value'];
	$metf2f3 = $node->field_ord_met_f2_f3['und'][0]['value'];
	$metfrec = $node->field_ord_met_frec['und'][0]['value'];
	$mecf1 = $node->field_ord_mec_f1['und'][0]['value'];
	$mecf2 = $node->field_ord_mec_f2['und'][0]['value'];
	$mecf3 = $node->field_ord_mec_f2['und'][0]['value'];
	$mecn = $node->field_ord_mec_n['und'][0]['value'];
	$mstf1n = $node->field_ord_mst_f1_n['und'][0]['value'];
	$mstf2n = $node->field_ord_mst_f2_n['und'][0]['value'];
	$mstf3n = $node->field_ord_mst_f3_['und'][0]['value'];
	$mstnt = $node->field_ord_mst_n_t['und'][0]['value'];
	$mstf1f2 = $node->field_ord_mst_f1_f2['und'][0]['value'];
	$mstf1f3 = $node->field_ord_mst_f2_f3['und'][0]['value'];
	$mstf2f3 = $node->field_ord_mst_f1_f3['und'][0]['value'];
	$mstfrec = $node->field_ord_mst_frec['und'][0]['value'];
	$mscf1 = $node->field_ord_msc_f1['und'][0]['value'];
	$mscf2 = $node->field_ord_msc_f2['und'][0]['value'];
	$mscf3 = $node->field_ord_msc_f3['und'][0]['value'];
	$mscn = $node->field_ord_msc_n['und'][0]['value'];
	$informet = $node->field_ord_informe_tecnico['und'][0]['value'];
	$recomendaciones = $node->field_ord_recomendaciones['und'][0]['value'];
	$llegadafecha = $node->field_ord_llegada['und'][0]['value']['date'];
	$llegadahora = $node->field_ord_llegada['und'][0]['value']['hora'];
	$iniciofecha = $node->field_ord_inicio['und'][0]['value']['date'];
	$iniciohora = $node->field_ord_inicio['und'][0]['value']['hora'];
	$finfecha = $node->field_ord_inicio['und'][0]['value']['date'];
	$finhora = $node->field_ord_inicio['und'][0]['value']['hora'];
	$total = $node->field_ord_total['und'][0]['value'];

  $llegada = $node->field_ord_llegada['und'][0]['value'];
  $inicio = $node->field_ord_inicio['und'][0]['value'];
  $fin = $node->field_ord_fin['und'][0]['value'];

	
	$condiciones = array(
		"1" => "B",
		"2" => "R",
		"3" => "D",
		"4" => "",		
	);
	
	$cte_condicion = $condiciones[$node->field_ord_cdtableroelectrico['und'][0]['value']];
	$cce_condicion = $condiciones[$node->field_ord_cdcircuitoelectrico['und'][0]['value']];
	$vnt_condicion = $condiciones[$node->field_ord_vtneutrotierra['und'][0]['value']];
	$vnb_condicion = $condiciones[$node->field_ord_vtneutrobase['und'][0]['value']];
	$sel_condicion = $condiciones[$node->field_ord_seelectrica['und'][0]['value']];
	$ven_condicion = $condiciones[$node->field_ord_ventilacion['und'][0]['value']];
	$tem_condicion = $condiciones[$node->field_ord_temperatura['und'][0]['value']];
	$cra_condicion = $condiciones[$node->field_ord_cdrackcableado['und'][0]['value']];
	$mcc_condicion = $condiciones[$node->field_ord_mcidecableado['und'][0]['value']];
	$esc_condicion = $condiciones[$node->field_ord_escanaleta['und'][0]['value']];
	$mrcableado = $node->field_ord_mrcableado['und'][0]['value'];
	$cacableado = $node->field_ord_cacableado['und'][0]['value'];
	$cnpuntosdatos = $node->field_ord_cnpuntosdatos['und'][0]['value'];	
	$cnpuntosvoz = $node->field_ord_cnpuntosvoz['und'][0]['value'];	

?>
<html>
	<head></head>
	<body>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:200px;font-size:20px;padding:0;text-align:center;" rowspan="2"><?php print $img_logo;?></td>
					<td style="width:400px;font-size:20px;font-weight:bold;padding:0;text-align:center;">INGRESO DE EQUIPOS A LABORATORIO</td>
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
					<td style="width:500px;font-size:15px;padding:0;text-align:left;"><?php print $cliente;?></td>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">FECHA:</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;">2018-08-10</td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">SUCURSAL:</td>
					<td style="width:500px;font-size:15px;padding:0;text-align:left;">LA FERCHO BOGOTA</td>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">PROVEEDOR:</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;">UPS Y REDES</td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CONTACTO:</td>
					<td style="width:500px;font-size:15px;padding:0;text-align:left;">SURICATO</td>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">NIT/CC</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;">800.800.800-5</td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">DIRECCION:</td>
					<td style="width:500px;font-size:15px;padding:0;text-align:left;">TABOGO</td>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">CONCEPTO</td>
					<td style="width:200px;font-size:15px;padding:0;text-align:left;"></td>
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
					<td style="width:225px;font-size:15px;padding:0;text-align:left;border:1px solid;">colocar la decripcion de la tabla</td>
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
