<h1>Yetki ekleme sayfasına hoşgeldiniz</h1>
<?php 
if(in_array("authorization_transactions",explode(",",@$users["pages"]))){
    if($_POST){
        $query_authorization=mysqli_num_rows(mysqli_query($con,"SELECT * FROM authorization"));
        $name=$_POST["name"];
        $color=$_POST["color"];
        @$pages=$_POST["pages"];
        if($pages!=""){
            $pages=implode(",", $pages);
        }
        $authorization_id=$query_authorization+1;
        $query=mysqli_query($con,"INSERT INTO authorization SET authorization_id=$authorization_id, authorization_name='$name', authorization_color='$color',pages='$pages'");
        if($query){
            echo '<div class="alert alert-success" role="alert">Yetki ekleme işlemi başarılı</div>';
        }else{
            echo '<div class="alert alert-danger" role="alert">Yetki ekleme işlemi başarısız</div>';
        }

    }
?>
<form method="post">
    <div class="mb-2">
        <label for="name">Yetki ismi</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php if ($_POST) {
                                                                                    echo $name;
                                                                                } ?>">
    </div>
    <div class="mb-2">
        <label for="color">Yetki rengi</label>
        <select name="color" id="color" class="form-control">
            <option value="primary" <?php if ($_POST) {
                                        if ($color == "primary") {
                                            echo "selected";
                                        }
                                    } ?> class="bg-primary">Primary</option>
            <option value="warning" <?php if ($_POST) {
                                        if ($color == "warning") {
                                            echo "selected";
                                        }
                                    } ?> class="bg-warning">Warning</option>
            <option value="secondary" <?php if ($_POST) {
                                            if ($color == "secondary") {
                                                echo "selected";
                                            }
                                        } ?> class="bg-secondary">Secondary</option>
            <option value="success" <?php if ($_POST) {
                                        if ($color == "success") {
                                            echo "selected";
                                        }
                                    } ?> class="bg-success">Success</option>
            <option value="danger" <?php if ($_POST) {
                                        if ($color == "danger") {
                                            echo "selected";
                                        }
                                    } ?> class="bg-danger">Danger</option>
            <option value="info" <?php if ($_POST) {
                                        if ($color == "info") {
                                            echo "selected";
                                        }
                                    } ?> class="bg-info">İnfo</option>
            <option value="light" <?php if ($_POST) {
                                        if ($color == "light") {
                                            echo "selected";
                                        }
                                    } ?> class="bg-light">Light</option>
            <option value="dark" <?php if ($_POST) {
                                        if ($color == "dark") {
                                            echo "selected";
                                        }
                                    } ?> class="bg-dark text-white">Dark</option>
        </select>
    </div>
    <div class="mb-2">
        <label for="authorization_color_example">Örnek</label><br />
        <span class="badge rounded-pill mx-3 bg-primary">Primary</span>
        <span class="badge rounded-pill mx-3 bg-warning">Warning</span>
        <span class="badge rounded-pill mx-3 bg-secondary">Secondary</span>
        <span class="badge rounded-pill mx-3 bg-success">Success</span>
        <span class="badge rounded-pill mx-3 bg-danger">Danger</span>
        <span class="badge rounded-pill mx-3 bg-info">İnfo</span>
        <span class="badge rounded-pill mx-3 bg-light text-dark">Light</span>
        <span class="badge rounded-pill mx-3 bg-dark">Dark</span>
    </div>
    <div class="mb-2">
        <label for="pages">Sayfa izinleri</label><br />
        <input type="checkbox" name="pages[]" id="pages" value="site_settings" <?php if($_POST){ if($pages!="" and in_array("site_settings",explode(",",$pages))){echo "checked";} } ?>>Site Ayarları
        <input type="checkbox" name="pages[]" id="pages" value="authorization_transactions" <?php if($_POST){ if($pages!="" and in_array("authorization_transactions",explode(",",$pages))){echo "checked";} } ?>>Yetki işlemleri
    </div>
    <input type="submit" value="Ekle" class="btn btn-info">
</form>
<?php
}else{
    echo '<div class="alert alert-danger" role="alert">Bu sayfaya girmeye yetkiniz yoktur</div>';
}
?>