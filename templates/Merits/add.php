<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merit $merit
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Merits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="merits form content">
            <?= $this->Form->create($merit) ?>
            <fieldset>
                <legend><?= __('Add Merit') ?></legend>
                <?php
                    echo $this->Form->control('merit_type');
                    echo $this->Form->control('description');
                    echo $this->Form->control('points');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
