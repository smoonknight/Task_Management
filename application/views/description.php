<html>
    <?php include 'header.php'; ?>
    <body>
        <div style="margin: 50px 50px 0px 50px;">
            <div class="row">
                <div class="border border-primary" style="height: 620px; width: 900px;">
                    <div style="margin: 40px 5px 40px 5px; text-align: center;">
                        <h2><?php echo $TaskList[0]["task_name"]?></h2>
                    </div>
                    <div class="container" style="margin: 20px 20px 20px 20px;">
                        <div class="container">
                            <h4>Task List/Category</h4>
                        </div>
                        <div class="border border-secondary" style="margin-left:15px ;width: 800px;">
                            <div style="margin: 10px 20px 10px 20px;">
                                <h6><?php echo $TaskList[0]["list_name"]?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin: 20px 20px 20px 20px;">
                        <div class="container">
                            <h4>Priority</h4>
                        </div>
                        <div class="border border-secondary" style="margin-left:15px ;width: 800px;">
                            <div style="margin: 10px 20px 10px 20px;">
                                <h6><?php echo $TaskList[0]["priority"]?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin: 20px 20px 20px 20px;">
                        <div class="container">
                            <h4>Deadline</h4>
                        </div>
                        <div class="border border-secondary" style="margin-left:15px ;width: 800px;">
                            <div style="margin: 10px 20px 10px 20px;">
                                <h6><?php echo $TaskList[0]["deadline"]?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin: 20px 20px 20px 20px;">
                        <div class="container">
                            <h4>Description</h4>
                        </div>
                        <div class="border border-secondary" style="margin-left:15px ;width: 800px; height: 120px; overflow-y: scroll; word-wrap: break-word;">
                            <div style="margin: 10px 20px 10px 20px;">
                                <h6><?php echo $TaskList[0]["task_desc"]?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="container" style="margin-left: 20px;">
                        <div class="container" style="margin-bottom: 35px; text-align: center;">
                            <a href="https://www.google.com/" class="btn btn-primary btn-lg btn-block" target="_blank">Go to Google</a>
                        </div>
                        <div class="container" style="margin-bottom: 35px; text-align: center;">
                            <a href="https://www.drive.google.com/" class="btn btn-primary btn-lg btn-block" target="_blank">Open GDrive</a>
                        </div>
                        <div class="container" style="margin-bottom: 35px; text-align: center;">
                            <a href="#" class="btn btn-primary btn-lg btn-block">Copy</a>
                        </div>
                        <div class="container" style="margin-bottom: 35px; text-align: center;">
                            <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#move_modal">Move List</button>
                        </div>
                        <div class="modal fade" id="move_modal" tabindex="-1" role="dialog" aria-labelledby="move_modalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="move_listLongTitle">Move List To</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?=site_url('Task/update') ?>" method="post" >
                                            <div class="form-group">
                                                <label for="modal_list">List</label>
                                                <select class="form-control" id="modal_list" name="list_id">
                                                    <?php
                                                    foreach ($TableList as $ListTabel) : ?>
                                                    <option value="<?php echo $ListTabel["list_id"] ?>"><?php echo $ListTabel["list_name"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <input name="task_id" value="<?php echo $TaskList[0]['task_id'] ?>" hidden></input>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <input type="submit" class="btn btn-primary" name="move_list" value="Confirm"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 0px 40px 20px 0px;">
                        <div class="border border-primary container text-center" style="margin-left: 40px;height: 287px; padding: 15px 15px 15px 15px; overflow-y: scroll;">
                            <h4 class="text-center">Attachments</h4>
                            <?php echo form_open_multipart('Description/upload') ?>
                                <input class = "form-control" type="text" name="task_id" value="<?=$TaskList[0]['task_id']?>"hidden></input>
                                <input class="form-control" type="file" name="userfile">
                                <input type="submit" name="submit" value="upload" class="btn btn-primary" style="margin: 10px 10px 10px 10px;">
                            </form>
                            <div class="container">
                                <table class="table">
                                    <tr>
                                    <th class="text-truncate">File Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    <?php foreach($Attachment as $attach) : ?>
                                    <tr>
                                        <th style="overflow: hidden; text-overflow: ellipsis" class="text-truncate"><?=substr_replace($attach["file_name"],"",12)?></th>
                                        <th class="text-center">
                                            <a href="<?=base_url() ?>description/download?path=assets/attachment/<?=$attach['file_name']?>" class ="btn btn-info">Download</a>
                                            <a href="<?=base_url() ?>description/delete?id=<?=$attach["id"]?>" class ="btn btn-danger">Delete</a>
                                        </th>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>