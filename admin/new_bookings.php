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
                  <h5 class="modal-title" style="float: left;">Atur Alat</h5>
                </div>

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Booking No.</th>
                        <th>Nama Barang</th>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th>Status</th>
                        <th>Tanggal Posting</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $status = 0;
                      $sql = "SELECT tblusers.FullName,tbltype.TypeName,tblitems.itemTitle,tblitems.Vimage1,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.ToolsId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id,tblbooking.BookingNumber  from tblbooking join tblitems on tblitems.id=tblbooking.ToolsId join tblusers on tblusers.EmailId=tblbooking.userEmail join tbltype on tblitems.itemsBrand=tbltype.id where tblbooking.Status=:status";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':status', $status, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                      ?>
                          <tr>
                            <td><?php echo htmlentities($cnt); ?></td>
                            <td><?php echo htmlentities($result->FullName); ?></td>
                            <td><?php echo htmlentities($result->BookingNumber); ?></td>
                            <td>
                              <a href="edit_car.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->itemTitle); ?></a>
                            </td>
                            <td><?php echo htmlentities($result->FromDate); ?></td>
                            <td><?php echo htmlentities($result->ToDate); ?> </td>
                            <td><?php
                                if ($result->Status == 0) {
                                  echo htmlentities('Not Confirmed yet');
                                } else if ($result->Status == 1) {
                                  echo htmlentities('Confirmed');
                                } else {
                                  echo htmlentities('Cancelled');
                                }
                                ?></td>
                            <td><?php echo htmlentities($result->PostingDate); ?></td>
                            <td>
                              <a href="booking_details.php?bid=<?php echo htmlentities($result->id); ?>"> View</a>
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