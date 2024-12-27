<?php
$this->assign('title', h($activity->activity_name));
?>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class = "card-title mb-0"><?= h($activity->activity_name) ?></h3>
                    <span class="badge bg-<?= $activity->status === 'open' ? 'success' : 'secondary' ?>">
                            <?= ucfirst(h($activity->status)) ?>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5><i class="fa fa-calendar"></i> Date & Time</h5>
                            <p><?= $activity->activity_date->format('d M Y, h:i: A') ?></p>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fa fa-map-marker"></i> Location</h5>
                            <p><?= h($activity->location) ?></p>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5>Description</h5>
                    <p><?= nl2br(h($activity->description)) ?></p>
                </div>

                <div class="mb-4">
                    <h5>Merit Points</h5>
                    <div class="badge bg-primary fs-6">
                        <?= $activity->merit->points ?> Points
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <?= $this->Html->link(
                    '<i class="fa fa-arrow-left"></i> Back to Activities',
                    ['action' => 'index'],
                    ['class' => 'btn btn-secondary', 'escape' => false]
                ) ?>

                <?php if ($this->Identity->get('role') === 'admin'): ?>
                <div>
                    <?= $this->Html->link(
                        '<i class="fa fa-pencil"></i> Edit',
                        ['action' => 'edit', $activity->activity_id],
                        ['class' => 'btn btn-primary', 'escape' => false]
                    ) ?>
                    <?= $this->Form->postLink(
                        '<i class="fa fa-trash"></i> Delete',
                        ['action' => 'delete', $activity->id],
                        ['class' => 'btn btn-danger', 'escape' => false]
                    ) ?>
                </div>
                <?php elseif ($activity->status === 'open'): ?>
                    <?= $this->Form->postLink(
                        '<i class="fa fa-check"></i> Join Activity',
                        ['action' => 'join', $activity->activity_id],
                        ['class' => 'btn btn-success', 'escape' => false]
                    ) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>