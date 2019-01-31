<?php
$connect=mysqli_connect("localhost:3308","root","","hostel_management_system");

if(isset($_POST["submit"])){
		$file=$_FILES['csvfile']['tmp_name'];
			$handle=fopen($file,"r");
			$i=0;
			while($cont=fgetcsv($handle,10,",")){
				$table=rtrim($_FILES['csvfile']['name'],".csv");
				if($i==0){
				$name=$cont[0];
				$reg=$cont[1];
				$email=$cont[2];
				$branch=$cont[3];
					$year=$cont[4];
				$sql="create table $table ($name varchar(20),$reg int,$email varchar(50),$branch varchar(20),$year varchar(10));";
				echo $sql,"<br>";
				mysqli_query($connect,$sql);
				}
				else{
					$sql="insert into $table ($name,$reg,$email,$branch,$year)values('$cont[0]','$cont[1]','$cont[2]','$cont[3]','$cont[4]');";
					echo $sql,"<br>";
					mysqli_query($connect,$sql);
				
				}
				$i++;
			}
	
						print("Import done");
		}

?>
<html>
<body>
	<form method="post" enctype="multipart/form-data">
		<div><p><input type="file" name="csvfile" required="required"/></p>
		<p><input type="submit" name="submit" value="Import"/></p>
		</div>
	</form>
	</body>
</html>
	  
	  