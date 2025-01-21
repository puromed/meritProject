<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeritLetterRequest $meritLetterRequest
 */
?>
<style>
    @page {
        margin: 0px;
        padding: 0px;
    }
    
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
    }

    .top-bar {
        width: 100%;
        height: 25px;
        margin-bottom: 20px;
    }

    .bar-blue {
        width: 72%;
        height: 25px;
        background: #292983;
        float: left;
    }

    .bar-purple {
        margin-left: 72%;
        height: 25px;
        background: #912890;
    }

    .container {
        padding: 20px 40px;
    }

    .header {
        text-align: right;
        margin-bottom: 20px;
    }

    .uitm-logo {
        width: 250px;
        margin-bottom: 20px;
    }

    .reference-section {
        text-align: right;
        margin-bottom: 30px;
        font-size: 24px;
    }

    .recipient-section {
        margin-bottom: 30px;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        margin: 30px 0;
        text-transform: uppercase;
    }

    .content {
        text-align: justify;
    }

    table.info-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        text-transform: uppercase;
    }

    table.info-table td {
        padding: 8px;
        border: 1px solid #000;
    }

    table.info-table td:first-child {
        width: 30%;
        background-color: #f5f5f5;
    }

    .footer {
        margin-top: 50px;
        text-align: right;
    }

    .footer img {
        width: 250px;
        margin: 10px 0;
    }

    hr {
        border: none;
        border-top: 1px solid #000;
        margin: 20px 0;
    }
</style>

<div class="top-bar">
    <div class="bar-blue"></div>
    <div class="bar-purple"></div>
</div>

<div class="container">
    <div class="header">
        <?= $this->Html->image('surat/LogoUiTM.png', ['fullBase' => true, 'class' => 'uitm-logo', 'width' => '170px']) ?>
    </div>

    <hr>

    <div class="reference-section">
        <div>Reference: MLR-<?= $meritLetterRequest->id ?></div>
        <div>Date: <?= $meritLetterRequest->modified->format('d F Y') ?></div>
    </div>

    <div class="recipient-section">
        <p>Universiti Teknologi MARA</p>
        <p>Jalan Pulau Indah Au10/A, Puncak perdana</p>
        <p>40150,Shah Alam,Selangor Darul Ehsan</p>
        <p>Malaysia</p>
    </div>

    <div class="title">Merit Achievement Letter</div>

    <div class="content">
        <p>Dear Sir/Madam,</p>

        <table class="info-table">
            <tr>
                <td>Student Name</td>
                <td><?= h($meritLetterRequest->student->name) ?></td>
            </tr>
            <tr>
                <td>Student ID</td>
                <td><?= h($meritLetterRequest->student->student_id) ?></td>
            </tr>
            <tr>
                <td>Total Merit Points</td>
                <td><?= number_format($totalMerits->total ?? 0) ?></td>
            </tr>
            <tr>
                <td>College</td>
                <td>Kolej Jasmine</td>
            </tr>
        </table>

        <p>We are pleased to inform that student <?= h($meritLetterRequest->student->name) ?> has been approved for their college for the next semester. Please bring this letter to your college for further action.</p>

        <p>We trust that this letter will serve as a formal record of their accomplishment. If you have any questions, please contact us at <em>meritPro@yourdomain.edu</em>.</p>

        <p>Sincerely,</p>
        <p>
            <strong>Merit Program</strong><br>
            <strong>Student Affairs Department</strong><br>
            <strong>Universiti Teknologi MARA</strong>
        </p>
    </div>

    <hr>

    <div class="footer">
        <?= $this->Html->image('surat/ISO.png', ['fullBase' => true]) ?><br>
        <?= $this->Html->image('surat/uitmdihatiku.png', ['fullBase' => true]) ?>
    </div>
</div>

<!-- <div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Actions</h5>
        </div>
        <div class="card-body">
            <div class="text-center my-3"></div>


