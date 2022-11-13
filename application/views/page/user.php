<?php 
    if(!$this->session->userdata('nama') && $this->session->userdata('role') != 'user'){
        redirect('Home/index');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeview</title>
    <?php echo $css; ?>
</head>

<body>
    <?php echo $navbar; ?>

    <?php echo $js; ?>
</body>

</html>