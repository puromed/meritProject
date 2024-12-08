<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->activity_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->activity_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->activity_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Activities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Activity'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="activities view content">
            <h3><?= h($activity->activity_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Activity Name') ?></th>
                    <td><?= h($activity->activity_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Merit') ?></th>
                    <td><?= $activity->hasValue('merit') ? $this->Html->link($activity->merit->merit_type, ['controller' => 'Merits', 'action' => 'view', $activity->merit->merit_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Activity Id') ?></th>
                    <td><?= $this->Number->format($activity->activity_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($activity->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($activity->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>