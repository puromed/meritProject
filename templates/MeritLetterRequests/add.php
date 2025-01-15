<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeritLetterRequest $meritLetterRequest
 * @var \Cake\Collection\CollectionInterface|string[] $students
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<!-- Load Bootstrap CSS -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'); ?>

<div class="row mt-4">
    <aside class="col-md-3">
        <div class="side-nav p-3 bg-light rounded">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <div class="list-group">
                <?= $this->Html->link(__('List Merit Letter Requests'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="meritLetterRequests form content p-4 border rounded bg-white">
            <?= $this->Form->create($meritLetterRequest, ['class' => 'needs-validation', 'novalidate' => true]) ?>
            <fieldset>
                <legend class="mb-4"><?= __('Request Merit Letter') ?></legend>
                <div class="mb-3">
                    <?= $this->Form->control('student_id', [
                        'options' => $students,
                        'class' => 'form-select',
                        'label' => 'Student ID'
                    ]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
