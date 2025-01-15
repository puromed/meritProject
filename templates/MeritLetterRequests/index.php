<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MeritLetterRequest> $meritLetterRequests
 */
?>

<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') ?>
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css') ?>

<div class="meritLetterRequests index content mt-4">
    <?= $this->Html->link(
        '<i class="fas fa-plus"></i> ' . __('New Merit Letter Request'), 
        ['action' => 'add'], 
        ['class' => 'btn btn-success float-end', 'escape' => false]
    ) ?>
    <h3 class="mb-4"><?= __('Merit Letter Requests') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th><?= $this->Paginator->sort('id', __('ID')) ?></th>
                    <th><?= $this->Paginator->sort('student_id', __('Student ID')) ?></th>
                    <th><?= $this->Paginator->sort('status', __('Status')) ?></th>
                    <th><?= $this->Paginator->sort('created', __('Created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', __('Modified')) ?></th>
                    <th><?= $this->Paginator->sort('user_id', __('User')) ?></th>
                    <th class="text-center"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meritLetterRequests as $meritLetterRequest): ?>
                <tr>
                    <td><?= $this->Number->format($meritLetterRequest->id) ?></td>
                    <td><?= $meritLetterRequest->hasValue('student') ? 
                        $this->Html->link($meritLetterRequest->student->name, ['controller' => 'Students', 'action' => 'view', $meritLetterRequest->student->student_id]) : 
                        '' ?></td>
                    <td><?= h($meritLetterRequest->status) ?></td>
                    <td><?= h($meritLetterRequest->created) ?></td>
                    <td><?= h($meritLetterRequest->modified) ?></td>
                    <td><?= $meritLetterRequest->hasValue('user') ? 
                        $this->Html->link($meritLetterRequest->user->email, ['controller' => 'Users', 'action' => 'view', $meritLetterRequest->user->id]) : 
                        '' ?></td>
                    <td class="text-center">
                        <?= $this->Html->link(
                            '<i class="fas fa-eye"></i>', 
                            ['action' => 'view', $meritLetterRequest->id], 
                            ['class' => 'btn btn-primary btn-sm', 'escape' => false]
                        ) ?>
                        <?= $this->Html->link(
                            '<i class="fas fa-edit"></i>', 
                            ['action' => 'edit', $meritLetterRequest->id], 
                            ['class' => 'btn btn-warning btn-sm', 'escape' => false]
                        ) ?>
                        <?= $this->Form->postLink(
                            '<i class="fas fa-trash-alt"></i>', 
                            ['action' => 'delete', $meritLetterRequest->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $meritLetterRequest->id), 'class' => 'btn btn-danger btn-sm', 'escape' => false]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p class="text-center"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
