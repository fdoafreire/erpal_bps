<?php

/**
* Callback home noticias.
*/
function esn_noticias_home_page() {

  $query = db_select('nodequeue_nodes', 'nn');
  $query->fields('nn', array('nid'));
  $query->condition('qid', 2);
  $query->orderBy('nn.position','ASC');
  $result = $query->execute()->fetchAll();
  foreach ($result as $key => $value) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_en_proceso', 'fdp', 'n.nid = fdp.entity_id');
    $query->join('field_data_field_imagen_para_los_listados', 'fdil', 'n.nid = fdil.entity_id');
    $query->join('file_managed', 'fm', 'fdil.field_imagen_para_los_listados_fid = fm.fid');
    $query->fields('n', array('title', 'nid'))
        ->fields('fdp', array('field_en_proceso_value'))
        ->fields('fdil', array('field_imagen_para_los_listados_fid'))
        ->fields('fm', array('uri'))
        ->condition('n.nid', $value->nid);
    $result[$key] = reset($query->execute()->fetchAll());
  }

  if (!empty($result)) {
    $content = array(
      '#prefix' => '<div class="view view-noticias-home-page view-id-noticias_home_page view-display-id-noticias_page primaria">',
      '#suffix' => '</div>',
      'title' => array(
        '#prefix' => '<h5 class="title">',
        '#suffix' => '</h5>',
        '#markup' => 'Noticias'
      ),
      'content_noticias' => array(
        '#prefix' => '<div class="content-noticias">',
        '#suffix' => '</div>',
        'item_left' => array(
          '#prefix' => '<div class="view-content item-left">',
          '#suffix' => '</div>',
        ),
        'items_dos' => array(
          '#prefix' => '<div class="view-content dos-items">',
          '#suffix' => '</div>',
        ),
      ),
      'bottom' => array(
        '#prefix' => '<div class="bottom-noticias"><a href="noticias" class="ver-mas">',
        '#suffix' => '</a></div>',
        '#markup' => 'Ver más noticias'
      ),
    );
    $i = 0;
    foreach ($result as $key => $value) {
      $title = $value->title;
      $uriNode = drupal_get_path_alias('node/'. $value->nid);
      $htmlTitle = '<div class="views-field views-field-title">
          <span class="field-content">
            <a href="'. $uriNode .'">'. $title .'</a>
          </span>
        </div>';
      if ($i == 0) {
        $img = image_style_url('655x570', $value->uri);
        $htmlImg = '<a href="#"><img src="'. $img .'"></a>';
        $content['content_noticias']['item_left'][$key] = array(
          '#prefix' => '<div class="noticias">',
          '#suffix' => '</div>',
          '#markup' => $htmlImg . $htmlTitle
        );
      }
      else {
        $img = image_style_url('470x280', $value->uri);
        $htmlImg = '<a href="#"><img src="'. $img .'"></a>';
        $content['content_noticias']['items_dos'][$key] = array(
          '#prefix' => '<div class="noticias">',
          '#suffix' => '</div>',
          '#markup' => $htmlImg . $htmlTitle
        );
      }
      $i++;
    }
  }
  return $content;
}
