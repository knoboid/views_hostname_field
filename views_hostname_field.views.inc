<?php

/**
 * Implements hook_views_data_alter().
 */
function views_hostname_field_views_data_alter(array &$data) {

  $data['views']['views_hostname_field'] = [
    'title' => t('Hostname'),
    'group' => t('Global'),
    'help' => t('Displays the hostname'),
    'field' => [
      'id' => 'views_hostname_field',
    ],
  ];

}
