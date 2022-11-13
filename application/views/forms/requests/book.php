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
    ?>

        <div class="container login-register">
            <h1>Add Facility</h1>
            <?php
            echo form_open('Facilities/book');
            ?>
            <div class="form-custom">
                <div class="form-group">
                    <label for="id">Facility ID</label>
                    <input type="number" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                    <span style="color:red;"><?php echo form_error('id'); ?></span>
                </div>
                <div class="form-group">
                    <label for="reserve">Reservation Date</label>
                    <input type="date" class="form-control" id="id" name="reserve">
                    <span style="color:red;"><?php echo form_error('reserve'); ?></span>
                </div>
                <div class="form-group">
                    <label for="startTime">Start Time</label>
                    <input type="time" class="form-control" id="id" name="start">
                    <span style="color:red;"><?php echo form_error('start'); ?></span>
                </div>
                <div class="form-group">
                    <label for="startTime">End Time</label>
                    <input type="time" class="form-control" id="id" name="end">
                    <span style="color:red;"><?php echo form_error('end'); ?></span>
                </div>
            </div>
            <button class="btn button-margin-home btn-primary" type="submit">Submit</button><br>
            <?php echo form_close(); ?>
            <a href="<?php echo base_url('index.php/Home/facilityList'); ?>"><button class="btn button-margin-home btn-danger">Cancel</button></a>


        </div>

    <?php } ?>

    <?php
    echo $js;
    ?>
</body>

</html>