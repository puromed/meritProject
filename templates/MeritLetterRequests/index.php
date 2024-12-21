<h1>Your Merit Letter Requests</h1>

<table>
    <thead>
        <tr>
            <th>Status</th>
            <th>Date Submitted</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($meritLetterRequests as $request): ?>
        <tr>
            <td><?= h($request->status) ?></td>
            <td><?= h($request->created->format('Y-m-d H:i')) ?></td>
            <td>
                <?php if ($request->status === 'approved'): ?>
                    <?= $this->Html->link('Download Letter', ['action' => 'download', $request->id]) ?>
                <?php else: ?>
                    <?= __('Not Available') ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>