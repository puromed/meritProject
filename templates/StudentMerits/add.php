<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentMerit $studentMerit
 * @var \Cake\Collection\CollectionInterface|string[] $students
 * @var \Cake\Collection\CollectionInterface|string[] $merits
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
                    <?= $this->Html->link(__('List Student Merits'), ['action' => 'index'], ['class' => 'btn btn-link p-0 text-white']) ?>
                </div>
            </div>      
        </aside>
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="h6 mb-0">Add Student Merit</h4>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($studentMerit, ['class' => 'form']) ?>
                    <fieldset>
                        <legend class="h5 mb-4 center text-success"><i class="fa-solid fa-star"></i> <?= __('Student Merit Details') ?> <i class="fa-solid fa-star"></i></legend>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('student_id', ['options' => $students, 'empty' => true]); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('merit_id', ['options' => $merits, 'empty' => true]); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('Date_Received', ['empty' => true]); ?>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-end">
                        <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary rounded-3 text-white']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
