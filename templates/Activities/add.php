<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 * @var \Cake\Collection\CollectionInterface|string[] $merits
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Activities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="activities form content">
            <?= $this->Form->create($activity) ?>
            <fieldset>
                <legend><?= __('Add Activity') ?></legend>
                <?php
                    echo $this->Form->control('activity_name');
                    echo $this->Form->control('merit_id', ['options' => $merits, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
