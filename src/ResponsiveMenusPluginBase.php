<?php

/**
 * @file
 * Contains \Drupal\responsive_menus\ResponsiveMenusPluginBase.
 */

namespace Drupal\responsive_menus;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\PluginBase;
use Drupal\responsive_menus\ResponsiveMenusPluginInterface;

/**
 * Class ResponsiveMenusPluginBase.
 *
 * @package Drupal\ckeditor
 */
abstract class ResponsiveMenusPluginBase extends PluginBase implements ResponsiveMenusPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function jsSettings(array $js_defaults) {
    return [];
  }

}
