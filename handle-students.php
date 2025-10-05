<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
            background: var(--light-bg);
            color: var(--text-dark);
            font-family: "Segoe UI", Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        header {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;  /* Changed from center to space-between for back button */
            align-items: center;
            box-shadow: var(--box-shadow);
            position: sticky;
            top: 0;
            z-index: 100;
            }

            header h1 {
            margin: 0;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .section {
            background: var(--text-light);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            margin-bottom: 2rem;
            transition: all var(--transition-speed) ease;
            opacity: 0;
            transform: translateY(20px);
            animation: slideInUp 0.6s ease-out forwards;
        }

        .section:nth-child(1) { animation-delay: 0.1s; }
        .section:nth-child(2) { animation-delay: 0.2s; }

        @keyframes slideInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .section:hover {
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
            transform: translateY(-5px);
        }

        .section h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn {
            background: var(--primary-color);
            color: var(--text-light);
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            margin: 0.25rem 0;
        }

        .btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-add {
            background: var(--secondary-color);
            margin-bottom: 1rem;
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
            background: #c82333;
        }

        .btn-save {
            background: var(--success-color);
            color: var(--text-light);
        }

        .btn-save:hover {
            background: #218838;
        }

        .btn-cancel {
            background: #6c757d;
            color: var(--text-light);
        }

        .btn-cancel:hover {
            background: #5a6268;
        }

        .form-container {
            display: none;
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            margin-bottom: 1rem;
            transition: all var(--transition-speed) ease;
        }

        .form-container.show {
            display: block;
            animation: slideInUp 0.4s ease-out;
        }

        .form-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .form-row input {
            flex: 1;
            min-width: 200px;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: border-color var(--transition-speed) ease;
            background: #fff;
        }

        .form-row input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 5px rgba(82, 0, 0, 0.3);
        }

        .form-row input::placeholder {
            color: #999;
        }

        .form-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-start;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background: var(--text-light);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 0.75rem;
            text-align: center;
            transition: background var(--transition-speed);
        }

        thead {
            background: var(--primary-color);
            color: var(--text-light);
        }

        tbody tr {
            transition: all var(--transition-speed) ease;
        }

        tbody tr:hover {
            background: #f2f2f2;
            transform: scale(1.01);
        }

        .actions {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            color: var(--text-light);
            font-weight: bold;
            z-index: 1001;
            box-shadow: var(--box-shadow);
            transform: translateX(100%);
            transition: transform 0.3s ease, opacity 0.3s ease;
            opacity: 0;
        }

        .toast.show {
            transform: translateX(0);
            opacity: 1;
        }

        .toast.success {
            background: var(--success-color);
        }

        .toast.error {
            background: var(--error-color);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header {
                padding: 1rem;
            }

            .container {
                padding: 1rem;
            }

            .form-row {
                flex-direction: column;
            }

            .form-row input {
                min-width: auto;
            }

            table {
                font-size: 0.9rem;
            }

            th, td {
                padding: 0.5rem;
            }

            .actions {
                flex-direction: column;
            }
        }

        header button:hover {  /* For the back button */
            background: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header>
        <button onclick="window.location.href='admin-dashboard.php'" style="background: var(--accent-color); color: var(--text-dark); border: none; padding: 0.6rem 1.2rem; border-radius: var(--border-radius); cursor: pointer; font-weight: bold; display: flex; align-items: center; gap: 0.4rem; transition: all var(--transition-speed) ease;">
    ← Back to Dashboard</button>
        <h1>🎓 URMS | Handle Students</h1>
    </header>

    <div class="container">
        <section class="section">
            <h2>👨‍🎓 Manage Students</h2>
            <button class="btn btn-add" onclick="toggleForm()">➕ Add Student</button>
        </section>

        <section class="section">
            <div id="studentForm" class="form-container">
                <h3 id="formTitle">Add New Student</h3>
                <form id="form">
                    <input type="hidden" id="studentId" />
                    <div class="form-row">
                        <input type="text" id="name" placeholder="Full Name" required />
                        <input type="text" id="year" placeholder="Year" required />
                    </div>
                    <div class="form-row">
                        <input type="text" id="section" placeholder="Section" required />
                        <input type="text" id="adviser" placeholder="Class Adviser" required />
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-save" onclick="saveStudent()">💾 Save</button>
                        <button type="button" class="btn btn-cancel" onclick="cancelForm()">❌ Cancel</button>
                    </div>
                </form>
            </div>
        </section>

        <section class="section">
            <h2>📋 Students List</h2>
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
        </section>
    </div>

    <script>
        let students = [
            { name: "Chares Clare P. Balungo", year: "3rd Year", section: "BSIT-3A", adviser: "Mr. Villanueva" },
            { name: "Ana Reyes", year: "2nd Year", section: "BSIT-2B", adviser: "Ms. Rivera" }
        ];
        let editingIndex = -1;

        function toggleForm() {
            const form = document.getElementById("studentForm");
            const isVisible = form.classList.contains("show");
            if (isVisible) {
                cancelForm();
            } else {
                resetForm();
                form.classList.add("show");
                document.getElementById("formTitle").textContent = "➕ Add Student";
            }
        }

        function resetForm() {
            document.getElementById("form").reset();
            editingIndex = -1;
        }

        function cancelForm() {
            const form = document.getElementById("studentForm");
            form.classList.remove("show");
            resetForm();
        }

        function saveStudent() {
            const name = document.getElementById("name").value.trim();
            const year = document.getElementById("year").value.trim();
            const section = document.getElementById("section").value.trim();
            const adviser = document.getElementById("adviser").value.trim();

            if (!name || !year || !section || !adviser) {
                showToast("Please fill in all fields.", "error");
                return;
            }

            if (editingIndex === -1) {
                students.push({ name, year, section, adviser });
                showToast("✅ Student added successfully!", "success");
            } else {
                students[editingIndex] = { name, year, section, adviser };
                editingIndex = -1;
                document.getElementById("formTitle").textContent = "➕ Add Student";
                showToast("✏️ Student updated successfully!", "success");
            }

            cancelForm();
            renderTable();
        }

        function renderTable() {
            const tbody = document.querySelector("#studentTable tbody");
            tbody.innerHTML = "";
            students.forEach((student, index) => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${student.name}</td>
                    <td>${student.year}</td>
                    <td>${student.section}</td>
                    <td>${student.adviser}</td>
                    <td class="actions">
                        <button class="btn btn-edit" onclick="editStudent(${index})">✏️ Edit</button>
                        <button class="btn btn-delete" onclick="deleteStudent(${index})">🗑️ Delete</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function editStudent(index) {
            editingIndex = index;
            const student = students[index];
            document.getElementById("name").value = student.name;
            document.getElementById("year").value = student.year;
            document.getElementById("section").value = student.section;
            document.getElementById("adviser").value = student.adviser;
            document.getElementById("formTitle").textContent = "✏️ Edit Student";
            document.getElementById("studentForm").classList.add("show");
        }

        function deleteStudent(index) {
            if (confirm("Are you sure you want to delete this student?")) {
                students.splice(index, 1);
                renderTable();
                showToast("🗑️ Student deleted successfully!", "success");
            }
        }

        function showToast(message, type) {
            const toast = document.createElement("div");
            toast.className = `toast ${type}`;
            toast.textContent = message;
            document.body.appendChild(toast);

            // Show toast
            setTimeout(() => toast.classList.add("show"), 100);

            // Hide and remove after 3 seconds
            setTimeout(() => {
                toast.classList.remove("show");
                setTimeout(() => document.body.removeChild(toast), 300);
            }, 3000);
        }

        // Initialize table on load
        document.addEventListener("DOMContentLoaded", renderTable);
    </script>
</body>
</html>
