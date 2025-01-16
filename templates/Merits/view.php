<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merit $merit
 */
?>
<!-- Load external CSS and Bootstrap -->
<?php 
    echo $this->Html->css("custom.css"); 
    echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<div class="row mt-4">
    <aside class="col-md-3">
        <div class="side-nav p-3 bg-light rounded">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <div class="list-group">
                <?= $this->Html->link(__('Edit Merit'), ['action' => 'edit', $merit->merit_id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Delete Merit'), ['action' => 'delete', $merit->merit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $merit->merit_id), 'class' => 'list-group-item list-group-item-action text-danger']) ?>
                <?= $this->Html->link(__('List Merits'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('New Merit'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="merits view content p-4 border rounded bg-white">
            <h3 class="mb-4"><?= h($merit->merit_type) ?></h3>
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <th><?= __('Merit Type') ?></th>
                        <td><?= h($merit->merit_type) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= h($merit->description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Merit Id') ?></th>
                        <td><?= $this->Number->format($merit->merit_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Points') ?></th>
                        <td><?= $this->Number->format($merit->points) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($merit->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($merit->modified) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
