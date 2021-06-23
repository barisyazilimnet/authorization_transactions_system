<h1>Yetki silme sayfasına hoşgeldiniz</h1>
<?php 
if(in_array("authorization_transactions",explode(",",@$users["pages"]))){
    $query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM authorization"));
    $id=$_GET["id"];
    $query_delete=mysqli_query($con,"DELETE FROM authorization WHERE authorization_id=$id");
    if($query_delete){
        if($id==$query){
            mysqli_query($con,"UPDATE users SET authorization_id=$id-1 WHERE authorization_id=$id");
        }else if($id<$query){
            mysqli_query($con,"UPDATE authorization SET authorization_id=authorization_id-1 WHERE authorization_id > $id");
            mysqli_query($con,"UPDATE users SET authorization_id=authorization_id-1 WHERE authorization_id = $query");
        }
        echo '<div class="alert alert-success" role="alert">Yetki silme işlemi başarılı</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">Yetki silme işlemi başarısız</div>';
    }
}else{
    echo '<div class="alert alert-danger" role="alert">Bu sayfaya girmeye yetkiniz yoktur</div>';
}
?>