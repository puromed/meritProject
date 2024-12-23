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
            margin: 0px;
            padding: 0px;
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
        padding: 40mm 20mm; /* Adjust padding as needed */
        box-shadow: none;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header h2 {
        margin-bottom: 5px;
    }

    .header small {
        display: block;
    }

    .recipient-info p {
        margin-bottom: 2px;
    }

    .body-text {
        font-family: 'Times New Roman', serif;
        text-align: justify;
    }

    .body-text p {
        margin-bottom: 10px;
    }

    .body-text table {
        width: auto;
        margin: 20px 0;
        border-collapse: collapse;
    }

    .body-text table td {
        padding: 5px;
        border: 1px solid #000;
    }

    .closing {
        margin-top: 30px;
    }

    .closing p {
        margin-bottom: 2px;
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
