<!doctype html>
<?php
session_start();//bat dau phien lam viec
require_once('SP.php');//import thu vien
global $result;//bien toan cuc
 $editMaSP="";
if (isset($_POST['btnEdit'])) {
  $editMaSP = $_POST['editMaSP'];
}
?>
<html lang="en">
  <head>
    <title>Quan tri san pham</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="jumbotron">
        <h1 class="display-3">Quan tri san pham</h1>
        <p class="lead">chi tiet...</p>
        <hr class="my-2">
      </div>
      <div class="card-columns">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Them san pham</h4>
                <form action="" method="post">
                    <div class="form-group">
                      <label for="">MaSP</label>
                      <input type="text" value="<?php echo $editMaSP; ?>"
                        class="form-control" name="txtMaSP" id="txtMaSP" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                      <label for="">TenSP</label>
                      <input type="text"
                        class="form-control" name="txtTenSP" id="txtTenSP" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">DonGia</label>
                        <input type="text"
                          class="form-control" name="txtDonGia" id="txtDonGia" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                      </div>
                      <div class="form-group">
                        <label for="">SoLuong</label>
                        <input type="text"
                          class="form-control" name="txtSoLuong" id="txtSoLuong" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                      </div>
                      <button type="submit" name="btnThem" class="btn btn-primary">Them</button>
                      <button type="submit" name="btnHienThi" class="btn btn-primary">Hien thi</button>
                      <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
               </form>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Danh sach san pham</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>MaSP</th>
                            <th>TenSP</th>
                            <th>DonGia</th>
                            <th>SoLuong</th>
                            <th>...</th>
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          if(isset($_POST['btnHienThi'])){//neu click vao button hien thi
                            $result=displaySP();//doc du lieu tu DB
                            while($row=$result->fetch_assoc())//doc tung dong cua ket qua
                            {
                              echo '<tr>';
                              echo  '<td scope="row">'.$row['MaSP'].'</td>';
                              echo  '<td>'.$row['TenSP'].'</td>';
                              echo  '<td>'.$row['DonGia'].'</td>';
                              echo  '<td>'.$row['SoLuong'].'</td>';
                              echo '<td>
                                      <form action="" method="post">
                                        <input type="hidden" name="editMaSP" value="'.$row['MaSP'].'">
                                        <button type="submit" name="btnEdit" class="btn btn-primary">Edit</button>
                                      </form>
                                    </td>';
                              echo '<td>
                                      <form action="" method="post">
                                        <input type="hidden" name="deleteMaSP" value="'.$row['MaSP'].'">
                                        <button type="submit" name="btnDelete" class="btn btn-primary">Delete</button>
                                      </form>
                                    </td>';
                              echo '</tr>';  
                            }
                          }
                        ?>
                             
                    </tbody>
                </table>
                <!-- ket thuc table -->
            </div>
        </div>
      </div>
      <?php
        if(isset($_POST['btnThem'])){//neu click button them
          $MaSP=$_POST['txtMaSP'];//lay du lieu tu form nguoi dung nhap
          $TenSP=$_POST['txtTenSP'];
          $DonGia=$_POST['txtDonGia'];
          $SoLuong=$_POST['txtSoLuong'];
          //goi ham them du lieu
          $i=addSP($MaSP,$TenSP,$DonGia,$SoLuong);
          if($i<0){
            echo "Them that bai";
          }
          else {
            echo "Them thanh cong";
          }
        }
        if(isset($_POST['btnUpdate'])){//neu click button them
          $MaSP=$_POST['txtMaSP'];//lay du lieu tu form nguoi dung nhap
          $TenSP=$_POST['txtTenSP'];
          $DonGia=$_POST['txtDonGia'];
          $SoLuong=$_POST['txtSoLuong'];
          //goi ham them du lieu
          $i=updateSP($MaSP,$TenSP,$DonGia,$SoLuong);
          if($i<0){
            echo "Update that bai";
          }
          else {
            echo "Update thanh cong";
          }
        }

        if(isset($_POST['btnEdit'])){
          $MaSP=$_POST['editMaSP'];
          // Logic to edit the product based on MaSP
          // This could involve displaying a form with the current product details
          // that the user can edit and submit to update the product.
          echo "Edit product with MaSP: $MaSP";
        }

        if(isset($_POST['btnDelete'])){
          $MaSP=$_POST['deleteMaSP'];
          // Logic to delete the product based on MaSP
          $i=deleteSP($MaSP);
          if($i<0){
            echo "Xoa that bai";
          }
          else {
            echo "Xoa thanh cong";
          }
        }
      ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
