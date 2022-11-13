<?php
if (!$this->session->userdata('nama')) {
    redirect('Home/error');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>

    <?php echo $css; ?>
</head>
<body>
    <?php echo $navbar; ?>


    <?php 
    foreach($table as $row){
        $img = $row['img'];
        $id = $row['facility_id'];
        ?>

    <div class="container detail">
        <h1><?php echo $row['nama']; ?></h1>
        <img src="<?php echo base_url("assets/image/$img") ?>" alt="" width="400" height="200">
        <p><?php echo $row['deskripsi']; ?></p>
        <a href="<?php echo base_url("index.php/Facilities/book?id=$id");?>"><button class="btn">Book</button></a>
        <a href="<?php echo base_url('index.php/Home/facilityList');?>"><button class="btn">Return to listing</button></a>
    </div>

    <?php } ?>

    <?php echo $js; ?>
</body>

</html>