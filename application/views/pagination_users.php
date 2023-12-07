<!DOCTYPE html>
<html>
    <head>
        <title>CodeIgniter Pagination</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
        <style>
          p a {
              padding: 5px;
          }
        </style>
    </head>
    <body>
        <div class="container">
            <h3 class="title is-3">All Users</h3>
            <div class="column">
                <form action="<?php echo base_url('getPageUsers') ?>" method="POST">
                  <label>Search</label>
                  <input type="text" class="form-control" name="search" value="<?= $search ?>"/>
                  <input type="submit" value="Search" />
                </form>
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Designation</th>
                            <th>DOB</th>
                            <th>DOJ</th>
                            <th>Blood Group</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?=$user->id?></td>
                                <td><?=$user->name?></td>
                                <td><?=$user->mobile?></td>
                                <td><?=$user->email?></td>
                                <td><?=$user->designation?></td>
                                <td><?=$user->dob?></td>
                                <td><?=$user->doj?></td>
                                <td><?=$user->blood_group?></td>
                                <td><?=$user->address?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <p><?php echo $links; ?></p>
            </div>
        </div>
    </body>
</html>