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