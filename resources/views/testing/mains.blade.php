<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Include any CSS here if needed -->
</head>
<body>
    <div class="container">
        <h1>Users List</h1>
        <button onclick="openAddUserModal()">Add User</button>
        <form action="{{ route('users.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search by name or email" required>
            <button type="submit">Search</button>
        </form>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->userID }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        {{-- <td><button>Edit</button></td>
                        <td><button>Delete</button></td> --}}
                        <td>
                            <button onclick="openEditModal({{ json_encode($user) }})">Edit</button>
                        </td>
                        {{-- <td><button onclick="openDeleteModal({{ $user->userID }})">Delete</button></td> --}}
                        {{-- <td><button onclick="deleteUser({{ $user->userID }})">Delete</button></td> --}}
                        <td>
                            <form action="{{ route('users.delete', $user->userID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add User Modal -->
    <div id="addUserModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeAddUserModal()">&times;</span>
            <h2>Add User</h2>
            <form id="addUserForm" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="addName" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="addEmail" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="addPassword" required>
                </div>
                <button type="submit">Add User</button>
            </form>
        </div>
    </div>

    {{-- Edit User Modal --}}

    <div id="editUserModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit User</h2>
            <form id="editUserForm" action="" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="userID">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Leave blank to keep the same">
                </div>
                <button type="submit">Update User</button>
            </form>
        </div>
    </div>

    {{-- delete modal --}}
    {{-- <div id="deleteUserModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeDeleteModal()">&times;</span>
            <h2>Confirm Deletion</h2>
            <p>Are you sure you want to delete this user?</p>
            <button id="confirmDeleteButton">Yes, Delete</button>
            <button onclick="closeDeleteModal()">Cancel</button>
        </div>
    </div> --}}

    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }
        
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    
    <script>
        // Edit
        function openEditModal(user) {
            document.getElementById('userID').value = user.userID;
            document.getElementById('name').value = user.name;
            document.getElementById('email').value = user.email;

            document.getElementById('editUserForm').action = '/users/' + user.userID;
    
            document.getElementById('editUserModal').style.display = 'block';
        }
    
        function closeEditModal() {
            document.getElementById('editUserModal').style.display = 'none';
        }
    
        window.onclick = function(event) {
            var modal = document.getElementById('editUserModal');
            if (event.target === modal) {
                closeEditModal();
            }
        }


        // Add
        function openAddUserModal() {
            document.getElementById('addUserForm').reset();
            document.getElementById('addUserModal').style.display = 'block';
        }
    
        function closeAddUserModal() {
            document.getElementById('addUserModal').style.display = 'none';
        }
    
        function closeEditModal() {
            document.getElementById('editUserModal').style.display = 'none';
        }
        window.onclick = function(event) {
            var addModal = document.getElementById('addUserModal');
            var editModal = document.getElementById('editUserModal');
            if (event.target === addModal) {
                closeAddUserModal();
            } else if (event.target === editModal) {
                closeEditModal();
            }
        }
    </script>

</body>
</html>
