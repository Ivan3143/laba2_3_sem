<?php 
session_start();
require_once 'connect.php';
if (isset($_POST['username'])){
	 $username = $_POST['username'];
	 $comment = $_POST['comment'];
	 $date = date('Y-m-d H:i:s', time() + 3*3600);
	 mysqli_query($connect, "INSERT INTO `comments` (`id`, `username`, `comment`, `data`) VALUES (NULL, '$username', '$comment', '$date')");
}
?>



</!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Анонимный чат</title>
</head>
<body>
	<style> 
		    label {
		    	 font-size: 26px; 
		    	 font-weight: 300; 
		    	 color: #7c795d; 
		    	 margin: 0;
		    }
			body {
            font-size: 18px;
            font-family: Montserrat, sans-serif;
            background-color: #ece1cf;
            }
            form {
            	display: flex;
            	flex-direction: column;
            }
            h2 {
            text-align: center;
            letter-spacing: 0.2em;
            margin-top: 40px;
            margin-bottom: 40px;
            color: #7c795d; font-family: ‘Trocchi’, serif; font-size: 45px; font-weight: normal; line-height: 48px; margin: 0 0 24px;
            }
             .green 
        {
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.08);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.08);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.08);
        color: #fff;
        display:block;
        width:200px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        padding: 8px 16px;
        margin: 20px auto;
        text-decoration: none;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: background-color 0.1s linear;
        -moz-transition: background-color 0.1s linear;
        -o-transition: background-color 0.1s linear;
        transition: background-color 0.1s linear;  
        background-color: rgb( 43, 153, 91 );
        border: 1px solid rgb( 33, 126, 74 ); 
        }
	    </style>
	    <h2>Анонимный чат</h2>

	<form action="" method="POST">
		<label>Имя собеседника:</label>
		<input type="text" name="username" placeholder="Введите имя пользователя" required>
		<label>Сообщение:</label>
		<textarea name="comment" cols="30" rows="10" placeholder="Ваше сообщение" required></textarea>
	    <input type="submit"class="green">
	</form>

<hr>

<h2>Общий чат</h2>
<?
$comments= mysqli_query($connect, "SELECT * FROM posts.comments");
function mysqli_fetch_all(mysql_result $result){
     $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
$comments= mysqli_query($connect, "SELECT * FROM posts.comments");
$row = mysqli_fetch_all($comments);
mysqli_close($connect);
foreach($comments as $comment){?>

<p><?=$row ['username'];  $row ['comment'];  $row ['data']; ?></p>
     <?}?>

</body>
</html>