<?php

/**
 * @file
 * Definition of Drupal\d8views\Plugin\views\field\NodeTypeFlagger
 */
 
namespace Drupal\views_hostname_field\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * Field handler to output the hostname.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("views_hostname_field")
 */
class Hostname extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function usesGroupBy() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Leave empty to avoid a query on this field.
  }

  /**
   * Define the available options
   * @return array
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    $scheme = \Drupal::request()->getScheme();
    $port = \Drupal::request()->getPort();
    $host = \Drupal::request()->getHost();
    $isDefaultPort = (($port===443 && $scheme==='https') || ($port===80 && $scheme==='http'));
    return $isDefaultPort ? "$scheme://$host" : "$scheme://$host:$port";
  }
}