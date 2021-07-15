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
			<td>Tên</td>
			<td>Giới tính</td>
			<td>Ngày sinh</td>
			<td>Chức vụ</td>
			<td>Lương</td>
			<td>CMND</td>
			<td>SDT</td>
			<td>Email</td>
			<td>Địa chỉ</td>
			<td>Hình ảnh</td>
			<td>lớp học</td>
		</tr>
	</thead>
	<tbody>
	<?php 
		$conn=new mysqli('localhost','root','','qlsinhvien1');
		$sql="SELECT sinhvien.masv, sinhvien.ten,
		sinhvien.gioitinh, sinhvien.ngaysinh,
		sinhvien.chucvu, sinhvien.luong,
		sinhvien.cmnd, sinhvien.sdt,
		sinhvien.email, sinhvien.diachi,
		sinhvien.hinhanh, lophoc.tenlophoc
		FROM sinhvien, lophoc 
		WHERE sinhvien.malophoc=lophoc.malophoc";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
			?> 
	    	<tr>
				<td><?php echo $row['ten']?></td>
				<td><?php echo $row['gioitinh']?></td>
				<td><?php echo $row['ngaysinh']?></td>
				<td><?php echo $row['chucvu']?></td>
				<td><?php echo $row['luong']?></td>
				<td><?php echo $row['cmnd']?></td>
				<td><?php echo $row['sdt']?></td>
				<td><?php echo $row['email']?></td>
				<td><?php echo $row['diachi']?></td>
				<td><?php echo $row['hinhanh']?></td>
				<td><?php echo $row['tenlophoc']?></td>
			</tr>
		<?php }
		} ?>
	</tbody>
</table>