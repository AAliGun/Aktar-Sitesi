<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<?php include 'Model/Head.php'; ?>
<body>
<?php include 'Model/Navbar.php';
echo getNavbar("index.php")?>

<div class="login-form col-xl-12">
    <form action="login.php" method="post">
        <h2 class="text-center">GİRİŞ</h2>
        <?php
        // if permission is Bulunamadi print kullanıcı adı ve şifre yanlış
        if ($_SESSION['Permisson'] == "Bulunamadi") {
            echo '<div class="alert alert-danger" role="alert">
                            Kullanıcı adı veya şifre yanlış.
                            </div>';
        }
        ?>
        <div class="form-group">
            <input type="text" name="login" class="form-control" placeholder="Giriş ID" required="required">
        </div>
        <div class="form-group">
            <input type="password"  name = "password" class="form-control" placeholder="Şifre" required="required">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary btn-block">Giriş Yap</input>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Beni Hatırla</label>
            <a href="#" class="float-right">Şifremi Unuttum</a>
        </div>
    </form>
</div>

<?php
include 'Model/Footer.php';
include 'Model/Scripts.php'
?>



</body>
</html>
