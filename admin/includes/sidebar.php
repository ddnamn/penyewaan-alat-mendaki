 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item nav-profile">
             <?php
                $aid = $_SESSION['odmsaid'];
                $sql = "SELECT * from  tbladmin where ID=:aid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $row) {
                ?>
                     <a href="#" class="nav-link">
                         <div class="nav-profile-image">
                             <?php
                                if ($row->Photo == "avatar15.jpg") {
                                ?>
                                 <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                             <?php
                                } else {
                                ?>
                                 <img class="img-avatar" src="profileimages/<?php echo $row->Photo; ?>" alt="">
                             <?php
                                } ?>
                         </div>
                         <div class="nav-profile-text d-flex flex-column">
                             <span class="font-weight-bold mb-2"><?php echo $row->FirstName; ?> <?php echo $row->LastName; ?></span>
                             <?php
                                $sql = "SELECT * from  tblcompany ";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':aid', $companyname, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $row) {
                                ?>
                                     <span class="text-secondary text-small"><?php echo $row->companyname; ?></span>
                             <?php
                                    }
                                } ?>
                         </div>
                     </a>
             <?php
                    }
                } ?>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="dashboard.php">
                 <span class="menu-title">Dashboard</span>
                 <i class="mdi mdi-home menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="ui-basic">
                 <span class="menu-title">Tipe Alat </span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-archive menu-icon"></i>
             </a>
             <div class="collapse" id="brand">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="Type.php">Atur Tipe Alat</a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                 <span class="menu-title">Pengaturan Alat</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-archive menu-icon"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="register_alat.php">Tambahkan Alat</a></li>
                     <li class="nav-item"> <a class="nav-link" href="manage_alat.php">Atur Alat</a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#bookings" aria-expanded="false" aria-controls="ui-basic">
                 <span class="menu-title">Total Penyewaan</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-briefcase-check menu-icon"></i>
             </a>
             <div class="collapse" id="bookings">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="new_bookings.php">Baru</a></li>
                     <li class="nav-item"> <a class="nav-link" href="confirmed_bookings.php">Telah Dikonfirmasi</a></li>
                     <li class="nav-item"> <a class="nav-link" href="cancelled_bookings.php">Dibatalkan</a></li>
                 </ul>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#companymanagement" aria-expanded="false" aria-controls="general-pages">
                 <span class="menu-title">Pengaturan Toko</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-bank menu-icon"></i>
             </a>
             <div class="collapse" id="companymanagement">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="companyprofile.php">Profil Toko</a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="manage_subscribers.php">
                 <span class="menu-title">Pengaturan Pelanggan</span>
                 <i class="mdi mdi-account-check menu-icon"></i>
             </a>
         </li>
         <?php
            $aid = $_SESSION['odmsaid'];
            $sql = "SELECT * from  tbladmin where ID=:aid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':aid', $aid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $row) {
                    if ($row->AdminName == "Admin") {
            ?>
                     <li class="nav-item">
                         <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                             <span class="menu-title">Pengaturan User</span>
                             <i class="menu-arrow"></i>
                             <i class="mdi mdi-account-multiple menu-icon"></i>
                         </a>
                         <div class="collapse" id="general-pages">

                             <ul class="nav flex-column sub-menu">
                                 <li class="nav-item"> <a class="nav-link" href="userregister.php">Daftarkan User</a></li>
                                 <li class="nav-item"> <a class="nav-link" href="customers.php">Pelanggan Terdaftar </a></li>
                                 <?php
                                    $aid = $_SESSION['odmsaid'];
                                    $sql = "SELECT * from  tbladmin where ID=:aid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $row) {
                                            if ($row->AdminName == "Admin") {
                                    ?>
                                             <li class="nav-item"> <a class="nav-link" href="user_permission.php"> Hak User</a></li>


                                 <?php
                                            }
                                        }
                                    } ?>
                             </ul>

                         </div>
                     </li>
         <?php
                    }
                }
            } ?>
     </ul>
 </nav>