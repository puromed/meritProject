<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentMerit $studentMerit
 * @var \Cake\Collection\CollectionInterface|string[] $students
 * @var \Cake\Collection\CollectionInterface|string[] $merits
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Student Merits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="studentMerits form content">
            <?= $this->Form->create($studentMerit) ?>
            <fieldset>
                <legend><?= __('Add Student Merit') ?></legend>
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
