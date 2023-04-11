<?php



$login = "";
$password = "";
$conn = mysqli_connect("localhost", "root", "root", "magazine");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
include "Enter.html";

if(isset($_POST["enter"])) {

    $login = $_POST["login"];
    $password = $_POST["password"];

    $salt = ["Nik", "Magazine", "109"];
    for($i = 0; $i < count($salt); $i++)
    {
        $password.$salt[$i];
        $password = hash("sha256", $password);
    }

    $sql ="SELECT * FROM Password_user";

    $bool = true;

    if($result = $conn->query($sql)){
        foreach($result as $row){
            if($password == $row["Password"] && $login == $row["Login"])
            {
                $bool = false;
                echo "Вход был выполнен успешно!";

            }
        }
        if($bool)
        {
//            $sql = "INSERT INTO Password_user (Login, Password) VALUES ('{$login}', '{$password}')";
//            if($conn->query($sql)){
//                echo "Данные успешно добавлены";
//            } else{
//                echo "Всё пиздец: " . $conn->error;
//            }
            echo "Неправильный логин или пароль!";

        }
    }

    $conn->close();
}

include "registraton.html";
if(isset($_POST["reg"]))
{


}

?>


