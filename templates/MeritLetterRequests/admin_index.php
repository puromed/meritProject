<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MeritLetterRequest> $meritLetterRequests
 */
?>

<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') ?>

<div class="meritLetterRequests index content container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="h5 mb-0"><?= __('Merit Letter Requests') ?></h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                            <th><?= $this->Paginator->sort('student_id') ?></th>
                            <th><?= $this->Paginator->sort('status') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                            <th><?= $this->Paginator->sort('user_id') ?></th>
                            <th class="text-center"><?= __('Actions') ?></th>
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
                            <td class="text-center">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $meritLetterRequest->id]) ?>
                                <?php if ($meritLetterRequest->status === 'pending'): ?>
                                    <?= $this->Form->postLink(__('Approve'), 
                                        ['action' => 'approve', $meritLetterRequest->id],
                                        ['escape' => false, 'class' => 'btn btn-sm btn-success', 'confirm' => __('Are you sure you want to approve this request?')]
                                    ) ?>
                                    <?= $this->Form->postLink(__('Deny'), 
                                        ['action' => 'deny', $meritLetterRequest->id],
                                        ['escape' => false, 'class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to deny this request?')]
                                    ) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator mt-4">
                <ul class="pagination justify-content-center">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p class="text-center mt-3">
                    <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
                </p>
            </div>
        </div>
    </div>
</div>
