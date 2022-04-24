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
if(isset($_SESSION['user'])){
    echo "<script>window.location.href='user.php';</script>";
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $surName = $_POST['surName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //if password is not equal
    if($password != $password2){
        echo "<script>alert('Şifreler Aynı Değil');</script>";
    }else{
       $response =  UserInsert($name, $surName, $email, $phone,$password, $city, $district, $address,0 );
       //if response is true
       if($response){
           echo "<script>alert('Kayıt Başarılı');</script>";
           echo "<script>window.location.href='login.php';</script>";
       }else{
           echo "<script>alert('Kayıt Başarısız');</script>";
       }
    }
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
echo '<form action="signup.php" method="post">
<div class="form-group">
     <label for="name">Adınız</label><br>
     <input type="text" name="Name" value="" required><br>

     <label for="surname">Soyadınız</label><br>
     <input type="text" name="Surname" value="" required><br>
     <label for="mail">Mail Adresiniz</label><br>
     <input type="text" name="Mail" value="" required><br>
     <label for="phone">Telefon Numaranız</label><br>
     <input type="text" name="Phone" value="" required><br>

     <label for="city">Şehir</label><br>
     <input type="text" name="City" value="" required><br>
     <label for="district">Semt</label><br>
     <input type="text" name="District" value="" required><br>
     <label for="adress">Adres</label><br>
     <textarea  name="Adress" value="" required> </textarea><br>

     <label for="password">Şifreniz</label><br>
     <input type="text" name="Password" value="" required><br>
     <label for="password">Şifreniz Tekrar</label><br>
     <input type="password" name="Password2" required>
        <br>
     <input type="submit" name="submit" value="Kayıt Ol">
</div>
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
