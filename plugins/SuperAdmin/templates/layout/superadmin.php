<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Red-Graduations</title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <?=$this->Html->css('/SuperAdmin/assets/vendors/bootstrap/bootstrap.min');?>
    <?=$this->Html->css('/SuperAdmin/assets/vendors/tempusdominus/tempusdominus-bootstrap-4.min');?>
    <?=$this->Html->css('/SuperAdmin/assets/vendors/select2/select2.min.css');?>
    <?=$this->Html->css('/SuperAdmin/assets/vendors/bootselect/bootstrap-select.min');?>
    <?=$this->Html->css('/SuperAdmin/assets/vendors/daterangepicker/daterangepicker');?>
    <?=$this->Html->css('/SuperAdmin/assets/css/style');?>
</head>

<body>
    <?= $this->fetch('content') ?>

<?= $this->Html->script('/SuperAdmin/assets/js/jquery-3.5.1.slim.min.js');?>
<?= $this->Html->script('/SuperAdmin/assets/vendors/select2/select2.min.js');?>
<?= $this->Html->script('/SuperAdmin/assets/vendors/bootstrap/popper.min.js');?>
<?= $this->Html->script('/SuperAdmin/assets/vendors/bootstrap/bootstrap.min.js');?>
<?= $this->Html->script('/SuperAdmin/assets/vendors/tempusdominus/moment.min.js');?>
<?= $this->Html->script('/SuperAdmin/assets/vendors/tempusdominus/tempusdominus-bootstrap-4.min.js');?>
<?= $this->Html->script('/SuperAdmin/assets/vendors/bootselect/bootstrap-select.min.js');?>
<?= $this->Html->script('/SuperAdmin/assets/vendors/daterangepicker/daterangepicker.min.js');?>
<?= $this->Html->script('/SuperAdmin/assets/js/script.js');?>
</body>
</html>