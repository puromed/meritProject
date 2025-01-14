<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Student> $students
 */
?>
<!-- external css -->
<?php 
    echo $this->Html->css('custom.css') 
?> 
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>


<div class="students index content mt-4 rounded-3">
    <?= $this->Html->link(__('Add New Student'), ['action' => 'add'], ['class' => 'button mx-4 mt-4 float-right rounded-4']) ?>
    <h3><?= __('Students List') ?></h3>
    <div class="table-responsive rounded-4">
        <table class="border-2">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('address1') ?></th>
                    <th><?= $this->Paginator->sort('address2') ?></th>
                    <th><?= $this->Paginator->sort('postcode') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $this->Number->format($student->student_id) ?></td>
                    <td><?= h($student->name) ?></td>
                    <td><?= h($student->date_of_birth) ?></td>
                    <td><?= h($student->gender) ?></td>
                    <td><?= h($student->email) ?></td>
                    <td><?= h($student->phone_number) ?></td>
                    <td><?= h($student->address1) ?></td>
                    <td><?= h($student->address2) ?></td>
                    <td><?= h($student->postcode) ?></td>
                    <td><?= h($student->city) ?></td>
                    <td><?= h($student->state) ?></td>
                    <td><?= h($student->created) ?></td>
                    <td><?= h($student->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $student->student_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->student_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->student_id)]) ?>
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