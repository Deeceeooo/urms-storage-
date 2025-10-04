<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Teacher Dashboard | URMS</title>
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
      justify-content: space-between;
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

    header button {
      background: var(--accent-color);
      color: var(--text-dark);
      border: none;
      padding: 0.6rem 1.2rem;
      border-radius: var(--border-radius);
      cursor: pointer;
      transition: all var(--transition-speed) ease;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      font-weight: bold;
    }

    header button:hover {
      background: #e0a800;
      transform: translateY(-2px);
    }

    main {
      padding: 2rem;
      max-width: 1200px;
      margin: 0 auto;
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
    .section:nth-child(3) { animation-delay: 0.3s; }

    @keyframes slideInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
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

    .profile-container {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .profile-wrapper {
      position: relative;
      display: inline-block;
    }

    .profile-pic {
      position: relative;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      border: 4px solid var(--primary-color);
      background-color: #fff;
      overflow: hidden;
    }

    .profile-pic img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .upload-btn {
      position: absolute;
      bottom: 5px;
      right: 5px;
      background: var(--accent-color);
      color: var(--text-dark);
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 18px;
      border: none;
      transition: all var(--transition-speed) ease;
      z-index: 2;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .upload-btn:hover {
      background: #e0a800;
      transform: translateY(-2px);
    }

    .profile-details {
      flex: 1;
    }

    .profile-details div {
      margin: 6px 0;
      font-size: 16px;
    }

    .toggle-btn, .manage-btn, .add-btn, .edit-btn, .delete-btn {
      background: var(--primary-color);
      color: var(--text-light);
      padding: 0.5rem 1rem;
      border: none;
      border-radius: var(--border-radius);
      cursor: pointer;
      transition: all var(--transition-speed) ease;
      margin: 0.25rem;
      font-size: 0.9rem;
    }

    .toggle-btn:hover, .manage-btn:hover, .add-btn:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
    }

    .edit-btn {
      background: var(--accent-color);
      color: var(--text-dark);
    }

    .edit-btn:hover {
      background: #e0a800;
      transform: translateY(-2px);
    }

    .delete-btn {
      background: var(--error-color);
      color: var(--text-light);
    }

    .delete-btn:hover {
      background: #c82333;
      transform: translateY(-2px);
    }

    .hidden {
      display: none;
    }

    ul.student-list {
      list-style: none;
      padding: 0;
      margin-top: 1rem;
    }

    ul.student-list li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.75rem;
      border-bottom: 1px dashed #ccc;
      transition: all var(--transition-speed) ease;
      background: #f8f9fa;
      border-radius: var(--border-radius);
      margin-bottom: 0.5rem;
    }

    ul.student-list li:hover {
      background: #e9ecef;
      transform: scale(1.02);
    }

    ul.student-list li:last-child {
      border-bottom: none;
    }

    .student-name {
      flex-grow: 1;
      font-weight: bold;
    }

    .student-actions {
      display: flex;
      gap: 0.5rem;
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      animation: fadeIn 0.3s ease;
    }

    .modal-content {
      background-color: var(--text-light);
      margin: 10% auto;
      padding: 2rem;
      border-radius: var(--border-radius);
      width: 90%;
      max-width: 500px;
      box-shadow: var(--box-shadow);
      transform: translateY(-50px);
      transition: transform var(--transition-speed) ease;
    }

    .modal.show {
      display: block;
    }

    .modal.show .modal-content {
      transform: translateY(0);
    }

    .modal h3 {
      color: var(--primary-color);
      margin-bottom: 1rem;
    }

    .modal input {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: 1px solid #ddd;
      border-radius: var(--border-radius);
      font-size: 1rem;
    }

    .modal button {
      margin-right: 0.5rem;
      padding: 0.75rem 1.5rem;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover {
      color: var(--text-dark);
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

    td a {
      color: blue;
      text-decoration: underline;
      font-weight: normal;
    }

    td a:hover {
      color: #e0a800;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      main {
        padding: 1rem;
      }

      .profile-container {
        flex-direction: column;
        text-align: center;
      }

      ul.student-list li {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }

      .student-actions {
        width: 100%;
        justify-content: flex-end;
      }

      table {
        font-size: 0.9rem;
      }

      th, td {
        padding: 0.5rem;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <h1>📚 URMS | Teacher Dashboard</h1>
    <button onclick="logout()">🔒 Logout</button>
  </header>

  <main>
    <!-- Profile Section -->
    <section class="section">
      <h2>👩‍🏫 Profile</h2>
      <div class="profile-container">
        <div class="profile-wrapper">
          <div class="profile-pic">
            <img id="profileImg" src="https://via.placeholder.com/150x150/520000/ffffff?text=Ella" alt="Teacher Profile Picture">
            <input type="file" id="profileUpload" accept="image/*" style="display: none;">
          </div>
          <label for="profileUpload" class="upload-btn" title="Upload Profile Picture">📷</label>
        </div>
        <div class="profile-details">
          <div><strong>Name:</strong> Ella Garcia</div>
          <div><strong>Department:</strong> Computer Science</div>
          <div><strong>Faculty:</strong> Information Technology</div>
        </div>
      </div>
    </section>

    <!-- Advisory Class -->
    <section class="section">
      <h2>👨‍🎓 Advisory Class</h2>
      <div style="display: flex; gap: 1rem; align-items: center; margin-bottom: 1rem;">
        <button class="toggle-btn" onclick="toggleAdvisory()">📋 Toggle Student List</button>
        <button class="add-btn manage-btn" onclick="openAddModal()">➕ Add Student</button>
      </div>
      <ul id="advisory-list" class="student-list hidden"></ul>
    </section>

    <!-- Classes Section -->
    <section class="section">
      <h2>📖 Classes</h2>
      <table>
        <thead>
          <tr>
            <th>Course Title</th>
            <th>Schedule</th>
            <th>Room</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="#">💻 Programming 101</a></td>
            <td>Mon & Wed 8:00AM - 9:30AM</td>
            <td>Room 204</td>
          </tr>
          <tr>
            <td><a href="#">🗄️ Database Systems</a></td>
            <td>Tue & Thu 1:00PM - 2:30PM</td>
            <td>Lab 101</td>
          </tr>
          <tr>
            <td><a href="#">🌐 Web Development</a></td>
            <td>Fri 10:00AM - 1:00PM</td>
            <td>Lab 202</td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <!-- Add/Edit Student Modal -->
  <div id="studentModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h3 id="modalTitle">Add Student</h3>
      <form id="studentForm">
        <input type="hidden" id="editIndex" value="-1">
        <input type="text" id="studentName" placeholder="Enter student name" required>
        <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
          <button type="button" onclick="closeModal()">Cancel</button>
          <button type="submit" class="add-btn">Save</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    let students = [
      { name: "Chares Clare P. Balungo" },
      { name: "Ana Reyes" },
      { name: "Mark Villanueva" },
      { name: "Sophia Cruz" }
    ];

    let editingIndex = -1;

    // Profile picture upload functionality
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('profileUpload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('profileImg').src = e.target.result;
            showNotification("✅ Profile picture updated!", "success");
          };
          reader.readAsDataURL(file);
        }
      });
    });

    function renderStudents() {
      const list = document.getElementById("advisory-list");
      list.innerHTML = "";
      students.forEach((student, index) => {
        const li = document.createElement("li");
        li.innerHTML = `
          <span class="student-name">👤 ${student.name}</span>
          <div class="student-actions">
            <button class="edit-btn" onclick="editStudent(${index})">✏️ Edit</button>
            <button class="delete-btn" onclick="deleteStudent(${index})">🗑️ Delete</button>
          </div>
        `;
        list.appendChild(li);
      });
    }

    function toggleAdvisory() {
      const list = document.getElementById("advisory-list");
      list.classList.toggle("hidden");
      if (!list.classList.contains("hidden")) {
        renderStudents();
      }
    }

    function openAddModal() {
      editingIndex = -1;
      document.getElementById("modalTitle").textContent = "➕ Add Student";
      document.getElementById("studentName").value = "";
      document.getElementById("editIndex").value = -1;
      document.getElementById("studentModal").classList.add("show");
    }

    function editStudent(index) {
      editingIndex = index;
      document.getElementById("modalTitle").textContent = "✏️ Edit Student";
      document.getElementById("studentName").value = students[index].name;
      document.getElementById("editIndex").value = index;
      document.getElementById("studentModal").classList.add("show");
    }

    function deleteStudent(index) {
      if (confirm("Are you sure you want to delete this student?")) {
        students.splice(index, 1);
        renderStudents();
        showNotification("🗑️ Student deleted successfully!", "success");
      }
    }

    function closeModal() {
      document.getElementById("studentModal").classList.remove("show");
    }

    document.getElementById("studentForm").addEventListener("submit", function(e) {
      e.preventDefault();
      const name = document.getElementById("studentName").value.trim();
      if (!name) return;

      if (editingIndex === -1) {
        students.push({ name });
        showNotification("✅ Student added successfully!", "success");
      } else {
        students[editingIndex].name = name;
        showNotification("✏️ Student updated successfully!", "success");
      }

      closeModal();
      renderStudents();
    });

    function showNotification(message, type) {
      const notification = document.createElement("div");
      notification.style.cssText = `
        position: fixed; top: 20px; right: 20px; padding: 1rem; border-radius: var(--border-radius);
        background: ${type === "success" ? "var(--success-color)" : "var(--error-color)"};
        color: var(--text-light); z-index: 1001; transition: all 0.3s ease;
        box-shadow: var(--box-shadow);
      `;
      notification.textContent = message;
      document.body.appendChild(notification);

      setTimeout(() => {
        notification.style.opacity = "0";
        notification.style.transform = "translateX(100%)";
        setTimeout(() => document.body.removeChild(notification), 300);
      }, 3000);
    }

    function logout() {
      if (confirm("Are you sure you want to logout?")) {
        alert("🔒 Logging out...");
      }
    }

    window.onclick = function(event) {
      const modal = document.getElementById("studentModal");
      if (event.target === modal) {
        closeModal();
      }
    }
  </script>
  </body>
  </html>