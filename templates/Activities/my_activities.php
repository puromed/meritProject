<?php
$this->assign('title', 'My Activities');
?>

<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h4 class="card-title">Total Merit Points Earned</h4>
                    <h2 class="display-4 text-primary"><?= number_format($totalPoints) ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">My Activities</h3>
            <?= $this->Html->link(
                '<i class="fas fa-search"></i> Find Activities',
                ['action' => 'available'],
                ['class' => 'btn btn-primary', 'escape' => false]
            ) ?>
        </div>
        <div class="card-body">
            <?php if (!$joinedActivities->isEmpty()): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Activity Name</th>
                                <th>Date & Time</th>
                                <th>Location</th>
                                <th>Points Earned</th>
                                <th>Joined On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($joinedActivities as $activity): ?>
                            <tr>
                                <td><?= h($activity->activity->activity_name) ?></td>
                                <td><?= $activity->activity->activity_date->format('d M Y, h:i A') ?></td>
                                <td><?= h($activity->activity->location) ?></td>
                                <td>
                                    <span class="badge bg-success">
                                        <?= number_format($activity->points) ?> Points
                                    </span>
                                </td>
                                <td><?= $activity->created->format('d M Y') ?></td>
                                <td>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-eye"></i> View',
                                        ['action' => 'view', $activity->activity->activity_id],
                                        ['class' => 'btn btn-sm btn-outline-primary', 'escape' => false]
                                    ) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    <p class="mb-0">You haven't joined any activities yet.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>