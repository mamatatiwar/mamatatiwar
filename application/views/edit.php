
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#">Logo</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
  </ul>
</nav>
<div class="container-fluid">

	<h5 style="margin-top:100px;"align="center" >edit Data</h5>
		<div class="row" style="width:50%;border:1px solid;margin-left:350px;padding:20px;">
		<div class="col-md-12">
		<div class="form-group">
		
			<form action="../update/<?php echo $record['id']; ?>" method="post" enctype="">
		
			<div class="col-md-12">
			
			<p>
				Name:
				<input type="text" name="name" class="form-control" value="<?php echo $record['name'];?>">
				<input type="hidden" name="id" value="<?php echo $record['id']; ?>" >
			</p>
			</div>
			<div class="col-md-12">
			<p>
				email:
				<input type="text" name="email" class="form-control" value="<?php echo $record['email'];?>">
			</p>
			</div>
			<div class="col-md-12">
			<p>
				mobile:
				<input type="text" name="mobile" class="form-control" value="<?php echo $record['mobile'];?>">
			</p>
			</div>
			<div class="col-md-12 form-control">
			<p>
			<?php
				if($record['gender']=='male')
				{
					
				
			?>
			<input type="radio" name="gender" value="male"  checked="checked" >Male&nbsp;&nbsp;
			<input type="radio" name="gender" value="female" >FeMale&nbsp;&nbsp;
				<?php }else{

					?>
				<input type="radio" name="gender" value="male">Male&nbsp;&nbsp;
				<input type="radio" name="gender" value="female"  checked="checked" >FeMale&nbsp;&nbsp;
				<?php } ?>
			</p>
			</div>
			<div class="col-md-12 form-control" style="margin-top:20px !important">
			
			<p>
				sub:<b><input type="text" value="<?php echo $record['sub'];?>" disabled></b>&nbsp;&nbsp;
				<?php
					 $subs= explode(",",$record['sub']);
					if(in_array("php",$subs))
					{
						
				?>
				<input type="checkbox" name="sub[]" value="php"  checked="checked">php&nbsp;&nbsp;
				<?php
					}else{?>
					<input type="checkbox" name="sub[]" value="php">php&nbsp;&nbsp;
					<?php }
					if(in_array("java",$subs))
					{
				?>
				<input type="checkbox" name="sub[]" value="java" checked="checked">java&nbsp;&nbsp;
					<?php }else{?>
					<input type="checkbox" name="sub[]" value="java">java&nbsp;&nbsp;
					 <?php }
					 if(in_array("node",$subs))
					{
					?>
				<input type="checkbox" name="sub[]" value="node"  checked="checked">node&nbsp;&nbsp;
					<?php }else{ ?>
					<input type="checkbox" name="sub[]" value="node">node&nbsp;&nbsp;
					 <?php }
					 if(in_array("css",$subs))
					{
					?>
				<input type="checkbox" name="sub[]" value="css" checked="checked">css&nbsp;&nbsp;
					 <?php }else{
						 ?>
					 <input type="checkbox" name="sub[]" value="css">css&nbsp;&nbsp;
					 <?php } ?>
			
			</p>
			</div>
			<input type="submit" style="margin-top:20px !important" class="btn btn-primary" name="update"value="Update">
		</form>
		
		</div>
	</div>
</div>
</div>