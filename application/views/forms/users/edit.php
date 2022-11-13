<?php
if (!$this->session->userdata('nama') || $this->session->userdata('role') != 'Admin') {
    redirect('Home/facilityList');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <?php echo $css; ?>
</head>

<body>
    <?php echo $navbar; ?>

    <?php

    foreach ($table as $row) {
        $name = $row['nama'];
        $email = $row['email'];
        $role = $row['role'];
        $id = $row['id'];

    ?>

        <div class="container login-register">
            <h1>Edit Data</h1>
            <?php
            echo form_open('Home/editUser');
            ?>
            <div class="form-custom">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="number" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label for="InputEmail">Alamat Email</label>
                    <input type="email" class="form-control" id="InputEmail" name="email" aria-describeby="emailHelp" placeholder="Masukkan email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-select form-control" aria-label="Default select example" name="role">
                        <option value="<?php echo $role; ?>" selected><?php echo $role;?></option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                        <option value="Management">Management</option>
                    </select>
                </div>
            </div>
            <button class="btn button-margin-home btn-lg" type="submit">Submit</button>
            <?php echo form_close(); ?>
            <a href="<?php echo base_url('index.php/Home/userList'); ?>"><button class="btn button-margin-home btn-lg btn-danger">Cancel</button></a>

        </div>

    <?php
    }
    echo $js; ?>
</body>

</html>