<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions for {{ $quiz->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .answers {
            list-style-type: none;
            padding: 0;
        }

        .answers li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<h1>Questions for {{ $quiz->title }}</h1>

<table>
    <thead>
        <tr>
            <th>Question ID</th>
            <th>Question</th>
            <th>Answers</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $question)
            <tr>
                <td>{{ $question->questionID }}</td>
                <td>{{ $question->question_text }}</td>
                <td>
                    <ul class="answers">
                        @foreach ($question->answers as $answer)
                            <li>
                                {{ $answer->answer_text }} 
                                @if ($answer->is_correct) 
                                    <strong>(Correct)</strong> 
                                @else 
                                    (Incorrect) 
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
