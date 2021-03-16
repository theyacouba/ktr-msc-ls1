<?php
session_start();

require 'config/database.php';

$query = $pdo->prepare("SELECT * FROM business_card WHERE id = :id");
$query->execute([
    'id' => $_GET['id']
]);
$business_card = $query->fetch();

if (isset($_POST['update'])) {
    extract($_POST);
    if (!empty($name)) {
        $query =  $pdo->prepare("UPDATE business_card SET name = :name, company_name = :company_name, email_address = :email_address, phone_number = :phone_number WHERE id = :id");
        $query->execute([
            'name' => $name,
            'company_name' => $company_name,
            'email_address' => $email_address,
            'phone_number' => $phone_number,
            'id' => $_GET['id']
        ]);
        header("location:library.php");
    }
}

?>

<?php include 'layouts/header.php' ?>
<h1 class="text-center my-5">New card</h1>
<?php if (isset($error)) { ?>
    <p class="text-danger text-center"><?= $error ?></p>
<?php } ?>
<form action="" method="POST" class=" col-md-6 mx-auto">
    <div class="row m-3">
        <div class="col"> <label for="">Name *</label>
            <input type="text" name="name" class="form-control" value="<?= $business_card['name'] ?>">
        </div>
        <div class="col"> <label for="">Company name</label>
            <input type="text" name="company_name" class="form-control" value="<?= $business_card['company_name'] ?>">
        </div>
    </div>
    <div class="m-4">
        <label for="">Email address</label>
        <input type="email" name="email_address" class="form-control" value="<?= $business_card['email_address'] ?>">
    </div>
    <div class="m-4">
        <label for="">Phone number</label>
        <input type="text" name="phone_number" class="form-control" value="<?= $business_card['phone_number'] ?>">
    </div>
    <div class="m-4">
        <button type="submit" name="update" class="btn btn-secondary w-100">Update</button>
    </div>
</form>
<?php include 'layouts/footer.php' ?>