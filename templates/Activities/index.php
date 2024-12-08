<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Activity> $activities
 */
?>
<div class="activities index content">
    <?= $this->Html->link(__('New Activity'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Activities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('activity_id') ?></th>
                    <th><?= $this->Paginator->sort('activity_name') ?></th>
                    <th><?= $this->Paginator->sort('merit_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activities as $activity): ?>
                <tr>
                    <td><?= $this->Number->format($activity->activity_id) ?></td>
                    <td><?= h($activity->activity_name) ?></td>
                    <td><?= $activity->hasValue('merit') ? $this->Html->link($activity->merit->merit_type, ['controller' => 'Merits', 'action' => 'view', $activity->merit->merit_id]) : '' ?></td>
                    <td><?= h($activity->created) ?></td>
                    <td><?= h($activity->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $activity->activity_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->activity_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->activity_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->activity_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>