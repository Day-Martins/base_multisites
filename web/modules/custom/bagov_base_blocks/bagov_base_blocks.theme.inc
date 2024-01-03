<?php

/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

use Drupal\bagov_base_blocks\BagovHelpers;

/**
 * Prepares variables for constrast templates.
 *
 * Default template: contrast-block.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - content: The content to print.
 */
function template_preprocess_contrast_block(array &$variables)
{
    $variables['content'] = [
        'output' => t('<div id="contrast-btn"><i class="fa fa-adjust" aria-hidden="true"></i></div>'),
    ];

    \Drupal::service('renderer')->render($variables);
}

/**
 * Prepares variables for information access templates.
 *
 * Default template: acesso informacao-block.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - content: The content to print.
 */
function template_preprocess_acesso_informacao_block(array &$variables)
{
    $variables['content'] = [
        'output' => t('<div class="top-link-info acesso-informacao">
            <a class="acesso-informacao__item" href="https://www.comunicacao.ba.gov.br/lei-de-acesso-a-informacao" target="_blank">
                <img class="acesso-informacao__item_image" src="/modules/custom/bagov_base_blocks/assets/images/acesso-informacao.png" title="Icone acesso informação" title="Acesso informação"/>
            <span class="acesso-informacao__item_description text-uppercase"> Acesso à informação</span></a></div>'),
    ];

    \Drupal::service('renderer')->render($variables);
}

/**
 * Prepares variables for state logo access templates.
 *
* Default template: logo-estado-block.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - content: The content to print.
 */
function template_preprocess_logo_estado_block(array &$variables)
{
    $variables['content'] = [
        'output' => t("<img src='{$variables['img']}' class='img-fluid logo-estado-img' alt=''>"),
    ];

    \Drupal::service('renderer')->render($variables);
}

/**
 * Prepares variables for org select templates.
 *
 * Default template: select-secretaria-block.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - content: The content to print.
 */
function template_preprocess_select_secretaria_block(array &$variables)
{
    $select = "<select class='form-control'>";
    $select .= "<option value='' class='first-option'>&gt; Escolher o site de uma secretaria...</option>";
    foreach ($variables['options'] as $option) {
        $select .= "<option value='{$option->value}'>{$option->label}</option>";
    }
    $select .= '</select>';
    $variables['content'] = [
        'output' => t($select),
    ];

    \Drupal::service('renderer')->render($variables);
}

/**
 * Prepares variables for information access templates.
 *
 * Default template: creative-commons-block.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - content: The content to print.
 */
function template_preprocess_creative_commons_block(array &$variables)
{
    $content = "<a href='https://creativecommons.org/licenses/by-nd/4.0/deed.pt-br' target='_blank'>";
    $content .= "<img alt='creativecommons' height='30' src='{$variables['img']}'>";
    $content .= '</a> ';
    $content .= 'Todo o conteúdo desse site está publicado sob a licença ';
    $content .= "<a href='https://creativecommons.org/licenses/by-nd/4.0/deed.pt-br' target='_blank'>";
    $content .= 'Creative Commons Atribuição-SemDerivações 4.0 Internacional';
    $content .= '</a>';
    $variables['content'] = [
        'output' => t($content),
    ];

    \Drupal::service('renderer')->render($variables);
}

/**
 * Prepares variables for views carousel template.
 *
 * Default template: views-noticias-home.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_noticias_home(array &$vars)
{
    $view = $vars['view'];
    $vars['#attached']['library'][] = 'bagov_base_blocks/views_noticias_home';
    $vars['id'] = BagovHelpers::getUniqueId($view);

    $vars['use_caption'] = $view->style_plugin->options['use_caption'];

    // rows.
    $image = $view->style_plugin->options['image'];
    $title = $view->style_plugin->options['title'];
    $description = $view->style_plugin->options['description'];
    $fieldLabels = $view->display_handler->getFieldLabels(true);

    foreach ($vars['rows'] as $id => $row) {
        $vars['rows'][$id] = [];
        if ($id === array_key_first($vars['rows'])) {
            $vars['rows'][$id]['noticia_principal'] = true;
        }
        $vars['rows'][$id]['image'] = $view->style_plugin->getField($id, $image);
        $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
        $vars['rows'][$id]['description'] = $view->style_plugin->getField($id, $description);
        // Add any additional fields to result.
        foreach (array_keys($fieldLabels) as $label) {
            if (!in_array($label, [$image, $title, $description])) {
                $vars['rows'][$id][$label] = $view->style_plugin->getField($id, $label);
            }
        }
    }
}

/**
 * Prepares variables for views carousel template.
 *
 * Default template: views-noticias.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_noticias(array &$vars)
{
    $view = $vars['view'];
    $vars['#attached']['library'][] = 'bagov_base_blocks/views_noticias';
    $vars['id'] = BagovHelpers::getUniqueId($view);

    $vars['use_caption'] = $view->style_plugin->options['use_caption'];
    $vars['view_title'] = $view->getTitle();

    // rows.
    $image = $view->style_plugin->options['image'];
    $title = $view->style_plugin->options['title'];
    $description = $view->style_plugin->options['description'];
    $fieldLabels = $view->display_handler->getFieldLabels(true);

    foreach ($vars['rows'] as $id => $row) {
        $vars['rows'][$id] = [];
        if ($id === array_key_first($vars['rows'])) {
            $vars['rows'][$id]['noticia_principal'] = true;
        }
        $vars['rows'][$id]['image'] = $view->style_plugin->getField($id, $image);
        $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
        $vars['rows'][$id]['description'] = $view->style_plugin->getField($id, $description);
        // Add any additional fields to result.
        foreach (array_keys($fieldLabels) as $label) {
            if (!in_array($label, [$image, $title, $description])) {
                $vars['rows'][$id][$label] = $view->style_plugin->getField($id, $label);
            }
        }
    }
}

/**
 * Prepares variables for views carousel template.
 *
 * Default template: views-noticias-relacionadas.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_noticias_relacionadas(array &$vars)
{
    $view = $vars['view'];
    $vars['#attached']['library'][] = 'bagov_base_blocks/views_noticias_relacionadas';
    $vars['id'] = BagovHelpers::getUniqueId($view);

    $vars['use_caption'] = $view->style_plugin->options['use_caption'];
    $vars['view_title'] = $view->getTitle();

    // rows.
    $image = $view->style_plugin->options['image'];
    $title = $view->style_plugin->options['title'];
    $description = $view->style_plugin->options['description'];
    $fieldLabels = $view->display_handler->getFieldLabels(true);

    foreach ($vars['rows'] as $id => $row) {
        $vars['rows'][$id] = [];
        if ($id === array_key_first($vars['rows'])) {
            $vars['rows'][$id]['noticia_principal'] = true;
        }
        $vars['rows'][$id]['image'] = $view->style_plugin->getField($id, $image);
        $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
        $vars['rows'][$id]['description'] = $view->style_plugin->getField($id, $description);
        // Add any additional fields to result.
        foreach (array_keys($fieldLabels) as $label) {
            if (!in_array($label, [$image, $title, $description])) {
                $vars['rows'][$id][$label] = $view->style_plugin->getField($id, $label);
            }
        }
    }
}
