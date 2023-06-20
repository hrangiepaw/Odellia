<?php
# Menyemak nilai pemboleh ubah session['tahap']
if (!isset($_SESSION['tahap']) || ($_SESSION['tahap'] != "pembeli" && $_SESSION['tahap'] != "staff")) {
    # jika pemboleh ubah tidak wujud atau nilainya tidak sama dengan pembeli atau staff, aturcara akan dihentikan
    die("<script>alert('Please Login First'); window.location.href='pembeli-staff-login.php';</script>");
}
?>
