<?php 
    echo $this->Html->css("adminDashboard.css") 
?> 
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<div class="container py-4">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h2 class="darkBlue-text">Admin Dashboard</h2>
        </div>
        <div class="col-md-4">
            <div class="card rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text display-4"><?= $studentCount ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card rounded-4">
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
            <h2 class="darkBlue-text">Welcome Back!</h2>
            <div class="card rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Quick Links</h5>
                    <div class="list-group">
                        <?= $this->Html->link('View Students', 
                            ['controller' => 'Students', 'action' => 'index'],
                            ['class' => 'list-group-item list-group-item-action rounded-3 mb-1']) ?>
                        <?= $this->Html->link('Student Merits', 
                            ['controller' => 'StudentMerits', 'action' => 'index'],
                            ['class' => 'list-group-item list-group-item-action rounded-3']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
 
<footer>
    <hr>
    <div class="container-fluid"> <!--fluid and text color not working-->
        <div class="row">
            <div class="col-md-4">
                <h3 class="white-text">Emerit Student</h3>
                <p class="white-text">Designed and built to store<br> and manage student merit <br>points</p>
            </div>
            <div class="col-md-4">
                <br>
                <p class="white-text">Quick Link <br><a href="#"> Home</a> <br><a href="#"> Students</a> <br><a href="#"> Students Merits</a> <br><a href="#"> Activities</a> <br><a href="#"> Merits</a> </p>
            </div>
            <div class="col-md-4">3</div>
        </div>
    </div>
</footer>