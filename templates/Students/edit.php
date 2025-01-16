<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<!-- Load external CSS and Bootstrap -->
<?php 
    echo $this->Html->css("custom.css"); 
    echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<div class="row mt-4">
    <aside class="col-md-3">
        <div class="side-nav p-3 bg-light rounded">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <div class="list-group">
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $student->student_id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $student->student_id), 'class' => 'list-group-item list-group-item-action text-danger']
                ) ?>
                <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="students form content p-4 border rounded bg-white">
            <?= $this->Form->create($student, ['class' => 'needs-validation', 'novalidate' => true]) ?>
            <fieldset>
                <legend class="mb-4"><?= __('Edit Student') ?></legend>
                <div class="mb-3">
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'Name']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('date_of_birth', ['class' => 'form-control', 'label' => 'Date of Birth']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('gender', ['class' => 'form-control', 'label' => 'Gender']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'Email']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('phone_number', ['class' => 'form-control', 'label' => 'Phone Number']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('address1', ['class' => 'form-control', 'label' => 'Address Line 1']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('address2', ['class' => 'form-control', 'label' => 'Address Line 2']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('postcode', ['class' => 'form-control', 'label' => 'Postcode']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('city', ['class' => 'form-control', 'label' => 'City']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('state', ['class' => 'form-control', 'label' => 'State']) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
