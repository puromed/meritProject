<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\StudentMerit> $studentMerits
 */
?>
<!-- css file -->
<?php 
    echo $this->Html->css("indexStudentMerits.css") 
?> 
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>
<div class="container-fluid p-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Student Merits Management</h3>
            <?= $this->Html->link(
                '<i class="fas fa-plus"></i> Add New Student Merit',
                ['action' => 'add'],
                ['class' => 'btn btn-primary', 'escape' => false]
            ) ?>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="studentMeritsTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Merit ID</th>
                                <th>Student</th>
                                <th>Merit Type</th>
                                <th>Date Received</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($studentMerits as $studentMerit): ?>
                            <tr>
                                <td><?= h($studentMerit->student_merit_id) ?></td>
                                <td><?= $studentMerit->has('student') ? h($studentMerit->student->name) : '' ?></td>
                                <td><?= $studentMerit->has('merit') ? h($studentMerit->merit->merit_type) : '' ?></td>
                                <td><?= $studentMerit->Date_Received ? $studentMerit->Date_Received->format('d M Y') : '-' ?></td>
                                <td>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-eye"></i>',
                                        ['action' => 'view', $studentMerit->student_merit_id],
                                        ['class' => 'btn btn-sm btn-outline-primary me-1', 'escape' => false]
                                    ) ?>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-edit"></i>',
                                        ['action' => 'edit', $studentMerit->student_merit_id],
                                        ['class' => 'btn btn-sm btn-outline-primary me-1', 'escape' => false]
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '<i class="fas fa-trash"></i>',
                                        ['action' => 'delete', $studentMerit->student_merit_id],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', $studentMerit->student_merit_id),
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
        $('#studentMeritsTable').DataTable({
            responsive: true,
            pageLength: 10,
            dom: '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
            language: {
                search: "Search records:",
                lengthMenu: "_MENU_ records per page"
            },
            columns: [
                null, // Merit ID
                null, // Student
                null, // Merit Type
                null, // Date Received
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