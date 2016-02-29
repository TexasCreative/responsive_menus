<?php

/**
 * @file
 * Contains \Drupal\responsive_menus\Plugin\ResponsiveMenus\MultiLevelPushMenu.
 */

namespace Drupal\responsive_menus\Plugin\ResponsiveMenus;

use Drupal\Core\Form\FormStateInterface;
use Drupal\responsive_menus\ResponsiveMenusPluginBase;
use Drupal\responsive_menus\ResponsiveMenusPluginInterface;

/**
 * Defines the "mlpm" plugin.
 *
 * @ResponsiveMenus(
 *   id = "mlpm",
 *   label = @Translation("Multi Level Push Menu"),
 * )
 */
class MultiLevelPushMenu extends ResponsiveMenusPluginBase implements ResponsiveMenusPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form['responsive_menus_mlpm_css_selectors'] = [
      '#type'        => 'textfield',
      '#title'       => t('CSS selectors for which menu to responsify'),
//    '#default_value' => variable_get('responsive_menus_mlpm_css_selectors', '#main-menu'),
      '#description' => t('Enter CSS/jQuery selector of menus to responsify.'),
    ];

    $form['responsive_menus_mlpm_media_size'] = [
      '#type'        => 'textfield',
      '#title'       => t('Screen width to respond to'),
      '#size'        => 5,
//    '#default_value' => variable_get('responsive_menus_mlpm_media_size', 768),
      '#description' => t('Width in pixels when we swap out responsive menu e.g. 768 (0 means the responsive menu will always show)'),
    ];

    $form['responsive_menus_mlpm_move_to'] = [
      '#type'        => 'textfield',
      '#title'       => t('CSS selector to move menu to'),
//    '#default_value' => variable_get('responsive_menus_mlpm_move_to', '#page-wrapper'),
      '#description' => t('Enter a CSS/JQuery selector of the container the nav menu will be moved to. This is useful when using a theme you don\'t want to alter.'),
    ];

    $form['responsive_menus_mlpm_nav_block'] = [
      '#type'        => 'select',
      '#title'       => t('Add nav block?'),
      '#options'     => [
        1 => t('Yes'),
        0 => t('No'),
      ],
//    '#default_value' => variable_get('responsive_menus_mlpm_nav_block', 1),
      '#description' => t('MLPM requires a nav block to be in place. This can be added using javascript if you don\'t want to alter your theme.'),
    ];

    $form['responsive_menus_mlpm_nav_block_name'] = [
      '#type'        => 'textfield',
      '#title'       => t('Id for nav block'),
//    '#default_value' => variable_get('responsive_menus_mlpm_nav_block_name', 'mlpm-menu'),
      '#description' => t('Enter the id of nav block.'),
    ];

    $form['responsive_menus_mlpm_push'] = [
      '#type'        => 'textarea',
      '#title'       => t('CSS selectors of containers to push'),
//    '#default_value' => variable_get('responsive_menus_mlpm_push', '#page'),
      '#description' => t('CSS/jQuery selectors of the elements that need to be pushed when expading the MLPM (one per line)'),
    ];

    $form['responsive_menus_mlpm_menu_height'] = [
      '#type'        => 'textfield',
      '#title'       => 'Menu height',
      '#description' => "Menu height (integer, '%', 'px', 'em').",
//    '#default_value' => variable_get('responsive_menus_mlpm_menu_height', '100%'),
    ];

    $form['responsive_menus_mlpm_direction'] = [
      '#type'        => 'select',
      '#title'       => t('Sliding direction'),
      '#options'     => [
        'ltr' => t('Left to right'),
        'rtl' => t('Right to left'),
      ],
      '#description' => '',
//    '#default_value' => variable_get('responsive_menus_mlpm_direction', 'ltr'),
    ];

    $form['responsive_menus_mlpm_mode'] = [
      '#type'        => 'select',
      '#title'       => t('Menu sliding mode'),
      '#options'     => [
        'overlap' => t('Overlap'),
        'cover'   => t('Cover'),
      ],
      '#description' => '',
//    '#default_value' => variable_get('responsive_menus_mlpm_mode', 'overlap'),
    ];

    $form['responsive_menus_mlpm_collapsed'] = [
      '#type'        => 'select',
      '#title'       => t('How to load the menu'),
      '#options'     => [
        1 => t('Collapsed'),
        0 => t('Expanded'),
      ],
      '#description' => 'Initialize menu in collapsed/expanded mode',
//    '#default_value' => variable_get('responsive_menus_mlpm_collapsed', 1),
    ];

    $form['responsive_menus_mlpm_full_collapse'] = [
      '#type'        => 'select',
      '#title'       => t('Full collapse'),
      '#options'     => [
        1 => t('Yes'),
        0 => t('No'),
      ],
      '#description' => 'Do you want to fully hide base level holder when collapsed?',
//    '#default_value' => variable_get('responsive_menus_mlpm_full_collapse', 0),
    ];

    $form['responsive_menus_mlpm_swipe'] = [
      '#type'        => 'select',
      '#title'       => t('Swipe mode'),
      '#options'     => [
        'both'        => t('Both'),
        'desktop'     => t('Desktop'),
        'touchscreen' => t('Touchscreen'),
      ],
      '#description' => '',
//    '#default_value' => variable_get('responsive_menus_mlpm_swipe', 'both'),
    ];

    $form['responsive_menus_mlpm_decoration'] = [
      '#type'        => 'fieldset',
      '#title'       => t('Menu decoration'),
      '#collapsible' => TRUE,
      '#collapsed'   => TRUE,
    ];

//  $style = variable_get('responsive_menus_mlpm_decoration', array());
    $form['responsive_menus_mlpm_decoration']['font_awesome'] = [
      '#type'          => 'checkbox',
      '#title'         => t('Include font awesome'),
      '#description'   => t('By default font awesome is used for the menu icons'),
      '#default_value' => 1,
    ];

    $form['responsive_menus_mlpm_decoration']['google_fonts'] = [
      '#type'          => 'checkbox',
      '#title'         => t('Include google fonts'),
      '#description'   => t('By default google fonts are used to style this menu.'),
      '#default_value' => 1,
    ];

    $form['responsive_menus_mlpm_decoration']['back_text'] = [
      '#type'          => 'textfield',
      '#title'         => t('Back text'),
      '#description'   => t('The text that will appear on the back links leading you to previous levels of the menu.'),
      '#default_value' => isset($style['back_text']) ? $style['back_text'] : 'Back',
    ];

    $form['responsive_menus_mlpm_decoration']['back_class'] = [
      '#type'          => 'textfield',
      '#title'         => t('Back item class'),
      '#description'   => t('The class of the back link that leads to the pervious levels of the menu.'),
      '#default_value' => isset($style['back_class']) ? $style['back_class'] : 'backItemClass',
    ];

    $form['responsive_menus_mlpm_decoration']['back_icon'] = [
      '#type'          => 'textfield',
      '#title'         => t('Back item icon'),
      '#description'   => t('The icon used for the back link that leads to previous levels of the menu (default requires font awesome).'),
      '#default_value' => isset($style['back_icon']) ? $style['back_icon'] : 'fa fa-angle-right',
    ];

    $form['responsive_menus_mlpm_decoration']['group_icon'] = [
      '#type'          => 'textfield',
      '#title'         => t('Group icon'),
      '#description'   => t('The icon used on menu links that lead into new layers of the menu (default requires font awesome).'),
      '#default_value' => isset($style['group_icon']) ? $style['group_icon'] : 'fa fa-angle-left',
    ];

    $form['responsive_menus_mlpm_toggle'] = [
      '#type'        => 'fieldset',
      '#title'       => t('Toggle control'),
      '#collapsible' => TRUE,
      '#collapsed'   => TRUE,
    ];

//  $toggle = variable_get('responsive_menus_mlpm_toggle', array());
    $form['responsive_menus_mlpm_toggle']['container'] = [
      '#type'          => 'textfield',
      '#title'         => t('Menu toggle control container'),
      '#description'   => t('The CSS/jQuery selector you would like an anchor tag that will toggle the menu open and closed (leave blank for no control).'),
      '#default_value' => isset($toggle['container']) ? $toggle['container'] : '',
    ];

    $form['responsive_menus_mlpm_toggle']['text'] = [
      '#type'          => 'textarea',
      '#title'         => t('Menu toggle control text'),
      '#description'   => t('The text/filtered html you would like inside the toggle control'),
      '#default_value' => isset($toggle['text']) ? $toggle['text'] : '',
    ];

    $form['responsive_menus_mlpm_toggle']['off_menu'] = [
      '#type'          => 'textfield',
      '#title'         => t('Container to detect off menu clicks'),
      '#description'   => t('The CSS/jQuery selector that will close the menu when clicked. This is useful for when you want to be able to close the menu by clicking off of the menu.'),
      '#default_value' => isset($toggle['off_menu']) ? $toggle['off_menu'] : '',
    ];

    return $form;
  }

}

//'mlpm'                     => [
//  'name'           => t('Multi Level Push Menu'),
//  'form'           => 'responsive_menus_mlpm_style_settings',
//  'js_settings'    => 'responsive_menus_mlpm_style_js_settings',
//  'css_files'      => _responsive_menus_mlpm_get_css(),
//  'js_files'       => [
//    '//oss.maxcdn.com/libs/modernizr/2.6.2/modernizr.min.js',
//    $path . '/mlpm/js/jquery.multilevelpushmenu.min.js',
//    $path . '/mlpm/js/mlpm.js',
//  ],
//  'jquery_version' => 1.10,
//  'file'           => $path . '/mlpm/mlpm.inc',
//  'selector'       => t('Parent of the @ul.  Example: Given <code>@code</code> you would use !use', [
//    '@ul'   => '<ul>',
//    '@code' => '<div id="parent-div"> <ul class="menu"> </ul> </div>',
//    '!use'  => '<strong>#parent-div</strong>',
//  ]),
//],

///**
// * JS callback from hook_responsive_menus_style_info().
// */
//function responsive_menus_mlpm_style_js_settings($js_defaults = array()) {
//  $toggle = variable_get('responsive_menus_mlpm_toggle', array());
//  $style = variable_get('responsive_menus_mlpm_decoration', array());
//  $js_settings = array(
//    'selectors' => responsive_menus_var_get('responsive_menus_mlpm_css_selectors', '#main-menu', $js_defaults),
//    'media_size' => responsive_menus_var_get('responsive_menus_mlpm_media_size', 768, $js_defaults),
//    'move_to' => responsive_menus_var_get('responsive_menus_mlpm_move_to', '#page-wrapper', $js_defaults),
//    'nav_block' => variable_get('responsive_menus_mlpm_nav_block', 1, $js_defaults),
//    'nav_block_name' => variable_get('responsive_menus_mlpm_nav_block_name', 'mlpm-menu', $js_defaults),
//    'push' => explode("\n", variable_get('responsive_menus_mlpm_push', '#page', $js_defaults)),
//    'menu_height' => variable_get('responsive_menus_mlpm_menu_height', '100%', $js_defaults),
//    'direction' => variable_get('responsive_menus_mlpm_direction', 'ltr', $js_defaults),
//    'mode' => variable_get('responsive_menus_mlpm_mode', 'overlap', $js_defaults),
//    'collapsed' => variable_get('responsive_menus_mlpm_collapsed', 1, $js_defaults),
//    'full_collapse' => variable_get('responsive_menus_mlpm_full_collapse', 0, $js_defaults),
//    'swipe' => variable_get('responsive_menus_mlpm_swipe', 'both', $js_defaults),
//    'toggle_container' => isset($toggle['container']) ? $toggle['container'] : '',
//    'toggle_text' => isset($toggle['text']) ? check_markup($toggle['text'], 'filtered_html') : '',
//    'off_menu' => isset($toggle['off_menu']) ? $toggle['off_menu'] : '',
//    'back_text' => isset($style['back_text']) ? $style['back_text'] : 'Back',
//    'back_class' => isset($style['back_class']) ? $style['back_class'] : 'backItemClass',
//    'back_icon' => isset($style['back_icon']) ? $style['back_icon'] : 'fa fa-angle-right',
//    'group_icon' => isset($style['group_icon']) ? $style['group_icon'] : 'fa fa-angle-left',
//  );
//
//  return $js_settings;
//}
//

/**
 * Get the css to include for the multi-level-push menu based on the
 * configuration.
 */
//function _responsive_menus_mlpm_get_css() {
//  $path = drupal_get_path('module', 'responsive_menus') . '/styles';
////  $style = variable_get('responsive_menus_mlpm_decoration', [
////    'font_awesome' => 1,
////    'google_fonts' => 1,
////  ]);
//  $mlpm_css = [];
//  if (!isset($style['google_fonts']) || $style['google_fonts']) {
//    $mlpm_css[] = '//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic';
//  }
//  if (!isset($style['font_awesome']) || $style['font_awesome']) {
//    $mlpm_css[] = '//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.min.css?the-file-wont-load-without-a-parameter';
//  }
//  $mlpm_css[] = $path . '/mlpm/css/jquery.multilevelpushmenu.css';
//  return $mlpm_css;
//}
