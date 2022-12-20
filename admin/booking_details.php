<?php
include('includes/checklogin.php');
check_login();
if (isset($_REQUEST['eid'])) {
  $eid = intval($_GET['eid']);
  $status = "2";
  $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Booking Successfully Cancelled');</script>";
  echo "<script type='text/javascript'> document.location = 'cancelled_bookings.php; </script>";
}


if (isset($_REQUEST['aeid'])) {
  $aeid = intval($_GET['aeid']);
  $status = 1;

  $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Booking Successfully Confirmed');</script>";
  echo "<script type='text/javascript'> document.location = 'confirmed_bookings.php'; </script>";
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
                  <h5 class="modal-title" style="float: left;">Detail Penyewaan</h5>
                </div>
                <div class="table-responsive p-3" id="print">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="">
                    <tbody>
                      <?php
                      $bid = intval($_GET['bid']);
                      $sql = "SELECT tblusers.*,tbltype.TypeName,tblitems.itemTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.ToolsId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id,tblbooking.BookingNumber,
                    DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totalnodays,tblitems.PricePerDay
                    from tblbooking join tblitems on tblitems.id=tblbooking.ToolsId join tblusers on tblusers.EmailId=tblbooking.userEmail join tbltype on tblitems.itemsBrand=tbltype.id where tblbooking.id=:bid";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':bid', $bid, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                      ?>
                          <h3 style="text-align:center; color:red">#<?php echo htmlentities($result->BookingNumber); ?> Booking Details </h3>

                          <tr>
                            <th colspan="4" style="text-align:center;color:blue">Detail User</th>
                          </tr>
                          <tr>
                            <th>Booking No.</th>
                            <td>#<?php echo htmlentities($result->BookingNumber); ?></td>
                            <th>Nama User</th>
                            <td><?php echo htmlentities($result->FullName); ?></td>
                          </tr>
                          <tr>
                            <th>Email Id</th>
                            <td><?php echo htmlentities($result->EmailId); ?></td>
                            <th>Contact No</th>
                            <td><?php echo htmlentities($result->ContactNo); ?></td>
                          </tr>
                          <tr>
                            <th>Alamat</th>
                            <td><?php echo htmlentities($result->Address); ?></td>
                            <th>Kota</th>
                            <td><?php echo htmlentities($result->City); ?></td>
                          </tr>
                          <tr>
                            <th>Negara</th>
                            <td colspan="3"><?php echo htmlentities($result->Country); ?></td>
                          </tr>

                          <tr>
                            <th colspan="4" style="text-align:center;color:blue">Booking Details</th>
                          </tr>
                          <tr>
                            <th>Nama Barang</th>
                            <td><a href="edit_car.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->TypeName); ?> , <?php echo htmlentities($result->itemTitle); ?></td>
                            <th>Tanggal Booking</th>
                            <td><?php echo htmlentities($result->PostingDate); ?>
                            </td>
                          </tr>
                          <tr>
                            <th>Dari Tanggal</th>
                            <td><?php echo htmlentities($result->FromDate); ?></td>
                            <th>Sampai Tanggal</th>
                            <td><?php echo htmlentities($result->ToDate); ?></td>
                          </tr>
                          <tr>
                            <th>Total Hari</th>
                            <td><?php echo htmlentities($tdays = $result->totalnodays); ?></td>
                            <th>Harga Per Hari</th>
                            <td><?php echo htmlentities($ppdays = $result->PricePerDay); ?></td>
                          </tr>
                          <tr>
                            <th colspan="3" style="text-align:center"> Total</th>
                            <td><?php echo htmlentities($tdays * $ppdays); ?></td>
                          </tr>
                          <tr>
                            <th>Booking Status</th>
                            <td><?php
                                if ($result->Status == 0) {
                                  echo htmlentities('Not Confirmed yet');
                                } else if ($result->Status == 1) {
                                  echo htmlentities('Confirmed');
                                } else {
                                  echo htmlentities('Cancelled');
                                }
                                ?></td>
                            <th>Terakhir di Update</th>
                            <td><?php echo htmlentities($result->LastUpdationDate); ?></td>
                          </tr>

                          <?php
                          if ($result->Status == 0) {
                          ?>
                            <tr>
                              <td style="text-align:center" colspan="4">
                                <a href="booking_details.php?aeid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Apa Anda Yakin Mengkonfirmasi Booking ini?')" class="btn btn-primary"> Confirm Booking</a>

                                <a href="booking_details.php?eid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Apa Anda Yakin Membatalkan Booking ini?')" class="btn btn-danger"> Cancel Booking</a>
                              </td>
                            </tr>
                          <?php
                          } ?>
                      <?php $cnt = $cnt + 1;
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