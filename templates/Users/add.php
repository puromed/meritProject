<div class="users form content">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
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