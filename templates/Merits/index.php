<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Merit> $merits
 */
?>
<!-- css file -->
 <?php 
    echo $this->Html->css("meritsIndex.css") 
?>  
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>
<div class="merits index content" rounded-4>
    <?= $this->Html->link(__('New Merit'), ['action' => 'add'], ['class' => 'button rounded-3']) ?>
    <h3><?= __('Merits') ?></h3>
    <div class="table-responsive rounded-4"> 
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('merit_id') ?></th>
                    <th><?= $this->Paginator->sort('merit_type') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('points') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($merits as $merit): ?>
                <tr>
                    <td><?= $this->Number->format($merit->merit_id) ?></td>
                    <td><?= h($merit->merit_type) ?></td>
                    <td><?= h($merit->description) ?></td>
                    <td><?= $this->Number->format($merit->points) ?></td>
                    <td><?= h($merit->created) ?></td>
                    <td><?= h($merit->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $merit->merit_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merit->merit_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merit->merit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $merit->merit_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>