<html>
<?php include 'header.php'; ?>

<body>


    <div style="margin: 20px 100px 20px 100px;">
        <nav>
            <nav>
                <table class="table" style="margin-top: 40px;">
                    <thead class="thead-lg">
                        <tr>
                            <th class="text-center">Username</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Admin</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($TableMember as $MemberTabel) :
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $MemberTabel['username'] ?></td>
                            <td class="text-center"><?php echo $MemberTabel['password'] ?></td>
                            <td class="text-center"><?php echo $MemberTabel['name'] ?></td>
                            <td class="text-center"><?php echo $MemberTabel['isAdmin'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-danger" href="<?= base_url('Member/delete?username=') ?><?= $MemberTabel['username']; ?>" onclick="return confirm('Hapus username <?= $MemberTabel['username'] ?>?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </nav>

            <nav>
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col text-center">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_list_moda">
                            Add User
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="add_list_moda" tabindex="-1" role="dialog" aria-labelledby="add_list_modaTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="add_list_modaLongTitle">Add List</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <form method="post" action="<?= site_url('Member/insert') ?>">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" placeholder="Username" name="username" required="require">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" placeholder="Password" name="password" required="require">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name" required="require">
                                        </div>
                                        <div class="form-group">
                                            <label>Add to admin?</label>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons" name="do">
                                                <label class="btn btn-secondary active">
                                                    <input type="radio" name="options" id="yes" autocomplete="off" value="yes" checked> YES
                                                </label>
                                                <label class="btn btn-secondary">
                                                    <input type="radio" name="options" id="no" autocomplete="off" value="no"> NO
                                                </label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <input type="submit" class="btn btn-primary" name="add_member" value="Add List" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
    </div>
</body>

</html>