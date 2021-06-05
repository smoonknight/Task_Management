<html>
    <?php include 'header.php'; ?>
    <body>
        <div style="margin: 20px 100px 20px 100px;">
            <div class="text-center">
                <table class = "table" style="margin-top: 40px;">
                    <tr class="text-center">
                        <th>Task Name</th>
                        <th>Task Priority</th>
                        <th>Deadline</th>
                        <th>Action</th>
                    </tr>
                    <?php if ($TaskList) : ?>
                    <?php foreach ($TaskList as $DaftarTugas) : ?>
                    <tr>
                        <td ><?php echo $DaftarTugas["task_name"] ?></td>
                        <td class="text-center"><?php echo $DaftarTugas["priority"] ?></td>
                        <td class="text-center"><?php echo $DaftarTugas["deadline"] ?></td>
                        <td class="text-center">
                            <a href="<?=base_url('Description/index?task_id=') ?><?php echo $DaftarTugas["task_id"] ?>" class ="btn btn-info">Lihat tugas</a>
                            <a href="<?=base_url('Task/delete?task_id=') ?><?php echo $DaftarTugas["task_id"] ?>" class ="btn btn-danger" onclick="return confirm('Hapus <?=$DaftarTugas['task_name'] ?>?')">Delete</a>
                        </td>
                        
                    </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                        <td class="text-center" colspan="4">Tidak ada data</td>
                    <?php endif ?>
                </table>
            </div>
            <div class="col text-center">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_task_moda">
                    Add Task
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="add_task_moda" tabindex="-1" role="dialog" aria-labelledby="add_task_modaTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_task_modaLongTitle">Add Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=site_url('Task/insert') ?>" method="post">
                                <div class="form-group">
                                    <label for="TaskName">Task Name</label>
                                    <input type="text" class="form-control" name="task_name" placeholder="Type Task Name" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="TaskDesc">Task Name</label>
                                    <textarea name="task_desc" class="form-control" placeholder="Type The Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ListName">Select List</label>
                                    <select name="list_id" class="form-control">     
                                        <?php
                                            foreach ($TableList as $ListTabel) : ?>
                                            <option value="<?php echo $ListTabel["list_id"] ?>"><?php echo $ListTabel["list_name"] ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="priority">Select Priority</label>
                                    <select name="priority" class="form-control">     
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deadline">Deadline</label>
                                    <input class="form-control" type="date" name="deadline">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-primary" name="submit_task" value="Add Task"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>