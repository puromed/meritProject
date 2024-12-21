<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Merit Letter</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
        }
        h1 {
            text-align: center;
        }
        .content {
            margin-top: 30px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 0.9em;
            color: #888;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }
        .signature {
            margin-top: 50px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Official Merit Letter</h1>

    <div class="content">
        <p><strong>Date:</strong> <?= date('F j, Y') ?></p>
        <p><strong>Student Name:</strong> <?= h($meritLetterRequest->user->name) ?></p>
        <p><strong>Student ID:</strong> <?= h($meritLetterRequest->user->student_id) ?></p>

        <p>Dear <?= h($meritLetterRequest->user->name) ?>,</p>

        <p>We are pleased to provide you with your merit letter. Below is a summary of your achievements:</p>

        <table>
            <thead>
                <tr>
                    <th>Merit Title</th>
                    <th>Points</th>
                    <th>Date Awarded</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentMerits as $studentMerit): ?>
                <tr>
                    <td><?= h($studentMerit->merit->title) ?></td>
                    <td><?= h($studentMerit->merit->points) ?></td>
                    <td><?= h($studentMerit->date_awarded->format('Y-m-d')) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p>We commend you for your hard work and dedication.</p>

        <div class="signature">
            <p>Sincerely,</p>
            <p>[Your Institution]</p>
        </div>
    </div>

    <div class="footer">
        © <?= date('Y') ?> [Your Institution]. All rights reserved.
    </div>
</body>
</html>