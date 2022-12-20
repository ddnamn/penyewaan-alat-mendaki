<?php
include('includes/checklogin.php');
check_login();
if (isset($_POST['save'])) {
  $itemtitle = $_POST['itemtitle'];
  $itemsbrand = $_POST['typename'];
  $itemsoverview = $_POST['description'];
  $priceperday = $_POST['priceperday'];
  $vimage1 = $_FILES["img1"]["name"];
  $vimage2 = $_FILES["img2"]["name"];
  $vimage3 = $_FILES["img3"]["name"];
  $vimage4 = $_FILES["img4"]["name"];
  $vimage5 = $_FILES["img5"]["name"];
  $antiair = $_POST['antiair'];
  $tahankarat = $_POST['tahankarat'];
  move_uploaded_file($_FILES["img1"]["tmp_name"], "img/vehicleimages/" . $_FILES["img1"]["name"]);
  move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
  move_uploaded_file($_FILES["img3"]["tmp_name"], "img/vehicleimages/" . $_FILES["img3"]["name"]);
  move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
  move_uploaded_file($_FILES["img5"]["tmp_name"], "img/vehicleimages/" . $_FILES["img5"]["name"]);

  $sql = "INSERT INTO tblitems(itemTitle,itemsBrand,itemsOverview,PricePerDay,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,antiair,tahankarat) VALUES(:itemtitle,:itemsbrand,:itemsoverview,:priceperday,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:antiair,:tahankarat)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':itemtitle', $itemtitle, PDO::PARAM_STR);
  $query->bindParam(':itemsbrand', $itemsbrand, PDO::PARAM_STR);
  $query->bindParam(':itemsoverview', $itemsoverview, PDO::PARAM_STR);
  $query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
  $query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
  $query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
  $query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
  $query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
  $query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
  $query->bindParam(':antiair', $antiair, PDO::PARAM_STR);
  $query->bindParam(':tahankarat', $tahankarat, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo '<script>alert("Toolsposted successfuly")</script>';
  } else {
    echo '<script>alert("update failed! try again later")</script>';
  }
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
                <h5 class="modal-title" style="float: left;">Register Tools</h5>
              </div>
              <div class="col-md-12 mt-4">
                <div class="row ">
                  <div class="form-group col-md-6 ">
                    <label for="exampleInputPassword1">Select Type<span style="color:red">*</span></label>
                    <select name="typename" class="form-control" required>
                      <option value="">Select </option>
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
                    <label for="exampleInputName1">ToolsTitle<span style="color:red">*</span></label>
                    <input type="text" name="itemtitle" class="form-control" value="" id="product" placeholder="Enter ToolsName" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputName1">ToolsDescription<span style="color:red">*</label>
                    <textarea class="form-control" name="description" rows="3" required></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="exampleInputName1">Price Per Day(in Rupiah)<span style="color:red">*</label>
                    <input type="text" name="priceperday" value="" placeholder="Enter Price" class="form-control" id="price" required>
                  </div>
                </div>
                <div class="row ">
                  <div class="form-group col-md-4 pl-md-0">
                    <label class="col-sm-12 pl-0 pr-0 ">Toolsimage1 <span style="color:red">*</label>
                    <div class="col-sm-12 pl-0 pr-0">
                      <input type="file" name="img1" class="file-upload-default">
                      <div class="input-group ">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" style="" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-4 pl-md-0">
                    <label class="col-sm-12 pl-0 pr-0 ">Toolsimage2 <span style="color:red">*</label>
                    <div class="col-sm-12 pl-0 pr-0">
                      <input type="file" name="img2" class="file-upload-default">
                      <div class="input-group ">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" style="" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-4 pl-md-0">
                    <label class="col-sm-12 pl-0 pr-0 ">Toolsimage3 <span style="color:red">*</label>
                    <div class="col-sm-12 pl-0 pr-0">
                      <input type="file" name="img3" class="file-upload-default">
                      <div class="input-group ">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" style="" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row ">
                  <div class="form-group col-md-4 pl-md-0">
                    <label class="col-sm-12 pl-0 pr-0 ">Toolsimage4 <span style="color:red">*</label>
                    <div class="col-sm-12 pl-0 pr-0">
                      <input type="file" name="img4" class="file-upload-default">
                      <div class="input-group ">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" style="" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-4 pl-md-0">
                    <label class="col-sm-12 pl-0 pr-0 ">Toolsimage5</label>
                    <div class="col-sm-12 pl-0 pr-0">
                      <input type="file" name="img5" class="file-upload-default">
                      <div class="input-group ">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" style="" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="">&nbsp;</div>
            <div class=" col -md-12 card">
              <div class="modal-header">
                <h5 class="modal-title" style="float: left;">specification</h5>
              </div>
              <div class="col-md-12 mt-4">

                <div class="row ">
                  <div class="form-group col-md-3">
                    <div class="checkbox checkbox-inline">
                      <input type="checkbox" id="antiair" name="antiair" value="1">
                      <label for="antiair"> Anti Air </label>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="checkbox checkbox-inline">
                      <input type="checkbox" id="tahankarat" name="tahankarat" value="1">
                      <label for="tahankarat"> Tahan Karat </label>
                    </div>
                  </div>
                </div>
                <button type="submit" style="float: right;" name="save" class="btn btn-primary  mr-2 mb-4">Save</button>
              </div>
            </div>
          </form>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php @include("includes/footer.php"); ?>
        <!-- partial -->
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