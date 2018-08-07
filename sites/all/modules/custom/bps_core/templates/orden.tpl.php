<?php 
  global $base_url;
  $logo = $base_url . '/' . drupal_get_path('module', 'bps_core'). '/img/logo.png';
  $img_logo = '<img src="' . $logo . '" style="width: 120px;"/>';
  $node = $variables['node'];


  $fecha = format_date(time(),'long');
  if (isset($node->created)) {
  	$fecha = format_date($node->created,'custom','j').' de '.format_date($node->created,'custom','F').' del '.format_date($node->created,'custom','Y');
  }

  $cliente = node_load($node->field_ord_cliente['und'][0]['target_id']);
  $equipment = '';
  if (isset($node->field_ord_equipo['und'][0]['value'])){
		$equipment = $node->field_ord_equipo['und'][0]['value'];
	}
  $description = '';
  if (isset($node->field_ord_cliente['und'][0]['value'])){
		$description = $node->field_ord_cliente['und'][0]['value'];
	}
	if ($node->field_ord_tipo['und'][0]['value']=="2"){
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
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">TABOFDGDGFDGO CDSFDS </td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CONTACTO</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">LA FERCHO</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">SUCURSAL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">TABOGO 2FGDGD FGDGDF</td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">DIRECCION</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">EL CARTUCHO</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">TEL.FIJO</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">(1) 3222555</td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">EMAIL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">lafreire@gmail</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CELULAR</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">3000000</td>
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
							<td style="width:650px;text-align:left;padding:0;font-size:13px;vertical-align:top;" colspan="4" rowspan="3">DESCRIPCION DEL SERVICIO<br><?php print $description?></td>
							<td style="width:250px;text-align:center;border:1px solid;font-size:13px;padding:0;" colspan="2">SERVICIO REALIZADO EN</td>
						</tr>
						<tr>
							<td style="width:150px;text-align:left;border:1px solid;font-size:13px;padding:0;">LABORATORIO</td>
							<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;">CAMPO</td>
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
								<td style="width:80px;text-align:left;border:1px solid;font-size:13px;padding:0;">X</td>
								<td style="width:190px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="2">EN BYPASS</td>
								<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3"></td>
								<td style="width:120px;text-align:left;border:1px solid;font-size:13px;padding:0;">FUERA LINEA</td>
								<td style="width:150px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="2"></td>
						</tr>
						<tr>
							<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">VOLTAJE BATERIA</td>
							<td style="width:270px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">12v</td>
							<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">MARCA BATERIA</td>
							<td style="width:270px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">MAC</td>
						</tr>
						<tr>
							<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">CORRIENTE BATERIA</td>
							<td style="width:270px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">12A</td>
							<td style="width:180px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">CANTIDAD BATERIAS</td>
							<td style="width:270px;text-align:left;border:1px solid;font-size:13px;padding:0;" colspan="3">2</td>
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
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-F2</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-F2</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F1-F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F3-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2-F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F3-N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F2-F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">F3</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">N-T</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">FREC</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">N-T</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">FREC</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:30px;text-align:center;border:1px solid;font-size:13px;padding:0;">N</td>
							<td style="width:45px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">INFORME TECNICO</caption>
					<td style="width:900px;height:100px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">RECOMENDACIONES</caption>
					<td style="width:900px;height:100px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">TIEMPO PRESTACION DE SERVICIO (EN HORAS)</caption>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;">LLEGADA</td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;">INICIO</td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;">FIN</td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
					<td style="width:110px;text-align:center;border:1px solid;font-size:13px;padding:0;">TOTAL</td>
					<td style="width:110px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
				</table>
				<br><br><br><br><br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<tr>
						<td style="width:200px;border-top:1px solid;">Firma y Sello: BPS</td>
						<td style="width:150px;"></td>
						<td style="width:200px;border-top:1px solid;">Vo. Bo. BPS</td>
						<td style="width:150px;"></td>
						<td style="width:200px;border-top:1px solid;">Firma y Sello: Cliente</td>
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
							<td style="width:300px;border:1px solid;font-size:13px;padding:0;text-align:center;" rowspan="2"><?php print $img_logo;?></td>
							<td style="width:300px;border:1px solid;font-size:13px;padding:0;text-align:center;">SISTEMA GESTION DE CALIDAD<?php   print $node->field_ord_tipo['und'][0]['value'];  print '<br>';?></td>
						</tr>
						<tr>
							<td style="width:300px;border:1px solid;font-size:13px;padding:0;text-align:center;">ORDEN DE SERVICIO REDES</td>
						</tr>
					</tbody>
				</table>
				<br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<tbody>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">FECHA</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;"><?php print $fecha?></td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">NUMERO O.S.</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">ID DE LA OS</td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">RAZON SOCIAL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">FREIRE</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CIUDADSFDSFSFSDD</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">TABOFDGDGFDGO CDSFDS </td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CONTACTO</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">LA FERCHO</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">SUCURSAL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">TABOGO 2FGDGD FGDGDF</td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">DIRECCION</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">EL CARTUCHO</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">TEL.FIJO</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">(1) 3222555</td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">EMAIL</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">lafreire@gmail</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;">CELULAR</td>
								<td style="width:250px;text-align:left;border:1px solid;font-size:13px;">3000000</td>
						</tr>
					</tbody>
				</table>
				<br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">DESCRIPCION DEL SERVICIO</caption>
					<tbody>
						<tr>
								<td style="width:600px;text-align:left;border:1px solid;font-size:13px;padding:0;vertical-align:top;" rowspan="3">ReviSion circuito de iluminacion en piso 35.</td>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">CONTRATO</td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;">X</td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">GARANTIA</td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
								<td style="width:200px;text-align:left;border:1px solid;font-size:13px;padding:0;">FACTURABLE</td>
								<td style="width:100px;text-align:left;border:1px solid;font-size:13px;padding:0;"></td>
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
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CONDICIONES RACK, CABLEADO</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CONDICIONES CIRCUITOS ELECTRICOS</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">MARCA CABLEADO</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">VOLTAJE NEUTRO - TIERRA</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CATEGORIA CABLEADO</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">VOLTAJE NEUTRO - FASE</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">MARCACION E IDENTIFICACION CABLEADO</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">SEGURIDAD ELECTRICA</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">ESTADO CANALETAS</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">VENTILACION</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CANTIDAD PUNTOS DATOS</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
						<tr>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">TEMPERATURA</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
							<td style="width:350px;border:1px solid;font-size:13px;padding:0;">CANTIDAD PUNTOS VOZ</td>
							<td style="width:100px;border:1px solid;font-size:13px;padding:0;"></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">INFORME TECNICO</caption>
					<td style="width:900px;height:100px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">RECOMENDACIONES</caption>
					<td style="width:900px;height:100px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
				</table>
				<br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;" >
					<caption style="border:1px solid;font-size:13px;font-weight:bold;">TIEMPO PRESTACION DE SERVICIO (EN HORAS)</caption>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;">LLEGADA</td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;">INICIO</td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;">FIN</td>
					<td style="width:112px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
					<td style="width:110px;text-align:center;border:1px solid;font-size:13px;padding:0;">TOTAL</td>
					<td style="width:110px;text-align:center;border:1px solid;font-size:13px;padding:0;"></td>
				</table>
				<br><br><br><br><br><br>
				<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing=0;">
					<tr>
						<td style="width:200px;border-top:1px solid;">Firma y Sello: BPS</td>
						<td style="width:150px;"></td>
						<td style="width:200px;border-top:1px solid;">Vo. Bo. BPS</td>
						<td style="width:150px;"></td>
						<td style="width:200px;border-top:1px solid;">Firma y Sello: Cliente</td>
					</tr>
				</table>
				</font>
			</body>
		</html>
<?php
	}
?>
<!--html>
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
					<td style="width:300px;font-size:15px;padding:0;text-align:left;" rowspan="2"><?php print format_date($node->create,'long')?></td>
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
</html-->
