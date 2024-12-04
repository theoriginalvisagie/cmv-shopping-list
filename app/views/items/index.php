<?php require APPROOT . '/views/includes/header.php'; ?>
  <?php flash('item_message'); ?>
  <div class='alert alert-success'>Github Repo: <a target='_blank' href='https://github.com/theoriginalvisagie/cmv-shopping-list'>cmv-shopping-list</a></div>
  <div class="row mb-3">
    <div class="col-md-6">
    <h1>My Shopping Items</h1>
    </div>
    <div class="col-md-6">
      <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/items/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Item</a>
    </div>
  </div>
  
  <ul class="list-group list-group-flush">
  <?php foreach($data as $key=>$value) : ?>
  <?php
        $checked = "";

        if($value['checked'] == "Yes"){
          $checked = "checked";
        }
      ?>
      <li class="list-group-item align-items-center">
        <input type='checkbox' id='checkbox_<?php echo $value['id']?>' name='checkbox_<?php echo $value['id']?>' <?php echo $checked;?> onchange="setItemAsChecked('<?php echo $value['id']?>')">
        <label for='checkbox_<?php echo $value['id']?>' class="card-title"><?php echo $value['item']." x ". $value['qty'] ?></label>
        <div class="tools">
          <a class="btn btn-warning" href="<?php echo URLROOT; ?>/items/edit/<?php echo $value['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <button class="btn btn-danger" onclick="removeItem('<?php echo $value['id']?>')"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
      </li>
  <?php endforeach; ?>
  </ul>
<?php require APPROOT . '/views/includes/footer.php'; ?>