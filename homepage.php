<h1>Burası anasayfanız hoşgeldiniz</h1>
<?php

echo "Kullanıcı adı ".$users["user_name"],
    "<br />Kullanıcının yetkisi ".'<span class="badge rounded-pill bg-'.$users["authorization_color"].'">'.$users["authorization_name"].'</span>';
?>