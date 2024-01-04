<?php

namespace Drupal\bagov_base_blocks\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Style plugin to render each item as a row in a Notícia Principal.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_banner_carrossel",
 *   title = @Translation("Banner Carrossel Ba.Gov"),
 *   help = @Translation("Displays rows in Banner."),
 *   theme = "views_banner_carrossel",
 *   theme_file = "../bagov_base_blocks.theme.inc",
 *   display_types = {"normal"}
 * )
 */
class ViewsBannerCarrossel extends StylePluginBase {
  /**
   * {@inheritdoc}
   */
  protected $usesRowPlugin = TRUE;

  /**
   * Definition.
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    // General settings.
    $options['use_caption'] = ['default' => TRUE];

    // Fields to use in.
    $options['type_banner'] = ['default' => 'imagem'];
    $options['image'] = ['default' => ''];
    $options['image_mobile'] = ['default' => ''];
    $options['image_icone'] = ['default' => ''];
    $options['title'] = ['default' => ''];
    $options['link'] = ['default' => ''];
    $options['target'] = ['default' => ''];
    $options['fade'] = ['default' => '1'];
    $options['autoplay'] = ['default' => '1'];
    $options['autoplay_speed'] = ['default' => '4000'];
    $options['append_arrows'] = ['default' => '0'];
    $options['dots'] = ['default' => '1'];
    $options['slides_show'] = ['default' => '1'];
    $options['slides_scroll'] = ['default' => '1'];
    $options['rows'] = ['default' => '1'];

    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $options = ['imagem' => 'Imagem', 'icone' => 'Icone'];

    $fields = ['' => $this->t('<None>')];
    $fields += $this->displayHandler->getFieldLabels(TRUE);

    $form['use_caption'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Add captions to your slides for add title and description over the image.'),
      '#description' => $this->t('<a href=":docs">See Bootstrap documentation</a>', [':docs' => 'https://getbootstrap.com/docs/4.0/components/carousel/#with-captions']),
      '#default_value' => $this->options['use_caption'],
    ];

    $form['type_banner'] = [
      '#type' => 'select',
      '#title' => $this->t('Tipo do banner'),
      '#description' => $this->t('Selecione tipo do banner. Está opçao indicarà se o banner serà exibido usando as <b>imagens</b> ou os <b>Ìcones</b> do conteúdo cadastrado.'),
      '#options' => $options,
      '#required' => TRUE,
      '#default_value' => $this->options['type_banner'],
    ];

    $form['image'] = [
      '#type' => 'select',
      '#title' => $this->t('Image'),
      '#description' => $this->t('Selecione campo da imagem do banner'),
      '#options' => $fields,
      '#default_value' => $this->options['image'],
    ];

    $form['image_mobile'] = [
      '#type' => 'select',
      '#title' => $this->t('Image Mobile'),
      '#description' => $this->t('Selecione campo da imagem do banner do tipo mobile'),
      '#options' => $fields,
      '#default_value' => $this->options['image_mobile'],
    ];

    $form['image_icone'] = [
      '#type' => 'select',
      '#title' => $this->t('Image Ìcone'),
      '#description' => $this->t('Selecione campo da imagem do ìcone. <i style="color: red"><b>Atenção!</b> Este campo deve ser do tipo "Font Awesome Icon" para que visualize corretamente o banner.</i>'),
      '#options' => $fields,
      '#default_value' => $this->options['image_icone'],
    ];

    $form['title'] = [
      '#type' => 'select',
      '#title' => $this->t('Title'),
      '#description' => $this->t('Selecione campo do título do banner'),
      '#options' => $fields,
      '#default_value' => $this->options['title'],
    ];

    $form['link'] = [
      '#type' => 'select',
      '#title' => $this->t('Link'),
      '#description' => $this->t('Selecione campo do link de destino do banner'),
      '#options' => $fields,
      '#default_value' => $this->options['link'],
    ];
    
    $form['target'] = [
      '#type' => 'select',
      '#title' => $this->t('Target'),
      '#description' => $this->t('Selecione campo alvo do  link do banner'),
      '#options' => $fields,
      '#default_value' => $this->options['target'],
    ];

    $form['slides_show'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nº de slides a serem exibidos'),
      '#default_value' => $this->options['slides_show'],
    ];

    $form['slides_scroll'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nº de slides para rolar'),
      '#default_value' => $this->options['slides_scroll'],
    ];

    $form['rows'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nº de linhas em que serão visualizadosaos slides'),
      '#default_value' => $this->options['rows'],
    ];

    $form['fade'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Permitr desaparecer gradualmente a imagem.'),
      '#default_value' => $this->options['fade'],
    ];

    $form['autoplay'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Permitr a reprodução automaticamente.'),
      '#default_value' => $this->options['autoplay'],
    ];

    $form['autoplay_speed'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Velocidade da reprodução automaticamente (em milissegundos).'),
      '#default_value' => $this->options['autoplay_speed'],
    ];

    $form['dots'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Visualizar os <b>pontos de navegação</b> do banner'),
      '#default_value' => $this->options['dots'],
    ];

    $form['append_arrows'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Visualizar setas centralizadas na parte inferior do banner. <i>Por padrão, as setas são visualizadas nas laterais do banner.</i>'),
      '#default_value' => $this->options['append_arrows'],
    ];
  }
}