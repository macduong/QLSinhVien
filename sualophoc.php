<?php
$connect = new mysqli("localhost", "root", "", "qlsinhvien1");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT * FROM lophoc 
    WHERE tenlophoc LIKE '%".$search."%'
    OR sdt LIKE '%".$search."%' 
    ";
    $result = $connect->query($query);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {   
            $output .= '
            <div>
                <h4>Thông tin lớp học</h4>
                <form method="POST">
                    <div class="form-row form-group col-xl-12">
                        <input readonly type="text" class="form-control" placeholder="mã lớp học" name="maps" required value="'.$row['malophoc'].'">
                    </div>
                    <div class="form-row form-group col-xl-12">
                        <input type="text" class="form-control" placeholder="Tên lớp học" name="tenlophocs" required value="'.$row['tenlophoc'].'">
                    </div>
                    <div class="form-row col-xl-12">
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="sdtpb" required value="'.$row['sdt'].'">
                    </div>
                <br>
                <div class="form-row form-group col-xl-12 text-center">
                    <input type="submit" value="Sửa lớp học" name="btnsuapb">
                </div>
                </form>
            </div>
            ';
        }
        echo $output;
    }
    else
    {
        echo 'Nhập sai nhập lại';
    }
}   
?>

