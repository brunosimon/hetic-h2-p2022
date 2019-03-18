<?php

    include 'database.php';

    // Statuses
    $statuses = [
        1 => 'To do',
        2 => 'Done',
    ];
    $description = '';
    $date = date('Y-m-d\TH:i');
    $status = 1;

    // Add task
    if(!empty($_POST))
    {
        // Retreive data
        $data = [
            'description' => trim($_POST['description']),
            'date' => strtotime($_POST['date']),
            'status' => (int)$_POST['status'],
        ];

        // Handle error here

        // Insert data
        if(empty($_GET['updateTaskId']))
        {
            $prepare = $pdo->prepare('
                INSERT INTO
                    tasks (description, date, status)
                VALUES
                    (:description, :date, :status)
            ');
            $prepare->execute($data);
        }
        else
        {
            $prepare = $pdo->prepare('
                UPDATE
                    tasks
                SET
                    description = :description,
                    date = :date,
                    status = :status
                WHERE
                    id = :id
            ');
            $data['id'] = (int)$_GET['updateTaskId'];
            $prepare->execute($data);
        }

        // Handle success here
    }

    // Toggle task
    if(!empty($_GET['toggleTaskId']))
    {
        // Get task
        $prepare = $pdo->prepare('SELECT * FROM tasks WHERE id = :id');
        $prepare->execute([ 'id' => (int)$_GET['toggleTaskId'] ]);
        $task = $prepare->fetch();

        // Task found
        if($task)
        {
            $prepare = $pdo->prepare('
                UPDATE
                    tasks
                SET
                    status = :status
                WHERE
                    id = :id
            ');
            $prepare->execute([
                'status' => $task->status == 1 ? 2 : 1,
                'id' => $task->id,
            ]);
        }
    }

    // Get all tasks
    $query = $pdo->query('SELECT * FROM tasks');
    $tasks = $query->fetchAll();

    // Update
    if(!empty($_GET['updateTaskId']))
    {
        // Get task
        $prepare = $pdo->prepare('SELECT * FROM tasks WHERE id = :id');
        $prepare->execute([ 'id' => (int)$_GET['updateTaskId'] ]);
        $task = $prepare->fetch();

        if($task)
        {
            $description = $task->description;
            $date = date('Y-m-d\TH:i', $task->date);
            $status = $task->status;
        }
    }
    
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
    
    <!-- Task form -->
    <form action="#" method="post">

        <div>
            <label for="description">Description</label>
            <br>
            <textarea name="description" cols="50" rows="4" id="description" required><?= $description ?></textarea>
        </div>

        <div>
            <label for="date">date</label>
            <br>
            <input type="datetime-local" id="date" name="date" required value="<?= $date ?>">
        </div>

        <div>
            <label for="status">Status</label>
            <br>
            <select name="status" id="status" required>
                <?php foreach($statuses as $_key => $_status): ?>
                    <option value="<?= $_key ?>"><?= $_status ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div>
            <input type="submit">
        </div>

    </form>

    <!-- List -->
    <table>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach($tasks as $_task): ?>
            <tr>
                <td><?= date('H:i d/m/Y', $_task->date) ?></td>
                <td><?= $_task->description ?></td>
                <td>
                    <a href="?toggleTaskId=<?= $_task->id ?>"><?= $statuses[$_task->status] ?></a>
                </td>
                <td>
                    <a href="?updateTaskId=<?= $_task->id ?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>