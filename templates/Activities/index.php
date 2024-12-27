<?php
$this->assign('title', 'Manage Activities');
?>

<div class="container-fluid p-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Activities Management</h3>
            <?= $this->Html->link(
                '<i class="fas fa-plus"></i> Add New Activity',
                ['action' => 'add'],
                ['class' => 'btn btn-primary', 'escape' => false]
            ) ?>
        </div>
        <!-- Search Form -->
         <div class="card mb-4">
            <div class="card-body">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3']) ?>
                    <div class="col-md-3">
                        <?= $this->Form->control('activity_name', [
                            'label' => 'Activity Name',
                            'class' => 'form-control',
                            'placeholder' => 'Search by name...',
                            'value' => $this->request->getQuery('activity_name')
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control('location', [
                            'label' => 'Location',
                            'class' => 'form-control',
                            'placeholder' => 'Search by location...',
                            'value' => $this->request->getQuery('location')
                        ]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Form->control('availability', [
                            'empty' => 'All Status',
                            'options' => ['open' => 'Open', 'closed' => 'Closed'],
                            'class' => 'form-select',
                            'label' => 'Status',
                            'value' => $this->request->getQuery('availability')
                        ]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Form->control('merit_id', [
                            'empty' => 'All Merit Types',
                            'options' => $merits,
                            'class' => 'form-select',
                            'label' => 'Merit Type',
                            'value' => $this->request->getQuery('merit_id')
                        ]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Form->control('from_date', [
                            'type' => 'date',
                            'class' => 'form-control',
                            'label' => 'From Date',
                            'value' => $this->request->getQuery('from_date')
                        ]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Form->control('to_date', [
                            'type' => 'date',
                            'class' => 'form-control',
                            'label' => 'To Date',
                            'value' => $this->request->getQuery('to_date')
                        ]) ?>
                    </div>
                    <div class="col-12">
                        <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary me-2']) ?>
                        <?= $this->Html->link('Clear', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
                    </div>
                <?= $this->Form->end() ?>
            </div>
         </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Activity Name</th>
                                <th>Date & Time</th>
                                <th>Location</th>
                                <th>Merit Points</th>
                                <th>Availability</th>
                                <th>Participants</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($activities->count() > 0): ?>
                                <?php foreach ($activities as $activity): ?>
                                    <tr>
                                        <td><?= h($activity->activity_name) ?></td>
                                        <td><?= $activity->activity_date ? $activity->activity_date->format('d M Y, h:i A') : '-' ?></td>
                                        <td><?= h($activity->location) ?></td>
                                        <td><?= $activity->merit ? $activity->merit->points : '-' ?></td>
                                        <td>
                                            <span class="badge bg-<?= $activity->availability === 'open' ? 'success' : 'secondary' ?>">
                                                <?= ucfirst(h($activity->availability)) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php 
                                            $participantCount = isset($activity->student_merits) ? count($activity->student_merits) : 0;
                                            echo $this->Html->link(
                                                $participantCount . ' participants',
                                                ['action' => 'view', $activity->activity_id],
                                                ['class' => 'text-decoration-none']
                                            );
                                            ?>
                                        </td>
                                        <td>
                                            <?= $this->Html->link(
                                                '<i class="fas fa-eye"></i>',
                                                ['action' => 'view', $activity->activity_id],
                                                ['class' => 'btn btn-sm btn-outline-primary me-1', 'escape' => false]
                                            ) ?>
                                            <?= $this->Html->link(
                                                '<i class="fas fa-edit"></i>',
                                                ['action' => 'edit', $activity->activity_id],
                                                ['class' => 'btn btn-sm btn-outline-primary me-1', 'escape' => false]
                                            ) ?>
                                            <?= $this->Form->postLink(
                                                '<i class="fas fa-trash"></i>',
                                                ['action' => 'delete', $activity->activity_id],
                                                [
                                                    'confirm' => 'Are you sure you want to delete this activity?',
                                                    'class' => 'btn btn-sm btn-outline-danger',
                                                    'escape' => false
                                                ]
                                            ) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No activities found matching your search criteria.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>