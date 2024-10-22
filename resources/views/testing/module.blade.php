<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Modules List</h1>
        <button onclick="openAddModuleModal()">Add Module</button>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Module Name</th>
                    <th>Description</th>
                    <th>Completion Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Learning</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $module)
                    <tr>
                        <td>{{ $module->moduleID }}</td>
                        <td>{{ $module->user->name }}</td>
                        <td>{{ $module->module_name }}</td>
                        <td>{{ $module->module_desc }}</td>
                        <td>{{ $module->completion ? 'Completed' : 'In Progress' }}</td>     
                        <td><button onclick="openEditModuleModal({{ $module->moduleID }}, '{{ $module->module_name }}', '{{ $module->module_desc }}', {{ $module->completion }})">Edit</button></td>
                        <td>
                            <form action="{{ route('module.delete', $module->moduleID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>  
                        <td>
                            <a href="{{ route('modules.contents', $module->moduleID) }}">
                                <button>Contents</button>
                            </a>
                            <a href="{{ route('modules.books', $module->moduleID) }}">
                                <button>Books</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

{{-- Add --}}
    <div id="addModuleModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeAddModuleModal()">&times;</span>
            <h2>Add Module</h2>
            <form id="addModuleForm" action="{{ route('modules.store') }}" method="POST">
                @csrf
                <div>
                    <label for="module_name">Module Name:</label>
                    <input type="text" name="module_name" id="module_name" required>
                </div>
                <div>
                    <label for="module_desc">Description:</label>
                    <input type="text" name="module_desc" id="module_desc" required>
                </div>
                <div>
                    <label for="completion">Completion Status:</label>
                    <select name="completion" id="completion">
                        <option value="0">In Progress</option>
                        <option value="1">Completed</option>
                    </select>
                </div>
                <div>
                    <label for="userID">User ID:</label>
                    <input type="number" name="userID" id="userID" required>
                </div>
                <button type="submit">Add Module</button>
            </form>
        </div>
    </div>

    {{-- Edit --}}

    <div id="editModuleModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeEditModuleModal()">&times;</span>
            <h2>Edit Module</h2>
            <form id="editModuleForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="moduleID" id="editModuleID">
                <div>
                    <label for="edit_module_name">Module Name:</label>
                    <input type="text" name="module_name" id="edit_module_name" required>
                </div>
                <div>
                    <label for="edit_module_desc">Description:</label>
                    <input type="text" name="module_desc" id="edit_module_desc" required>
                </div>
                <div>
                    <label for="edit_completion">Completion Status:</label>
                    <select name="completion" id="edit_completion">
                        <option value="0">In Progress</option>
                        <option value="1">Completed</option>
                    </select>
                </div>
                <button type="submit">Update Module</button>
            </form>
        </div>
    </div>



    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
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
        function openAddModuleModal() {
            document.getElementById('addModuleModal').style.display = 'block';
        }
        
        function closeAddModuleModal() {
            document.getElementById('addModuleModal').style.display = 'none';
        }
        
        window.onclick = function(event) {
            var modal = document.getElementById('addModuleModal');
            if (event.target === modal) {
                closeAddModuleModal();
            }
        }

        function closeEditModuleModal() {
            document.getElementById('editModuleModal').style.display = 'none';
        }


        function openEditModuleModal(moduleID, moduleName, moduleDesc, completion) {
            document.getElementById('editModuleID').value = moduleID;
            document.getElementById('edit_module_name').value = moduleName;
            document.getElementById('edit_module_desc').value = moduleDesc;
            document.getElementById('edit_completion').value = completion;
            document.getElementById('editModuleForm').action = `/module/${moduleID}`; // Set the form action to the correct route
            document.getElementById('editModuleModal').style.display = 'block';
        }
        
        window.onclick = function(event) {
            var addModal = document.getElementById('addModuleModal');
            var editModal = document.getElementById('editModuleModal');
            if (event.target === addModal) {
                closeAddModuleModal();
            }
            if (event.target === editModal) {
                closeEditModuleModal();
            }
        }
    </script>

</body>
</html>