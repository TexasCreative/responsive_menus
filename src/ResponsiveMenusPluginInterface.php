<?php

/**
 * @file
 * Contains \Drupal\responsive_menus\ResponsiveMenusPluginInterface.
 */

namespace Drupal\responsive_menus;

use Drupal\Core\Form\FormStateInterface;

/**
 * Interface ResponsiveMenusInterface.
 *
 * @package Drupal\responsive_menus
 */
interface ResponsiveMenusPluginInterface {

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the initial structure of the plugin form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the complete form.
   *
   * @return array
   *   The form structure.
   */
  public function form(array $form, FormStateInterface $form_state);

  /**
   * @param array $js_defaults
   *
   * @return array
   */
  public function jsSettings(array $js_defaults);

}
