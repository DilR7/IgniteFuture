<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Management</title>
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

        button {
            cursor: pointer;
        }

        /* Modal styles */
        .modal {
            display: none; 
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            width: 50%;
            border-radius: 5px;
        }

        .close {
            float: right;
            font-size: 28px;
            color: #aaa;
        }

        .close:hover,
        .close:focus {
            color: black;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>Quiz Management</h1>

    <button onclick="openModal('add')">Add New Quiz</button>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Score</th>
                <th>User</th>
                <th>Actions</th>
                <th>Questions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->quizID }}</td>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ $quiz->quiz_desc }}</td>
                    <td>{{ $quiz->score }}</td>
                    <td>{{ $quiz->user->name }}</td>
                    <td>
                        <button onclick="openModal('edit', {{ $quiz->quizID }}, '{{ $quiz->title }}', '{{ $quiz->quiz_desc }}', {{ $quiz->score }}, {{ $quiz->userID }})">Edit</button>
                        <form action="{{ route('quizzes.delete', $quiz->quizID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('testing.questions', $quiz->quizID) }}">
                            <button>View</button>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle">Add Quiz</h2>
            <form id="quizForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" id="quizID" name="quizID">
                
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <br><br>
                
                <label for="quiz_desc">Description:</label>
                <textarea id="quiz_desc" name="quiz_desc" required></textarea>
                <br><br>
                
                <label for="score">Score:</label>
                <input type="number" id="score" name="score" required>
                <br><br>
                
                <label for="userID">User:</label>
                <select id="userID" name="userID" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->userID }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <br><br>
                
                <button type="submit" id="submitButton">Create Quiz</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(action, quizID = null, title = '', quiz_desc = '', score = 0, userID = null) {
            document.getElementById('myModal').style.display = 'block';
            document.getElementById('modalTitle').innerText = action === 'add' ? 'Add Quiz' : 'Edit Quiz';
            
            if (action === 'edit') {
                document.getElementById('quizID').value = quizID;
                document.getElementById('title').value = title;
                document.getElementById('quiz_desc').value = quiz_desc;
                document.getElementById('score').value = score;
                document.getElementById('userID').value = userID;

                document.getElementById('submitButton').innerText = 'Update Quiz';
                document.getElementById('quizForm').action = `/quizzes/${quizID}`;
                document.getElementById('formMethod').value = 'PUT';
            } else {
                document.getElementById('quizForm').reset();
                document.getElementById('formMethod').value = 'POST';
                document.getElementById('quizForm').action = "{{ route('quizzes.store') }}";
                document.getElementById('submitButton').innerText = 'Create Quiz';
            }
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('myModal')) {
                closeModal();
            }
        }
    </script>

</body>
</html>
