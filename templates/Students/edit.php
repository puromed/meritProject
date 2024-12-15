<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<!-- external css -->
<?php 
    echo $this->Html->css("studentsEdit.css") 
?> 
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $student->student_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $student->student_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="students form content">
            <?= $this->Form->create($student) ?>
            <fieldset>
                <legend><?= __('Edit Student') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('date_of_birth');
                    echo $this->Form->control('gender');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('address1');
                    echo $this->Form->control('address2');
                    echo $this->Form->control('postcode');
                    echo $this->Form->control('city');
                    echo $this->Form->control('state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
