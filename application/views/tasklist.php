<html>
<?php include 'header.php'; ?>

<body>
    <div style="margin: 20px 100px 20px 100px;">
        <nav>
            <nav>
                <table class="table" style="margin-top: 40px;">
                    <thead class="thead-lg">
                        <tr>
                            <th class="text-center">Task Id</th>
                            <th class="text-center">Task Name</th>
                            <th class="text-center">Task Priority</th>
                            <th class="text-center">Deadline</th>
                            <th class="text-center" style="text-align: center;">Action</th>
                    </thead>
                    <?php
                    foreach ($TaskList as $ListTugas) :
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $ListTugas["task_id"] ?></td>
                            <td scope="col"><?php echo $ListTugas["task_name"] ?></td>
                            <td class="text-center"><?php echo $ListTugas["priority"] ?></td>
                            <td class="text-center"><?php echo $ListTugas["deadline"] ?></td>
                            <td class="text-center">
                                <a class="btn btn-info" href="<?= base_url('Description/index?task_id=') ?><?= $ListTugas['task_id']; ?>">Lihat tugas</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </nav>
    </div>
</body>

</html>