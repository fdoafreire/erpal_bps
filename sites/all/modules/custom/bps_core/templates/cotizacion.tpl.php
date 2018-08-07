<?php 
  global $base_url;
  $logo = $base_url . '/' . drupal_get_path('module', 'bps_core'). '/img/logo.png';
  $img_logo = '<img src="' . $logo . '" style="width: 120px;"/>';
  $node = $variables['node'];
  $cliente = node_load($node->field_cliente['und'][0]['target_id']);
  $city = '';
  $address = '';
  if (isset($node->field_addresses['und'][0]['value'])) {
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
    	$iva       += $item->field_porcentaje_impuesto['und'][0]['value'];
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
  $fecha = format_date(time(),'medium');
  if (isset($node->created)) {
  	$fecha = format_date($node->created,'medium');
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
					<td style="width:300px;font-size:15px;padding:0;text-align:left;" rowspan="2"><?php print $fecha;?></td>
					<td style="width:550px;font-size:15px;font-weight:bold;padding:0;text-align:right;">Cotizacion No:</td>
					<td style="width:50px;font-size:15px;font-weight:bold;padding:0;text-align:right;"><?php print $node->nid; ?></td>
				</tr>
				<tr>
					<td style="width:550px;font-size:15px;font-weight:bold;padding:0;text-align:right;">Version</td>
					<td style="width:50px;font-size:13px;font-weight:bold;padding:0;text-align:right;">1</td>
				</tr>
			</tbody>
		</table>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:400px;font-size:15px;font-weight:bold;padding:0;text-align:left;" colspan="2">Señores</td>
				</tr>
				<tr>
					<td style="width:400px;font-size:15px;padding:0;text-align:left;" colspan="2"><?php print $cliente->title; ?></td>
				</tr>
				<tr>
					<td style="width:400px;font-size:15px;padding:0;text-align:left;" colspan="2"><?php print $city; ?></td>
				</tr>
				<tr>
					<td style="width:400px;font-size:15px;padding:0;text-align:left;" colspan="2"><?php print $address; ?></td>
				</tr>
				<tr>
					<td style="height:20px;font-size:15px;padding:0;text-align:left;" colspan="2"></td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">Atención</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"><?php print $contact; ?></td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">Asunto</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;">COTIZACION</td>
				</tr>
				<tr>
					<td style="width:100px;font-size:15px;font-weight:bold;padding:0;text-align:left;">Equipo</td>
					<td style="width:300px;font-size:15px;padding:0;text-align:left;"></td>
				</tr>
			</tbody>
		</table>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<tbody>
				<tr>
					<td style="width:900px;font-size:15px;font-weight:bold;padding:0;text-align:left;">Cordial saludo</td>
				</tr>
				<tr>
					<td style="width:900px;font-size:15px;padding:0;text-align:left;">De acuerdo a su solicitud, a continuación se presenta oferta comercial para su estudio y aprobación</td>
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
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Descuento</th>
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Iva</th>
						<th style="width:100px;text-align:left;border:1px solid;font-size:13px;">Total</th>
				</tr>
    			<?php foreach ($references as $key => $ref): ?>
						<tr>
								<td style="width:20px;text-align:left;border:1px solid;font-size:13px;"><?php print $key + 1;?></td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;"><?php print $ref['ref'];?></td>
								<td style="width:180px;text-align:left;border:1px solid;font-size:13px;"><?php print $ref['description'];?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $ref['cant'];?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $ref['v_unitario'];?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $ref['v_subtotal'];?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $ref['v_descuento'];?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $ref['v_impuesto'];?></td>
								<td style="width:100px;text-align:right;border:1px solid;font-size:13px;"><?php print $ref['v_total'];?></td>
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
						<td style="width:100px;text-align:right;font-size:13px;"><?php print $neto;?></td>
				</tr>
				<tr>
						<td style="width:700px;text-align:left;font-size:13px;vertical-align:top;" rowspan="4">Los mantenimientos seran bajo coordinación con el cliente y en horario 5x8</td>
						<th style="width:100px;text-align:right;font-size:13px;">DESCUENTO</th>
						<td style="width:100px;text-align:right;font-size:13px;"><?php print $descuento;?></td>
				</tr>
				<tr>
						<th style="width:100px;text-align:right;font-size:13px;">SUBTOTAL</th>
						<td style="width:100px;text-align:right;font-size:13px;"><?php print $subtotal;?></td>
				</tr>
				<tr>
						<th style="width:100px;text-align:right;font-size:13px;">IVA</th>
						<td style="width:100px;text-align:right;font-size:13px;"><?php print $iva;?></td>
				</tr>
				<tr>
						<th style="width:100px;text-align:right;font-size:13px;">TOTAL</th>
						<td style="width:100px;text-align:right;font-size:13px;border-top:1px solid;"><?php print $total;?></td>
				</tr>
		</table>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<caption style="font-size:13px;font-weight:bold;text-align:left;">CONDICIONES COMERCIALES</caption>
			<tbody>
				<tr>
						<th style="width:120px;text-align:left;font-size:13px;">Forma de pago:</th>
						<td style="width:200px;text-align:left;font-size:13px;"><?php print $type_payment; ?></td>
				</tr>
				<tr>
						<th style="width:120px;text-align:left;font-size:13px;">Tiempo de entrega:</th>
						<td style="width:200px;text-align:left;font-size:13px;"><?php print $time; ?></td>
				</tr>
				<tr>
						<th style="width:120px;text-align:left;font-size:13px;">Validez de la oferta:</th>
						<td style="width:200px;text-align:left;font-size:13px;"><?php print $validity; ?></td>
				</tr>
				<tr>
						<th style="width:120px;text-align:left;font-size:13px;">Garantia:</th>
						<td style="width:200px;text-align:left;font-size:13px;"><?php print $warranty; ?></td>
				</tr>
		</table>
		<br>
		<br>
		<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
			<caption style="font-size:13px;font-weight:bold;text-align:left;">Cordialmente</caption>
			<tbody>
				<tr>
						<td style="width:200px;text-align:left;font-size:13px;">FABIAN ANDRES GUERRERO</td>
				</tr>
				<tr>
						<td style="width:200px;text-align:left;font-size:13px;">COMERCIAL</td>
				</tr>
				<tr>
						<th style="width:200px;text-align:left;font-size:13px;">BPS</th>
				</tr>
				<tr>
						<td style="width:120px;text-align:left;font-size:13px;">6681142 EXT 105</td>
				</tr>
				<tr>
						<td style="width:120px;text-align:left;font-size:13px;">almacen@ps.com.co</td>
				</tr>
		</table>
	</body>
</html>
