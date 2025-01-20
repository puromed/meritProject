<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- css file -->
<?php echo $this->Html->css("usersLogin.css") ?> 

<!-- SVG Backgrounds -->
<div class="svg-background">
    <?php 
        echo $this->Html->image('low-poly-grid-haikei.svg', [
            'alt' => 'Background pattern',
            'class' => 'svg-light'
        ]); 
        echo $this->Html->image('dark-low-poly-grid-haikei.svg', [
            'alt' => 'Dark background pattern',
            'class' => 'svg-dark'
        ]); 
    ?>
</div>

<div class="login-container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-5 col-lg-4">
            <div class="card rounded-4 shadow">
                <div class="card-header text-center border-0 pt-4">
                    <h3 class="darkBlue-text mb-0">Welcome Back</h3>
                </div>
                <div class="card-body px-4 py-4">
                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create() ?>
                    <div class="form-group mb-4">
                        <?= $this->Form->control('email', [
                            'required' => true, 
                            'class' => 'form-control rounded-3',
                            'placeholder' => 'Enter email',
                            'label' => ['class' => 'form-label']
                        ]) ?>
                    </div>
                    <div class="form-group mb-4">
                        <?= $this->Form->control('password', [
                            'required' => true, 
                            'class' => 'form-control rounded-3',
                            'placeholder' => 'Enter password',
                            'label' => ['class' => 'form-label']
                        ]) ?>
                    </div>
                    <div class="d-grid gap-2">
                        <?= $this->Form->submit(__('Login'), [
                            'class' => 'btn btn-primary btn-lg rounded-3'
                        ]); ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>