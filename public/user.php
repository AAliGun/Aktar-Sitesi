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

<?php
 if(!isset($_SESSION['user'])){
     //echo "<script>window.location.href='login.php';</script>";
 }

 /*{'id': 1,
'Name': 'Yasin',
'Surname': 'Şahin',
'Mail': 'yasin@mail.com',
'Phone': '0541884423',
'Password': 'test123',
'City': 'Samsun',
'District': 'Hançerli mahallesi',
'Adress': 'Test adres',
'Status': 2}*/

$user = UserQuery($_SESSION['user']);
?>
<div class="container">
    <div class="row">
        <?php include 'Model/LeftProduct.php';
        echo LeftProduct();?>
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-6">
<?php
echo '<form action="" method="post">
     <label for="id">ID</label><br>
     <input type="text" name="id" value="'.$user['id'].'" readonly><br>
     <label for="name">İsim</label><br>
     <input type="text" name="Name" value="'.$user['Name'].'" required><br>
     <label for="surname">Soyad</label><br>
     <input type="text" name="Surname" value="'.$user['Surname'].'" required><br>
     <label for="mail">Mail</label><br>
     <input type="text" name="Mail" value="'.$user['Mail'].'" required><br>
     <label for="phone">Telefon</label><br>
     <input type="text" name="Phone" value="'.$user['Phone'].'" required><br>
     <label for="password">Şifre</label><br>
     <input type="text" name="Password" value="'.$user['Password'].'" required><br>
     <label for="city">Şehir</label><br>
     <input type="text" name="City" value="'.$user['City'].'" required><br>
     <label for="district">Semt</label><br>
     <input type="text" name="District" value="'.$user['District'].'" required><br>
     <label for="adress">Adres</label><br>
     <input type="text" name="Adress" value="'.$user['Adress'].'" required><br>
     <label for="status">Durum</label><br>
     <input type="text" name="Status" value="'.$user['Status'].'" readonly><br>
     <input type="submit" name="submit" value="Güncelle">
     </form>';
?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'Model/Footer.php';
include 'Model/Scripts.php'
?>
