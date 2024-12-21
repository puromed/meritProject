<?php 
    echo $this->Html->css("external/usersAdd.css"); 
   
?> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<div class="users form content mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-4">
                <div class="card-header">
                    <h3><?= __('Register') ?></h3>
                </div>
                <div class="card-body">
                <?= $this->Form->create(null, ['id' => 'registrationForm']) ?> <!-- Add form ID -->
                    <div class="progress-bar">
                        <div class="progress-step active" data-step="1"></div>
                        <div class="progress-step" data-step="2"></div>
                        <div class="progress-step" data-step="3"></div>
                    </div>

                    

                    <div class="form-step active">
                        <fieldset>
                            <legend><?= __('Personal Information') ?></legend>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => 'Full Name']); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo $this->Form->control('student_id', ['type' => 'text', 'class' => 'form-control', 'label' => 'Student ID']); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php echo $this->Form->control('date_of_birth', ['type' => 'date', 'class' => 'form-control', 'label' => 'Date of Birth']); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo $this->Form->control('gender', ['options' => ['Male' => 'Male', 'Female' => 'Female', 'Unspecified' => 'Unspecified'], 'class' => 'form-control', 'label' => 'Gender']); ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-step">
                        <fieldset>
                            <legend><?= __('Account Details') ?></legend>
                            <div class="form-group">
                                <?php echo $this->Form->control('username', ['class' => 'form-control']); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->control('email', ['class' => 'form-control']); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->control('password', ['class' => 'form-control']); ?>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-step">
                        <fieldset>
                            <legend><?= __('Contact Information') ?></legend>
                            <div class="form-group">
                                <?php echo $this->Form->control('phone_number', ['class' => 'form-control', 'label' => 'Phone Number']); ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php echo $this->Form->control('address1', ['class' => 'form-control', 'label' => 'Address 1']); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo $this->Form->control('address2', ['class' => 'form-control', 'label' => 'Address 2']); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php echo $this->Form->control('city', ['class' => 'form-control']); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo $this->Form->control('postcode', ['class' => 'form-control', 'label' => 'Postcode']); ?>
                                </div>
                                <div class="form-group col-md-2">
                                     <?php echo $this->Form->control('state', ['class' => 'form-control']); ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <?php echo $this->Form->control('role', [
                                        'options' => ['user' => 'User'],
                                        'class' => 'form-control',
                                        'label' => 'Role',
                                        'default' => 'user',
                                        'readonly' => true
                                    ]); ?>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-navigation">
                        <button type="button" class="btn btn-secondary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                        <?= $this->Form->button(__('Submit'), [
                            'class' => 'btn btn-success submit-form',
                            'style' => 'display: none;'
                        ]) ?>

                    <!-- <?= $this->Form->end() ?> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    echo $this->Html->script("script.js");

?>