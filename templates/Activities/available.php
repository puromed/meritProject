<?php
$this->assign('title', 'Available Activities');
?>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Available Activities</h2>
    </div>

    <div class="row g-4">
        <?php if (!empty($activities)): ?>
            <?php foreach ($activities as $activity): ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="card-title"><?= h($activity->activity_name) ?></h5>
                                <span class="badge bg-success">
                                    <?= $activity->merit->points ?> Points
                                </span>
                            </div>
                            
                            <p class="card-text text-muted mb-3">
                                <small>
                                    <i class="fas fa-calendar me-2"></i>
                                    <?= $activity->activity_date->format('d M Y, h:i A') ?>
                                </small>
                                <br>
                                <small>
                                    <i class="fas fa-location-dot me-2"></i>
                                    <?= h($activity->location) ?>
                                </small>
                            </p>

                            <p class="card-text"><?= h($activity->description) ?></p>

                            <div class="mt-3">
                                <?= $this->Html->link(
                                    'View Details',
                                    ['action' => 'view', $activity->activity_id],
                                    ['class' => 'btn btn-outline-primary me-2']
                                ) ?>
                                <?= $this->Form->postLink(
                                    'Join Activity',
                                    ['action' => 'join', $activity->activity_id],
                                    [
                                        'class' => 'btn btn-primary',
                                        'confirm' => 'Are you sure you want to join this activity?'
                                    ]
                                ) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info">
                    No activities available at the moment.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>