<?php

/**
 * @file
 * Contains \Drupal\responsive_menus\Plugin\ResponsiveMenus\MeanMenu.
 */

namespace Drupal\responsive_menus\Plugin\ResponsiveMenus;

use Drupal\Core\Form\FormStateInterface;
use Drupal\responsive_menus\ResponsiveMenusPluginBase;
use Drupal\responsive_menus\ResponsiveMenusPluginInterface;

/**
 * Defines the "mean_menu" plugin.
 *
 * @ResponsiveMenus(
 *   id = "mean_menu",
 *   label = @Translation("Mean Menu"),
 * )
 */
class MeanMenu extends ResponsiveMenusPluginBase implements ResponsiveMenusPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form['responsive_menus_mean_menu_css_selectors'] = [
      '#type'        => 'textfield',
      '#title'       => t('CSS selectors for which menu to responsify'),
//    '#default_value' => variable_get('responsive_menus_mean_menu_css_selectors', '#main-menu'),
      '#description' => t('Enter CSS/jQuery selector of menus to responsify.'),
    ];

    $form['responsive_menus_mean_menu_container'] = [
      '#type'        => 'textfield',
      '#title'       => t('CSS selector for where to attach the menu on the page'),
//    '#default_value' => variable_get('responsive_menus_mean_menu_container', 'body'),
      '#description' => t('Enter CSS/jQuery selector of where MeanMenu gets attached.'),
    ];

    $form['responsive_menus_mean_menu_trigger_txt'] = [
      '#type'        => 'textarea',
      '#title'       => t('Text or HTML for trigger button'),
//    '#default_value' => variable_get('responsive_menus_mean_menu_trigger_txt', '<span /><span /><span />'),
      '#description' => t('Default of 3 spans will show the triple bars (!bars).', ['!bars' => '☰']),
    ];

    $form['responsive_menus_mean_menu_close_txt'] = [
      '#type'  => 'textarea',
      '#title' => t('Text or HTML for close button'),
//    '#default_value' => variable_get('responsive_menus_mean_menu_close_txt', 'X'),
    ];

    $form['responsive_menus_mean_menu_close_size'] = [
      '#type'        => 'textfield',
      '#title'       => t('Size of close button'),
      '#size'        => 5,
//    '#default_value' => variable_get('responsive_menus_mean_menu_close_size', '18px'),
      '#description' => t('Size in px, em, %'),
    ];

    $form['responsive_menus_mean_menu_position'] = [
      '#type'    => 'select',
      '#title'   => t('Position of the open/close buttons'),
      '#options' => [
        'right'  => t('right'),
        'left'   => t('left'),
        'center' => t('center'),
      ],
//    '#default_value' => variable_get('responsive_menus_mean_menu_position', 'right'),
    ];

    $form['responsive_menus_mean_menu_media_size'] = [
      '#type'        => 'textfield',
      '#title'       => t('Screen width to respond to'),
      '#size'        => 5,
//    '#default_value' => variable_get('responsive_menus_mean_menu_media_size', 480),
      '#description' => t('Width in pixels when we swap out responsive menu e.g. 768'),
    ];

    $form['responsive_menus_mean_menu_show_children'] = [
      '#type'    => 'select',
      '#title'   => t('Allow multi-level menus'),
      '#options' => [
        1 => t('Yes'),
        0 => t('No'),
      ],
//    '#default_value' => variable_get('responsive_menus_mean_menu_show_children', 1),
    ];

    $form['responsive_menus_mean_menu_expand_children'] = [
      '#type'    => 'select',
      '#title'   => t('Ability to expand & collapse children'),
      '#options' => [
        1 => t('Yes'),
        0 => t('No'),
      ],
//    '#default_value' => variable_get('responsive_menus_mean_menu_expand_children', 1),
    ];

    $form['responsive_menus_mean_menu_expand_txt'] = [
      '#type'  => 'textfield',
      '#title' => t('Text for the expand children button'),
      '#size'  => 5,
//    '#default_value' => variable_get('responsive_menus_mean_menu_expand_txt', '+'),
    ];

    $form['responsive_menus_mean_menu_contract_txt'] = [
      '#type'  => 'textfield',
      '#title' => t('Text for the collapse children button'),
      '#size'  => 5,
//    '#default_value' => variable_get('responsive_menus_mean_menu_contract_txt', '-'),
    ];

    $form['responsive_menus_mean_menu_remove_attrs'] = [
      '#type'        => 'select',
      '#title'       => t('Temporarily remove other classes & IDs (Recommended)'),
      '#options'     => [
        1 => t('Yes'),
        0 => t('No'),
      ],
//    '#default_value' => variable_get('responsive_menus_mean_menu_remove_attrs', 1),
      '#description' => t('This will help ensure the style of Mean Menus.'),
    ];

    return $form;
  }

}

//'mean_menu'                => [
//  'name'           => t('Mean Menu'),
//  'form'           => 'responsive_menus_mean_menu_style_settings',
//  'js_files'       => [
//    $path . '/meanMenu/jquery.meanmenu.min.js',
//    $path . '/meanMenu/responsive_menus_mean_menu.js',
//  ],
//  'css_files'      => [$path . '/meanMenu/meanmenu.min.css'],
//  'js_settings'    => 'responsive_menus_mean_menu_style_js_settings',
//  'jquery_version' => 1.7,
//  'file'           => $path . '/meanMenu/meanMenu.inc',
//  'selector'       => t('Parent of the @ul.  Example: Given <code>@code</code> you would use !use', [
//    '@ul'   => '<ul>',
//    '@code' => '<div id="parent-div"> <ul class="menu"> </ul> </div>',
//    '!use'  => '<strong>#parent-div</strong>',
//  ]),
//],

///**
// * JS callback from hook_responsive_menus_style_info().
// */
//function responsive_menus_mean_menu_style_js_settings($js_defaults = array()) {
//  $js_settings = array(
//    'selectors' => responsive_menus_var_get('responsive_menus_mean_menu_css_selectors', '#main-menu', $js_defaults),
//    'container' => responsive_menus_var_get('responsive_menus_mean_menu_container', 'body', $js_defaults),
//    'trigger_txt' => responsive_menus_var_get('responsive_menus_mean_menu_trigger_txt', '<span /><span /><span />', $js_defaults),
//    'close_txt' => responsive_menus_var_get('responsive_menus_mean_menu_close_txt', 'X', $js_defaults),
//    'close_size' => responsive_menus_var_get('responsive_menus_mean_menu_close_size', '18px', $js_defaults),
//    'position' => responsive_menus_var_get('responsive_menus_mean_menu_position', 'right', $js_defaults),
//    'media_size' => responsive_menus_var_get('responsive_menus_mean_menu_media_size', 480, $js_defaults),
//    'show_children' => responsive_menus_var_get('responsive_menus_mean_menu_show_children', 1, $js_defaults),
//    'expand_children' => responsive_menus_var_get('responsive_menus_mean_menu_expand_children', 1, $js_defaults),
//    'expand_txt' => responsive_menus_var_get('responsive_menus_mean_menu_expand_txt', '+', $js_defaults),
//    'contract_txt' => responsive_menus_var_get('responsive_menus_mean_menu_contract_txt', '-', $js_defaults),
//    'remove_attrs' => responsive_menus_var_get('responsive_menus_mean_menu_remove_attrs', 1, $js_defaults),
//  );
//
//  return $js_settings;
//}
//