<?php
	//include('session.php');
	//include('init.php');
include('dbinc.php');
	$current = 'walls';
	//$page = $_GET['page'];

	include('header.php');
        
        
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!--position-->
<script type="text/javascript" src="bootstrap/js/jquery.js"></script><!--for confirm.-->
<script type="text/javascript" src="bootstrap/js/bootstrap-tooltip.js"></script><!--for confirm.-->
<script type="text/javascript" src="bootstrap/js/bootstrap-confirmation.js"></script><!--for confirm.-->
    <!-- for dialog modal-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"  ></script>  
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js" ></script>   
    <link rel="stylesheet" id="themeStyles" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"/> 
              
 
<script>
$(document).ready(function(){
    $("button").click(function(){
        var x = $("#screen1").position();
        alert("Top position: " + x.top + " Left position: " + x.left);
    });
});
</script>
<?php
	include("menu.php");
        function get_screens(){
		global $dbcon;
		$screens = array();
		$sql = "select * from screens order by name";
		$myrs = mysqli_query($dbcon,$sql);
		while($row = mysqli_fetch_assoc($myrs)){
			$screens[] = (object) $row;
		}
		return $screens;
	}

?>
<style>
.device {
	border:1px solid #666;
	background-color:#CCC;
	height:100px;
	margin:3px;
	
}

</style>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Wall Composer
                       
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="managers.php"> Video Walls</a></li>
                        <li class="active">Wall Composer</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                <!--Line below the menu div id="toolbar" style="width:100%; height:40px; background:#fafafa; border:1px solid #ddd;  "-->
                  
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home"><label id="wallName" class="wallname">wall1</label></a></li>
                        <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                        <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                    </ul>

                    
                    <!--button class="btn btn-primary" style="width:80px; height:32px; margin:3px 0 3px 3px;">Demo Wall</button>
                  <button class="btn btn-primary" style="width:32px; height:32px; margin:3px 0 3px 3px;"></button>
                  <button class="btn btn-primary" style="width:32px; height:32px; margin:3px 0 3px 3px;"></button>
                  <button class="btn btn-primary" style="width:32px; height:32px; margin:3px 0 3px 3px;"></button>
                  <button class="btn btn-primary" style="width:32px; height:32px; margin:3px 0 3px 3px;"></button-->
                  

                                </div><!-- /.box-header -->
                                <div class="box-body" style="height:450px;">
                                    <!--div class="tab-content"-->
                                        
                                      <!--div id="home" class="tab-pane fade in active">
                                         <div id="canvas" style="border:1px solid #ddd; background-color:#fafafa; width:800px; height:400px; float:left; position: relative;">
                             
                                                      

                                         </div>
                                      </div-->
                                      <input type="text"  id="xText" value=""/>
                                        <div id="results"></div>
                                    <!--/div--> <!--./tabcontent>
                                                
                                  <!-- text input -->
                                     <div id="composer">
			
                                        <div id="canvas" style="border:1px solid #ddd; background-color:#fafafa; width:800px; height:400px; float:left;">
                         
                                               	

                                        </div><!--canvas-->
      <div id="devices" style="margin-left:20px; padding:0px; border:1px solid #ddd; background-color:#fff; width:200px; height:400px; float:left; position: relative;">
      <?php $screens = get_screens(); ?>
        <?php foreach($screens as $screen) : ?>
        	<div class="screen" id="screen<?php echo $screen->id; ?>" style="margin: 5px; border:1px solid #ddd; background-color:#fafaaa; width:<?php echo $screen->width * 2; ?>px; height:<?php echo $screen->height * 1.5; ?>px; top:0px; left:0px;">
          	<?php echo $screen->name; ?><br />
            
                    <i class="fa fa-rotate-right rotate" data="#screen<?php echo $screen->id; ?>" style="cursor:pointer" onclick='javascript: rotate_screen("#screen<?php echo $screen->id; ?>");'></i>
                </div><!--./screen-->
        
             <?php endforeach; ?>   
        
      </div><!--#/devices-->
                                 <div style="clear:both;"></div>
                                      </div><!--composer-->
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Save Wall</button>
                                    <button>Return the top and left position of the p element</button>
<form name="form1" method="POST" enctype="multipart/form-data" >  
              
        
                     Wall Name:  <input type="text" id="textbox1" name="wallText"><br>
                    X-Position: <input type="text" id="textbox2" name="width" /><br>
                    Y-Position: <input type="text" id="textbox3" name="height"/><br>
                    <button type="submit" name="create" onclick="saveWall()">Create</button>
             </form>
                                </div>
                                
                            </div><!-- /.box -->
                            

                        </div><!--./col-->
                    </div><!--./Row-->

                </section><!-- /.content -->
             </div><!-- ./wrapper -->
            
<?php
	include("footer.php");

?>
  <script>
      
            //$('[data-toggle=confirmation]').confirmation('show');  
                    //$('[data-toggle=confirmation]').confirmation({ btnOkClass: 'btn btn-sm btn-success', btnCancelClass: 'btn btn-sm btn-danger'});
var d = document.getElementById('screen1');
d.style.position = "absolute";
d.style.left = '0 px';
d.style.top = '0 px';


             
</script>
<script>
function saveWall(){
    
   <?php
     if(isset($_POST["create"])){
        $wallName = $_POST["wallText"];
        $wallWidth = $_POST["width"];
        $wallHeight = $_POST["height"];
         
       $wallName= mysqli_real_escape_string($dbcon,$wallName);
       $wallWidth= mysqli_real_escape_string($dbcon,$wallWidth);
       $wallHeight= mysqli_real_escape_string($dbcon,$wallHeight);
    $sql = "INSERT INTO walls (name, width, height) VALUES ('$wallName','$wallWidth', '$wallHeight')";
mysqli_query($dbcon,$sql); 
        if(mysqli_query($dbcon, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbcon);
     }}?>


        }
    

		$(document).ready(function(){
                	$("#devices").sortable();
			$("#canvas").droppable();
			$(".screen").draggable({
				snap: ".screen",
				grid: [3,3],
				containment: "#composer"
			});
			//$("#devices").sortable();
		
		
		});
		
                
                
		$(".rotate").click(function(){
			var w = $(this).parent().width();
			var h = $(this).parent().height();
			$(this).parent().width(h);
			$(this).parent().height(w);
		});
		
		
	
  </script>

  

  