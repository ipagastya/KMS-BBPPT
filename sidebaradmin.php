  <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="libs/assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $_SESSION['nama'] ?></div><small><?php echo $_SESSION['email'] ?></small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a href="dashboard.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Beranda</span>
                        </a>
                    </li>

                     <li>
                        <!-- <a href="informasi.php"><i class="sidebar-item-icon fa fa-newspaper-o"></i>
                            <span class="nav-label">Informasi</span>
                        </a> -->
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-newspaper-o"></i>
                            <span class="nav-label">Informasi</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                             <li >
                                <a href="informasi.php">Daftar Informasi</a>
                            </li>
                            <?php 
                            $level = $_SESSION['level'];
                            if($level=='Admin'){
                            ?>
                            <li >
                                <a href="tambah_informasi.php">Tambah Informasi</a>
                            </li>
                            <?php
                             }
                            ?> 
                        </ul>
                    </li>

                   
                    <!--<li>
                        <a href="favorit.php"><i class="sidebar-item-icon fa fa-star"></i>
                            <span class="nav-label">Favorit</span>
                        </a>
                    </li>-->

                      <li>
                        <a href="favorit.php"><i class="sidebar-item-icon fa fa-star"></i>
                            <span class="nav-label">Favorit</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <?php
                        // Tampilkan semua data
                        include"koneksi.php";
                        $username = $_SESSION['username'];
                        $q = $koneksi->query("
                            select informasi.nomordokumen,informasi.judul,informasi.dokumen, favorit.id as idfavorit, favorit.id, favorit.username
                            from favorit
                            INNER JOIN informasi
                            ON favorit.idinformasi = informasi.id where username='$username' order by id asc
                            ");

                        $no = 1; // nomor urut
                        while ($dt = $q->fetch_assoc()) : 
                        $id=$dt['id']
                        ?>
                            <li >
                                <a href="detail.php?id=<?php echo $id ?>"><?php echo $dt['judul'] ?></a>
                            </li>
                            <?php
                             endwhile;
                            ?> 
                            </ul>
                    </li>

                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-folder-open-o"></i>
                            <span class="nav-label">Kategori Informasi</span><i class="fa fa-angle-left arrow"></i></a>
                         <ul class="nav-2-level collapse">
                            <?php
                        // Tampilkan semua data
                        include"koneksi.php";
                        $username = $_SESSION['username'];
                        $q = $koneksi->query("select * from divisi");

                        $no = 1; // nomor urut
                        while ($dt = $q->fetch_assoc()) : 
                        ?>
                            <li >
                                <a href="artikelkategori.php?id=<?php echo $dt['iddivisi'] ?>"><?php echo $dt['namadivisi'] ?></a>
                            </li>
                            <?php
                             endwhile;
                            ?> 
                            </ul>
                    </li>

                     <?php 
                    $level = $_SESSION['level'];
                    if($level=='Admin'){
                    ?>
                    
                    <li>
                        <a href="perangkat.php"><i class="sidebar-item-icon fa fa-tablet "></i>
                            <span class="nav-label">Perangkat</span>

                        </a>
                    </li>

                    <li>
                        <a href="divisi.php"><i class="sidebar-item-icon fa fa-id-card-o "></i>
                            <span class="nav-label">Kategori</span>

                        </a>
                    </li>
                    
                   

                    <li>
                        <a href="akun.php"><i class="sidebar-item-icon fa fa-users "></i>
                            <span class="nav-label">Pegawai</span>

                        </a>
                    </li>
               

                    <?php
                    }
                    ?>   

                     <li>
                       <!-- <a href=""><i class="sidebar-item-icon fa fa-address-book"></i>
                            <span class="nav-label">Non Aktif Akun</span>
                        </a>-->
                    </li>
                    <!--<li>
                        <a href="logout.php"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>-->
                    
                     <li>
                        <a href="http://bbppt.postel.go.id/pengujian/"><i class="sidebar-item-icon fa fa-desktop"></i>
                            <span class="nav-label">Portal Pengujian</span>
                        </a>
                    </li>

                    <!--<li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Mailbox</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="mailbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="mail_view.html">Mail view</a>
                            </li>
                            <li>
                                <a href="mail_compose.html">Compose mail</a>
                            </li>
                        </ul>
                    </li>-->
                    
                  
                </ul>
            </div>
        </nav>