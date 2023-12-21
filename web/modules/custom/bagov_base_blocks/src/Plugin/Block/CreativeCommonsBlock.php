<?php

namespace Drupal\bagov_base_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a select_creative_commons block.
 *
 * @Block(
 *   id = "select_creative_commons_block",
 *   admin_label = @Translation("Creative Commons Info - Ba.Gov"),
 * )
 */
class CreativeCommonsBlock extends BlockBase
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
        if ($config->get('creative_commons_enable')) {
            return [
                '#theme' => 'creative_commons_block',
                '#attached' => [
                    'library' => ['bagov_base_blocks/block_creative_commons'],
                ],
            ];
        }
    }
}
