<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeritLetterRequest $meritLetterRequest
 */
?>
<style>
    @media print {
        @page {
            size: A4;
            margin: 20mm;
        }
    }

    body {
        font-size: 12pt;
    }

    .a4-container {
        width: calc(210mm - 40px);
        min-height: 297mm;
        border: 1px solid #ccc;
        padding: 20mm;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="row">
    <div class="col-md-8 a4-container">
        <div class="card-body text-body-secondary">
            <?php if ($meritLetterRequest->status === 'approved'): ?>
                <div class="row text-body-secondary p-4">
                    <div class="col-10">
                        <h2 class="my-0">MERIT ACHIEVEMENT LETTER</h2>
                        <small>Reference: MLR-<?= $meritLetterRequest->id ?></small><br />
                        <small>Date: <?= $meritLetterRequest->modified->format('d F Y') ?></small>
                    </div>
                    <div class="col-2 text-end">
                        <?php echo $this->Html->image('../img/logo.png', ['width' => '220px']) ?>
                    </div>
                    <hr />
                    <div class="row px-4 mb-4">
                        <div class="col-12">
                            <p class="mb-0">Recipient Name</p>
                            <p class="mb-0">Recipient Address</p>
                            <p class="mb-0">Recipient City, Postal Code</p>
                            <p class="mb-0">Recipient Country</p>
                        </div>
                    </div>

                    <div class="row px-4">
                        <div class="col-12">
                            <p>Dear Sir/Madam,</p>
                            <table width="100%" class="table table-bordered">
                                <tr>
                                    <td>Student Name</td>
                                    <td>:</td>
                                    <td><?= h($meritLetterRequest->student->name) ?></td>
                                </tr>
                                <tr>
                                    <td>Student ID</td>
                                    <td>:</td>
                                    <td><?= h($meritLetterRequest->student_id) ?></td>
                                </tr>
                            </table>
                            <p>This letter certifies that the above-named student has successfully attained merit recognition. They have demonstrated outstanding achievements and satisfied all the requirements of our academic program.</p>

                            <p>We trust that this letter will serve as a formal record of their accomplishment. If you have any questions, please contact us at <em>info@yourdomain.edu</em>.</p>

                            <p>Sincerely,</p>
                            <p>
                                <strong>[Signatory Name]</strong><br />
                                <strong>[Signatory Title]</strong><br />
                                Your Institution
                            </p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <p>This Merit Letter Request is not approved yet.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Actions</h5>
            </div>
            <div class="card-body">
                <?php echo $this->Html->link(
                    '<i class="fas fa-file-pdf"></i> Download PDF',
                    ['action' => 'pdf', $meritLetterRequest->id],
                    ['class' => 'btn btn-primary w-100', 'escapeTitle' => false]
                ); ?>
            </div>
        </div>
    </div>
</div>
