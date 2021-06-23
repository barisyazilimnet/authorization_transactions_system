<h1>Yetki Sayfanıza hoşgeldiniz</h1>
<?php
if (in_array("authorization_transactions", explode(",", @$users["pages"]))) {
    $authorization_query = mysqli_query($con, "SELECT * FROM authorization");
?>
    <table class="table text-center">
        <thead>
            <th>#</th>
            <th>yetki ismi</th>
            <th>Yetki rengi</th>
            <th>Sayfa izinleri</th>
            <th>İşlemler</th>
        </thead>
        <tbody>
            <?php
            while ($authorization_array = mysqli_fetch_array($authorization_query)) {
                $pages = explode(",", $authorization_array["pages"]);
            ?>
                <tr>
                    <td><?php echo $authorization_array["authorization_id"]; ?></td>
                    <td><?php echo $authorization_array["authorization_name"]; ?></td>
                    <td>
                        <span class="badge rounded-pill bg-<?php echo $authorization_array['authorization_color'] ?>">
                            <?php echo $authorization_array['authorization_color'] ?>
                        </span>
                    </td>
                    <td>
                        <?php
                            for($i=1; $i<=count($pages); $i++){
                                echo $pages[$i-1].",";
                                if($i%2==0){
                                    echo "<br />";
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <a href="index.php?do=authorization_edit&id=<?php echo $authorization_array["authorization_id"]; ?>" class="btn btn-primary w-50">Düzenle</a>
                        <a href="index.php?do=authorization_delete&id=<?php echo $authorization_array["authorization_id"]; ?>" class="btn btn-danger w-25">Sil</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
} else {
    echo '<div class="alert alert-danger" role="alert">Bu sayfaya girmeye yetkiniz yoktur</div>';
}
?>