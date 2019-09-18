<?php
function UploadImage($fupload_name)
{
    //direktori gambar
    $vdir_upload = "foto/";
    $vfile_upload = $vdir_upload . $fupload_name;

    //Simpan gambar dalam ukuran sebenarnya
    move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

    //identitas file asli
    $im_src = imagecreatefromjpeg($vfile_upload);
    $src_width = imageSX($im_src);
    $src_height = imageSY($im_src);

    //Simpan dalam versi small 350 pixel
    //Set ukuran gambar hasil perubahan
    $dst_width = 60;
    $dst_height = 60;

    //proses perubahan ukuran
    $im = imagecreatetruecolor($dst_width, $dst_height);
    imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

    //Simpan gambar
    imagejpeg($im, $vdir_upload . "small_" . $fupload_name);

    //Hapus gambar di memori komputer
    imagedestroy($im_src);
    imagedestroy($im);
}

function HapusImage($foto)
{
    unlink("foto/$foto");
    unlink("foto/small_$foto");
}

function UploadProduk($fupload_name)
{
    //direktori gambar
    $vdir_upload = "foto_produk/";
    $vfile_upload = $vdir_upload . $fupload_name;

    //Simpan gambar dalam ukuran sebenarnya
    move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

    //identitas file asli
    $im_src = imagecreatefromjpeg($vfile_upload);
    $src_width = imageSX($im_src);
    $src_height = imageSY($im_src);

    //Simpan dalam versi small 350 pixel
    //Set ukuran gambar hasil perubahan
    $dst_width = 120;
    $dst_height = 120;

    //proses perubahan ukuran
    $im = imagecreatetruecolor($dst_width, $dst_height);
    imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

    //Simpan gambar
    imagejpeg($im, $vdir_upload . "small_" . $fupload_name);

    //Hapus gambar di memori komputer
    imagedestroy($im_src);
    imagedestroy($im);
}

function HapusFotoProduk($foto)
{
    unlink("foto_produk/$foto");
    unlink("foto_produk/small_$foto");
}

//cek dimensi max foto
function cekDimensiMax($lokasi_file)
{
    $lebar_max       = 1920;
    $tinggi_max      = 950;
    $lokasi_gambar   = $lokasi_file;
    $hasil = 0;

    $ukuran_asli = GetImageSize($lokasi_gambar);

    if ($ukuran_asli[0] > $lebar_max and $ukuran_asli[1] > $tinggi_max) {
        $hasil = 0;
    }

    return $hasil;
}
