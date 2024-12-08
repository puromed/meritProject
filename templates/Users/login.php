<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form content">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="mb-0"><?= __('Login') ?></h3>
                </div>
                <div class="card-body">
                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create() ?>
                    <div class="form-group mb-3">
                        <?= $this->Form->control('email', [
                            'required' => true, 
                            'class' => 'form-control',
                            'placeholder' => 'Enter email'
                        ]) ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= $this->Form->control('password', [
                            'required' => true, 
                            'class' => 'form-control',
                            'placeholder' => 'Enter password'
                        ]) ?>
                    </div>
                    <?= $this->Form->submit(__('Login'), [
                        'class' => 'btn btn-primary w-100'
                    ]); ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>