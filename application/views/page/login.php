<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php echo $css; ?>
</head>

<body>
    <div class="container login-register">
        <h1>Login</h1>
        <?php echo form_open("Home/login"); ?>
        <div class="form-custom">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button class="btn button-margin-home btn-lg" type="submit">Login</button>
        <?php if ($this->session->userdata('logged_in') == -1) { ?>
            <br><br>
            <p style="color:red">Email atau password tidak terdaftar, silahkan coba lagi</p>
        <?php } ?>
        </form>
        <br><br>
        <a href="<?php echo base_url('index.php/Home/register') ?>">Don't have an account?</a>
    </div>


    <?php echo $js; ?>
</body>

</html>