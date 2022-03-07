<?php

    if($user_id){
        header("location:".BASE_URL);
    }
    ?>
<div class="login-container">
    
    <form class="login-form" action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">

    <?php
            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
            $nama_lengkap = isset($_GET['nama']) ? $_GET['nama'] : false;
            $email = isset($_GET['email']) ? $_GET['email'] : false;
            $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
    
            if($notif == "require") {
                echo "<div class='notif'>Maaf, kamu harus melengkap form dibawah ini</div>";
            }else if($notif == "password"){
                echo "<div class='notif'>Maaf, password yang kamu masukan tidak sama</div>";
            }else if($notif == "email"){
                echo "<div class='notif'>Maaf, email yang kamu masukkan sudah terdaftar</div>";
            }
    ?>

    
        <div class="element-form">
            <label>Nama Lengkap</label>
            <span><input type="text" name="nama"/></span>
        </div>

        <div class="element-form">
            <label>Email</label>
            <span><input type="text" name="email"/></span>
        </div>

        <div class="element-form">
            <label>Nomor Telepon / Handphone</label>
            <span><input type="text" name="phone"/></span>
        </div>
        <div class="element-form">
            <label>Password</label>
            <span><input type="password" name="password"/></span>
        </div>

        <div class="element-form">
            <label>Re-type Password</label>
            <span><input type="password" name="re_password"/></span>
        </div>

        <button type="submit" class="tombol-action login-btn">REGISTER</button>

    </form>

</div>