<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeIgniter | Insert Employee Details into MySQL Database</title>
    <!--link the bootstrap css file-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- link jquery ui css-->
    <link href="//code.jquery.com/jquery-ui-1.11.2/jquery-ui.min.css'); ?>" rel="stylesheet">
    <!--include jquery library-->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!--load jquery ui js file-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        
    
</head>
<body>
<div class="container">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="http://localhost/test3/dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="http://localhost/test3/view_show.php">View Show Records</a>
                    </li>
                    <li>
                        <a href="http://localhost/ci2/index.php/home">Logout</a>
                    </li>
                </ul>

                

            </div>
            <!-- /.navbar-collapse -->
            </nav>
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        <legend>Update Show Details</legend>
        <?php 
        $attributes = array("class" => "form-horizontal", "id" => "update_showform", "name" => "update_showform");
        echo form_open("http://localhost/ci5/index.php/update_show/index", $attributes);?>
        <fieldset>
            
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">
                <label for="s_id" class="control-label">Show Id</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="s_id" name="s_id" placeholder="s_id" type="text" disabled="disabled" class="form-control"  value="<?php echo $showrecord[0]->s_id; ?>" />
                <span class="text-danger"><?php echo form_error('s_id'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="start_time" class="control-label">Start Time</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="start_time" name="start_time" placeholder="start_time" type="text" class="form-control"  value="<?php echo set_value('start_time', @date('d-m-Y', @strtotime($showrecord[0]->start_time))); ?>" />
                <span class="text-danger"><?php echo form_error('start_time'); ?></span>
            </div>
            </div>
            </div>            
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="end_time" class="control-label">End Time</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="end_time" name="end_time" placeholder="end_time i.e. 10:30pm April 15 2014" type="text" class="form-control"  value="<?php set_value('end_time', @date('d-m-Y', @strtotime($showrecord[0]->end_time))); ?>" />
                <span class="text-danger"><?php echo form_error('end_time'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="language" class="control-label">language</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="language" name="language" placeholder="language" type="text" class="form-control" value="<?php echo $showrecord[0]->language; ?>" />
                <span class="text-danger"><?php echo form_error('language'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="movie" class="control-label">Movie</label>
            </div>
            <div class="col-lg-8 col-sm-8">
            
                <?php
                $attributes = 'class = "form-control" id = "movie"';
                echo form_dropdown('movie',$movie,set_value('movie'),$attributes);?>
                <span class="text-danger"><?php echo form_error('movie'); ?></span>
            </div>
            </div>
            </div>
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insert" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
            </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
        <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>
</body>
</html>