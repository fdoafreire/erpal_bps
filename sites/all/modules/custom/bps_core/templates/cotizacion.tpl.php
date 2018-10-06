<?php 
  global $base_url;
  $logo = $base_url . '/' . drupal_get_path('module', 'bps_core'). '/img/logo.png';
  $img_logo = '<img src="' . $logo . '" style="width: 200px;"/>';
  $node = $variables['node'];
  $cotizacion = $node->field_consecutivo_doc['und'][0]['value'];
  $observaciones = $node->field_observaciones['und'][0]['value'];
  $solicitud = $node->field_solicitud['und'][0]['value'];
  $cotizante = $node->field_cotizante['und'][0]['value'];
  $area = $node->field_area_cotizante['und'][0]['value'];
  $empresa = $node->field_empresa['und'][0]['value'];
  $telefono = $node->field_telefono['und'][0]['value'];
  $correo = $node->field_correo['und'][0]['value'];
  $cliente = node_load($node->field_cliente['und'][0]['target_id']);
  $city = '';
  $address = '';
  $query = db_select('node_revision', 'v');
  $query->condition('v.nid',$node->nid);
  $query->fields('v', array('nid'));
  $query->condition('v.status',1);
  $result = $query->execute(); 
  $version = $result->rowCount();
  if ($version == 0) {
  	$version = 1;
  }
  

  if (isset($cliente->field_addresses['und'][0]['value'])) {
  	$item = field_collection_item_load($item['value']);
  	if (isset($item->field_city['und'][0]['value'])) {
  	  $city = $item->field_city['und'][0]['value'];
  	}
  	if (isset($item->field_addition_to_address['und'][0]['value'])) {
  	  $address = $item->field_addition_to_address['und'][0]['value'];
  	}
  }
  $contact = '';
  if ($node->field_contacto['und'][0]['value']) {
  	$contact = $node->field_contacto['und'][0]['value'];
  } 
  $references = array();
  $neto = 0;
  $descuento = 0;
  $subtotal = 0;
  $iva = 0;
  $total = 0;
  if (isset($node->field_referencias['und']) && count($node->field_referencias['und']) > 0){
    foreach ($node->field_referencias['und'] as $ref) {
    	$item = field_collection_item_load($ref['value']);
    	$references[] = array('ref' => $item->field_ref_referencia['und'][0]['value'],
    		                    'description' => $item->field_descripcion['und'][0]['value'],
    		                    'cant' => $item->field_ref_cantidad['und'][0]['value'],
    		                    'v_unitario' => $item->field_valor_unitario['und'][0]['value'],
    		                    'v_subtotal' => $item->field_ref_cantidad['und'][0]['value'] * $item->field_valor_unitario['und'][0]['value'],
    		                    'v_descuento' => $item->field_descuento['und'][0]['value'],
    		                    'v_impuesto' => $item->field_porcentaje_impuesto['und'][0]['value'],
    		                    'v_iva' => $item->field_valor_iva['und'][0]['value'],
    		                    'v_total' => $item->field_total['und'][0]['value']);

    	$neto      += $item->field_ref_cantidad['und'][0]['value'] * $item->field_valor_unitario['und'][0]['value'];
    	$descuento += $item->field_descuento['und'][0]['value'];
  		$subtotal   = $neto - $descuento;
    	$iva       += $item->field_valor_iva['und'][0]['value'];
    	$total     += $item->field_total['und'][0]['value'];
    }
  }
  $type_payment = '';
  if (isset($node->field_forma_pago['und'][0]['tid'])) {
  	 $term = taxonomy_term_load($node->field_forma_pago['und'][0]['tid']);
  	 $type_payment = isset($term->name)? $term->name: '';
  } 
  $time = '';
  if (isset($node->field_tiempo_entrega['und'][0]['value'])) {
  	$time = $node->field_tiempo_entrega['und'][0]['value'];
  } 
  $validity = '';
  if (isset($node->field_validez_oferta['und'][0]['value'])) {
  	$validity = $node->field_validez_oferta['und'][0]['value'];

  }
  $warranty = '';
  if (isset($node->field_garantia['und'][0]['value'])) {
  	$warranty = $node->field_garantia['und'][0]['value'];
  }
  $fecha = format_date(time(),'long');
  if (isset($node->created)) {
  	$fecha = format_date($node->created,'long');
  	$fecha = format_date($node->created,'custom','j').' de '.format_date($node->created,'custom','F').' del '.format_date($node->created,'custom','Y');
  }
  $descripcion_moneda = "";
  $descripcion_moneda_extranjera = "";
  if (isset($node->field_cotizaciones_moneda['und'][0]['tid'])) {
		$term = taxonomy_term_load($node->field_cotizaciones_moneda['und'][0]['tid']);
		$name_money = isset($term->name)? $term->name: '';
		$name_money = strtoupper($name_money);
  	if ($name_money=="PESOS"){
			$term = taxonomy_term_load($node->field_cotizaciones_moneda['und'][0]['tid']);
			$descripcion_moneda = isset($term->field_moneda_descripcion_corta['und'][0]['value'])? $term->field_moneda_descripcion_corta['und'][0]['value']: '';
			$descripcion_moneda_extranjera = "";
		} else {
			$term = taxonomy_term_load($node->field_cotizaciones_moneda['und'][0]['tid']);
			$descripcion_moneda = "";	
			$descripcion_moneda_extranjera = isset($term->field_moneda_descripcion_corta['und'][0]['value'])? $term->field_moneda_descripcion_corta['und'][0]['value']: '';
		}
  } 

?>
<html>
	<head></head>
	<body>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:230px;font-size:20px;padding:0;text-align:center;"><?php print $img_logo;?></td>
					<td style="width:300px;font-size:20px;font-weight:bold;padding:0;text-align:center;">COTIZACION</td>
				</tr>
			</tbody>
		</table>
		<br>
		<br>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:300px;font-size:13px;padding:0;text-align:left;" rowspan="2"><?php print $fecha;?></td>
					<td style="width:550px;font-size:13px;font-weight:bold;padding:0;text-align:right;">Cotizacion No:</td>
					<td style="width:50px;font-size:13px;font-weight:bold;padding:0;text-align:right;"><?php print $cotizacion; ?></td>
				</tr>
				<tr>
					<td style="width:550px;font-size:13px;font-weight:bold;padding:0;text-align:right;">Version</td>
					<td style="width:50px;font-size:13px;font-weight:bold;padding:0;text-align:right;"><?php print $version; ?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:900px;font-size:13px;font-weight:bold;padding:0;text-align:left;">Señores</td>
				</tr>
				<tr>
					<td style="width:900px;font-size:13px;padding:0;text-align:left;"><?php print $cliente->title; ?></td>
				</tr>
			</tbody>
				<tr>
					<td style="width:300px;font-size:13px;padding:0;text-align:left;" colspan="2"><?php print $city; ?></td>
				</tr>
				<tr>
					<td style="width:300px;font-size:13px;padding:0;text-align:left;" colspan="2"><?php print $address; ?></td>
				</tr>
				<tr>
					<td style="height:20px;font-size:13px;padding:0;text-align:left;" colspan="2"></td>
				</tr>
		</table>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:100px;font-size:13px;font-weight:bold;padding:0;text-align:left;">Atención</td>
					<td style="width:800px;font-size:13px;padding:0;text-align:left;"><?php print $contact; ?></td>
				</tr>
				<tr>
					<td style="width:100px;font-size:13px;font-weight:bold;padding:0;text-align:left;">Asunto</td>
					<td style="width:800px;font-size:13px;padding:0;text-align:left;">COTIZACION</td>
				</tr>
				<!--tr>
					<td style="width:100px;font-size:13px;font-weight:bold;padding:0;text-align:left;">Equipo</td>
					<td style="width:800px;font-size:13px;padding:0;text-align:left;"></td>
				</tr-->
			</tbody>
		</table>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:900px;font-size:13px;font-weight:bold;padding:0;text-align:left;">Cordial saludo</td>
				</tr>
				<tr>
					<td style="width:900px;font-size:13px;padding:0;text-align:left;"><?php print $solicitud;?></td>
				</tr>
			</tbody>
		</table>
		<br><br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
						<th style="width:20px;text-align:left;border:1px solid;font-size:13px;"></th>
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Referencia</th>
						<th style="width:180px;text-align:left;border:1px solid;font-size:13px;">Descripcion</th>
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Cantidad</th>
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Valor Unitario</th>
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Subtotal</th>
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Descuento(%)</th>
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Iva</th>
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Total</th>
				</tr>
    			<?php foreach ($references as $key => $ref): ?>
						<tr>
								<td style="width:20px;text-align:left;border:1px solid;font-size:13px;"><?php print $key + 1;?></td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;"><?php print $ref['ref'];?></td>
								<td style="width:180px;text-align:left;border:1px solid;font-size:13px;"><?php print $ref['description'];?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print number_format($ref['cant'],0,".",",");?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $descripcion_moneda. number_format($ref['v_unitario'],0,".",",")." ".$descripcion_moneda_extranjera;?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $descripcion_moneda. number_format($ref['v_subtotal'],0,".",",")." ".$descripcion_moneda_extranjera;?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $descripcion_moneda. number_format($ref['v_descuento'],0,".",",")." ".$descripcion_moneda_extranjera;?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $descripcion_moneda. number_format($ref['v_iva'],0,".",",")." ".$descripcion_moneda_extranjera;?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $descripcion_moneda. number_format($ref['v_total'],0,".",",")." ".$descripcion_moneda_extranjera;?></td>
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br><br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
						<th style="width:700px;text-align:left;font-size:13px;">OBSERVACIONES</th>
						<th style="width:100px;text-align:right;font-size:13px;">NETO</th>
						<td style="width:100px;text-align:right;font-size:13px;"><?php print $descripcion_moneda. number_format($neto,0,".",",")." ".$descripcion_moneda_extranjera;?></td>
				</tr>
				<tr>
						<td style="width:700px;text-align:left;font-size:13px;vertical-align:top;" rowspan="4"><?php print $observaciones?></td>
						<th style="width:100px;text-align:right;font-size:13px;">DESCUENTO</th>
						<td style="width:100px;text-align:right;font-size:13px;"><?php print $descripcion_moneda. number_format($descuento,0,".",",")." ".$descripcion_moneda_extranjera;?></td>
				</tr>
				<tr>
						<th style="width:100px;text-align:right;font-size:13px;">SUBTOTAL</th>
						<td style="width:100px;text-align:right;font-size:13px;"><?php print $descripcion_moneda. number_format($subtotal,0,".",",")." ".$descripcion_moneda_extranjera;?></td>
				</tr>
				<tr>
						<th style="width:100px;text-align:right;font-size:13px;">IVA</th>
						<td style="width:100px;text-align:right;font-size:13px;"><?php print $descripcion_moneda. number_format($iva,0,".",",")." ".$descripcion_moneda_extranjera;?></td>
				</tr>
				<tr>
						<th style="width:100px;text-align:right;font-size:13px;">TOTAL</th>
						<td style="width:100px;text-align:right;font-size:13px;border-top:1px solid;"><?php print $descripcion_moneda. number_format($total,0,".",",")." ".$descripcion_moneda_extranjera;?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
						<td style="width:900px;text-align:left;font-size:13px;font-weight:bold;">CONDICIONES COMERCIALES</td>
				</tr>
			</tbody>
		</table>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
						<td style="width:150px;text-align:left;font-size:13px;">Forma de pago:</td>
						<td style="width:700px;text-align:left;font-size:13px;"><?php print $type_payment; ?></td>
				</tr>
				<tr>
						<td style="width:150px;text-align:left;font-size:13px;">Tiempo de entrega:</td>
						<td style="width:700px;text-align:left;font-size:13px;"><?php print $time; ?></td>
				</tr>
				<tr>
						<td style="width:150px;text-align:left;font-size:13px;">Validez de la oferta:</td>
						<td style="width:700px;text-align:left;font-size:13px;"><?php print $validity; ?></td>
				</tr>
				<tr>
						<td style="width:150px;text-align:left;font-size:13px;">Garantia:</td>
						<td style="width:700px;text-align:left;font-size:13px;"><?php print $warranty; ?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<caption style="font-size:13px;font-weight:bold;text-align:left;">Cordialmente</caption>
			<tbody>
				<tr>
						<td style="width:900px;text-align:left;font-size:13px;"><?php print $cotizante;?></td>
				</tr>
				<tr>
						<td style="width:900px;text-align:left;font-size:13px;"><?php print $area;?></td>
				</tr>
				<tr>
						<th style="width:900px;text-align:left;font-size:13px;"><?php print $empresa;?></th>
				</tr>
				<tr>
						<td style="width:900px;text-align:left;font-size:13px;"><?php print $telefono;?></td>
				</tr>
				<tr>
						<td style="width:900px;text-align:left;font-size:13px;"><?php print $correo;?></td>
				</tr>
		</table>
	</body>
</html>
