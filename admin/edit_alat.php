<?php
include('includes/checklogin.php');
check_login();

if (isset($_POST['save'])) {
  $itemtitle = $_POST['car'];
  $brand = $_POST['brand'];
  $itemoverview = $_POST['description'];
  $priceperday = $_POST['priceperday'];
  $antiair = $_POST['antiair'];
  $tahankarat = $_POST['tahankarat'];
  $id = intval($_GET['id']);

  $sql = "update tblitems set itemTitle=:itemtitle,itemsBrand=:brand,itemsOverview=:itemoverview,PricePerDay=:priceperday,antiair=:antiair,tahankarat=:tahankarat where id=:id ";
  $query = $dbh->prepare($sql);
  $query->bindParam(':itemtitle', $itemtitle, PDO::PARAM_STR);
  $query->bindParam(':brand', $brand, PDO::PARAM_STR);
  $query->bindParam(':itemoverview', $itemoverview, PDO::PARAM_STR);
  $query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
  $query->bindParam(':antiair', $antiair, PDO::PARAM_STR);
  $query->bindParam(':tahankarat', $tahankarat, PDO::PARAM_STR);
  $query->bindParam(':id', $id, PDO::PARAM_STR);
  $query->execute();

  $msg = "Data updated successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php"); ?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class=" col -md-12 card">
              <div class="modal-header">
                <h5 class="modal-title" style="float: left;">Edit Alat</h5>
              </div>
              <?php
              if ($msg) {
              ?>
                <div class="succWrap">
                  <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
                </div>
              <?php
              } ?>
              <?php
              $id = intval($_GET['id']);
              $sql = "SELECT tblitems.*,tbltype.TypeName,tbltype.id as bid from tblitems join tbltype on tbltype.id=tblitems.itemsBrand where tblitems.id=:id";
              $query = $dbh->prepare($sql);
              $query->bindParam(':id', $id, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {
              ?>
                  <div class="col-md-12 mt-4">
                    <div class="row ">
                      <div class="form-group col-md-6 ">
                        <label for="exampleInputPassword1">Pilih Tipe Barang<span style="color:red">*</span></label>
                        <select name="brand" class="form-control" required>
                          <option value="<?php echo htmlentities($result->bid); ?>"><?php echo htmlentities($bdname = $result->TypeName); ?> </option>
                          <?php
                          $sql = "SELECT * from  tbltype";
                          $query = $dbh->prepare($sql);
                          $query->execute();
                          $results = $query->fetchAll(PDO::FETCH_OBJ);
                          if ($query->rowCount() > 0) {
                            foreach ($results as $row) {
                          ?>
                              <option value="<?php echo $row->id; ?>"><?php echo $row->TypeName; ?></option>
                          <?php
                            }
                          } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Nama Barang<span style="color:red">*</span></label>
                        <input type="text" name="car" class="form-control" value="<?php echo htmlentities($result->itemTitle) ?>" id="product" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="exampleInputName1">Deskripsi Barang<span style="color:red">*</label>
                        <textarea class="form-control" style=" font-family: fontawesome;
                         font-size: 17px; line-height: 25px;" name="description" rows="6" required><?php echo htmlentities($result->itemsOverview); ?></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Harga Per Hari<span style="color:red">*</label>
                        <input type="text" name="priceperday" value="<?php echo htmlentities($result->PricePerDay); ?>" class="form-control" id="price" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="form-group col-md-4 pl-md-0">
                        <label class="col-sm-12 pl-0 pr-0 ">Toolsimage1 </label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" width="300" height="200" style="border:solid 1px #000">
                          <a href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 1</a>
                        </div>
                      </div>
                      <div class="form-group col-md-4 pl-md-0">
                        <label class="col-sm-12 pl-0 pr-0 ">Toolsimage2 </label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" width="300" height="200" style="border:solid 1px #000">
                          <a href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 2</a>
                        </div>
                      </div>
                      <div class="form-group col-md-4 pl-md-0">
                        <label class="col-sm-12 pl-0 pr-0 ">Toolsimage3 </label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" width="300" height="200" style="border:solid 1px #000">
                          <a href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 3</a>
                        </div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="form-group col-md-4 pl-md-0">
                        <label class="col-sm-12 pl-0 pr-0 ">Toolsimage4 </label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" width="300" height="200" style="border:solid 1px #000">
                          <a href="changeimage4.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 4</a>
                        </div>
                      </div>
                      <div class="form-group col-md-4 pl-md-0">
                        <label class="col-sm-12 pl-0 pr-0 ">Toolsimage5</label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <?php if ($result->Vimage5 == "") {
                            echo htmlentities("File not available");
                          } else { ?>
                            <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" width="300" height="200" style="border:solid 1px #000">
                            <a href="changeimage5.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 5</a>
                          <?php
                          } ?>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="">&nbsp;</div>
            <div class=" col -md-12 card">
              <div class="modal-header">
                <h5 class="modal-title" style="float: left;">Accessories</h5>
              </div>
              <div class="col-md-12 mt-4">
                  <div class="form-group col-md-3">
                    <?php if ($result->antiair == 1) {
                    ?>
                      <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" name="antiair" checked value="1">
                        <label for="inlineCheckbox3"> Anti Air </label>
                      </div>
                    <?php
                    } else { ?>
                      <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" name="antiair" value="1">
                        <label for="inlineCheckbox3"> Anti Air </label>
                      </div>
                    <?php
                    } ?>
                  </div>
                  <div class="form-group col-md-3">
                    <?php if ($result->tahankarat == 1) {
                    ?>
                      <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" name="tahankarat" checked value="1">
                        <label for="inlineCheckbox3"> Tahan Karat </label>
                      </div>
                    <?php } 
                    else { ?>
                      <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" name="tahankarat" value="1">
                        <label for="inlineCheckbox3"> Tahan Karat </label>
                      </div>
                    <?php
                    } ?>
                  </div>
                </div>
                <button type="submit" style="float: right;" name="save" class="btn btn-primary btn-sm  mr-2 mb-4">Save</button>
              </div>
            </div>
        <?php
                }
              } ?>
          </form>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php @include("includes/foot.php"); ?>
  <!-- End custom js for this page -->
</body>

</html>