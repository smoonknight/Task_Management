<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark" style="padding-left: 50px;">
        <!-- Brand -->
        <a class="navbar-brand" href="<?php echo base_url('Home/index') ?>" style="font-size: 24;">Home</a>
        <ul class="navbar-nav">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-size: 18;">
                Task List
            </a>
            <div class="dropdown-menu" style="font-size: 18;">
                <?php if ($TableList) : ?>
                    <?php
                    foreach ($TableList as $ListTabel) : ?>
                        <a class="dropdown-item" href="<?php echo base_url() ?>Tasklist/index?list=<?php echo $ListTabel["list_id"] ?>"><?php echo $ListTabel["list_name"] ?></a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <a class="dropdown-item" href="">Tidak ada list</a>
                <?php endif; ?>
            </div>
            <li class="nav-item dropdown" style="font-size: 18;">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    More
                </a>
                <div class="dropdown-menu">
                    <?php if ($this->session->userdata('admin') != 'no') : ?>
                        <a class="dropdown-item" href="<?php echo base_url() ?>ManageList/index" style="font-size: 18;">Manage List</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>ManageUser/index" style="font-size: 18;">Manage User</a>
                    <?php endif ?>
                    <a class="dropdown-item" href="<?php echo base_url() ?>Validation/logout_validation" style="font-size: 18;">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</body>