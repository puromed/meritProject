<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- css file -->
<?php 
    echo $this->Html->css("usersLogin.css") 
?> 
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<div class="users form content">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card rounded-4 mt-5">
                <div class="card-header">
                    <h3 class="mb-0 darkBlue-text"><?= __('Login') ?></h3>
                </div>
                <div class="card-body">
                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create() ?>
                    <div class="form-floating px-2 pb-2 rounded-3 mb-3">
                        <?= $this->Form->control('email', [
                            'required' => true, 
                            'class' => 'form-control',
                            'id' => 'floatingInput',
                            'type' => 'email',
                            'placeholder' => 'Enter email',
                            'label' => ['class' => 'form-label']
                        ]) ?>
                    </div>
                    <div class="form-floating px-2 pb-2 rounded-2 mb-3">
                        <?= $this->Form->control('password', [
                            'required' => true, 
                            'class' => 'form-control',
                            'id' => 'floatingInput',
                            'type' => 'emai',
                            'placeholder' => 'Enter password',
                            'label' => ['class' => 'form-label']
                        ]) ?>
                    </div>
                    <?= $this->Form->submit(__('Login'), [
                        'class' => 'btn btn-outline-primary w-50 rounded-4 position-absolute top-100 start-50 translate-middle'
                    ]); ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">1</div>
            <div class="col-md-4">2</div>
            <div class="col-md-4">3</div>
        </div>
    </div>
</footer>