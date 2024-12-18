<?php echo $this->Html->css("adminDashboard.css") ?> 

<div class="container-fluid py-4">
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="dashboard-title mb-4">Admin Dashboard</h2>
        </div>
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text display-4"><?= isset($studentCount) ? $studentCount : 0 ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title">Total Merits</h5>
                    <p class="card-text display-4"><?= isset($meritCount) ? $meritCount : 0 ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title">Active Activities</h5>
                    <p class="card-text display-4"><?= isset($activityCount) ? $activityCount : 0 ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title">Pending Requests</h5>
                    <p class="card-text display-4"><?= isset($pendingRequests) ? $pendingRequests : 0 ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Activities</h5>
                    <div class="table-responsive">
                        <?php $recentActivities = isset($recentActivities) ? $recentActivities : []; ?>
                        <?php if (!empty($recentActivities)): ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Activity</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentActivities as $activity): ?>
                                    <tr>
                                        <td><?= h($activity->title) ?></td>
                                        <td><?= $activity->created->format('Y-m-d') ?></td>
                                        <td><?= h($activity->status) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-muted">No recent activities found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>