<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<?php 
    echo $this->Html->css("custom.css");
?> 
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'); ?>

<div class="row mt-5">
    <div class="row">
        <aside class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="h6 mb-0"><?= __('Actions') ?></h4>
                </div>
                <div class="card-body">
                    <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </aside>
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="h6 mb-0">Student Form</h4>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($student, ['class' => 'form']) ?>
                    <fieldset>
                        <legend class="h5 mb-4 text-center text-success"><i class="fa-solid fa-address-book"></i> <?= __('Student Details') ?></legend>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'Full Name']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('date_of_birth', ['class' => 'form-control', 'label' => 'Date of Birth']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('gender', ['class' => 'form-control', 'label' => 'Gender']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'Email Address']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('phone_number', ['class' => 'form-control', 'label' => 'Phone Number']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('address1', ['class' => 'form-control', 'label' => 'Address Line 1']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('address2', ['class' => 'form-control', 'label' => 'Address Line 2']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('postcode', ['class' => 'form-control', 'label' => 'Postcode']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('city', ['class' => 'form-control', 'label' => 'City']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('state', ['class' => 'form-control', 'label' => 'State']); ?>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-end">
                    <?= $this->Form->button(__('Submit'), ['class'=>'bg-primary rounded-3 text-white']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
