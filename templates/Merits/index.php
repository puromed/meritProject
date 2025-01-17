<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Merit> $merits
 */
?>
<!-- css file -->
 <?php 
    echo $this->Html->css("custom.css") 
?>  
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>
<div class="container-fluid p-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Merits Management</h3>
            <?= $this->Html->link(
                '<i class="fas fa-plus"></i> Add New Merit',
                ['action' => 'add'],
                ['class' => 'btn btn-primary', 'escape' => false]
            ) ?>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="meritsTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Merit ID</th>
                                <th>Merit Type</th>
                                <th>Points</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($merits as $merit): ?>
                            <tr>
                                <td><?= h($merit->merit_id) ?></td>
                                <td><?= h($merit->merit_type) ?></td>
                                <td><?= h($merit->points) ?></td>
                                <td><?= h($merit->description) ?></td>
                                <td>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-eye"></i>',
                                        ['action' => 'view', $merit->merit_id],
                                        ['class' => 'btn btn-sm btn-outline-primary me-1', 'escape' => false]
                                    ) ?>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-edit"></i>',
                                        ['action' => 'edit', $merit->merit_id],
                                        ['class' => 'btn btn-sm btn-outline-primary me-1', 'escape' => false]
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '<i class="fas fa-trash"></i>',
                                        ['action' => 'delete', $merit->merit_id],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', $merit->merit_id),
                                            'class' => 'btn btn-sm btn-outline-danger',
                                            'escape' => false
                                        ]
                                    ) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->append('script'); ?>
<script>
    $(document).ready(function(){
        $('#meritsTable').DataTable({
            responsive: true,
            pageLength: 10,
            dom: '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
            language: {
                search: "Search records:",
                lengthMenu: "_MENU_ records per page"
            },
            columns: [
                null, // Merit ID
                null, // Merit Type
                null, // Points
                null, // Description
                { orderable: false } // Actions
            ],
            drawCallback: function() {
                $('.btn-group .btn').addClass('rounded-pill');
                $('.btn-outline-secondary').addClass('btn-sm');
            },
            classes: {
                sWrapper: "dataTables_wrapper dt-bootstrap5",
                sFilterInput: "form-control form-control-sm",
                sLengthSelect: "form-select form-select-sm",
                sProcessing: "dataTables_processing card"
            }
        });
    });
</script>
<?php $this->end(); ?>