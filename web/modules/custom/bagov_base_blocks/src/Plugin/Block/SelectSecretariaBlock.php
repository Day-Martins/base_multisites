<?php

namespace Drupal\bagov_base_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a select_secretaria block.
 *
 * @Block(
 *   id = "select_secretaria_block",
 *   admin_label = @Translation("Ba.Gov - Select Secretarias"),
 * )
 */
class SelectSecretariaBlock extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function access(AccountInterface $account, $return_as_object = false)
    {
        $access = $this->blockAccess($account);
        return $return_as_object ? $access : $access->isAllowed('access content');
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $config = \Drupal::config('bagov_base_blocks.settings');
        if ($config->get('select_secretaria_enable')) {
            return [
                '#theme' => 'select_secretaria_block',
                '#attached' => [
                    'library' => ['bagov_base_blocks/block_select_secretaria'],
                ],
            ];
        }
    }
}
