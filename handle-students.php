<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handle Students | URMS</title>
    <style>
        :root {
            --primary-color: #520000;
            --secondary-color: #8f0002;
            --accent-color: #ffc107;
            --light-bg: #f9f5db;
            --text-light: #ffffff;
            --text-dark: #333333;
            --error-color: #dc3545;
            --success-color: #28a745;
            --border-radius: 8px;
            --box-shadow: 0 0 30px rgba(0, 0, 0, .2);
            --transition-speed: 0.6s;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--light-bg);
            margin: 0;
            padding: 0;
        }

        header {
            background: var(--primary-color);
            color: var(--text-light);
            padding: 1rem 2rem;
            text-align: center;
            box-shadow: var(--box-shadow);
        }

        h1 {
            margin: 0;
        }

        .container {
            width: 90%;
            margin: 2rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .btn {
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: background var(--transition-speed);
        }

        .btn-add {
            background: var(--secondary-color);
            color: var(--text-light);
        }
        .btn-add:hover {
            background: var(--primary-color);
        }

        .btn-edit {
            background: var(--accent-color);
            color: var(--text-dark);
        }
        .btn-edit:hover {
            background: #e0a800;
        }

        .btn-delete {
            background: var(--error-color);
            color: var(--text-light);
        }
        .btn-delete:hover {
            background: #a71d2a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 0.8rem;
            text-align: center;
        }

        th {
            background: var(--primary-color);
            color: var(--text-light);
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .form-container {
            display: none;
            margin-top: 1rem;
            padding: 1.5rem;
            border: 1px solid #ccc;
            border-radius: var(--border-radius);
            background: #fdfdfd;
        }

        .form-container input {
            width: 100%;
            padding: 0.7rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: var(--border-radius);
        }

        .form-container .btn-save {
            background: var(--success-color);
            color: var(--text-light);
        }
        .form-container .btn-save:hover {
            background: #1e7e34;
        }
    </style>
</head>
<body>
    <header>
        <h1>Students Data</h1>
    </header>

    <div class="container">
        <button class="btn btn-add" onclick="toggleForm()">Add Student</button>

        <div id="studentForm" class="form-container">
            <h3>Add / Edit Student</h3>
            <form id="form">
                <input type="hidden" id="studentId">
                <input type="text" id="name" placeholder="Full Name" required>
                <input type="text" id="year" placeholder="Year" required>
                <input type="text" id="section" placeholder="Section" required>
                <input type="text" id="adviser" placeholder="Class Adviser" required>
                <button type="button" class="btn btn-save" onclick="saveStudent()">Save</button>
            </form>
        </div>

        <table id="studentTable">
            <thead>
                <tr>
                    <th>Learner ID</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Section</th>
                    <th>Adviser</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Student rows will appear here -->
            </tbody>
        </table>
    </div>

    <script>
        let students = [];
        let editingIndex = -1;

        function toggleForm() {
            const form = document.getElementById("studentForm");
            form.style.display = (form.style.display === "block") ? "none" : "block";
        }

        function saveStudent() {
            const name = document.getElementById("name").value;
            const year = document.getElementById("year").value;
            const section = document.getElementById("section").value;
            const adviser = document.getElementById("adviser").value;

            if (editingIndex === -1) {
                students.push({ name, year, section, adviser });
            } else {
                students[editingIndex] = { name, year, section, adviser };
                editingIndex = -1;
            }

            document.getElementById("form").reset();
            document.getElementById("studentForm").style.display = "none";
            renderTable();
        }

        function renderTable() {
            const tbody = document.querySelector("#studentTable tbody");
            tbody.innerHTML = "";
            students.forEach((student, index) => {
                tbody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${student.name}</td>
                        <td>${student.year}</td>
                        <td>${student.section}</td>
                        <td>${student.adviser}</td>
                        <td>
                            <button class="btn btn-edit" onclick="editStudent(${index})">Edit</button>
                            <button class="btn btn-delete" onclick="deleteStudent(${index})">Delete</button>
                        </td>
                    </tr>
                `;
            });
        }

        function editStudent(index) {
            editingIndex = index;
            const student = students[index];
            document.getElementById("name").value = student.name;
            document.getElementById("year").value = student.year;
            document.getElementById("section").value = student.section;
            document.getElementById("adviser").value = student.adviser;
            document.getElementById("studentForm").style.display = "block";
        }

        function deleteStudent(index) {
            if (confirm("Are you sure you want to delete this student?")) {
                students.splice(index, 1);
                renderTable();
            }
        }
    </script>
</body>
</html>
