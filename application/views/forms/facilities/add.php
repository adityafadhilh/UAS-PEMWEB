<?php
if (!$this->session->userdata('nama') || $this->session->userdata('role') == 'User') {
    redirect('Home/error');
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

    <div class="container login-register">
        <h1>Add Facility</h1>
        <?php
        echo form_open_multipart('Facilities/addFacility');
        ?>
        <div class="form-custom">
            <div class="form-group">
                <label for="name">Nama Fasilitas</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                <span style="color:red;"><?php echo form_error('name'); ?></span>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                <span style="color:red;"><?php echo form_error('description'); ?></span>
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label hidden">Gambar</label>
                <input class="form-control" type="file" id="formFile" name="img">
                <span style="color:red;"><?php echo $error_msg;?></span>
            </div>
        </div>
        <button class="btn button-margin-home btn-lg" type="submit">Submit</button>
        <?php echo form_close(); ?>
        <a href="<?php echo base_url('index.php/Home/facilityList'); ?>"><button class="btn button-margin-home btn-lg btn-danger">Cancel</button></a>

    </div>

    <?php
    echo $js;
    ?>
</body>

</html>