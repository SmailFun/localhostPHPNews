<?php

namespace Application\Controller;

class AddNews
{
    public function addList(): void
    {
        echo '<html>
<head>
    <title>Add News</title>
    <meta http-equiv="Content-Type" content="text/html; charset=" iso
    "-8859-1">
</head>

<body>

<form name="form1" method="post" action="../../index.php">
    <table>
        <tr>
            <td>Имя Автора</td>

            <td><input name="name" type="text"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>о Новости</td>
            <td><textarea name="about" id="about"></textarea></td>
        </tr>
        <br>
        <tr>
            <td colspan="2">
                <div>
                    <input name="add" type="submit" id="add" value="Отправить">
                </div>
            </td>
        </tr>
    </table>
</form>

<a href="../news">Вернуться к списку новостей</a>
</body>
</html>';
    }
}