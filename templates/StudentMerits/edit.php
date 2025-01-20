<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentMerit $studentMerit
 * @var string[]|\Cake\Collection\CollectionInterface $students
 * @var string[]|\Cake\Collection\CollectionInterface $merits
 */
?>

<!-- css file -->
<?php 
    echo $this->Html->css("studentMeritsEdit.css") 
?> 
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>
<div class="row mt-4 px-4">
    <aside class="column col-md-3">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #2193b0, #6dd5ed);">
                <h4 class="card-title mb-0 text-white">
                    <i class="fas fa-cog me-2"></i><?= __('Actions') ?>
                </h4>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <?= $this->Form->postLink(
                        '<i class="fas fa-trash-alt me-2"></i>' . __('Delete'),
                        ['action' => 'delete', $studentMerit->student_merit_id],
                        [
                            'confirm' => __('Are you sure you want to delete # {0}?', $studentMerit->student_merit_id),
                            'class' => 'btn btn-danger',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-list me-2"></i>' . __('List Merits'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-info text-white', 'escape' => false]
                    ) ?>
                </div>
            </div>
        </div>
    </aside>
    <div class="column col-md-9">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #2193b0, #6dd5ed);">
                <h3 class="card-title mb-0 text-white">
                    <i class="fas fa-edit me-2"></i><?= __('Edit Merit') ?>
                </h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($studentMerit) ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <?= $this->Form->control('student_id', [
                            'options' => $students,
                            'class' => 'form-select',
                            'label' => ['class' => 'form-label'],
                            'template' => ['inputContainer' => '<div class="mb-3">{{content}}</div>']
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('merit_id', [
                            'options' => $merits,
                            'class' => 'form-select',
                            'label' => ['class' => 'form-label'],
                            'template' => ['inputContainer' => '<div class="mb-3">{{content}}</div>']
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('Date_Received', [
                            'class' => 'form-control',
                            'label' => ['class' => 'form-label'],
                            'template' => ['inputContainer' => '<div class="mb-3">{{content}}</div>']
                        ]) ?>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<style>
    /* Dark mode styles */
    @media (prefers-color-scheme: dark) {
        .card {
            background-color: #2d3748;
            color: #fff;
        }
        
        .form-control, .form-select {
            background-color: #4a5568;
            border-color: #4a5568;
            color: #fff;
        }
        
        .form-control:focus, .form-select:focus {
            background-color: #4a5568;
            border-color: #6dd5ed;
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(109, 213, 237, 0.25);
        }
        
        .form-label {
            color: #fff;
        }

        .form-select option {
            background-color: #2d3748;
            color: #fff;
        }
    }

    /* General styling improvements */
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .form-control, .form-select {
        padding: 0.75rem 1rem;
        font-size: 1rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #2193b0;
        box-shadow: 0 0 0 0.25rem rgba(33, 147, 176, 0.25);
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
    }
    
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
</style>
