<!DOCTYPE html>
<html>
<head>
	<title>checking</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>

</head>
<body>
	<div class="container">
		<h1 align="center">Live ... Inline Update data using X-editable with PHP and Mysql</h1>
		<br />
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Designation</th>
					<th>Age</th>
				</tr>
			</thead>
			<tbody id="employee_data"></tbody>
		</table>
	</div>
</body>
</html>


<script type="text/javascript" language="javascript">
$(document).ready(function(){
//$.fn.editable.defaults.mode = 'inline';
	function fetch_employee_data()
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				for (var count = 0; count < data.length; count++) 
				{
					var html_data = '<tr><td>'+data[count].ID+'</td>';
					html_data += '<td data-name="NAME" class="NAME" data-type="text" data-pk="'+data[count].id+'">'+data[count].NAME+'</td>';
					html_data += '<td data-name="FNAME" class="FNAME" data-type="text" data-pk="'+data[count].id+'">'+data[count].FNAME+'</td>';
					html_data += '<td data-name="EMAIL" class="EMAIL" data-type="text" data-pk="'+data[count].id+'">'+data[count].EMAIL+'</td>';
					html_data += '<td data-name="ADRS" class="ADRS" data-type="text" data-pk="'+data[count].id+'">'+data[count].ADRS+'</td></tr>';
					$('#employee_data').append(html_data);
				}
			}
		});
	}
	
	fetch_employee_data();
	
	$('#employee_data').editable({
		container:'body',
		selector:'td.name',
		url:'cupdate.php',
		title:'name',
		type:"POST",
		validate:function(value)
		{
			if ($.trim(value) == '') 
			{
				return 'This field id required';
			}
		}
	});
	$('#employee_data').editable({
		container:'body',
		selector:'td.gender',
		url:'cupdate.php',
		title:'Gender',
		type:"POST",
		source:[{value: "Male", text: "Male"},{value: "Female", text: "Female"}],
		validate:function(value)
		{
			if ($.trim(value) == '') 
			{
				return 'This field id required';
			}
		}

	});
	$('#employee_data').editable({
		container:'body',
		selector:'td.designation',
		url:'cupdate.php',
		title:'Designation',
		type:"POST",
		validate:function(value)
		{
			if ($.trim(value) == '') 
			{
				return 'This field id required';
			}
		}

	});
	$('#employee_data').editable({
		container:'body',
		selector:'td.age',
		url:'cupdate.php',
		title:'Age',
		type:"POST",
		validate:function(value)
		{
			if ($.trim(value) == '') 
			{
				return 'This field id required';
			}
			var expression = /^[0-9]+$/;
			if(! expression.test(value))
			{
				return 'Numbers only!';
			}
		}

	});

});
</script>

