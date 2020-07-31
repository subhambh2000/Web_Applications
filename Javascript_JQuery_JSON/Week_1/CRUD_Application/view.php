<?php
session_start();
require_once "pdo.php";

  if(!isset($_SESSION['name'])){
    die("Not logged in");
  }

$stmt = $pdo->prepare('SELECT first_name, last_name, email, headline, summary
                        FROM Profile
                        WHERE profile_id = :profile_id');
    $stmt->execute(array(':profile_id' => $_GET['profile_id']));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row == false) {
        $_SESSION['errors'] = "Could not load profile";
        header("Location: index.php");
        return ;
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Subham Bhattacharjee Resume</title>
</head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
crossorigin="anonymous">
<body>
<div class="container">
            <h1>Profile information</h1>
            <p>
                First Name: <?php echo $row['first_name'] ?>
            </p>

            <p>
                Last Name: <?php echo $row['last_name'] ?>
            </p>

            <p>
                Email: <?php echo $row['email'] ?>
            </p>

            <p>
                Headline: <br/>
                <?php echo $row['headline'] ?>
            </p>

            <p>
                Summary:<br/>
                <?php echo $row['summary'] ?>
            </p>

    <a href="index_rdir.php">Done</a>
</div>
</body>
</html>
