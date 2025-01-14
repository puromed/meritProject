<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merit $merit
 */
?>
<!-- Load external CSS and Bootstrap -->
<?php 
    echo $this->Html->css("meritsEdit.css"); 
    echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<div class="row mt-4">
    <aside class="col-md-3">
        <div class="side-nav p-3 bg-light rounded">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <div class="list-group">
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $merit->merit_id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $merit->merit_id), 'class' => 'list-group-item list-group-item-action text-danger']
                ) ?>
                <?= $this->Html->link(__('List Merits'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="merits form content p-4 border rounded bg-white">
            <?= $this->Form->create($merit, ['class' => 'needs-validation', 'novalidate' => true]) ?>
            <fieldset>
                <legend class="mb-4"><?= __('Edit Merit') ?></legend>
                <div class="mb-3">
                    <?= $this->Form->control('merit_type', ['class' => 'form-control', 'label' => 'Merit Type']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('description', ['class' => 'form-control', 'label' => 'Description']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('points', ['class' => 'form-control', 'label' => 'Points']) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
