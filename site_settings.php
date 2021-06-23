<h1>Site ayarlarına hoşgeliniz</h1>
<?php 
if(in_array("site_settings", explode(",", @$users["pages"]))) {
    echo "Buraya kodlarınızı yazınız";
} else {
    echo '<div class="alert alert-danger" role="alert">Bu sayfaya girmeye yetkiniz yoktur</div>';
}
?>