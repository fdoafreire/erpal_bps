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
  	if (isset($item->field_address_name['und'][0]['value'])) {
  	  $branch_office = $item->field_address_name['und'][0]['value'];
  	}
  }

  
  $cliente = node_load($node->field_ord_cliente['und'][0]['target_id']);
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

	if ($node->field_ord_tipo['und'][0]['value'][0]['value']=="2"){
?>
		<html>
			<head></head>
			<body>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<tbody>
						<tr>
							<td style="width:200pxfont-size:13px;padding:0;text-align:center;" rowspan="2"><?php print $img_logo;?></td>
							<td style="width:300pxfont-size:13px;padding:0;text-align:center;">SISTEMA GESTION DE CALIDAD</td>
						</tr>
						<tr>
							<td style="width:300px;font-size:13px;padding:0;text-align:center;">ORDEN DE TRABAJO</td>
						</tr>
					</tbody>
				</table>
				<br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<thead>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">FECHA</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $fecha?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">NUMERO O.T.</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $node->nid; ?></td>
						</tr>
					</thead>
					<tbody>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CLIENTE</td>
								<td style="width:250px;text-align:left;border:1px solid"><?php print $cliente->title ?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CIUDAD</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $branch_office;?></td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CONTACTO</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">LA FERCHO</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">SUCURSAL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $branch_office;?></td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">DIRECCION</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $address;?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">TEL.FIJO</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $phone;?></td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">EMAIL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">crear correo en base de datos</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CELULAR</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $mobile;?></td>
						</tr>
					</tbody>
				</table>
				<br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">DATOS DEL EQUIPO</caption>
					<tbody>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">EQUIPO</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="2"><?php print $equipment?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">SERIAL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="2">1233GFD</td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">MARCA</td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;">MAC</td>
								<td style="width:150px;text-align:left;border:1px solid;font-size:13px;padding:0;">MODELO</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">2015-2016</td>
								<td style="width:150px;text-align:left;border:1px solid;font-size:13px;padding:0;">CAPACIDAD</td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;">123</td>
						</tr>
						<tr>
							<td style="width:650px;text-align:left;padding:0;font-size:13px;vertical-align:top;" colspan="4" rowspan="3">DESCRIPCION DEL SERVICIO<br><?php print $descripcion?></td>
							<td style="width:250px;text-align:center;border:1px solid;font-size:13px;padding:0;" colspan="2">SERVICIO REALIZADO EN</td>
						</tr>
						<tr>
							<td style="width:150px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $labotatorio;?></td>
							<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $campo;?></td>
						</tr>
						<tr>
							<td style="width:150px;text-align:left;border:1px solid;font-size:13px;padding:0;">X</td>
							<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">DATOS TECNICOS</caption>
					<tbody>
						<tr>
								<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">EN LINEA</td>
								<td style="width:80px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $linea;?></td>
								<td style="width:190px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="2">EN BYPASS</td>
								<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3"><?php print $bypass;?></td>
								<td style="width:120px;text-align:left;border:1px solid;font-size:13px;padding:0;">FUERA LINEA</td>
								<td style="width:150px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="2"><?php print $fueralinea;?></td>
						</tr>
						<tr>
							<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">VOLTAJE BATERIA</td>
							<td style="width:270px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3"><?php print $voltaje;?></td>
							<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">MARCA BATERIA</td>
							<td style="width:270px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3"><?php print $marca;?></td>
						</tr>
						<tr>
							<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">CORRIENTE BATERIA</td>
							<td style="width:270px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3"><?php print $corriente;?></td>
							<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">CANTIDAD BATERIAS</td>
							<td style="width:270px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3"><?php print $cantidad;?></td>
						</tr>
						<tr>
							<td style="width:450px;text-align:center;border:1px solid;font-size:13px;padding:0;font-weight:bold;" colspan="6">MEDICIONES A LA ENTRADA</td>
							<td style="width:450px;text-align:center;border:1px solid;font-size:13px;padding:0;font-weight:bold;" colspan="6">MEDICONES A LA SALIDA</td>
						</tr>
						<tr>
							<td style="width:260px;text-align:center;border:1px solid;font-size:13px;padding:0;" colspan="4">TENSION (V)</td>
							<td style="width:190px;text-align:center;border:1px solid;font-size:13px;padding:0;" colspan="2">CORRIENTE (A)</td>
							<td style="width:300px;text-align:center;border:1px solid;font-size:13px;padding:0;" colspan="4">TENSION (V)</td>
							<td style="width:150px;text-align:center;border:1px solid;font-size:13px;padding:0;" colspan="2">CORRIENTE (A)</td>
						</tr>
						<tr>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $metf1n;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-F2</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $metf1f2;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mecf1;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mstf1n;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-F2</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mstf1f2;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mscf1;?></td>
						</tr>
						<tr>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $metf2n; ?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $metf1f3;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mecf2;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mstf2n;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mstf1f3;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mscf2;?></td>
						</tr>
						<tr>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F3-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $metf3n; ?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2-F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $metf2f3;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mecf3;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F3-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mstf3n;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2-F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mstf2f3;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mscf3;?></td>
						</tr>
						<tr>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">N-T</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $metnt;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">FREC</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $metfrec;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mecn;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">N-T</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mstnt;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">FREC</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mstfrec;?></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"><?php print $mscn;?></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">INFORME TECNICO</caption>
					<tbody>
						<tr>
							<td style="width:900px;height:100px;text-align:left;border:1px solid;font-size:13px;padding:0;vertical-align:top;"><?php print $informet;?></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">RECOMENDACIONES</caption>
					<tbody>
						<tr>
							<td style="width:900px;height:100px;text-align:left;border:1px solid;font-size:13px;padding:0;vertical-align:top;"><?php print $recomendaciones;?></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">TIEMPO PRESTACION DE SERVICIO (EN HORAS)</caption>
					<tbody>
						<tr>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;">LLEGADA</td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $llegada;?></td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;">INICIO</td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $inicio;?></td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;">FIN</td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $fin;?></td>
							<td style="width:110px;text-align:left;border:1px solid;font-size:13px;padding:0;">TOTAL</td>
							<td style="width:110px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $total;?></td>
						</tr>
					</tbody>
				</table>
				<br><br><br><br><br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<tr>
						<td style="width:200px;border-top:1px solid;font-size:13px;">Firma y Sello: BPS</td>
						<td style="width:150px;"></td>
						<td style="width:200px;border-top:1px solid;font-size:13px;">Vo. Bo. BPS</td>
						<td style="width:150px;"></td>
						<td style="width:200px;border-top:1px solid;font-size:13px;">Firma y Sello: Cliente</td>
					</tr>
				</table>
			</body>
		</html>
<?php
	} else {
?>
		<html>
			<head></head>
			<body style="font-size:4px;">
				<font size="2">
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<tbody>
						<tr>
							<td style="width:200px;font-size:13px;padding:0;text-align:center;" rowspan="2"><?php print $img_logo;?></td>
							<td style="width:300px;font-size:13px;padding:0;text-align:center;">SISTEMA GESTION DE CALIDAD</td>
						</tr>
						<tr>
							<td style="width:300px;font-size:13px;padding:0;text-align:center;">ORDEN DE SERVICIO REDES <?php $node->field_ord_servicio['und']?></td>
						</tr>
					</tbody>
				</table>
				<br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<tbody>
					<thead>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">FECHA</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $fecha?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">NUMERO O.T.</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $node->nid; ?></td>
						</tr>
					</thead>
					<tbody>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CLIENTE</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $cliente->title ?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CIUDAD</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $city;?></td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CONTACTO</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $branch_office;?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">SUCURSAL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $branch_office;?></td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">DIRECCION</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $address;?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">TEL.FIJO</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $phone;?></td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">EMAIL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">colocar correo en la sucursal del cliente</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CELULAR</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $mobile;?></td>
						</tr>
					</tbody>
				</table>
				<br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">DESCRIPCION DEL SERVICIO</caption>
					<tbody>
						<tr>
								<td style="width:600px;text-align:left;border:1px solid;font-size:13px;padding:0;vertical-align:top;" rowspan="3"><?php print $descripcion;?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">CONTRATO</td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $orden_servicio_contrato;?></td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">GARANTIA</td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $orden_servicio_garantia;?></td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">FACTURABLE</td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $orden_servicio_facturable;?></td>
						</tr>
					</tbody>
				</table>
				<br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<caption style="border:1px solid;font-size:13px;font-weight:bold;text-align:center;">PARAMETROS DEL SERVICIO</caption>
					<tbody>
						<tr>
							<td style="width:900px;text-aligng:center;border:1px solid;font-size:13px;padding:0;text-align:center;">SELECCIONE COMO BUENO(B) REGULAR(R) DEFICIENTE(D) CUANDO APLIQUE</td>
						</tr>
					</tbody>
				</table>
				<br>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<tbody>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CONDICIONES TABLEROS ELECTRICOS</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $cte_condicion;?></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CONDICIONES RACK, CABLEADO</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $cra_condicion;?></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CONDICIONES CIRCUITOS ELECTRICOS</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $cce_condicion;?></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">MARCA CABLEADO</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $mcc_condicion;?></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">VOLTAJE NEUTRO - TIERRA</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $vnt_condicion;?></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CATEGORIA CABLEADO</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $cacableado;?></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">VOLTAJE NEUTRO - BASE</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $vnb_condicion;?></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">MARCACION E IDENTIFICACION CABLEADO</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $mrcableado;?></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">SEGURIDAD ELECTRICA</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $sel_condicion;?></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">ESTADO CANALETAS</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $esc_condicion;?></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">VENTILACION</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $ven_condicion;?></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CANTIDAD PUNTOS DATOS</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $cnpuntosdatos;?></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">TEMPERATURA</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $tem_condicion;?></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CANTIDAD PUNTOS VOZ</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"><?php print $cnpuntosvoz;?></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">INFORME TECNICO</caption>
					<tbody>
						<tr>
							<td style="width:900px;height:100px;text-align:left;border:1px solid;font-size:13px;padding:0;vertical-align:top;"><?php print $informet;?></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">RECOMENDACIONES</caption>
					<tbody>
						<tr>
							<td style="width:900px;height:100px;text-align:left;border:1px solid;font-size:13px;padding:0;vertical-align:top;"><?php print $recomendaciones;?></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">TIEMPO PRESTACION DE SERVICIO (EN HORAS)</caption>
					<tbody>
						<tr>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;">LLEGADA</td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $llegadafecha." ".$llegadahora;?></td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;">INICIO</td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $iniciofecha." ".$iniciohora;?></td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;">FIN</td>
							<td style="width:112px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $finfecha." ".$finhora;?></td>
							<td style="width:110px;text-align:left;border:1px solid;font-size:13px;padding:0;">TOTAL</td>
							<td style="width:110px;text-align:left;border:1px solid;font-size:13px;padding:0;"><?php print $total;?></td>
						</tr>
					</tbody>
				</table>
				<br><br><br><br><br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<tbody>
						<tr>
							<td style="width:200px;border-top:1px solid;font-size:13px;padding:0;">Firma y Sello: BPS</td>
							<td style="width:150px;"></td>
							<td style="width:200px;border-top:1px solid;font-size:13px;padding:0;">Vo. Bo. BPS</td>
							<td style="width:150px;"></td>
							<td style="width:200px;border-top:1px solid;font-size:13px;padding:0;">Firma y Sello: Cliente</td>
						</tr>
					</tbody>
				</table>
				</font>
			</body>
		</html>
<?php
	}
?>
