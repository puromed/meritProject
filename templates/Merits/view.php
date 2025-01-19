<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merit $merit
 */
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
                        ['action' => 'edit', $merit->merit_id],
                        ['class' => 'btn btn-primary', 'escape' => false]
                    ) ?>
                    <?= $this->Form->postLink(
                        '<i class="fas fa-trash-alt me-2"></i>' . __('Delete Merit'),
                        ['action' => 'delete', $merit->merit_id],
                        [
                            'confirm' => __('Are you sure you want to delete # {0}?', $merit->merit_id),
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
                    <i class="fas fa-medal me-2"></i><?= __('Merit Details') ?>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <tbody>
                            <tr>
                                <th class="bg-light" style="width: 200px;">
                                    <i class="fas fa-hashtag me-2"></i><?= __('Merit Id') ?>
                                </th>
                                <td><?= $this->Number->format($merit->merit_id) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-tag me-2"></i><?= __('Merit Type') ?>
                                </th>
                                <td><?= h($merit->merit_type) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-star me-2"></i><?= __('Merit Points') ?>
                                </th>
                                <td><?= $merit->points !== null ? $this->Number->format($merit->points) : '' ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-clock me-2"></i><?= __('Created') ?>
                                </th>
                                <td><?= h($merit->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <i class="fas fa-clock me-2"></i><?= __('Modified') ?>
                                </th>
                                <td><?= h($merit->modified) ?></td>
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
