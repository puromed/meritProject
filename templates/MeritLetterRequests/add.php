<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeritLetterRequest $meritLetterRequest
 */
?>
<div class="row mt-4 px-4">
    <aside class="col-md-3">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #2193b0, #6dd5ed);">
                <h4 class="card-title mb-0 text-white">
                    <i class="fas fa-cog me-2"></i><?= __('Actions') ?>
                </h4>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <?= $this->Html->link(
                        '<i class="fas fa-list me-2"></i>' . __('List Requests'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-info text-white', 'escape' => false]
                    ) ?>
                </div>
            </div>
        </div>
    </aside>
    
    <div class="col-md-9">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #2193b0, #6dd5ed);">
                <h3 class="card-title mb-0 text-white">
                    <i class="fas fa-file-alt me-2"></i><?= __('Request Merit Letter') ?>
                </h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($meritLetterRequest, ['class' => 'needs-validation']) ?>
                <fieldset>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Requesting merit letter for: <strong><?= h($student->name) ?></strong>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit Request'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --text-color-light: #212529;
        --text-color-dark: #ffffff;
        --bg-color-light: #ffffff;
        --bg-color-dark: #2d3748;
    }

    /* Light mode styles */
    body {
        color: var(--text-color-light);
    }

    /* Dark mode styles */
    @media (prefers-color-scheme: dark) {
        body {
            color: var(--text-color-dark);
        }

        .card {
            background-color: var(--bg-color-dark);
            color: var(--text-color-dark);
        }
        
        .card-header:not(.bg-gradient) {
            background-color: #1a202c;
            color: var(--text-color-dark);
        }
        
        .alert-info {
            background-color: #2a4365;
            border-color: #2c5282;
            color: var(--text-color-dark);
        }
        
        .btn-primary {
            background-color: #4299e1;
            border-color: #4299e1;
            color: var(--text-color-dark);
        }
        
        .btn-primary:hover {
            background-color: #2b6cb0;
            border-color: #2b6cb0;
        }
        
        .btn-info {
            background-color: #4299e1;
            border-color: #4299e1;
            color: var(--text-color-dark);
        }
        
        .form-control {
            background-color: var(--bg-color-dark);
            border-color: #4a5568;
            color: var(--text-color-dark);
        }
        
        .form-control:focus {
            background-color: var(--bg-color-dark);
            border-color: #4299e1;
            color: var(--text-color-dark);
        }

        /* Ensure footer text is visible */
        footer {
            color: var(--text-color-dark) !important;
        }
    }

    /* General styling improvements */
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
    }

    /* Ensure footer text is visible in light mode */
    footer {
        color: var(--text-color-light) !important;
    }
</style>