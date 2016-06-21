<?php

$host = 'localhost';
$database = 'blog';
$user = 'user';
$password = 'user';
$port = 3306;
$charset = 'charset=utf8';

$pdo = new PDO("mysql:host=$host:$port:dbname=$database; $charset", "$user", "$password");

if($pdo->errorCode())
{
    die("Error ".$pdo->errorCode().' '.$pdo->errorInfo());
}

class  F{

    public function getClass()
    {
        echo '<br>'.get_called_class();
    }

    public function __construct()
    {
        echo get_called_class(error_get_last());
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}
	try {
        // Запрос к базе данных
        $result = $link->query('SHOW TABLES');

        // В случае неудачного запроса генерируем исключение
        if (!$result) throw new MySQL_Exception($link->error);

        // Пример вставки данных в таблицу
        $link->query("INSERT INTO customers VALUES (NULL, 'Андрей', 'Петров', '+7-920-555-55-55')");

        // Отображаем результаты
        echo '<p>Таблицы, имеющиеся в базе данных: </p>';
        while ($row = $result->fetch_row()) {
            // Усложним задачу отобразив структуру таблиц
            echo "<table><caption> {$row[0]} </caption><tr>";

            // Получить названия столбцов
            $result1 = $link->query("SELECT * FROM {$row[0]}");
            if (!$result1) throw new MySQL_Exception($link->error);

            for($i = 0; $i < $link->field_count; $i++)
            {
                $field_info = $result1->fetch_field();
                echo "<th>{$field_info->name}</th>";
            }

            echo '</tr>';

            // Получить данные
            while ($row1 = $result1->fetch_row()) {
                echo '<tr>';
                foreach($row1 as $_column) {
                    echo "<td>{$_column}</td>";
                }
                echo "</tr>";
            }

            echo '</table>';
        }
    }
    catch (Exception $ex) {
        echo 'Ошибка при работе с MySQL: <b style="color:red;">'.$ex->getMessage().'</b>';
    }