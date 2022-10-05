<?php
mysqli_query($kon, "UPDATE promo INNER JOIN jenis ON promo.idjenis = jenis.idjenis SET harga = hargapromo WHERE waktu1 <= NOW()");
mysqli_query($kon, "UPDATE promo INNER JOIN jenis ON promo.idjenis = jenis.idjenis SET harga = hargaawal WHERE waktu2 <= NOW()");
?>