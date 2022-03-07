<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet your Cat</title>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
</head>
<body>
<?php
session_start();

require('vendor/autoload.php');
use Medoko\Petlocator\checks;

use Medoko\Petlocator\Owner;
use function PHPUnit\Framework\isEmpty;

$errors = array();

if (isset($_POST["name"])) {
    if (!checks::isValidTel($_POST["number"])) {
        $errors['number'] = 1;
    }
    if(!checks::isValidName($_POST['name'])) {
        $errors['name'] = 1;
    }

    if(empty($errors)) {
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["number"] = $_POST["number"];

        $uploaddir = './images/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['image']['tmp_name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            $_SESSION['imagePath'] = $uploadfile;
        }
        header("Location: qrcode.php");
    } else {
        $errorsString = implode("\n", $errors);
    }
}
?>

<div class="container grid-container">
    <h1>Pet Emergency Collar</h1>
</div>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="container grid-container">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" aria-describedby="nameHelp"
                   placeholder="Dein Name">
            <?php
                if(isset($errors['name'])) {
                    echo "<small class='text-danger'>Ungültiger Name</small>";
                }
            ?>
        </div>
        <div class="form-group">
            <label for="tel">Telefonnummer</label>
            <input type="tel" id="tel" name="number" class="form-control" aria-describedby="telHelp"
                   placeholder="z.B. 06606611766">
            <?php
            if(isset($errors['number'])) {
                echo "<small class='text-danger'>Ungültige Nummer</small>";
            }
            ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Bild (optional)</label>
            <input type="file" name="image" class="form-control" placeholder="Deine Telefonnummer">
        </div>
        <button type="submit" value="submit" class="btn btn-primary mt-4">Submit</button>
    </div>
</form>
</body>
</html>