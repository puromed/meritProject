<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MeritLetterRequest> $meritLetterRequests
 */
?>

<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') ?>

<div class="meritLetterRequests index content rounded-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="h5 mb-0"><?= __('Merit Letter Requests') ?></h3>
        </div>
        <div class="card-body">
            <div class="table-responsive rounded-4">
                <table id="meritLetterRequestsTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student ID</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Modified</th>
                            <th>User ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($meritLetterRequests as $meritLetterRequest): ?>
                        <tr>
                            <td><?= h($meritLetterRequest->id) ?></td>
                            <td><?= h($meritLetterRequest->student_id) ?></td>
                            <td><?= h($meritLetterRequest->status) ?></td>
                            <td><?= h($meritLetterRequest->created) ?></td>
                            <td><?= h($meritLetterRequest->modified) ?></td>
                            <td><?= h($meritLetterRequest->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $meritLetterRequest->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?php if ($meritLetterRequest->status === 'pending'): ?>
                                    <?= $this->Form->postLink(__('Approve'), 
                                        ['action' => 'approve', $meritLetterRequest->id],
                                        ['escape' => false, 'class' => 'btn btn-sm btn-success', 'confirm' => __('Are you sure you want to approve this request?')]
                                    ) ?>
                                    <?= $this->Form->postLink(__('Deny'), 
                                        ['action' => 'deny', $meritLetterRequest->id],
                                        ['escape' => false, 'class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to deny this request?')]
                                    ) ?>
                                <?php endif; ?>
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
    $(document).ready(function(){
        $('#meritLetterRequestsTable').DataTable({
            responsive: true,
            pageLength: 10,
            language: {
                search: "Search request types:",
                lengthMenu: "Show _MENU_ request type per page",
                info: "Showing _START_ to _END_ of _TOTAL_ request types"
            },
            columns: [
                null, // ID
                null, // Student ID
                null, // Status
                null, // Created
                null, // Modified
                null, // User ID
                {orderable: false} // Actions column - disable sorting
            ]
        });
    });
</script>
<?php $this->end(); ?>