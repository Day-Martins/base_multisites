<?php

namespace Drupal\bagov_base_blocks;

use Drupal\Component\Utility\Html;
use Drupal\views\ViewExecutable;

/**
 * The primary class for the Ba.Gov Base Blocks module.
 *
 * Provides many helper methods.
 *
 * @ingroup utility
 */
class BagovHelpers {
  /**
   * Returns the theme hook definition information.
   */
  public static function getThemeHooks() {
    $hooks = [
      'contrast_block' => [
          'render element' => 'content',
          'file' => 'bagov_base_blocks.theme.inc',
      ],
      'acesso_informacao_block' => [
          'render element' => 'content',
          'file' => 'bagov_base_blocks.theme.inc',
      ],
      'logo_estado_block' => [
          'render element' => 'content',
          'variables' => [
              'img' => '/sites/default/files/images/logo-governo-rodape.png',
          ],
          'file' => 'bagov_base_blocks.theme.inc',
      ],
      'select_secretaria_block' => [
          'render element' => 'content',
          'variables' => [
              'options' => self::getSecretarias(),
          ],
          'file' => 'bagov_base_blocks.theme.inc',
      ],
      'creative_commons_block' => [
          'render element' => 'content',
          'variables' => [
              'img' => '/sites/default/files/images/creative-commons-nd.png',
          ],
          'file' => 'bagov_base_blocks.theme.inc',
      ],
      'views_noticias' => [
          'preprocess functions' => [
            'template_preprocess_views_noticias'
          ],
          'file' => 'bagov_base_blocks.theme.inc',
      ],
      'views_noticias_home' => [
          'preprocess functions' => [
            'template_preprocess_views_noticias_home'
          ],
          'file' => 'bagov_base_blocks.theme.inc',
      ],
      'views_noticias_relacionadas' => [
        'preprocess functions' => [
          'template_preprocess_views_noticias_relacionadas'
        ],
        'file' => 'bagov_base_blocks.theme.inc',
      ],
      'views_view__teste__block_1' => [
          'base hook' => 'view',
          'template' => 'template-teste',
      ],
      'views_view_fields__carrousel_de_eventos' => [
        'base hook' => 'views_view_fields',
        'template' => 'card-carrousel-eventos',
      ],
      'views_view_unformatted__carrousel_de_eventos' => [
          'base hook' => 'view',
          'template' => 'carrousel-eventos',
      ],
      'views_view__youtube_banner__block_1' => [
        'base hook' => 'view',
        'template' => 'template-youtube-banner',
      ]
  ];

    return $hooks;
  }

  /**
   * Get unique element id.
   *
   * @param \Drupal\views\ViewExecutable $view
   *   A ViewExecutable object.
   *
   * @return string
   *   A unique id for an HTML element.
   */
  public static function getUniqueId(ViewExecutable $view) {
    $id = $view->storage->id() . '-' . $view->current_display;
    return Html::getUniqueId('views-' . $id);
  }

  public static function getSecretarias(){
    $modulePath = \Drupal::service('extension.list.module')->getPath('bagov_base_blocks');
    return json_decode(file_get_contents($modulePath . '/assets/constants/secretarias.json'));
  }

}
