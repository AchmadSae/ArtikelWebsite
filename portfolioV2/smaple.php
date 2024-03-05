<?php
// Cek apakah ekstensi MySQLi diaktifkan
if (extension_loaded('mysqli')) {
    echo "MySQLi extension is enabled!";
} else {
    echo "MySQLi extension is not enabled!";
}
?>