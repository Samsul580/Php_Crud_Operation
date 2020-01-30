<?php
    include 'config.php';
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $sql = "UPDATE `public_information` SET `name` = '$name', `address` = '$address', `phone` = '$phone' WHERE `public_information`.`id` = $id";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            header('location:view.php');
        }
        else {
            header('location:view.php?failed');
        }
    }
    $id = '';
    $name = '';
    $address = '';
    $phone = '';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM public_information WHERE id='$id'";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            $result = mysqli_fetch_assoc($query);
            $name = $result['name'];
            $address = $result['address'];
            $phone = $result['phone'];
        }
        else {
            echo "Failed";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container bg-secondary">
        <h2 class="text-primary">Update Information</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?=$result['name']?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" value="<?=$result['address']?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" name="phone" class="form-control" id="phone" value="<?=$result['phone']?>">
            </div>
            <div>
                <input type="hidden" name="id" value="<?=$id?>" id="id">
                <input type="submit" value="submit" name="submit" class="btn btn-primary">
            </div> 
        </form>
    </div>
</body>
</html>