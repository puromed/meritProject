<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MeritLetterRequest> $meritLetterRequests
 */
?>

<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') ?>

<div class="meritLetterRequests index content">
    <?= $this->Html->link(__('New Merit Letter Request'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Merit Letter Requests') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meritLetterRequests as $meritLetterRequest): ?>
                <tr>
                    <td><?= $this->Number->format($meritLetterRequest->id) ?></td>
                    <td><?= $meritLetterRequest->hasValue('student') ? $this->Html->link($meritLetterRequest->student->name, ['controller' => 'Students', 'action' => 'view', $meritLetterRequest->student->student_id]) : '' ?></td>
                    <td><?= h($meritLetterRequest->status) ?></td>
                    <td><?= h($meritLetterRequest->created) ?></td>
                    <td><?= h($meritLetterRequest->modified) ?></td>
                    <td><?= $meritLetterRequest->hasValue('user') ? $this->Html->link($meritLetterRequest->user->email, ['controller' => 'Users', 'action' => 'view', $meritLetterRequest->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meritLetterRequest->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meritLetterRequest->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meritLetterRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meritLetterRequest->id)]) ?>
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