<?php

namespace Drupal\bagov_base_blocks\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Style plugin to render each item as a row in a Notícias Relacionadas.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_noticias_relacionadas",
 *   title = @Translation("Notícias Relacionadas"),
 *   help = @Translation("Displays rows in Notícias."),
 *   theme = "views_noticias_relacionadas",
 *   theme_file = "../bagov_base_blocks.theme.inc",
 *   display_types = {"normal"}
 * )
 */
class ViewsNoticiasRelacionadas extends StylePluginBase {
  /**
   * Does the style plugin for itself support to add fields to it's output.
   *
   * @var bool
   */
  protected $usesFields = TRUE;

  /**
   * Definition.
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    // General settings.
    $options['use_caption'] = ['default' => TRUE];

    // Fields to use in.
    $options['image'] = ['default' => ''];
    $options['title'] = ['default' => ''];
    $options['description'] = ['default' => ''];

    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $fields = ['' => $this->t('<None>')];
    $fields += $this->displayHandler->getFieldLabels(TRUE);

    $form['use_caption'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Add captions to your slides for add title and description over the image.'),
      '#description' => $this->t('<a href=":docs">See Bootstrap documentation</a>', [':docs' => 'https://getbootstrap.com/docs/4.0/components/carousel/#with-captions']),
      '#default_value' => $this->options['use_caption'],
    ];

    $form['image'] = [
      '#type' => 'select',
      '#title' => $this->t('Image'),
      '#options' => $fields,
      '#default_value' => $this->options['image'],
    ];

    $form['title'] = [
      '#type' => 'select',
      '#title' => $this->t('Title'),
      '#options' => $fields,
      '#default_value' => $this->options['title'],
    ];

    $form['description'] = [
      '#type' => 'select',
      '#title' => $this->t('Description'),
      '#options' => $fields,
      '#default_value' => $this->options['description'],
    ];
  }

}
