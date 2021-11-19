<?php

use PhpParser\Node\Expr\Cast\String_;

include_once('API.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Test Project By Nirob!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="style.css">

</head>



<body>
  <?php

  $api = new API('https://jsonplaceholder.typicode.com/posts');
  $lists = json_decode($api->getApiData());
  ?>
  <div class="container">
    <h2>API Basic Test</h2>


    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">ID </th>
          <th class="th-sm">User ID </th>
          <th class="th-sm">Title </th>
          <th class="th-sm">Action </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lists as $index => $list) {   ?>
          <tr>
            <td><?= $list->id; ?></td>
            <td><?= $list->userId; ?></td>
            <td><?= $list->title; ?></td>
            <td>
              <?php $body = preg_replace("/\r|\n/", "", $list->body); ?>
              <button class="btn btn-info" onclick="showDetails('<?= $body ?>')">
                Details
              </button>
            </td>

          </tr>
        <?php  } ?>
      </tbody>

    </table>

    <div class="box pagination"></div>

  </div>

</body>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Body of Information </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_details_data">

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close </button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('#dtBasicExample').DataTable();
  });

  function showDetails(body) {
    console.log(body);
    $("#modal_details_data").html(body);
    $('#exampleModalCenter').modal('show');
  }
</script>

</html>