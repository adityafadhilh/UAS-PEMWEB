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

    <div class="container margin-table">
        <div class="headerTable">
            <h1 class="color-blue">Requests Listing</h1>
            <!-- <button class="btn">Add</button> -->
            <br><br>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <th>#</th>
                <th>Requester</th>
                <th>Requested Facility</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <?php if ($this->session->userdata('role') == 'User') { ?>
                    <th>Approved</th>
                <?php } else { ?>
                    <th>Action</th>
                <?php } ?>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($table as $row) {
                    $id = $row['book_id'];
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['requester'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['start_time'] ?></td>
                        <td><?php echo $row['end_time'] ?></td>
                        <td>
                            <?php if ($this->session->userdata('role') == 'Admin') { ?>
                                <a href="<?php echo base_url("index.php/Requests/deleteRequest?id=$id") ?>"><button class="btn">Delete</button></a>
                            <?php } if($this->session->userdata('role') == 'User'){ 
                                echo $row['status'];
                                 } if($this->session->userdata('role') == 'Management') { ?>
                                <a href="<?php echo base_url("index.php/Requests/approve?id=$id") ?>"><button class="btn">Approve</button></a>
                                <a href="<?php echo base_url("index.php/Requests/reject?id=$id") ?>"><button class="btn">Reject</button></a>
                            <?php } ?>
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