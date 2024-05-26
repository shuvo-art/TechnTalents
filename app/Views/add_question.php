<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#add-answer').click(function(){
                $('#answers').append('<input type="text" name="answers[]"><br>');
            });

            $('#remove-answer').click(function(){
                var answers = $('#answers input[name="answers[]"]');
                if(answers.length > 1){
                    answers.last().next('br').remove();
                    answers.last().remove();
                }
            });
        });
    </script>
</head>
<body>
    <h2>Add Question</h2>
    <form method="post" action="/questions/create">
        <label for="question">Question:</label>
        <input type="text" id="question" name="question"><br>

        <label for="answers">Answers:</label>
        <div id="answers">
            <input type="text" name="answers[]"><br>
        </div>
        <button type="button" id="add-answer">Add Answer</button>
        <button type="button" id="remove-answer">Remove Answer</button><br>

        <label for="correct_answer">Correct Answer:</label>
        <select name="correct_answer" id="correct_answer">
            <!-- Options dynamically generated -->
        </select><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
