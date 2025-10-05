<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard | URMS</title>
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
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }

    header button:hover {
      background: #e0a800;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .card {
      background: var(--text-light);
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      padding: 1.5rem;
      transition: all var(--transition-speed) ease;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
    }

    .card-icon {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      display: block;
    }

    .card h3 {
      margin: 0 0 0.5rem 0;
      font-size: 1.2rem;
      color: var(--primary-color);
      font-weight: bold;
    }

    .card p {
      margin: 0 0 1rem 0;
      color: #666;
      font-size: 0.95rem;
      line-height: 1.4;
    }

    .card button {
      width: 100%;
      background: var(--primary-color);
      color: var(--text-light);
      border: none;
      padding: 0.8rem;
      border-radius: var(--border-radius);
      cursor: pointer;
      transition: all var(--transition-speed) ease;
      font-weight: bold;
      font-size: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .card button:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

    .course-link {
      color: #007bff;
      text-decoration: underline;
      cursor: pointer;
      transition: color var(--transition-speed);
    }

    .course-link:hover {
      color: var(--accent-color);
    }

    .action-btn {
      padding: 0.5rem 1rem;
      border: none;
      border-radius: var(--border-radius);
      cursor: pointer;
      transition: all var(--transition-speed) ease;
      font-weight: bold;
      margin: 0 0.25rem;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
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

    /* Responsive Design */
    @media (max-width: 768px) {
      header {
        padding: 1rem;
        flex-direction: column;
        gap: 1rem;
      }

      main {
        padding: 1rem;
      }

      .card-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }

      table {
        font-size: 0.9rem;
      }

      th, td {
        padding: 0.5rem;
      }

      .action-btn {
        padding: 0.4rem 0.8rem;
        font-size: 0.9rem;
      }

      .card-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: block;
      }

      .card h3 {
        margin: 0 0 0.5rem 0;
        font-size: 1.2rem;
        color: var(--primary-color);
        font-weight: bold;
      }
    }

    .card button:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <h1>🔧 URMS | Admin Dashboard</h1>
    <button onclick="logout()">🔒 Logout</button>
  </header>

  <main>
    <!-- Navigation Cards Section -->
    <section class="section">
      <h2>📊 Quick Actions</h2>
      <div class="card-grid">
        <div class="card">
          <span class="card-icon">👨‍🎓</span> 
          <h3>Handle Students</h3>
          <p>Manage students by Year & Section. CRUD operations for student records.</p>
          <button onclick="window.location.href='handle-students.php'">➡️ Go</button>
        </div>

        <!-- Handle Teachers Card -->
        <div class="card">
          <span class="card-icon">👩‍🏫</span> 
          <h3>Handle Teachers</h3>
          <p>Manage teachers by Department. CRUD operations for teacher records.</p>
          <button onclick="window.location.href='handle-teachers.php'">➡️ Go</button>
        </div>

        <!-- Create Class Card (Placeholder - replace with actual link if you have the page) -->
        <div class="card">
          <span class="card-icon">📖</span> 
          <h3>Create Class</h3>
          <p>Fill in course details, assign teacher, schedule, and room.</p>
          <button onclick="window.location.href='create-class.php'">➕ Create</button>  <!-- Or use alert() as placeholder -->
        </div>
      </div>
    </section>

    <!-- List of Classes Section -->
    <section class="section">
      <h2>📚 List of Classes</h2>
      <table>
        <thead>
          <tr>
            <th>Course Title</th>
            <th>Schedule</th>
            <th>Room</th>
            <th>Instructor</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="course-link" onclick="viewClass('Programming 101')">💻 Programming 101</span></td>
            <td>Mon & Wed 8:00AM - 9:30AM</td>
            <td>Room 204</td>
            <td>Ms. Ella Garcia</td>
            <td>
              <button class="action-btn edit-btn" onclick="editClass(0)">✏️ Edit</button>
              <button class="action-btn delete-btn" onclick="deleteClass(0)">🗑️ Delete</button>
            </td>
          </tr>
          <tr>
            <td><span class="course-link" onclick="viewClass('Database Systems')">🗄️ Database Systems</span></td>
            <td>Tue & Thu 1:00PM - 2:30PM</td>
            <td>Lab 101</td>
            <td>Mr. John Doe</td>
            <td>
              <button class="action-btn edit-btn" onclick="editClass(1)">✏️ Edit</button>
              <button class="action-btn delete-btn" onclick="deleteClass(1)">🗑️ Delete</button>
            </td>
          </tr>
          <tr>
            <td><span class="course-link" onclick="viewClass('Web Development')">🌐 Web Development</span></td>
            <td>Fri 10:00AM - 1:00PM</td>
            <td>Lab 202</td>
            <td>Ms. Rivera</td>
            <td>
              <button class="action-btn edit-btn" onclick="editClass(2)">✏️ Edit</button>
              <button class="action-btn delete-btn" onclick="deleteClass(2)">🗑️ Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <script>
    function navigateTo(page) {
      // In a real app, this would redirect to the respective page
      alert(`Navigating to ${page} management...`);
      // Example: window.location.href = `${page}.html`;
    }

    function viewClass(course) {
      alert(`Viewing details for ${course}...`);
      // In a real app, open modal or redirect to details page
    }

    function editClass(index) {
      alert(`Editing class at index ${index}...`);
      // In a real app, open edit modal/form
    }

    function deleteClass(index) {
      if (confirm(`Are you sure you want to delete this class?`)) {
        alert(`Class at index ${index} deleted successfully!`);
        // In a real app, remove from data and refresh table
      }
    }

    function logout() {
      if (confirm("Are you sure you want to logout?")) {
        alert("🔒 Logging out...");
        // In a real app, redirect to login page
      }
    }
  </script>
</body>
</html>
