<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\StudentMerit> $studentMerits
 */
?>
<!-- css file -->
<?php 
    echo $this->Html->css("indexStudentMerits.css") 
?> 
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>
<div class="studentMerits index content rounded-4">
    <?= $this->Html->link(__('New Student Merit'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Student Merits') ?> <i class="fa-solid fa-ranking-star"></i></h3>
    <div class="table-responsive rounded-4">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('student_merit_id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('merit_id') ?></th>
                    <th><?= $this->Paginator->sort('Date_Received') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentMerits as $studentMerit): ?>
                <tr>
                    <td><?= $this->Number->format($studentMerit->student_merit_id) ?></td>
                    <td><?= $studentMerit->hasValue('student') ? $this->Html->link($studentMerit->student->name, ['controller' => 'Students', 'action' => 'view', $studentMerit->student->student_id]) : '' ?></td>
                    <td><?= $studentMerit->hasValue('merit') ? $this->Html->link($studentMerit->merit->merit_type, ['controller' => 'Merits', 'action' => 'view', $studentMerit->merit->merit_id]) : '' ?></td>
                    <td><?= h($studentMerit->Date_Received) ?></td>
                    <td><?= h($studentMerit->created) ?></td>
                    <td><?= h($studentMerit->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $studentMerit->student_merit_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studentMerit->student_merit_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studentMerit->student_merit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentMerit->student_merit_id)]) ?>
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