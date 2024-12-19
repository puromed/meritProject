<?php echo $this->Html->css("custom.css", ['block' => true]); // css file 
echo $this->Html->css("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"); // Font Awesome CSS
?>
<div class="container-fluid dashboard-container py-4">
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="dashboard-title mb-4"><i class="fa-solid fa-gauge-high">
            Admin Dashboard
            </i></h2>
        </div>
    </div>
    
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <i class="fa-solid fa-user"></i>
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text"><?= isset($studentCount) ? $studentCount : 0 ?></p>  <!-- meritCount, activityCount, pendingRequests -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                <i class="fa-solid fa-arrow-up-1-9"></i>
                    <h5 class="card-title"> Merits</h5>
                    <p class="card-text"><?= isset($meritCount) ? $meritCount : 0 ?></p>  
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                <i class="fa-solid fa-person-skating"></i>
                    <h5 class="card-title">Activity</h5>
                    <p class="card-text"><?= isset($activityCount) ? $activityCount : 0 ?></p>  <!-- meritCount, activityCount, pendingRequests -->
                </div>
            </div>
        </div>


    </div>
        
    </div>

    <!-- Quick Actions -->
    <div class="row g-4">
        <div class="col-md-8">
            <div class="stat-card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-clock-rotate-left">Recent Activities</i></h5>
                    <div class="table-responsive mt-3">
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
        <div class="col-md-4">
            <div class="stat-card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-bolt"></i> Quick Actions</h5>
                    <ul class="list-group">
                        <?= $this->Html->link('View Activities', ['controller' => 'Activities', 'action' => 'available'], ['class' => 'list-group-item']) ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>