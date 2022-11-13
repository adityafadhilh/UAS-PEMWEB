<?php
if (!$this->session->userdata('nama')) {
    redirect('Home/index');
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
       $id = $row['facility_id'];
       $name = $row['nama'];
       $img = $row['img'];
       $description = $row['deskripsi'];

       echo var_dump($description);

    ?>

        <div class="container login-register">
            <h1>Edit Facility</h1>
            <?php
            echo form_open_multipart('Facilities/editFacility');
            ?>
            <div class="form-custom">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="number" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nama Fasililitas</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" value="<?php echo $description;?>"><?php echo $description;?></textarea>
                </div>
                <div class="form-group">
                    <label for="formFile" class="form-label hidden">Gambar</label>
                    <input class="form-control" type="file" id="formFile" name="img">
                </div>
            </div>
            <button class="btn button-margin-home btn-lg" type="submit">Submit</button>
            <?php echo form_close(); ?>
            <a href="<?php echo base_url('index.php/Home/facilityList'); ?>"><button class="btn button-margin-home btn-lg btn-danger">Cancel</button></a>

        </div>

    <?php
    }
    echo $js; ?>
</body>

</html>