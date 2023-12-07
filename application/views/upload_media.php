<!DOCTYPE html>
<html>
    <head>
        <title>Pagination</title>
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
            <h3 class="title is-3">Upload Users Identity</h3>
            <div class="column">
                <form action="<?php echo base_url('do_upload') ?>" method="POST" enctype="multipart/form-data">
                  <label>Search</label>
                  <input type="hidden" value="<?php echo $id ?>" name="userId"/>
                  <input type="file" class="form-control" name="identity" value=""/>
                  <input type="submit" value="Upload" />
                </form>
            </div>
        </div>
    </body>
</html>