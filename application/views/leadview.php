 <head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> product
            <small>Add / Edit/ Delete Task</small>
        </h1>
    </section>

 <div class="box-body table-responsive no-padding">
          
            <div class="panel-body">
				<div class = "form-group" style="float:right">
                    	 <a class="btn btn-primary btn-sm" id="addbtn">
                         <i class = "fa fa-plus"> </i> Add Note </a>
							
          			</div>
			<div id="leadinfo">
				<table border="1" width="100%" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Action</th>
							<th>Note</th>
							<th>DateTime</th>
							<th colspan="2">Activity</th>
						</tr>
					</thead>
					
					<tbody id="list"></tbody>
				</table>
			</div>
				
              <div id="leadform" class="form-group col-md-6" style="display:none; background:white;border:1px solid gray">
					<p>
						Select Action:
						<select class="form-control required" id="uaction">
							<option>Call</option>
							<option>Message</option>
							<option>Meet</option>
						</select>
					</p>
					<p>
						Note:
						<textarea class="form-control" cols="40" rows="3" id="unote" name="advantage" rows="10" ></textarea>
					</p>
					<p>
						<input type="submit" id="savedata" class="btn btn-primary">
					</p>
				</div>
            </div>
        </div>
</div>
<script>
	$(document).ready(function(){
		
		$("#addbtn").click(function(){
			$("#leadform").slideDown();
		});
		$("#savedata").click(function(){
			var action=$("#uaction").val();
			var note=$("#unote").val();
			
			var x=new XMLHttpRequest();
			x.open("GET","lead/savedatafun?act="+action+"&nt="+note,true);
			//alert("lead/savedatafun?act="+action+"&nt="+note);
			x.send();
			x.onreadystatechange=function()
			{
				if(x.readyState==4)
				{
					//alert(action);
					x.responseText;
					getallinfo();
				}
			}
			$("#leadform").slideUp();
			$("#uaction").val(" ");
			$("#unote").val(" ");
		});
		function getallinfo()
		{
			$.post("lead/getall_leadinfo", function(data){
				var obj=$.parseJSON(data);
				$("#list").html("");
				for(i=0;i<obj.length;i++) 
				{
					console.log(obj[i]['id']);
					$("#list").append("<tr><td>"+obj[i]['id']+"</td><td>"+obj[i]['action']+"</td><td>"+obj[i]['note']+"</td><td>"+obj[i]['datetime']+"</td><td><a href='lead/edit/"+obj[i]['id']+"' class='btn btn-primary btn-sm'>edit</a></td><td><a class='btn btn-danger btn-sm' href='lead/delete/"+obj[i]['id']+"'>delete</a></td></tr>");
				
				}
		});
		}
		getallinfo();
	});
</script>