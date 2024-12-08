<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentMerit $studentMerit
 * @var string[]|\Cake\Collection\CollectionInterface $students
 * @var string[]|\Cake\Collection\CollectionInterface $merits
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studentMerit->student_merit_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studentMerit->student_merit_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Student Merits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="studentMerits form content">
            <?= $this->Form->create($studentMerit) ?>
            <fieldset>
                <legend><?= __('Edit Student Merit') ?></legend>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students, 'empty' => true]);
                    echo $this->Form->control('merit_id', ['options' => $merits, 'empty' => true]);
                    echo $this->Form->control('Date_Received', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
