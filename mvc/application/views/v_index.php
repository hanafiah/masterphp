<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <title>Master PHP: From spaghetti to MVC</title>
    </head>
    <body>
        <div class="container">
            <h1>My Users <a class="btn btn-primary" href="<?php echo site_url('users/new_user');?>" role="button">New User</a></h1>
            <table class="table table-condensed">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach ($users as $user) {
                    ?>
                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->age; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="<?php echo site_url('users/edit/' . $user->id); ?>" class="btn btn-default btn-sm">Edit</a>
                                <a href="<?php echo site_url('users/delete/' . $user->id); ?>" class="btn btn-default btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                if (count($users) == 0) {
                    ?>
                    <tr><td colspan="3">Sorry, we have no data</td></tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>	