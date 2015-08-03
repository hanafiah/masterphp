<?php
$host = 'localhost';
$dbname = 'master_php';
$user = 'root';
$pass = '';

try {
    // Connecting to MySQL
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Add new user
    if (isset($_POST['btnAdd'])) {
        $stmt = $dbh->prepare("INSERT INTO users ( name, age, email ) values ( :name, :age, :email )");

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $stmt->execute();
    }

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
    }
    
    if (isset($_GET['delete'])) {
        $stmt = $dbh->prepare("DELETE FROM users WHERE id = :id LIMIT 1");

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $id = $_GET['delete'];
        $stmt->execute();
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
                <h1>My Users <a class="btn btn-primary" href="new_user.php" role="button">New User</a></h1>
                <table class="table table-condensed">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    // Get all users
                    $stmt = $dbh->prepare("SELECT * FROM users");
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    if ($stmt->execute()) {
                        while ($row = $stmt->fetch()) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-default btn-sm">Edit</a>
                                        <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-default btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
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

    <?php
    //close db handler
    $dbh = null;
} catch (PDOException $e) {
    echo "ouch!... ada ralat.";
    file_put_contents('error_log.txt', $e->getMessage() . PHP_EOL, FILE_APPEND);
}