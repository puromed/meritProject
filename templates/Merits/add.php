<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merit $merit
 */
?>
<!-- css file -->
<?php 
    echo $this->Html->css("custom.css") 
?> 
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>
<div class="row mt-5">
    <div class="row">
        <aside class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="h6 mb-0"><?= __('Actions') ?></h4>
                    <?= $this->Html->link(__('List Merits'), ['action' => 'index'], ['class' => 'btn btn-link p-0 text-white']) ?>
                </div>
            </div>
        </aside>
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="h6 mb-0">Add Merit</h4>
                </div>
                    <?= $this->Form->create($merit) ?>
                    <fieldset>
                        <legend class="g5 mb-4 center text-success"><?= __('Merit Details') ?></legend>
                        <div class="row px-4">
                            <div class="col-md-3 mb-3">
                                <?= $this->Form->control('merit_type', ['class' => 'form-control mt-2', 'label' => 'Merit Type: ']); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('description', ['class' => 'form-control mt-2', 'label' => 'Description: ']); ?>
                            </div>
                            <div class="col-md-3 mb-3">
                                <?= $this->Form->control('points', ['class' => 'form-control mt-2', 'label' => 'Points: ']); ?>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-end">
                        <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary text-white rounded-4 mx-2 my-2']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
