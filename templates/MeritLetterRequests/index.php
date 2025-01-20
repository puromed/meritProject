<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MeritLetterRequest> $meritLetterRequests
 */
?>

<?= $this->Html->css([
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
    'https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css',
    'datatables-custom'
]) ?>

<!-- custom css -->
<?= $this->Html->css('custom.css') ?>

<div class="meritLetterRequests index content mt-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #2193b0, #6dd5ed);">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0 text-white">
                    <i class="fas fa-file-alt me-2"></i><?= __('Merit Letter Requests') ?>
                </h3>
                <?= $this->Html->link(
                    '<i class="fas fa-plus"></i> ' . __('New Request'), 
                    ['action' => 'add'], 
                    ['class' => 'btn btn-light', 'escape' => false]
                ) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="meritLetterRequestsTable">
                    <thead>
                        <tr>
                            <th><?= __('ID') ?></th>
                            <th><?= __('Student') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('User') ?></th>
                            <th class="text-center" style="width: 150px;"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($meritLetterRequests as $meritLetterRequest): ?>
                        <tr>
                            <td><?= $this->Number->format($meritLetterRequest->id) ?></td>
                            <td>
                                <?= $meritLetterRequest->hasValue('student') ? 
                                    $this->Html->link(
                                        h($meritLetterRequest->student->name), 
                                        ['controller' => 'Students', 'action' => 'view', $meritLetterRequest->student->student_id],
                                        ['class' => 'text-decoration-none']
                                    ) : '' 
                                ?>
                            </td>
                            <td>
                                <span class="badge bg-<?= $meritLetterRequest->status === 'approved' ? 'success' : 
                                    ($meritLetterRequest->status === 'pending' ? 'warning' : 'secondary') ?>">
                                    <?= h($meritLetterRequest->status) ?>
                                </span>
                            </td>
                            <td><?= $meritLetterRequest->created->format('M d, Y H:i') ?></td>
                            <td><?= $meritLetterRequest->modified->format('M d, Y H:i') ?></td>
                            <td>
                                <?= $meritLetterRequest->hasValue('user') ? 
                                    $this->Html->link(
                                        h($meritLetterRequest->user->email), 
                                        ['controller' => 'Users', 'action' => 'view', $meritLetterRequest->user->id],
                                        ['class' => 'text-decoration-none']
                                    ) : '' 
                                ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(
                                        '<i class="fas fa-eye"></i>', 
                                        ['action' => 'view', $meritLetterRequest->id], 
                                        ['class' => 'btn btn-sm btn-outline-primary', 'escape' => false, 'title' => 'View']
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '<i class="fas fa-trash-alt"></i>', 
                                        ['action' => 'delete', $meritLetterRequest->id], 
                                        [
                                            'confirm' => __('Are you sure you want to delete request #{0}?', $meritLetterRequest->id), 
                                            'class' => 'btn btn-sm btn-outline-danger', 
                                            'escape' => false,
                                            'title' => 'Delete'
                                        ]
                                    ) ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php $this->append('script'); ?>
<script>
    $(document).ready(function() {
        $('#meritLetterRequestsTable').DataTable({
            "pageLength": 10,
            "order": [[0, "desc"]],
            "responsive": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Search...",
                "lengthMenu": "_MENU_ per page",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries to show",
                "infoFiltered": "(filtered from _MAX_ total entries)"
            },
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip'
        });
    });
</script>
<?php $this->end(); ?>
