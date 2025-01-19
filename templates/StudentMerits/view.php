<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentMerit $studentMerit
 */
?>
<!-- css file -->
<?php 
    echo $this->Html->css("studentMeritsView.css") 
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
                    <?= $this->Html->link(
                        '<i class="fas fa-edit me-2"></i>' . __('Edit Merit'),
                        ['action' => 'edit', $studentMerit->student_merit_id],
                        ['class' => 'btn btn-primary', 'escape' => false]
                    ) ?>
                    <?= $this->Form->postLink(
                        '<i class="fas fa-trash-alt me-2"></i>' . __('Delete Merit'),
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
                    <?= $this->Html->link(
                        '<i class="fas fa-plus me-2"></i>' . __('New Merit'),
                        ['action' => 'add'],
                        ['class' => 'btn btn-success', 'escape' => false]
                    ) ?>
                </div>
            </div>
        </div>
    </aside>
    
    <div class="column col-md-9">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #2193b0, #6dd5ed);">
                <h3 class="card-title mb-0 text-white">
                    <i class="fas fa-award me-2"></i><?= __('Merit Details') ?>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <tbody>
                            <tr>
                                <th class="bg-light" style="width: 200px;">
                                    <i class="fas fa-user me-2"></i><?= __('Student') ?>
                                </th>
                                <td><?= $studentMerit->hasValue('student') ? $this->Html->link($studentMerit->student->name, ['controller' => 'Students', 'action' => 'view', $studentMerit->student->student_id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-medal me-2"></i><?= __('Merit') ?>
                                </th>
                                <td><?= $studentMerit->hasValue('merit') ? $this->Html->link($studentMerit->merit->merit_type, ['controller' => 'Merits', 'action' => 'view', $studentMerit->merit->merit_id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-hashtag me-2"></i><?= __('Student Merit Id') ?>
                                </th>
                                <td><?= $this->Number->format($studentMerit->student_merit_id) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-calendar me-2"></i><?= __('Date Received') ?>
                                </th>
                                <td><?= h($studentMerit->Date_Received) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-clock me-2"></i><?= __('Created') ?>
                                </th>
                                <td><?= h($studentMerit->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-clock me-2"></i><?= __('Modified') ?>
                                </th>
                                <td><?= h($studentMerit->modified) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
        
        .table {
            color: #fff;
        }
        
        .bg-light {
            background-color: #4a5568 !important;
            color: #fff;
        }
        
        .table > :not(caption) > * > * {
            background-color: #2d3748;
            color: #fff;
        }
        
        .table-hover tbody tr:hover {
            background-color: #4a5568;
            color: #fff;
        }

        /* Style links in dark mode */
        .table a {
            color: #6dd5ed;
            text-decoration: none;
        }

        .table a:hover {
            color: #2193b0;
            text-decoration: underline;
        }
    }

    /* General styling improvements */
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .table th {
        font-weight: 600;
    }
    
    .table td {
        padding: 1rem;
    }
    
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
    }

    /* Style links in light mode */
    .table a {
        color: #2193b0;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .table a:hover {
        color: #6dd5ed;
        text-decoration: underline;
    }
</style>