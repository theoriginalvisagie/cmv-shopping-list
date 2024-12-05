<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('notifications_message'); ?>
    <div class='alert alert-success'>Github Repo: <a target='_blank' href='https://github.com/theoriginalvisagie/cmv-shopping-list'>cmv-shopping-list</a></div>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>My Notifications</h1>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Item</th>
        <th>Actions</th>
        </thead>
        <tbody>
        <?php foreach ($data['notifications'] as $value): ?>
            <tr>
                <td><?php echo htmlspecialchars($value['name']); ?></td>
                <td><?php echo htmlspecialchars($value['description']); ?></td>
                <td><?php echo htmlspecialchars($value['item_id']); ?></td>
                <td>
                    <button class="btn btn-info" onclick="markAsRead('<?php echo $value['id']?>')">Mark As Read</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php require APPROOT . '/views/includes/footer.php'; ?>