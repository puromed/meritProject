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

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading mb-3 mt-4"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->student_id], ['class' => 'actions text-white px-2 py-2 bg-success rounded-3']) ?>
            <?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->student_id), 'class' => 'actions text-white px-2 py-2 bg-danger rounded-3']) ?>
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'actions text-white px-2 py-2 bg-primary rounded-3']) ?>
            <?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'actions text-white px-2 py-2 bg-success rounded-3']) ?>
        </div>
    </aside>
    <div class="column mt-4 column-80">
        <div class="students view content">
            <h3><?= h($student->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($student->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($student->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($student->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($student->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address1') ?></th>
                    <td><?= h($student->address1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address2') ?></th>
                    <td><?= h($student->address2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postcode') ?></th>
                    <td><?= h($student->postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($student->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($student->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Student Id') ?></th>
                    <td><?= $this->Number->format($student->student_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Of Birth') ?></th>
                    <td><?= h($student->date_of_birth) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($student->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($student->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>