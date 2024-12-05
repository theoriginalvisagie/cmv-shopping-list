<?php require APPROOT . '/views/includes/header.php'; ?>
  <?php flash('list_message'); ?>
  <div class='alert alert-success'>Github Repo: <a target='_blank' href='https://github.com/theoriginalvisagie/cmv-shopping-list'>cmv-shopping-list</a></div>
  <div class="row mb-3">
    <div class="col-md-6">
    <h1>My Lists</h1>
    </div>
    <div class="col-md-6">
      <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/lists/add"><i class="fa fa-pencil" aria-hidden="true"></i> Create New List</a>
    </div>
  </div>

    <table class="table table-striped">
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach ($data['lists'] as $list): ?>
                <tr>
                    <td><?php echo htmlspecialchars($list['name']); ?></td>
                    <td><?php echo htmlspecialchars($list['description']); ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?php echo URLROOT; ?>/lists/edit/<?php echo $list['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <button class="btn btn-danger" onclick="removeList('<?php echo $list['id']?>')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php require APPROOT . '/views/includes/footer.php'; ?>