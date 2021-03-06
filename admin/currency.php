<?php include('partials/header-admin.php'); ?>
<?php include('partials/menu-admin.php'); ?>
    <!-----Main content Section Starts------>
    <div class="main-content">
        <div class="wrapper">
            <h1>Currency</h1>
            <br><br>
            
            <br><br>              
            <a href="add-currency.php" class="btn-primary">Add Currency</a>
            <br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Currency Name</th>
                    <th>Currency Sign</th>
                    <th>Currency Rate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM tbl_setting_currency";
                    $res = mysqli_query($conn,$sql);
                    $sn = 1;//Serial Number
                    if($res==TRUE){
                        $count = mysqli_num_rows($res);

                        if($count>0){
                            while($rows = mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $currency_name = $rows['currency_name'];
                                $currency_sign = $rows['currency_sign'];
                                $currency_rate = $rows['currency_rate'];
                                $status = $rows['status'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $currency_name; ?></td>
                                    <td><?php echo $currency_sign; ?></td>
                                    <td><?php echo $currency_rate; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/setting/edit-currency.php?id=<?php echo $id; ?>" class="btn-secondary">Update Currency</a>
                                        <a href="<?php echo SITEURL; ?>admin/etting/delete-currncy.php?id=<?php echo $id; ?>" class="btn-danger">Delete Currency</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                        $no_result = '<span class="error">No Currency Found In Database! </span>';
                        $add_some = '<a class="success" href="'.SITEURL.'admin/setting/currency/add-currency.php'.'">Lets add some Currency.</a>';
                        ?>
                        <tr>
                            <td class="error"><?php echo $no_result.$add_some; ?></td>
                        </tr>
                        <?php
                        }
                    }

                ?>
                
            </table>

        </div>
        <div class="wrapper"></div>
    </div>
    <!-----Main content Section Ends-------->
    <?php include('partials/footer-admin.php'); ?>