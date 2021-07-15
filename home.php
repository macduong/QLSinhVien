<?php
$conn=new mysqli('localhost', 'root', '', 'QLsinhvien1');
if(!$conn){
    die("Không thể kết nối");
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="fontawesome-free-5.12.1-web/css/all.css">
    <title>Quản lí Sinh viên</title>
    <style type="text/css">
        .m3_header{
            float: left;
            width: 100%;
            background: #252526;
            height: 50px;
        }
        .m3_header a:hover{
            color: #7FBA00;
        }
        .m3_main{
            float: left;
            width: 100%;
        }
        .m3_them{
            float: left;
            width: 50%;
            color: white;
            padding-top: 8px;
        }
        .m3_sua{
            float: left;
            width: 50%;
            color: white;
            padding-top: 8px;
        }
        .message{
            width: 85%;
            background: white;
            border-radius: 10px;
            border: 1px solid #F78F8F;
            margin-top: 20px;
        }
        .xuatexcel{
            width: 85%;
            background: white;
            border-radius: 5px 5px 0px 0px;
            border: 1px solid #C1C1C1;
            margin-top: 20px;
        }
        
        .mail{
            width: 85%;
            background: white;
            border-radius: 0px 0px 5px 5px;
            border-right: 1px solid #C1C1C1; 
            border-left: 1px solid #C1C1C1; 
            border-bottom: 1px solid #C1C1C1;  
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="main_header">
            <div class="contai text-left">
                <div class="col1 text-left">
                    <i class="fas fa-user-cog" style="color:white"></i><span style="color:white">Quản lí Sinh viên</span>
                </div>
                <div class="col2 text-right">
                    <form action="home.php" method="post">
                        <input type="submit" class="btn btn-primary" name="dx" value="Đăng xuất"></button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST['dx'])){
            if(isset($_SESSION['username']) && isset($_SESSION['pass'])){
                unset($_SESSION['username']);
                unset($_SESSION['pass']);
            }
            header('location:index.php');
        }
        ?>
        <!--        trang chu-->
        <div class="main_m">
            <div class="contai">
                <!-- Bảng điều khiển bên trái -->
                <div class="m_left">
                    <div class="m_tittle">
                        <span>Bảng điều khiển</span>
                    </div>
                    <div class="m_main">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <button type="button" class="byn1 text-left">Sinh viên</button>
                            </li>
                            <li class="list-group-item">
                                <button type="button" class="byn2 text-left">Lớp học</button>
                            </li>
                        </ul>
                    </div>
                    <!-- thông báo sinh nhật -->
                    <div class="message">
                        <div class="mess_header col-xl-12 text-center" style="margin-top: 10px;margin-bottom: 20px;">
                           <span>Sinh viên có sinh nhật</span>
                       </div>
                       <div class="form-row form-group col-xl-12">
                        <table>
                            <?php
                            $thang=date("m");
                            $ngay=date("d");
                            $sql="SELECT * 
                            FROM sinhvien 
                            WHERE MONTH(ngaysinh) = '$thang'
                            AND DAY(ngaysinh)='$ngay';";
                            $result=$conn->query($sql);
                            if($result->num_rows>0){
                                while ($row=$result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><i class="fas fa-birthday-cake" style="margin-right: 10px;"></i><?php echo $row['ten'] ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>

                <!-- xuất excel -->
                    <div class="xuatexcel">
                        <div class="form-group col-xl-12">
                            <a class="btn" data-toggle="collapse" data-target="#lissp100">Xuất Excel</a>
                        </div>
                        <div class="collapse" id="lissp100">
                                <a class="btn" href="xuatExcelSV.php" style="color: #E38035">Sinh viên</a>
                                <a class="btn" href="xuatExcelLH.php" style="color: #E38035">Lớp học</a>
                        </div>
                    </div>
                    <div class="mail">
                        <div class="form-group col-xl-12">
                            <a class="btn" class="btnmail" href="gdMail.php">Gửi thông báo</a>
                        </div>
                    </div>
            </div>
            <!-- Các chức năng -->
            <div class="m_right">
                <!-- trang chur -->
                <div class="m1">
                    <div class="mright_header">
                        <span>Tổng quan</span>
                    </div>
                    <div class="mright_main">
                        <div class="msinhvien">
                            <div class="msv1 text-center">
                                <h3>
                                    <?php
                                    $sql="select count(masv) as tong from sinhvien";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    echo $row['tong'];
                                    ?>
                                </h3>
                                <h3>Sinh viên</h3>
                            </div>
                            <div class="msv2">
                                <img src="img/people_100px.png">
                            </div>
                        </div>
                        <div class="mlophoc">
                            <div class="msv1 text-center">
                                <h3>
                                    <?php
                                    $sql="select count(malophoc) as tong from lophoc";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    echo $row['tong'];
                                    ?>
                                </h3>
                                <h3>Lớp học</h3>
                            </div>
                            <div class="msv2">
                                <img src="img/department_100px.png">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- trang chức năng Sinh viên -->
                <div class="m2">
                    <!-- các chức năng  -->
                    <div class="m2_header">
                       <!-- button thêm Sinh viên -->
                       <div class="m2_them text-center">
                        <div class="form-group">
                            <a class="btn" data-toggle="collapse" data-target="#lissp1">Thêm Sinh viên</a>
                        </div>
                    </div>
                    <!-- button sửa Sinh viên -->
                    <div class="m2_sua text-center">
                        <div class="form-group">
                            <a class="btn" data-toggle="collapse" data-target="#lissp2">Sửa Sinh viên</a>
                        </div>
                    </div>
                    <!-- button xóa Sinh viên -->
                    <div class="m2_xoa text-center">
                        <div class="form-group">
                            <a class="btn" data-toggle="collapse" data-target="#lissp3">Xóa Sinh viên</a>
                        </div>
                    </div>
                    <!-- button tìm kiếm -->
                    <div class="m2_timkiem text-center">
                        <div class="form-group">
                            <a class="btn bynsearch" data-toggle="collapse" data-target="#lissp4">Tìm kiếm</a>
                        </div>
                    </div>
                </div>
                <div class="m2_main">
                    <!--                            Them nhan vien-->
                    <div class="collapse" id="lissp1">
                        <form method="POST" action="home.php">
                            <br>
                            <div class="form-row form-group col-xl-12">
                                <input type="text" class="form-control" placeholder="Tên Sinh viên" name="tensv" required>
                            </div>
                            <div class="form-row col-xl-12">
                                <div class="form-group col-xl-4">
                                    <input type="date" class="form-control" placeholder="Ngày sinh" name="ns" required>
                                </div>
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="Giới tính" name="gioitinh" required>
                                </div>
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="Chức vụ" name="chucvu" required>
                                </div>
                            </div>
                            <div class="form-row col-xl-12">
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="Lương" name="luong" required>
                                </div>
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="CMND" name="cmnd" required>
                                </div>
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt" required>
                                </div>
                            </div>
                            <div class="form-row col-xl-12">
                                <div class="form-group col-xl-6">
                                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group col-xl-6">
                                    <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" required>
                                </div>
                            </div>
                            <div class="form-row form-group col-xl-12">
                                <div class="form-group col-xl-6">
                                    <input type="file" class="form-control" placeholder="Địa chỉ" name="hinhanh" required>
                                </div>
                                <div class="form-group col-xl-6">
                                    <select class="form-control" name="mlh">
                                        <?php
                                        $sql="select * from lophoc";
                                        $result=$conn->query($sql);
                                        if($result->num_rows>0){
                                            while($row=$result->fetch_assoc()){
                                                ?>
                                                <option>
                                                    <?php echo $row['tenlophoc'].'-'.$row['malophoc']; ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row form-group col-xl-12 text-center">
                                <input type="submit" value="Thêm Sinh viên" name="btnthem">
                            </div>
                            <?php
                            if(isset($_POST['btnthem'])){
                                $tensv=$_POST['tensv'];
                                $ngaysinh=$_POST['ns'];
                                $gioitinh=$_POST['gioitinh'];
                                $chucvu=$_POST['chucvu'];
                                $luong=$_POST['luong'];
                                $cmnd=$_POST['cmnd'];
                                $sdt=$_POST['sdt'];
                                $email=$_POST['email'];
                                $diachi=$_POST['diachi'];
                                $hinhanh=$_POST['hinhanh'];
                                $malh=$_POST['mlh'];
                                $n1=strstr($malh,"-");;
                                $chuoi1=ltrim($n1, "-");
                                $sql1="INSERT INTO sinhvien(ten, ngaysinh, gioitinh, chucvu, luong, cmnd, sdt, email, diachi, hinhanh, malophoc)
                                VALUES ('$tensv','$ngaysinh','$gioitinh','$chucvu','$luong','$cmnd','$sdt','$email','$diachi','$hinhanh','$chuoi1');";
                                if($conn->query($sql1) ===true){
                                    echo '<script> window.alert("Thêm thành công"); </script>';
                                    unset($_POST['tensv']);
                                }
                                else{
                                    echo 'them that bai'.$conn->error;
                                }
                            }
                            ?>
                        </form>
                    </div>
                    <!--                            Sua nhan vien-->
                    <div class="collapse" id="lissp2">
                        <br>
                        <div class="form-group">
                            <div class="form-row form-group col-xl-12">
                                <input type="text" name="suasv" id="suasv" placeholder="Nhập tên Sinh viên để sửa" class="form-control" />
                            </div>
                        </div>
                        <br>
                        <div id="formsuasv"></div>
                        <?php
                        if(isset($_POST['btnsua'])){
                            $masv1=$_POST['masv1'];
                            $tensv1=$_POST['tensv1'];
                            $ngaysinh1=$_POST['ns1'];
                            $gioitinh1=$_POST['gioitinh1'];
                            $chucvu1=$_POST['chucvu1'];
                            $luong1=$_POST['luong1'];
                            $cmnd1=$_POST['cmnd1'];
                            $sdt1=$_POST['sdt1'];
                            $email1=$_POST['email1'];
                            $diachi1=$_POST['diachi1'];
                            $hinhanh1=$_POST['hinhanh1'];
                            $malh1=$_POST['lophoc1'];
                            $sql="UPDATE sinhvien
                            SET ten='$tensv1', ngaysinh='$ngaysinh1', gioitinh='$gioitinh1',
                            chucvu='$chucvu1', luong='$luong1', cmnd='$cmnd1',
                            sdt='$sdt1', email='$email1', diachi='$diachi1',
                            hinhanh='$hinhanh1', malophoc='$malh1'
                            WHERE masv='$masv1'";
                            if($conn->query($sql) === true){
                                echo '<script> window.alert("Cập nhật thành công") </script>';
                            }
                            else{
                                echo "Cập nhật thất bại".$conn->error;
                            }
                        }
                        ?>
                    </div>
                    <!--                            Xoa nhan vien-->
                    <div class="collapse" id="lissp3">
                        <br>
                        <form action="home.php" method="post">
                            <div class="form-row form-group col-xl-12">
                                <div class="form-group col-xl-10">
                                    <select class="form-control" name="tensvxoa">
                                        <?php
                                        $sql="select ten from sinhvien";
                                        $result=$conn->query($sql);
                                        if($result->num_rows>0){
                                            while($row=$result->fetch_assoc()){
                                                ?>
                                                <option>
                                                    <?php echo $row['ten']; ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-xl-2">
                                    <input type="submit" class="form-control" name="btnxoa" value="Xóa Sinh viên">
                                </div>
                            </div>
                            <?php
                            if(isset($_POST['btnxoa'])){
                                $ten=$_POST['tensvxoa'];
                                $sql="delete from sinhvien where ten='$ten';";
                                $result=$conn->query($sql);
                                if($result === true){
                                    echo '<script> window.alert("Xóa thành công") </script>';
                                }
                                else{
                                    echo "Xoá thất bại".$conn->error;
                                }
                            }
                            ?>
                        </form>
                    </div>
                    <!-- tim kiem nhan vien-->
                    <div class="collapse" id="lissp4">
                        <br>
                        <div class="form-group">
                            <div class="input-group form-row col-xl-12">
                                <input type="text" name="search_text" id="search_text" placeholder="Nhập để tìm kiếm" class="form-control" />
                            </div>
                        </div>
                        <br />
                        <div id="result"></div>

                        <br>
                    </div>
                    <!--  hien thi danh sach nhan vien-->
                    <div class="hienthi">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr style="font-size: 11px;">
                                    <th>Ảnh</th>
                                    <th>Tên Sinh viên</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Chức vụ</th>
                                    <th>Lương</th>
                                    <th>CMND</th>
                                    <th>SDT</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Lớp học</th>
                                </tr>
                            </thead>
                            <?php
                            $sql="SELECT sinhvien.ten, sinhvien.ngaysinh, sinhvien.gioitinh, sinhvien.chucvu, sinhvien.luong, sinhvien.cmnd,
                            sinhvien.sdt, sinhvien.email, sinhvien.diachi, sinhvien.hinhanh, lophoc.tenlophoc
                            FROM sinhvien, lophoc WHERE sinhvien.malophoc=lophoc.malophoc;";
                            $result = $conn->query($sql);
                            ?>
                            <tbody>
                                <?php
                                if($result->num_rows>0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <tr style="font-size: 11px;">
                                            <td>
                                                <img src="img/<?php echo $row['hinhanh']; ?>" style="width: 60px;">
                                            </td>
                                            <td><?php echo $row['ten']; ?></td>
                                            <td><?php echo $row['ngaysinh']; ?></td>
                                            <td><?php echo $row['gioitinh']; ?></td>
                                            <td><?php echo $row['chucvu']; ?></td>
                                            <td><?php echo $row['luong']; ?></td>
                                            <td><?php echo $row['cmnd']; ?></td>
                                            <td><?php echo $row['sdt']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['diachi']; ?></td>
                                            <td><?php echo $row['tenlophoc']; ?></td>
                                        </tr>
                                    <?php }
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- trang chức năng của Lớp học -->
            <div class="m3">
                <!-- các chức năng  -->
                <div class="m3_header">
                   <!-- button thêm Lớp học -->
                   <div class="m3_them text-center">
                    <div class="form-group">
                        <a class="btn" data-toggle="collapse" data-target="#lissp01">Thêm Lớp học</a>
                    </div>
                </div>
                <!-- button sửa Lớp học -->
                <div class="m3_sua text-center">
                    <div class="form-group">
                        <a class="btn" data-toggle="collapse" data-target="#lissp02">Sửa Lớp học</a>
                    </div>
                </div>
            </div>
            <div class="m3_main">
                <!--Them Lớp học-->
                <div class="collapse" id="lissp01">
                    <form method="POST" action="home.php">
                        <br>
                        <div class="form-row form-group col-xl-12">
                            <input type="text" class="form-control" placeholder="Tên Lớp học" name="tenlh" required>
                        </div>
                        <div class="form-row col-xl-12">
                            <input type="text" class="form-control" placeholder="Số điện thoại" name="sdtlh" required>
                        </div>
                        <div class="form-group col-xl-12 text-center">
                            <br>
                            <input type="submit" value="Thêm Lớp học" name="btnthemlh">
                        </div>
                        <?php
                        if(isset($_POST['btnthemlh'])){
                            $tensv=$_POST['tenlh'];
                            $sdtlh=$_POST['sdtlh'];
                            $sql1="INSERT INTO lophoc(tenlophoc, sdt) VALUES ('$tensv','$sdtlh');";
                            if($conn->query($sql1) ===true){
                                echo '<script> window.alert("Thêm thành công"); </script>';
                            }
                            else{
                                echo 'Thêm thất bại'.$conn->error;
                            }
                        }
                        ?>
                    </form>
                </div>
                <!--Sửa Lớp học-->
                <div class="collapse" id="lissp02">
                    <br>
                    <div class="form-group">
                        <div class="form-row form-group col-xl-12">
                            <input type="text" name="sualh" id="sualh" placeholder="Nhập tên Lớp học để sửa" class="form-control" />
                        </div>
                    </div>
                    <br>
                    <div id="formsualh"></div>
                    <?php
                    if(isset($_POST['btnsualh'])){
                        $malhs=$_POST['maps'];
                        $tenlhs=$_POST['tenlophocs'];
                        $sdtlh=$_POST['sdtlh']; 
                        $sql3="UPDATE lophoc SET tenlophoc='$tenlhs', sdt='$sdtlh' WHERE malophoc='$malhs'";
                        if($conn->query($sql3) === true){
                            echo '<script> window.alert("Cập nhật thành công") </script>';
                        }
                        else{
                            echo "Cập nhật thất bại".$conn->error;
                        }
                    } 
                    ?>
                </div>
                <!--hien thi danh sach nhan vien-->
                <div class="hienthi">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr style="font-size: 13px;">
                                <th>Mã Lớp học</th>
                                <th>Tên Lớp học</th>
                                <th>Số điện thoại</th>
                            </tr>
                        </thead>
                        <?php
                        $sql="SELECT * FROM lophoc;";
                        $result = $conn->query($sql);
                        ?>
                        <tbody>
                            <?php
                            if($result->num_rows>0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr style="font-size: 13px;">
                                        <td><?php echo $row['malophoc']; ?></td>
                                        <td><?php echo $row['tenlophoc']; ?></td>
                                        <td><?php echo $row['sdt']; ?></td>
                                    </tr>
                                <?php }
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="js/home.js"></script>
</body>
</html>
<!-- ajax xử lí tìm kiếm -->
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"timKiemsinhvien.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();            
            }
        });
    });
</script>

<!-- ajax xử lí sửa Sinh viên -->
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"suasinhvien.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#formsuasv').html(data);
                }
            });
        }

        $('#suasv').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();            
            }
        });
    });
</script>

<!-- ajax xử li sửa Lớp học -->
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"sualophoc.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#formsualh').html(data);
                }
            });
        }

        $('#sualh').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();            
            }
        });
    });
</script>

