

<?php

//mysql connectivity

$conn=mysqli_connect("localhost", "root", "", "todo");

if(isset($_POST['submit']))
{
	$textbox=$_POST['textbox'];
	$sql="insert into todo_list(task) values('$textbox')";
	mysqli_query($conn, $sql);
}

if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	$sql="delete from todo_list where id=$id";
	mysqli_query($conn, $sql);
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>TO Do List</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="ToDo2.css">


</head>

<body>
	<div id="main">
		<div id="key"><h1>TO DO LIST</h1></div>
		<div id="upper">
			<form method="post">
				<div id="textbox">
					<input type="textbox" name="textbox" id="textbox" style="width: 100%; padding: 10px; border: none; height: 21px;" placeholder="Add tasks">
				</div>
				
				<div id="btn">
					<input type="submit" name="submit" value="submit" style="padding: 10px; display: inline-block; background: lightgreen; border: none;height: 40px;">
				</div>
			</form>
		</div>
		<div id="lower">
			
			
			<?php

			$sql1="select * from todo_list order by ID desc";
			$res=mysqli_query($conn, $sql1);
			$cnt=mysqli_num_rows($res);
			if($cnt>0)
			{
			?>
					
					
			<table id="tab">
					<?php

						while ($row=mysqli_fetch_assoc($res))
						{
					?>
								<tr>
                                    <td width="90%"><?php echo $row['task']?>;
                                </td>

                                <td><a href="Main.php?delete=<?php echo $row['id']?>">Delete</a></td>



								</tr>
					<?php
						}

					?>
					</table>
                    <?php }?>
		</div>
	</div>
</body>
</html>