<?php
$this->assign('title', 'My Profile');
?>

<div class="container py-4">
    <div class="row">
        <!-- Profile Information Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Personal Information</h5>
                    <div class="mb-3">
                        <label class="text-muted">Student ID</label>
                        <p class="mb-2"><?= h($student->student_id) ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted">Name</label>
                        <p class="mb-2"><?= h($student->name) ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted">Email</label>
                        <p class="mb-2"><?= h($student->email) ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted">Phone Number</label>
                        <p class="mb-2"><?= h($student->phone_number) ?></p>
                    </div>
                    <?= $this->Html->link(
                        'Edit Profile',
                        ['action' => 'edit', $student->student_id],
                        ['class' => 'btn btn-primary']
                    ) ?>
                </div>
            </div>
        </div>

        <!-- Merit Points and Activities Card -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Merit Points Summary</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Activity</th>
                                    <th>Merit Type</th>
                                    <th>Points</th>
                                    <th>Date Received</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($student->student_merits as $merit): ?>
                                <tr>
                                    <td><?= h($merit->activity->activity_name ?? 'N/A') ?></td>
                                    <td><?= h($merit->merit->merit_type ?? 'N/A') ?></td>
                                    <td><?= h($merit->points) ?></td>
                                    <td><?= $merit->Date_Received ? $merit->Date_Received->format('d M Y') : 'N/A' ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Address Information Card -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Address Information</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Address Line 1</label>
                            <p class="mb-2"><?= h($student->address1) ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Address Line 2</label>
                            <p class="mb-2"><?= h($student->address2) ?></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted">Postcode</label>
                            <p class="mb-2"><?= h($student->postcode) ?></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted">City</label>
                            <p class="mb-2"><?= h($student->city) ?></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted">State</label>
                            <p class="mb-2"><?= h($student->state) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>