<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MeritLetterRequest> $meritLetterRequests
 */
?>
<div class="meritLetterRequests index content">
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
                    <td><?= h($meritLetterRequest->student_id) ?></td>
                    <td><?= h($meritLetterRequest->status) ?></td>
                    <td><?= h($meritLetterRequest->created) ?></td>
                    <td><?= h($meritLetterRequest->modified) ?></td>
                    <td><?= $this->Number->format($meritLetterRequest->user_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meritLetterRequest->id]) ?>
                        <?php if ($meritLetterRequest->status === 'pending'): ?>
                            <?= $this->Form->postLink(__('Approve'), 
                                ['action' => 'approve', $meritLetterRequest->id],
                                ['confirm' => __('Are you sure you want to approve this request?')]
                            ) ?>
                            <?= $this->Form->postLink(__('Deny'), 
                                ['action' => 'deny', $meritLetterRequest->id],
                                ['confirm' => __('Are you sure you want to deny this request?')]
                            ) ?>
                        <?php endif; ?>
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
