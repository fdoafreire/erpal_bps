<?php
function tct_elastic_form_main($form, &$form_state) {
  $form = array();
  $form['bps_consec_cotizaciones'] = array(
    '#type' => 'textfield',
    '#title' => t('Consecutivo cotizaciones'),
    '#default_value' => variable_get('bps_consec_cotizaciones', 0),
    '#required' => TRUE,
  );
  $form['bps_consec_ordenes'] = array(
    '#type' => 'textfield',
    '#title' => t('Consecutivo ordenes'),
    '#default_value' => variable_get('bps_consec_ordenes', 0),
    '#required' => TRUE,
  );
  $form['bps_consec_equipos_laboratorio'] = array(
    '#type' => 'textfield',
    '#title' => t('Consecutivo equipos laboratorio'),
    '#default_value' => variable_get('bps_consec_equipos_laboratorio', 0),
    '#required' => TRUE,
  );

  $form['grabar'] = array(
    '#type' => 'submit',
    '#default_value' => t('Grabar'),
    '#required' => TRUE,
  );

}

function tct_elastic_form_main_submit($form, &$form_state) {
  $values = $form_state['values'];
  variable_set('bps_consec_cotizaciones', $values['bps_consec_cotizaciones']);
  variable_set('bps_consec_ordenes', $values['bps_consec_ordenes']);
  variable_set('bps_consec_equipos_laboratorio', $values['bps_consec_equipos_laboratorio']);
}