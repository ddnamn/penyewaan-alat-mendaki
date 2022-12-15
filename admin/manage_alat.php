<?php
include('includes/checklogin.php');
check_login();
if (isset($_REQUEST['del'])) {
  $delid = intval($_GET['del']);
  $sql = "delete from tblitems  WHERE  id=:delid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':delid', $delid, PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Toolsrecord deleted.');</script>";
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
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Manage tools</h5>
                </div>

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Vehicle Title</th>
                        <th>Brand </th>
                        <th>Price Per day</th>
                        <th>Fuel Type</th>
                        <th>Model Year</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT tblitems.itemTitle,tblitems.Vimage1,tblbrands.BrandName,tblitems.PricePerDay,tblitems.FuelType,tblitems.ModelYear,tblitems.id from tblitems join tblbrands on tblbrands.id=tblitems.itemsBrand";
                      $query = $dbh->prepare($sql);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) {
                      ?>
                          <tr>
                            <td class="text-center"><?php echo htmlentities($cnt); ?></td>
                            <td>
                              <img src="img/vehicleimages/<?php echo $row->Vimage1; ?>" class="mr-2" alt="image"><a href="#" class=" edit_data5" id="<?php echo ($row->id); ?>"><?php echo htmlentities($row->itemTitle); ?></a>
                            </td>
                            <td class="text-center"><?php echo htmlentities($row->BrandName); ?></td>
                            <td class="text-center"><?php echo htmlentities($row->PricePerDay); ?></td>
                            <td><?php echo htmlentities($row->FuelType); ?></td>
                            <td><?php echo htmlentities($row->ModelYear); ?></td>
                            <td>
                              <a href="edit_alat.php?id=<?php echo $row->id; ?>" title="click to edit"><i class="mdi mdi-pencil-box-outline" aria-hidden="true"></i></a>
                              <a href="manage_alat.php?del=<?php echo $row->id; ?>" onclick="return confirm('Do you want to delete');"><i class="mdi mdi-delete"></i></i></a>
                            </td>
                          </tr>
                      <?php
                          $cnt = $cnt + 1;
                        }
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
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