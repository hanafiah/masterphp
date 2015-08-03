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
            <h1>My Users <?php echo $user->name; ?></h1>
            <form method="POST">
                <input type="hidden" name='id' value="<?php echo $user->id; ?>" />
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="name" value="<?php echo $user->name; ?>">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input name="age" type="text" class="form-control" id="age" placeholder="20" value="<?php echo $user->age; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="email" placeholder="email@example.com" value="<?php echo $user->email; ?>">
                </div>
                <button name="btnEdit" type="submit" class="btn btn-default">Submit</button>
                <a href="<?php echo site_url('users');?>" class="btn btn-link">Back</a>
            </form>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>