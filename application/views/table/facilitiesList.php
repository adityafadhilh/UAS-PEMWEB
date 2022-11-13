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
    <title>Homeview</title>
    <?php echo $css; ?>
</head>

<body>
    <?php echo $navbar; ?>


    <?php if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Management') { ?>
        <div id="viewNotUser" class="container margin-table">
            <div class="headerTable">
                <h1 class="color-blue">Facilities Listing</h1>
                <a style="float: right;" href="<?php echo base_url('index.php/Facilities/addFacility') ?>"><button class="btn">Add</button></a>
                <br><br>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead class="center-thead">
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($table as $row) {
                        $img = $row['img'];
                        $id = $row['facility_id'];
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><img src='<?php echo base_url("assets/image/$img"); ?>' alt="" width="300" height="200"></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td>
                                <a href="<?php echo base_url("index.php/Facilities/editFacility?id=$id"); ?>"><button class="btn">Edit</button></a>
                                <a href="<?php echo base_url("index.php/Facilities/deleteFacility?id=$id"); ?>"><button class="btn">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

    <?php if ($this->session->userdata('role') == 'User') { ?>

        <div id="viewUser" class="container middle-f">
            <h1 class="color-blue">Facilities Listing</h1>
            <h4>Preview or book facilities on this page</h4>
            <div>
                <table>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($table as $row) {
                            $img = $row['img'];
                            $id = $row['facility_id'];
                        ?>
                            <td>
                                <div class="row">
                                    <div class="card custom-card col">
                                        <div class="card-title data-f">
                                            <img src="<?php echo base_url("assets/image/$img") ?>" alt="" width="200" height="100">
                                            <a href="<?php echo base_url("index.php/Facilities/facilityDetail?id=$id") ?>"><h3><?php echo $row['nama']; ?></h3></a>
                                        </div>
                                    </div>
                                </div>
                                <? if ($i % 3 == 0) ?> <br>
                            </td>

                        <?php
                            $i = $i + 1;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } ?>

    <?php echo $js; ?>
</body>

</html>