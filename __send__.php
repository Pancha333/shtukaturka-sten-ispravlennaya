<?php
$sendto = 'kraio@ya.ru';
$sendfrom = 'sender@rusman-group.ru';
$title = $_POST['title'];
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$text = $_POST['text'];

$work_type = $_POST['work_type'];
$work_target = $_POST['work_target'];
$object = $_POST['object'];
$dismantling = $_POST['dismantling'];
$size = $_POST['size'];
$contact_type = $_POST['contact_type'];

$test_object = $_POST['test_object'];
$test_size = $_POST['test_size'];
$test_work_type = $_POST['test_work_type'];
$test_material = $_POST['test_material'];
$test_date_from = $_POST['test_date_from'];
$test_date_to = $_POST['test_date_to'];

$subject  = $title;
$headers  = "From: ".$sendfrom."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
$msg = '<p><b>Дата: </b>'.date('d.m.y').'</p>';

if(!empty($title)){
	$msg .= '<p><b>Что хотят:</b> '.$title.'</p>';
}
if(!empty($name)){
	$msg .= '<p><b>Имя:</b> '.$name.'</p>';
}
if(!empty($tel)){
	$msg .= '<p><b>Телефон:</b> '.$tel.'</p>';
}
if(!empty($email)){
	$msg .= '<p><b>Email:</b> '.$email.'</p>';
}
if(!empty($text)){
	$msg .= '<p><b>Сообщение:</b> '.$text.'</p>';
}

if(!empty($work_type)){
	$msg .= '<p><b>Виды работ:</b></p><ul>';
	foreach($work_type as $item){
		$msg .= '<li>'.$item.'</li>';
	}
	$msg .= '</ul>';
}
if(!empty($work_target)){
	$msg .= '<p><b>Цель работ:</b></p><ul>';
	foreach($work_target as $item){
		$msg .= '<li>'.$item.'</li>';
	}
	$msg .= '</ul>';
}
if(!empty($object)){
	$msg .= '<p><b>Вид объекта:</b></p><ul>';
	foreach($object as $item){
		$msg .= '<li>'.$item.'</li>';
	}
	$msg .= '</ul>';
}
if(!empty($dismantling)){
	$msg .= '<p><b>Требуется ли демонтаж:</b> '.$dismantling.'</p>';
}
if(!empty($size)){
	$msg .= '<p><b>Площать объекта:</b> '.$size.'</p>';
}
if(!empty($contact_type)){
	$msg .= '<p><b>Куда отправить смету по объекту:</b></p><ul>';
	foreach($contact_type as $item){
		$msg .= '<li>'.$item.'</li>';
	}
	$msg .= '</ul>';
}

if(!empty($test_object)){
	$msg .= '<p><b>Хотят оштукатурить:</b> '.$test_object.'</p>';
}
if(!empty($test_size)){
	$msg .= '<p><b>Площадь по полу:</b> '.$test_size.'</p>';
}
if(!empty($test_work_type)){
	$msg .= '<p><b>Нужно провести такие виды работ:</b></p><ul>';
	foreach($test_work_type as $item){
		$msg .= '<li>'.$item.'</li>';
	}
	$msg .= '</ul>';
}
if(!empty($test_material)){
	$msg .= '<p><b>Материалы для объекта:</b> '.$test_material.'</p>';
}
if(!empty($test_date_from)){
	$msg .= '<p><b>Начало ремонта:</b> '.$test_date_from.'</p>';
}
if(!empty($test_date_to)){
	$msg .= '<p><b>Конец ремонта:</b> '.$test_date_to.'</p>';
}

if($_SERVER['REMOTE_ADDR']){
	$msg .= '<p><b>IP:</b> '.$_SERVER['REMOTE_ADDR'].'</p>';
}
if($_SERVER['HTTP_REFERER']){
	$msg .= '<p><b>UTM:</b> '.$_SERVER['HTTP_REFERER'].'</p>';
}

if(!empty($tel)){
	$m = mail($sendto, $subject, $msg, $headers);
	echo $m ? 'sent' : 'error';
}

?>