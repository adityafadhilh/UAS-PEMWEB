<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php echo $css; ?>
</head>

<body>
    <div class="container login-register">
        <h1>Sign-Up</h1>
        <?php
        echo form_open('Home/register');
        ?>
        <div class="form-custom">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                <span style="color:red;"><?php echo form_error('name'); ?></span>
            </div>
            <div class="form-group">
                <label for="InputEmail">Alamat Email</label>
                <input type="email" class="form-control" id="InputEmail" name="email" aria-describeby="emailHelp" placeholder="Masukkan email">
                <span style="color:red;"><?php echo form_error('email'); ?></span>
            </div>
            <div class="form-group">
                <label for="InputPassword">Password</label>
                <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                <span style="color:red;"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group">
                <label for="InputPassword">Re-Password</label>
                <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Re-Password">
                <span style="color:red;"><?php echo form_error('repassword'); ?></span>
            </div>
            <!-- <div class="g-recaptcha" data-sitekey="6LeS7ngdAAAAAF6p9Dq_u3spBHeNJxRP4E-o58_2" style="margin-bottom: 10px;"></div> -->
        </div>
        <button class="btn button-margin-home btn-lg" type="submit">Register</button>
        <?php echo form_close(); ?>
        <a href="<?php echo base_url('index.php/Home/index');?>"><button class="btn button-margin-home btn-lg btn-danger">Cancel</button></a>
    </div>

    <?php echo $js; ?>
</body>

</html>