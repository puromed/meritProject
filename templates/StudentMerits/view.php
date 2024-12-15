<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentMerit $studentMerit
 */
?>
<!-- css file -->
<?php 
    echo $this->Html->css("studentMeritsView.css") 
?> 
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student Merit'), ['action' => 'edit', $studentMerit->student_merit_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Student Merit'), ['action' => 'delete', $studentMerit->student_merit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentMerit->student_merit_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Student Merits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Student Merit'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="studentMerits view content">
            <h3><?= h($studentMerit->student_merit_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $studentMerit->hasValue('student') ? $this->Html->link($studentMerit->student->name, ['controller' => 'Students', 'action' => 'view', $studentMerit->student->student_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Merit') ?></th>
                    <td><?= $studentMerit->hasValue('merit') ? $this->Html->link($studentMerit->merit->merit_type, ['controller' => 'Merits', 'action' => 'view', $studentMerit->merit->merit_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Student Merit Id') ?></th>
                    <td><?= $this->Number->format($studentMerit->student_merit_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Received') ?></th>
                    <td><?= h($studentMerit->Date_Received) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($studentMerit->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($studentMerit->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>