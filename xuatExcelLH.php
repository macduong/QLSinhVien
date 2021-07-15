<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data.xls");
header("Pragma: no-cache");
header("Expires: 0");
?> 
<meta charset="utf-8" /> 
<table>
	<thead>
		<tr>
			<td>Mã Lớp học</td>
			<td>Tên Lớp học</td>
			<td>Số điện thoại giảng viên</td>
		</tr>
	</thead>
	<tbody>
	<?php 
		$conn=new mysqli('localhost','root','','qlsinhvien1');
		$sql="select * from lophoc";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
			?> 
	    	<tr>
				<td><?php echo $row['malophoc']?></td>
				<td><?php echo $row['tenlophoc']?></td>
				<td><?php echo $row['sdt']?></td>
			</tr>
		<?php }
		} ?>
	</tbody>
</table>