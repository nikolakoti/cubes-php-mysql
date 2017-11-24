<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>Profile of User: <?php echo htmlspecialchars($user['username']); ?> </span>
            </h2>
        </div>
    </div>
</div>

<!-- ======== @Region: #content ======== -->
<div id="content">
    <div class="container portfolio">
        <!--Portfolio feature item-->
        <div class="row">
            <div class="col-md-12">

                <?php if (!empty($systemMesage)) { ?> 

                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo htmlspecialchars($systemMesage); ?>
                    </div>

                <?php } ?>


                <h2>
                    

                    <div class="btn-group pull-right" style="margin-right: -14px;">

                        <a href="/profile-edit.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-success">
                            <i class="fa fa-pencil"></i>
                            Edit profile
                        </a>
                        <a href="/profile-change-password.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-warning">
                            <i class="fa fa-key"></i>
                            Change password
                        </a>
                    </div>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-md-5 text-center">
                    <i><img src="/uploads/users/<?php echo htmlspecialchars($user['photo_filename']);?>" style="position: relative; display: inline-block;"></i>
                    <h1 class="text-primary"><?php echo htmlspecialchars($user['first_name']); ?> <?php echo htmlspecialchars($user['last_name']); ?>
                    </h1>
                </div>
                <div class="col-md-7" style="position: relative; display: inline-block;">		
                    <table class="table table-striped table-hover">
                        <body>


                        <tr>
                            <th>ID</th>
                            <td>#<?php echo htmlspecialchars($user['id']); ?></td>
                        </tr>
                        <tr>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td><?php echo htmlspecialchars($user['first_name']); ?></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td><?php echo htmlspecialchars($user['last_name']); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>