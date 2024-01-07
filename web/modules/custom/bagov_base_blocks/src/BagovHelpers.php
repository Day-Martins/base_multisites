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
              'img' => '/modules/custom/bagov_base_blocks/assets/images/logo-governo-rodape.png',
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
              'img' => '/modules/custom/bagov_base_blocks/assets/images/creative-commons-nd.png',
          ],
          'file' => 'bagov_base_blocks.theme.inc',
      ],
      'node__noticia' => [
          'preprocess functions' => [
            'template_preprocess_node__noticia'
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
      'views_view_fields__eventos' => [
        'base hook' => 'views_view_fields',
        'template' => 'card-carrousel-eventos',
      ],
      'views_view_unformatted__eventos' => [
          'base hook' => 'view',
          'template' => 'carrousel-eventos',
      ],
      'node__publicacao' => [
          'preprocess functions' => [
            'template_preprocess_node__publicacao'
          ],
          'file' => 'bagov_base_blocks.theme.inc',
      ],
      'node__edital' => [
          'preprocess functions' => [
            'template_preprocess_node__publicacao'
          ],
          'file' => 'bagov_base_blocks.theme.inc',
          'base hook' => 'node',
          'template' => 'node--publicacao',
      ],
      'node__licitacao' => [
          'preprocess functions' => [
            'template_preprocess_node__publicacao'
          ],
          'file' => 'bagov_base_blocks.theme.inc',
          'base hook' => 'node',
          'template' => 'node--publicacao',
      ],
      'node__legislacao' => [
          'preprocess functions' => [
            'template_preprocess_node__publicacao'
          ],
          'file' => 'bagov_base_blocks.theme.inc',
          'base hook' => 'node',
          'template' => 'node--publicacao',
      ],
      'views_view_unformatted__links_rapidos' => [
          'base hook' => 'view',
          'template' => 'carrousel-links-rapidos',
      ],
      'views_view_fields__links_rapidos' => [
        'base hook' => 'views_view_fields',
        'template' => 'card-links-rapidos',
      ],
      'views_view_unformatted__youtube_banner__block_1' => [
        'base hook' => 'view',
        'template' => 'template-youtube-banner',
      ],
      'views_view_unformatted__videos_do_youtube__player_home' => [
        'base hook' => 'view',
        'preprocess functions' => [
          'template_preprocess__videos_do_youtube__player_home'
        ],
        'file' => 'bagov_base_blocks.theme.inc',
        'template' => 'youtube-player',
      ],
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
