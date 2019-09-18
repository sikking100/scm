<?php

    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        //user
        if($page == 'dashboard') {
            include "page/dashboard/index.php";
        } elseif ($page == 'user') {
            include "page/user/index.php";
        } elseif ($page == 'createuser') {
            include "page/user/create.php";
        } elseif ($page == 'edituser') {
            include "page/user/edit.php";
        } elseif ($page == 'hapususer') {
            include "page/user/delete.php";
        } elseif ($page == 'detailuser') {
            include "page/user/detail.php";
        } 
        
        //supplier
        elseif ($page == 'supplier') {
            include "page/supplier/index.php";
        } elseif ($page == 'createsupplier') {
            include "page/supplier/create.php";
        } elseif ($page == 'editsupplier') {
            include "page/supplier/edit.php";
        } elseif ($page == 'hapussupplier') {
            include "page/supplier/delete.php";
        } elseif ($page == 'detailsupplier') {
            include "page/supplier/detail.php";
        } 
        
        //laporan kasir
        elseif ($page == 'laporankasir') {
            include "page/kasir/index.php";
        } elseif ($page == 'createlaporan') {
            include "page/kasir/create.php";
        } elseif ($page == 'hapuslaporan') {
            include "page/kasir/delete.php";
        } elseif ($page == 'editlaporan') {
            include "page/kasir/edit.php";
        } elseif ($page == 'chart') {
            include "page/kasir/chart.php";
        } elseif ($page == 'cetak') {
            include "page/kasir/cetak.php";
        } elseif ($page == 'tabellaporan') {
            include "page/kasir/index.php";
        } elseif ($page == 'tampilkanlaporan') {
            include "page/kasir/tabellaporan.php";
        }

        //produk supplier
        elseif ($page == 'produk') {
            include "page/produk/index.php";
        } elseif ($page == 'tambahproduk') {
            include "page/produk/create.php";
        } elseif ($page == 'editproduk') {
            include "page/produk/edit.php";
        } elseif ($page == 'hapusproduk') {
            include "page/produk/delete.php";
        } elseif ($page == 'detailproduk') {
            include "page/produk/detail.php";
        }

        //admin pesan
        elseif ($page == 'pesan') {
            include "page/pesan/index.php";
        } elseif ($page == 'pesanan') {
            include "page/pesan/pesan.php";
        } elseif ($page == 'tambahpesanan') {
            include "page/pesan/create.php";
        }

        //konfirmasi pesanan
        elseif ($page == 'konfirmasipesanan') {
            include "page/pesan/konfirmasipesanan.php";
        }

        //faktur
        elseif ($page == 'faktur') {
            include "page/faktur/index.php";
        } elseif ($page == 'detailfaktur') {
            include "page/faktur/detailfaktur.php";
        } elseif ($page == 'konfirmasibayar') {
            include "page/faktur/konfirmasibayar.php";
        }

    } else {
        include "page/dashboard/index.php";
    }

?>