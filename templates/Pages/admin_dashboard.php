
<div class="container py-4">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h2>Admin Dashboard</h2>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text display-4"><?= $studentCount ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Merits</h5>
                    <p class="card-text display-4"><?= $meritCount ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- view and add students -->
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <h2>Welcome Back!</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Quick Links</h5>
                    <div class="list-group">
                        <?= $this->Html->link('View Students', 
                            ['controller' => 'Students', 'action' => 'index'],
                            ['class' => 'list-group-item list-group-item-action']) ?>
                        <?= $this->Html->link('Student Merits', 
                            ['controller' => 'StudentMerits', 'action' => 'index'],
                            ['class' => 'list-group-item list-group-item-action']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>