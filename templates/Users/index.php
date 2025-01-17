<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<!-- css file -->
<?php 
    echo $this->Html->css("external/dashboard.css", ['block' => true]);
    echo $this->Html->css("custom.css");
    echo $this->Html->css("usersIndex.css") 
?> 
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<div class="users index content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3><?= __('Users') ?></h3>
            <?= $this->Html->link(__('Add User'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th><?= $this->Paginator->sort('role') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->role) ?></td>
                        <td><?= h($user->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-info']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-warning']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure?'), 'class' => 'btn btn-sm btn-danger']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('First')) ?>
                    <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Next') . ' >') ?>
                    <?= $this->Paginator->last(__('Last') . ' >>') ?>
                </ul>
            </div>
        </div>
    </div>
</div>