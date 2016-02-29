<?php

/**
 * @file
 * Contains \Drupal\responsive_menus\Plugin\ResponsiveMenus\CodropsGoogleNexus.
 */

namespace Drupal\responsive_menus\Plugin\ResponsiveMenus;

use Drupal\Core\Form\FormStateInterface;
use Drupal\responsive_menus\ResponsiveMenusPluginBase;
use Drupal\responsive_menus\ResponsiveMenusPluginInterface;

/**
 * Defines the "google_nexus" plugin.
 *
 * @ResponsiveMenus(
 *   id = "google_nexus",
 *   label = @Translation("Google Nexus (codrops)"),
 * )
 */
class CodropsGoogleNexus extends ResponsiveMenusPluginBase implements ResponsiveMenusPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form['responsive_menus_google_nexus_css_selectors'] = [
      '#type'        => 'textfield',
      '#title'       => t('CSS selectors for which menu to responsify'),
//      '#default_value' => variable_get('responsive_menus_google_nexus_css_selectors', '#main-menu'),
      '#description' => t('Enter CSS/jQuery selector of menus to responsify.'),
    ];

    $form['responsive_menus_google_nexus_use_ecoicons'] = [
      '#type'        => 'select',
      '#title'       => t('Use ecofonts font-family'),
      '#options'     => [
        1 => t('Yes'),
        0 => t('No'),
      ],
//      '#default_value' => variable_get('responsive_menus_google_nexus_use_ecoicons', 1),
      '#description' => t('Uses the ecofonts font-family included with GoogleNexusWebsiteMenu library for icons.'),
    ];

    $form['responsive_menus_google_nexus_icons'] = [
      '#type'        => 'textarea',
      '#title'       => t('Icons for menu items'),
//      '#default_value' => variable_get('responsive_menus_google_nexus_icons', "\ue005\n\ue006"),
//      '#description' => t('Enter 1 per-line or comma-separated.  See !documentation for examples.', ['!documentation' => l(t('Unicode Character Table'), 'http://unicode-table.com/en/')]),
    ];

    $form['responsive_menus_google_nexus_icon_fallback'] = [
      '#type'        => 'textfield',
      '#title'       => t('Fallback icon for extra menu items'),
//      '#default_value' => variable_get('responsive_menus_google_nexus_icon_fallback', '&#57347;'),
//      '#description' => t('This icon will be used for any number of menu items beyond the amount of icons you specified above.  See !documentation for examples.', ['!documentation' => l(t('Unicode Character Table'), 'http://unicode-table.com/en/')]),
    ];

    return $form;
  }

}

//'google_nexus'             => [
//  'name'          => t('Google Nexus (codrops)'),
//  'form'          => 'responsive_menus_google_nexus_style_settings',
//  'js_settings'   => 'responsive_menus_google_nexus_style_js_settings',
//  'use_libraries' => TRUE,
//  'library'       => 'GoogleNexusWebsiteMenu',
//  'file'          => $path . '/google_nexus/google_nexus.inc',
//  'selector'      => t('The @ul.  Example: Given <code>@code</code> you would use !use', [
//    '@ul'   => '<ul>',
//    '@code' => '<div id="parent-div"> <ul class="menu"> </ul> </div>',
//    '!use'  => '<strong>.menu</strong>',
//  ]),
//],

///**
// * JS callback from hook_responsive_menus_style_info().
// */
//function responsive_menus_google_nexus_style_js_settings($js_defaults = array()) {
//  $js_settings = array(
//    'selectors' => responsive_menus_var_get('responsive_menus_google_nexus_css_selectors', '#main-menu', $js_defaults),
//    'use_ecoicons' => responsive_menus_var_get('responsive_menus_google_nexus_use_ecoicons', 1, $js_defaults),
//    'icons' => responsive_menus_explode_list('responsive_menus_google_nexus_icons', "\ue005\n\ue006", $js_defaults),
//    'icon_fallback' => responsive_menus_var_get('responsive_menus_google_nexus_icon_fallback', '&#57347;', $js_defaults),
//  );
//
//  return $js_settings;
//}
//