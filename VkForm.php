<?php
$id = $_POST['id'];

$request = 'http://api.vk.com/method/users.get?uids='.$id.'&fields=photo_200,status';
$response = file_get_contents($request);//зачитываем файл
$info = array_shift(json_decode($response)->response);//Принимаем закодированную в JSONстроку

//var_dump($info->photo_200); //string 'http://cs631721.vk.me/v631721085/e56a/FXrVOx0mZN4.jpg' (length=53)

?>
<html>
<head>
	<meta charset="utf-8">
	<title>VkForma</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="row mt-20">
	<div class="col-md-5"></div>
	<div class="col-md-3">	
		<form action="/ApiVkNew/VkForm.php" method="POST">
		  <div class="form-group">
				<label for="input">Enter id</label>
				<input type="text" class="form-control" id="input" placeholder="Enter your id" name="id" />
		  </div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	<div class="col-md-3"></div>
</div>
<div class="row">
	<div class="col-md-5"></div>
	<div class="col-md-7"><h3><?= $info->first_name?> <?= $info->last_name?></h3></div>
</div>
<div class="row mt-20">
	<div class="col-md-5"></div>
	<div class="col-md-7"><img src="<?= $info->photo_200 ?>"></div>
</div>


<div class="row mt-20">
	<div class="col-md-5"></div>
	<div class="col-md-7"><h4>Status: <?=$info->status?></h4></div>
</div>

</body>
<html>