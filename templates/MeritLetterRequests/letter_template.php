<div class="letter-content">
    <h2>Merit Achievement Letter</h2>
    <p>This letter certifies that <?= h($student->name) ?> has achieved the following merits:</p>
    <ul>
    <?php foreach ($studentMerits as $merit): ?>
        <li><?= h($merit->merit->merit_type) ?> - <?= h($merit->Date_Received) ?></li>
    <?php endforeach; ?>
    </ul>
</div>