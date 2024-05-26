<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Questions</h2>
    <table>
        <tr>
            <th>Question</th>
            <th>Answers</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($questions as $question): ?>
        <tr>
            <td><?= $question['question'] ?></td>
            <td>
                <ul>
                <?php foreach ($question['answers'] as $answer): ?>
                    <li>
                        <?= $answer['answer'] ?>
                        <?php if ($answer['correct']): ?>
                            <span>&#x1F44D;</span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
                </ul>
            </td>
            <td>
                <a href="/questions/edit/<?= $question['id'] ?>">Edit</a>
                <a href="/questions/delete/<?= $question['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="/questions/add">Add Question</a>
</body>
</html>