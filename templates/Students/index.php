<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Student> $students
 */
?>
<!-- external css -->
<?php 
    echo $this->Html->css('custom.css') 
?> 
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
?>

<?php $this->assign('title', 'Manage Students');
?>

<div class="container-fluid p-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Students Management</h3>
            <?= $this->Html->link(
                '<i class="fas fa-plus"></i> Add New Student',
                ['action' => 'add'],
                ['class' => 'btn btn-primary', 'escape' => false]
            ) ?>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="studentsTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?= h($student->student_id) ?></td>
                                <td><?= h($student->name) ?></td>
                                <td><?= $student->date_of_birth ? $student->date_of_birth->format('d M Y') : '-' ?></td>
                                <td><?= h($student->gender) ?></td>
                                <td><?= h($student->email) ?></td>
                                <td><?= h($student->phone_number) ?></td>
                                <td>
                                    <?= h($student->address1) ?>
                                    <?= $student->address2 ? ', ' . h($student->address2) : '' ?>
                                    <br>
                                    <?= h($student->postcode) ?> <?= h($student->city) ?>, <?= h($student->state) ?>
                                </td>
                                <td>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-eye"></i>',
                                        ['action' => 'view', $student->student_id],
                                        ['class' => 'btn btn-sm btn-outline-primary me-1', 'escape' => false]
                                    ) ?>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-edit"></i>',
                                        ['action' => 'edit', $student->student_id],
                                        ['class' => 'btn btn-sm btn-outline-primary me-1', 'escape' => false]
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '<i class="fas fa-trash"></i>',
                                        ['action' => 'delete', $student->student_id],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', $student->student_id),
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
        $('#studentsTable').DataTable({
            responsive: true,
            pageLength: 10,
            dom: '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
            language: {
                search: "Search records:",
                lengthMenu: "_MENU_ records per page"
            },
            columns: [
                null, // Student ID
                null, // Name
                null, // Date of Birth
                null, // Gender
                null, // Email
                null, // Phone
                null, // Address
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