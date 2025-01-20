<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeritLetterRequest $meritLetterRequest
 */
?>
<style>
  @page {
    margin: 0px 0px 0px 0px !important;
    padding: 0px 0px 0px 0px !important;
  }

  
</style>

<div class="a4-container">
    <?php if ($meritLetterRequest->status === 'approved'): ?>
        <div class="header">
            <h2>MERIT ACHIEVEMENT LETTER</h2>
            <small>Reference: MLR-<?= $meritLetterRequest->id ?></small>
            <small>Date: <?= $meritLetterRequest->modified->format('d F Y') ?></small>
        </div>

        <div class="recipient-info">
            <p>Recipient Name</p>
            <p>Recipient Address</p>
            <p>Recipient City, Postal Code</p>
            <p>Recipient Country</p>
        </div>

        <div class="body-text">
            <p>Dear Sir/Madam,</p>
            <table>
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
        </div>

        <div class="closing">
            <p>Sincerely,</p>
            <p>
                <strong>[Signatory Name]</strong><br />
                <strong>[Signatory Title]</strong><br />
                Your Institution
            </p>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-12">
                <p>This Merit Letter Request is not approved yet.</p>
            </div>
        </div>
    <?php endif; ?>
</div>
