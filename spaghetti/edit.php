<?php
$host = 'localhost';
$dbname = 'master_php';
$user = 'root';
$pass = '';

try {
    // Connecting to MySQL
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);


    // Edit user
    if (isset($_POST['btnEdit'])) {
        $stmt = $dbh->prepare("UPDATE users SET name = :name, age = :age, email = :email WHERE id = :id");

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $stmt->execute();
        header("Location: index.php");
    }

    if (isset($_GET['id'])) {
        $stmt = $dbh->prepare("SELECT * FROM users WHERE id = :id");

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $id = $_GET['id'];
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
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
                <h1>My Users <?php echo $user['name']; ?></h1>
                <form method="POST">
                    <input type="hidden" name='id' value="<?php echo $user['id'];?>" />
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="name" value="<?php echo $user['name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input name="age" type="text" class="form-control" id="age" placeholder="20" value="<?php echo $user['age'];?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="email@example.com" value="<?php echo $user['email'];?>">
                    </div>
                    <button name="btnEdit" type="submit" class="btn btn-default">Submit</button>
                    <a href="index.php" class="btn btn-link">Back</a>
                </form>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        </body>
    </html>	

    <?php
    //close db handler
    $dbh = null;
} catch (PDOException $e) {
    echo "ouch!... ada ralat.";
    file_put_contents('error_log.txt', $e->getMessage() . PHP_EOL, FILE_APPEND);
}