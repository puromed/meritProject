<?php

echo $this->Html->css([
    "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css",
    "external/dashboard.css"
], ['block' => 'css']);

// custom css
echo $this->Html->css("custom.css");



// Add required JavaScript
echo $this->Html->script([
    "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js",
    "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js" // static chart
], ['block' => 'script']);
?>

<?php
$this->assign('title', 'My Activities');
?>

<!-- sidebar -->
<div class="d-flex h-100">
    <!-- Sidebar -->
    <div class="sidebar bg-white shadow-sm p-3" style="width: 250px;">
        <div class="d-flex align-items-center mb-4 px-2">
            <i class="fas fa-graduation-cap fs-4 me-2"></i>
            <span class="fs-4">Student Merit System</span>
        </div>


        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <?= $this->Html->link(
                    '<i class="fas fa-home me-2"></i> Dashboard',
                    ['controller' => 'Pages', 'action' => 'display', 'user_dashboard'],
                    ['class' => 'nav-link active', 'escape' => false]
                ) ?>
            </li>
            <li class="nav-item mb-2">
                <?= $this->Html->link(
                    '<i class="fas fa-trophy me-2"></i> My Activities',
                    ['controller' => 'Activities', 'action' => 'myActivities'],
                    ['class' => 'nav-link', 'escape' => false]
                ) ?>
            </li>
            <li class="nav-item mb-2">
                <?= $this->Html->link(
                    '<i class="fas fa-medal me-2"></i>  Achievements',
                    ['controller' => 'Pages', 'action' => 'achievements'],
                    ['class' => 'nav-link', 'escape' => false]
                ) ?>
            </li>
        </ul>
    </div>

<!-- main content -->
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