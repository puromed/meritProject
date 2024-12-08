<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 * @var string[]|\Cake\Collection\CollectionInterface $merits
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $activity->activity_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $activity->activity_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Activities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="activities form content">
            <?= $this->Form->create($activity) ?>
            <fieldset>
                <legend><?= __('Edit Activity') ?></legend>
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
