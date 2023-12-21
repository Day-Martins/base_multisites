<?php

/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

use Drupal\bagov_base_blocks\Views;
use Drupal\Core\Template\Attribute;

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
    $vars['id'] = Views::getUniqueId($view);

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
    $vars['id'] = Views::getUniqueId($view);

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