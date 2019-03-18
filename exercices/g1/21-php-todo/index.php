<?php

    include 'database.php';

    $statuses = [
        1 => 'To do',
        2 => 'Done',
    ];

    if(!empty($_POST))
    {
        $data = [
            'description' => trim($_POST['description']),
            'date' => strtotime($_POST['date']),
            'status' => (int)$_POST['status'],
        ];

        $prepare = $pdo->prepare('
            INSERT INTO
                tasks (description, date, status)
            VALUES
                (:description, :date, :status)
        ');
        $prepare->execute($data);
    }

    $query = $pdo->query('SELECT * FROM tasks');
    $tasks = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>
<body>
    
    <h1>Add task</h1>
    <form action="#" method="post">
        <div>
            <textarea required name="description" cols="50" rows="5" placeholder="My task..."></textarea>
        </div>
        <div>
            <input required name="date" type="datetime-local">
        </div>
        <div>
            <select name="status">
                <?php foreach($statuses as $_key => $_status): ?>
                    <option value="<?= $_key ?>"><?= $_status ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>

    <h1>Tasks</h1>

    <table>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php foreach($tasks as $_task): ?>
            <tr>
                <td><?= date('d/m/Y H:i', $_task->date) ?></td>
                <td><?= $_task->description ?></td>
                <td><?= $statuses[$_task->status] ?></td>
                <td>d</td>
            </tr>
        <?php endforeach; ?>
    </table>


</body>
</html>