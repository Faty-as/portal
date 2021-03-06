<?php
  
 // include('session.php');
  //include('init.php');
  $current = 'screens';
  $page = $_GET['page'];


	$screenid = (int) $_GET['screenid'];


  if($_POST['cmd']=='posted'){
		$screenid = (int) $_POST['screenid'];
    $name         =   mysql_real_escape_string($_POST['name']);
    $width         =   mysql_real_escape_string($_POST['width']);
    $height =   mysql_real_escape_string($_POST['height']);
    $orientation =   mysql_real_escape_string($_POST['orientation']);

    if($name == "") {
      $error = "Screen Name should not be left blank.";
    }
    else {
			
			$sql = "update screens 
						set
							name = '$name',
							width = '$width',
							height = '$height',
							orientation = '$orientation'
						where
							id = '$screenid'";

      if(mysql_query($sql, $dbcon)){
				
        header ("location:screens.php?success=update&page=" . $page);
        exit();
      }
      else {
       $error = "Error! cannot update data.";
      }
    } 
	}
	else{
		$sql = "select * from screens where id = '$screenid'";
		$myrs = mysql_query($sql, $dbcon);
		if($row = mysql_fetch_assoc($myrs)){
			$name = $row['name'];
			$width = $row['width'];
			$height = $row['height'];
			$orientation = $row['orientation'];
		
		}
	}


	include('header.php'); 
?>
<?php
  include("menu.php");
?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Screens <small></small> </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="screens.php"> Screens</a></li>
        <li class="active">Edit Screen</li>
      </ol>
    </section>
    


      <!-- Main content -->
      <section class="content">
      
      
      
                    <div class="row">
                        <div class="col-xs-12">
<?php if($error): ?>                        
                                    <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $error; ?>
                                    </div> 
<?php endif; ?>

                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Edit Screen</h3>
                                </div><!-- /.box-header -->
                                <form name="frmadd" action="screenedit.php?page=<?php echo $page; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="screenid" value="<?php echo $screenid; ?>" />
                                <input type="hidden" name="cmd" value="posted" />
                                <div class="box-body">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label>Screen Name *</label>
                                      <input type="text" required="required" class="form-control" name="name" value="<?php echo $name; ?>" />
                                  </div>
                                  <div class="form-group">
                                      <label>Width *</label>
                                      <input type="text" required="required" class="form-control" name="width" value="<?php echo $width?>" style="width:100px;" /> cm
                                  </div>
                                  <div class="form-group">
                                      <label>Height *</label>
                                      <input type="text" required="required" class="form-control" name="height" value="<?php echo $height?>" style="width:100px;" /> cm
                                  </div>
                                  <div class="form-group">
                                      <label>Orientation </label>
                                        <select name="orientation" class="form-control" style="width:300px;">
                                        	<option value="H" <?php echo ($orientation == 'H')?'selected="selected"':''; ?> >Horizontal</option>
                                        	<option value="V" <?php echo ($orientation == 'V')?'selected="selected"':''; ?> >Vertical</option>
                                        </select>
                                  </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                  </form>
                            </div><!-- /.box -->

                        </div>
                    </div>

                </section><!-- /.content -->
        </div><!-- ./wrapper -->
      


<?php
  include('footer.php');
?>

