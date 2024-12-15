<?php 
    echo $this->Html->css("usersAdd.css") 
?> 

<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<div class="users form content mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card rounded-4">
                <div class="card-header">
                    <h3><?= __('Add User') ?></h3>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($user) ?>
                    <div class="form-group mb-3">
                        <?= $this->Form->control('email', ['class' => 'form-control']) ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= $this->Form->control('password', ['class' => 'form-control']) ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= $this->Form->control('role', [
                            'class' => 'form-control',
                            'options' => ['admin' => 'Admin', 'user' => 'User']
                        ]) ?>
                    </div>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br>