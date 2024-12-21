<h1>Manage Merit Letter Requests</h1>

<table>
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Status</th>
            <th>Date Submitted</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($meritLetterRequests as $request): ?>
        <tr>
            <td><?= h($request->user->name) ?></td>
            <td><?= h($request->status) ?></td>
            <td><?= h($request->created->format('Y-m-d H:i')) ?></td>
            <td>
                <?= $this->Html->link('Approve', ['action' => 'approve', $request->id]) ?>
                <?= $this->Html->link('Deny', ['action' => 'deny', $request->id]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>