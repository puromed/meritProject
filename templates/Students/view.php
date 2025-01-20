<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>

<!-- css file -->
<?php 
    echo $this->Html->css("custom.css") 
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
                        '<i class="fas fa-edit me-2"></i>' . __('Edit Student'),
                        ['action' => 'edit', $student->student_id],
                        ['class' => 'btn btn-primary', 'escape' => false]
                    ) ?>
                    <?= $this->Form->postLink(
                        '<i class="fas fa-trash-alt me-2"></i>' . __('Delete Student'),
                        ['action' => 'delete', $student->student_id],
                        [
                            'confirm' => __('Are you sure you want to delete # {0}?', $student->student_id),
                            'class' => 'btn btn-danger',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-list me-2"></i>' . __('List Students'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-info text-white', 'escape' => false]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-plus me-2"></i>' . __('New Student'),
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
                    <i class="fas fa-user me-2"></i><?= h($student->name) ?>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <tbody>
                            <tr>
                                <th class="bg-light" style="width: 200px;">
                                    <i class="fas fa-id-card me-2"></i><?= __('Name') ?>
                                </th>
                                <td><?= h($student->name) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-venus-mars me-2"></i><?= __('Gender') ?>
                                </th>
                                <td><?= h($student->gender) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-envelope me-2"></i><?= __('Email') ?>
                                </th>
                                <td><?= h($student->email) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-phone me-2"></i><?= __('Phone Number') ?>
                                </th>
                                <td><?= h($student->phone_number) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-map-marker-alt me-2"></i><?= __('Address1') ?>
                                </th>
                                <td><?= h($student->address1) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-map-marker-alt me-2"></i><?= __('Address2') ?>
                                </th>
                                <td><?= h($student->address2) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-map-pin me-2"></i><?= __('Postcode') ?>
                                </th>
                                <td><?= h($student->postcode) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-city me-2"></i><?= __('City') ?>
                                </th>
                                <td><?= h($student->city) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-map me-2"></i><?= __('State') ?>
                                </th>
                                <td><?= h($student->state) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-hashtag me-2"></i><?= __('Student Id') ?>
                                </th>
                                <td><?= $this->Number->format($student->student_id) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-calendar me-2"></i><?= __('Date Of Birth') ?>
                                </th>
                                <td><?= h($student->date_of_birth) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-clock me-2"></i><?= __('Created') ?>
                                </th>
                                <td><?= h($student->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-clock me-2"></i><?= __('Modified') ?>
                                </th>
                                <td><?= h($student->modified) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add custom CSS for dark mode support -->
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
</style>