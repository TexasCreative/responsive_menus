<?php

/**
 * @file
 * Contains \Drupal\responsive_menus\Plugin\ResponsiveMenus\CodropsResponsiveMulti.
 */

namespace Drupal\responsive_menus\Plugin\ResponsiveMenus;

use Drupal\Core\Form\FormStateInterface;
use Drupal\responsive_menus\ResponsiveMenusPluginBase;
use Drupal\responsive_menus\ResponsiveMenusPluginInterface;

/**
 * Defines the "codrops_responsive_multi" plugin.
 *
 * @ResponsiveMenus(
 *   id = "codrops_responsive_multi",
 *   label = @Translation("ResponsiveMultiLevelMenu (codrops)"),
 * )
 */
class CodropsResponsiveMulti extends ResponsiveMenusPluginBase implements ResponsiveMenusPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form['responsive_menus_codrops_responsive_multi_css_selectors'] = [
      '#type'        => 'textfield',
      '#title'       => t('CSS selectors for which menu to responsify'),
//    '#default_value' => variable_get('responsive_menus_codrops_responsive_multi_css_selectors', '#main-menu'),
      '#description' => t('Enter CSS/jQuery selector of menus to responsify.'),
    ];

    $form['responsive_menus_codrops_responsive_multi_media_size'] = [
      '#type'        => 'textfield',
      '#title'       => t('Screen width to respond to'),
      '#size'        => 5,
//    '#default_value' => variable_get('responsive_menus_codrops_responsive_multi_media_size', 768),
      '#description' => t('Width in pixels when we swap out responsive menu e.g. 768'),
    ];

    $form['responsive_menus_codrops_responsive_multi_ani_in'] = [
      '#type'    => 'select',
      '#title'   => t('In-animation'),
      '#options' => [
        'dl-animate-in-1' => t('One'),
        'dl-animate-in-2' => t('Two'),
        'dl-animate-in-3' => t('Three'),
        'dl-animate-in-4' => t('Four'),
        'dl-animate-in-5' => t('Five'),
      ],
//    '#default_value' => variable_get('responsive_menus_codrops_responsive_multi_ani_in', 'dl-animate-in-1'),
    ];

    $form['responsive_menus_codrops_responsive_multi_ani_out'] = [
      '#type'    => 'select',
      '#title'   => t('Out-animation'),
      '#options' => [
        'dl-animate-out-1' => t('One'),
        'dl-animate-out-2' => t('Two'),
        'dl-animate-out-3' => t('Three'),
        'dl-animate-out-4' => t('Four'),
        'dl-animate-out-5' => t('Five'),
      ],
//    '#default_value' => variable_get('responsive_menus_codrops_responsive_multi_ani_out', 'dl-animate-out-1'),
    ];

    return $form;
  }

}

//'codrops_responsive_multi' => [
//  'name'           => t('ResponsiveMultiLevelMenu (codrops)'),
//  'form'           => 'responsive_menus_codrops_responsive_multi_style_settings',
//  'js_settings'    => 'responsive_menus_codrops_responsive_multi_style_js_settings',
//  'use_libraries'  => TRUE,
//  'library'        => 'ResponsiveMultiLevelMenu',
//  'jquery_version' => 1.7,
//  'file'           => $path . '/ResponsiveMultiLevelMenu/ResponsiveMultiLevelMenu.inc',
//  'selector'       => t('Parent of the @ul.  Example: Given <code>@code</code> you would use !use', [
//    '@ul'   => '<ul>',
//    '@code' => '<div id="parent-div"> <ul class="menu"> </ul> </div>',
//    '!use'  => '<strong>#parent-div</strong>',
//  ]),
//],

///**
// * JS callback from hook_responsive_menus_style_info().
// */
//function responsive_menus_codrops_responsive_multi_style_js_settings($js_defaults = array()) {
//  $js_settings = array(
//    'selectors' => responsive_menus_var_get('responsive_menus_codrops_responsive_multi_css_selectors', '#main-menu', $js_defaults),
//    'media_size' => responsive_menus_var_get('responsive_menus_codrops_responsive_multi_media_size', 768, $js_defaults),
//    'animation_in' => responsive_menus_var_get('responsive_menus_codrops_responsive_multi_ani_in', 'dl-animate-in-1', $js_defaults),
//    'animation_out' => responsive_menus_var_get('responsive_menus_codrops_responsive_multi_ani_out', 'dl-animate-out-1', $js_defaults),
//  );
//
//  return $js_settings;
//}
//