<html>
<?php include 'header.php'; ?>

<body>
    <div style="margin: 20px 100px 20px 100px;">
        <nav>
            <nav>
                <table class="table" style="margin-top: 40px;">
                    <thead class="thead-lg">
                        <tr>
                            <th class="text-center">Task Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <?php if ($TableList) : ?>

                        <?php
                        foreach ($TableList as $ListTabel) :
                        ?>
                            <tr>
                                <td scope="col"><?php echo $ListTabel['list_name'] ?></td>
                                <td scope="col"><?php echo $ListTabel['list_desc'] ?></td>
                                <td class="text-center">
                                    <a class="btn btn-danger" href="<?php echo  base_url('ListTable/delete') ?>?list_id=<?php echo $ListTabel['list_id']; ?>" onclick="return confirm('Hapus list <?php echo $ListTabel['list_name'] ?>?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <td class="text-center" colspan="4">Tidak ada data</td>
                    <?php endif ?>
                </table>
            </nav>

            <nav>
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col text-center">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_list_moda">
                            Add List
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
                                    <form action="<?= site_url('ListTable/insert') ?>" method="post">
                                        <div class="form-group">
                                            <label>List Name</label>
                                            <input type="text" class="form-control" placeholder="Type List Name Here" name="list_name" required="require">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="5" name="list_desc"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Show in home?</label>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons" name="do">
                                                <label class="btn btn-secondary active">
                                                    <input type="radio" name="options" id="yes" autocomplete="off" value="yes" checked> YES
                                                </label>
                                                <label class="btn btn-secondary">
                                                    <input type="radio" name="options" id="no" autocomplete="off" value="no"> NO
                                                </label>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-primary" name="add_list" value="Add List" />
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