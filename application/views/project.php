<?php
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body style="background-color:#fff">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
    
  </div>
</nav>
<div class="container-fluid">

	<?php
			$this->load->helper('form');
			$error = $this->session->flashdata('error');
			if($error)
			{
                ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php } ?>
            <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    { 
                ?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php } ?>
	<h3 style="margin-top:10px;"align="center" >All Data</h3>
	
	<button type="button" class="btn btn-info btn-lg pull-right" style="margin-bottom:10px"data-toggle="modal" data-target="#myModal">Add Form</button>
	<a href="project/exportCSV" class="btn btn-primary">ExportCSV</a>
	<table border="1" class="table table-hover table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>name</th>
					<th>mobile</th>
					<th>profile</th>
					<th>email</th>
					<th>gender</th>
					<th>subjects</th>
					<th>age</th>
					<th colspan="2">operation</th>
				</tr>
				<tbody>
					<?php
						if(!empty($alldata))
						{
							foreach($alldata as $dt)
							{
								//print_r($dt);
								
							
					?>
					<tr>
					<td>
						<?php echo $dt['id'];?>
					</td>
					<td>
						<?php echo $dt['name'];?>
					</td>
					<td>
						<?php echo $dt['mobile'];?>
					</td>
					<td>

						<a href="#" class="pop">
						<img src="<?php echo $dt['profile'];?>" height="60px" width="60px" class="img-responsive">
						</a>
					</td>
					<td>
						<?php echo $dt['email'];?>
					</td>	
					<td>
						<?php echo $dt['gender'];?>
					</td>
					<td>
						<?php echo $dt['sub'];?>
					</td>
					<td>
						<?php echo $dt['age'];?>
					</td>
					<td>
						<a href="project/edit/<?php echo $dt['id'];?>" class="btn btn-info" target="_blank">edit</a>
					</td>
					<td>
						<a href="project/deletedata/<?php echo $dt['id'];?>" class="btn btn-danger">delete</a>
					</td>
					<?php
						}
					}
					?>
					</tr>
				</tbody>
			</thead>
			<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog" data-dismiss="modal">
				<div class="modal-content"  >              
				  <div class="modal-body">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<img src="" class="imagepreview" style="width: 100%;" >
				  </div> 
				  <div class="modal-footer">
					  <div class="col-xs-12">
						</div>
					</div>
					</div>
			  </div>
			</div>
	</table>
	<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Form</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div id="addform" style="width:100%;">
		<div class="row">
			<div class="col-md-12">
			<form action="project/insert" method="post" enctype="multipart/form-data">
			 <div class="form-group">
			<div class="col-md-12">
			<p>
				Name:
				<input type="text" class="form-control" name="name">
			</p>
			</div>
			<div class="col-md-12">
			<p>
				email:
				<input type="text" class="form-control" name="email">
			</p>
			</div>
			<div class="col-md-12">
			<p>
				mobile:
				<input type="text" class="form-control" name="mobile">
			</p>
			</div>
			<div class="col-md-12">
			<p>
				file:
				<input type="file" class="form-control" name="file">
			</p>
			</div>
			<div class="col-md-12">
			<p>
				dob:
				<input type="date" class="form-control" name="dob">
			</p>
			</div>
			<div class="col-md-12 form-control">
			<p>
				gender:&nbsp;&nbsp;&nbsp;
				<input type="radio" class="" name="gender" value="male">&nbsp;&nbsp;Male
				<input type="radio" class="" name="gender" value="female" selected>&nbsp;&nbsp;Female
			</p>
			</div>
			<div class="col-md-12 form-control" style="margin-top:20px !important">
			<p>
				sub:&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="sub[]" value="php">&nbsp;php&nbsp;&nbsp;
				<input type="checkbox"  name="sub[]" value="java">&nbsp;java&nbsp;&nbsp;
				<input type="checkbox" name="sub[]" value="node">&nbsp;node&nbsp;&nbsp;
				<input type="checkbox"  name="sub[]" value="css">&nbsp;css&nbsp;&nbsp;
			</p>
			</div>
			<div class="col-md-12" style="margin-top:15px !important">
				
			</div>

		</div>
		</div>
	</div>
	</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		<input type="submit" name="submit" class="btn btn-primary" value="Save">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
       </form>
      </div>
    </div>
  </div>
 
</div>

<script>
$(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
</script>
</body>