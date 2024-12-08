<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merit $merit
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Merit'), ['action' => 'edit', $merit->merit_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Merit'), ['action' => 'delete', $merit->merit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $merit->merit_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Merits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Merit'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="merits view content">
            <h3><?= h($merit->merit_type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Merit Type') ?></th>
                    <td><?= h($merit->merit_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($merit->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Merit Id') ?></th>
                    <td><?= $this->Number->format($merit->merit_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Points') ?></th>
                    <td><?= $this->Number->format($merit->points) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($merit->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($merit->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>