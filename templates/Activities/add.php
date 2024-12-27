<?php
$this->assign('title', 'Add Activity');
?>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title mb-0">Add Activity</div>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($activity) ?>
                    <div class="mb-3">
                        <?= $this->Form->control('activity_name', [
                            'class' => 'form-control',
                            'label' => 'Activity Name *',
                            'required' => true
                        ]) ?>
                    </div>

                    <div class="mb-3">
                        <?= $this->Form->control('description', [
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'label' => 'Description *',
                            'required' => true
                        ]) ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('activity_date', [
                                'type' => 'datetime-local',
                                'class' => 'form-control',
                                'label' => 'Activity Date and Time *',
                                'required' => true
                            ]) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('location', [
                                'class' => 'form-control',
                                'label' => 'Location *',
                                'required' => true
                            ]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('merit_id',[
                                'options' => $merits,
                                'empty' => 'Select Merit',
                                'class' => 'form-control',
                                'label' => 'Merit Type *',
                                'empty' => 'Select Merit Type',
                                'required' => true
                            ]) ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('availability',[
                                'options' => [
                                    'open' => 'Open',
                                    'closed'=> 'Closed',
                                    'completed' => 'Completed',
                                    'cancelled' => 'Cancelled'
                                ],
                                'class' => 'form-control',
                                'label' => 'Availability *',
                                'default' => 'open',
                                'required' => true
                            ]) ?>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <?= $this->Html->link(
                        '<i class="fa fa-arrow-left"></i> Back',
                        ['action' => 'index'],
                        ['class' => 'btn btn-secondary', 'escape' => false]
                    ) ?>
                    <?= $this->Form->button(__('Save Activity'), [
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>