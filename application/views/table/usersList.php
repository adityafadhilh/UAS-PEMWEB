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
    <title>Homeview</title>
    <?php echo $css; ?>
</head>

<body>
    <?php echo $navbar; ?>

    <div class="container margin-table">
        <div class="headerTable">
            <h1 class="color-blue">Users Listing</h1>
            <!-- <button class="btn">Add</button> -->
            <br><br>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($table as $row) {
                    $id = $row['id'];
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td>
                            <a href="<?php echo base_url("index.php/Home/editUser?id=$id");?>"><button class="btn">Edit</button></a>
                            <a href="<?php echo base_url("index.php/Home/deleteUser?id=$id");?>"><button class="btn">Delete</button></a>
                        </td>
                    </tr>
                <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php echo $js; ?>
</body>

</html>