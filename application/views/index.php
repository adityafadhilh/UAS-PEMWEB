<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php echo $css; ?>
</head>

<body>
    <div class="container middle">
        <h1>Facility Booking</h1>
        <h3>Welcome to facility booking page</h3>
        <div class="button-margin-home">
            <a href="<?php echo base_url('index.php/Home/login')?>"><button class="btn btn-lg">Login</button></a>
            <a href="<?php echo base_url('index.php/Home/register')?>"><button class="btn btn-lg">Register</button></a>
        </div>
    </div>


    <?php echo $js; ?>
</body>

</html>