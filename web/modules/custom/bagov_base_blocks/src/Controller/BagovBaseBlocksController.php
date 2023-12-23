<?php

namespace Drupal\bagov_base_blocks\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller.
 */
class BagovBaseBlocksController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function home() {
    $build = [
      '#markup' =>'',
    ];
    return $build;
  }

}