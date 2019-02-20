<?php 
/* Осуществляем проверку вводимых данных и их защиту от враждебных  
скриптов */ 
$fullname = htmlspecialchars($_POST["fullname"]); 
$email = htmlspecialchars($_POST["email"]); 
$gender = htmlspecialchars($_POST["gender"]); 
$phone = htmlspecialchars($_POST["phone"]); 
/* Устанавливаем e-mail адресата */ 
$myemail = "my_email@mail.ru"; 
/* Проверяем заполнены ли обязательные поля ввода, используя check_input  
функцию */ 
$fullname = check_input($_POST["fullname"], "Введите ваше имя!"); 
$email = check_input($_POST["email"], "Укажите тему сообщения!"); 
$gender = check_input($_POST["gender"], "Введите ваш e-mail!"); 
$phone = check_input($_POST["phone"], "Вы забыли написать сообщение!"); 
/* Проверяем правильно ли записан e-mail */ 
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) 
{ 
show_error("<br /> Е-mail адрес не существует"); 
} 
/* Создаем новую переменную, присвоив ей значение */ 
$message_to_myemail = "Здравствуйте!  
Вашей контактной формой было отправлено сообщение!  
Имя отправителя: $fullname  
E-mail: $email  
Текст сообщения: $phone  
Конец"; 
/* Отправляем сообщение, используя mail() функцию */ 
$from  = "From: $fullname <$email> \r\n Reply-To: $email \r\n";  
mail($myemail, $phone, $message_to_myemail, $from); 
?> 
<p>Ваше сообщение было успешно отправлено!</p> 
<p>На <a href="index.php">Главную >>></a></p> 
<?php 
/* Если при заполнении формы были допущены ошибки сработает  
следующий код: */ 
function check_input($data, $problem = "") 
{ 
$data = trim($data); 
$data = stripslashes($data); 
$data = htmlspecialchars($data); 
if ($problem && strlen($data) == 0) 
{ 
show_error($problem); 
} 
return $data; 
} 
function show_error($myError) 
{ 
?> 
<html> 
<body> 
<p>Пожалуйста исправьте следующую ошибку:</p> 
<?php echo $myError; ?> 
</body> 
</html> 
<?php 
exit(); 
} 
?>