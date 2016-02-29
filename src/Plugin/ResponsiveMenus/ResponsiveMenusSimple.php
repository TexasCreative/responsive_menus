<?php

/**
 * @file
 * Contains \Drupal\responsive_menus\Plugin\ResponsiveMenus\ResponsiveMenusSimple.
 */

namespace Drupal\responsive_menus\Plugin\ResponsiveMenus;

use Drupal\Core\Form\FormStateInterface;
use Drupal\responsive_menus\ResponsiveMenusPluginBase;
use Drupal\responsive_menus\ResponsiveMenusPluginInterface;

/**
 * Defines the "responsive_menus_simple" plugin.
 *
 * @ResponsiveMenus(
 *   id = "responsive_menus_simple",
 *   label = @Translation("Simple expanding"),
 * )
 */
class ResponsiveMenusSimple extends ResponsiveMenusPluginBase implements ResponsiveMenusPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form['responsive_menus_simple_absolute'] = [
      '#type'        => 'checkboxes',
      '#options'     => [1 => t('Use absolute positioning?')],
//    '#default_value' => variable_get('responsive_menus_simple_absolute', [1 => 1]),
      '#description' => t('Using absolute, the menu will open over the page rather than pushing it down.'),
    ];

    $form['responsive_menus_disable_mouse_events'] = [
      '#type'        => 'checkboxes',
      '#options'     => [1 => t('Disable other mouse events?')],
//    '#default_value' => variable_get('responsive_menus_disable_mouse_events', [1 => 0]),
      '#description' => t('Disable things like drop-down menus on hover.'),
    ];

    $form['responsive_menus_remove_attributes'] = [
      '#type'        => 'checkboxes',
      '#options'     => [1 => t('Remove other classes & IDs when responded?')],
//    '#default_value' => variable_get('responsive_menus_remove_attributes', [1 => 1]),
      '#description' => t('Helps to ensure styling of menu.'),
    ];

    $form['responsive_menus_css_selectors'] = [
      '#type'        => 'textarea',
      '#title'       => t('Selectors for which menus to responsify'),
//    '#default_value' => variable_get('responsive_menus_css_selectors', '#main-menu'),
      '#description' => t('Enter CSS/jQuery selectors of menus to responsify.  Comma separated or 1 per line'),
    ];

    $form['responsive_menus_simple_text'] = [
      '#type'  => 'textarea',
      '#title' => t('Text or HTML for the menu toggle button'),
//    '#default_value' => variable_get('responsive_menus_simple_text', '☰ Menu'),
    ];

    $form['responsive_menus_media_size'] = [
      '#type'        => 'textfield',
      '#title'       => t('Screen width to respond to'),
      '#size'        => 5,
//    '#default_value' => variable_get('responsive_menus_media_size', 768),
      '#description' => t('Width when we swap out responsive menu e.g. 768'),
    ];

    $form['responsive_menus_media_unit'] = [
      '#type'        => 'select',
      '#title'       => t('Width unit'),
//    '#default_value' => variable_get('responsive_menus_media_unit', 'px'),
      '#options'     => ['px' => 'px', 'em' => 'em'],
      '#description' => t('Unit for the width above'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function jsSettings(array $js_defaults) {
    $js_settings = [
//      'toggler_text' => responsive_menus_var_get('responsive_menus_simple_text', '☰ Menu', $js_defaults),
//      'selectors'    => responsive_menus_explode_list('responsive_menus_css_selectors', '#main-menu', $js_defaults),
//      'media_size'   => responsive_menus_var_get('responsive_menus_media_size', 768, $js_defaults),
//      'media_unit'   => responsive_menus_var_get('responsive_menus_media_unit', 'px', $js_defaults),
    ];

//    $absolute = responsive_menus_var_get('responsive_menus_simple_absolute', [1 => 1], $js_defaults);
//    $disable_mouse = responsive_menus_var_get('responsive_menus_disable_mouse_events', [1 => 0], $js_defaults);
//    $remove_attributes = responsive_menus_var_get('responsive_menus_remove_attributes', [1 => 1], $js_defaults);
//    if ($absolute[1]) {
//      $js_settings['absolute'] = TRUE;
//    }
//    if ($disable_mouse[1]) {
//      $js_settings['disable_mouse_events'] = TRUE;
//    }
//    if ($remove_attributes[1]) {
//      $js_settings['remove_attributes'] = TRUE;
//    }

    return $js_settings;
  }

}

//'responsive_menus_simple'  => [
//  'form'        => 'responsive_menus_simple_style_settings',
//  'js_files'    => [$path . '/responsive_menus_simple/js/responsive_menus_simple.js'],
//  'css_files'   => [$path . '/responsive_menus_simple/css/responsive_menus_simple.css'],
//  'js_settings' => 'responsive_menus_simple_style_js_settings',
//  'file'        => $path . '/responsive_menus_simple/responsive_menus_simple.inc',
//  'selector'    => t('Anything.  Example: Given <code>@code</code> you could use !use', [
//    '@ul'   => '<ul>',
//    '@code' => '<div id="parent-div"> <ul class="menu"> </ul> </div>',
//    '!use'  => '<strong>#parent-div or .menu</strong>',
//  ]),
//],