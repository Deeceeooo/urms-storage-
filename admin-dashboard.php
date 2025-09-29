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
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background: var(--primary-color);
      color: var(--text-light);
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: var(--box-shadow);
    }

    header h1 {
      margin: 0;
      font-size: 1.4rem;
    }

    header button {
      background: var(--secondary-color);
      color: var(--text-light);
      border: none;
      padding: 0.6rem 1.2rem;
      border-radius: var(--border-radius);
      cursor: pointer;
      transition: background var(--transition-speed);
    }

    header button:hover {
      background: #a30003;
    }

    main {
      padding: 2rem;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .card {
      background: var(--text-light);
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      padding: 1.5rem;
      transition: transform var(--transition-speed);
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h2 {
      margin-bottom: 1rem;
      font-size: 1.1rem;
      color: var(--primary-color);
    }

    .card button {
      width: 100%;
      background: var(--primary-color);
      color: var(--text-light);
      border: none;
      padding: 0.6rem;
      border-radius: var(--border-radius);
      cursor: pointer;
      transition: background var(--transition-speed);
    }

    .card button:hover {
      background: var(--secondary-color);
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
    }

    thead {
      background: var(--primary-color);
      color: var(--text-light);
    }

    tbody tr:hover {
      background: #f2f2f2;
    }

    .action-btn {
      padding: 0.4rem 0.8rem;
      border: none;
      border-radius: var(--border-radius);
      cursor: pointer;
    }

    .edit-btn {
      background: var(--accent-color);
      color: var(--text-dark);
      margin-right: 0.5rem;
    }

    .delete-btn {
      background: var(--error-color);
      color: var(--text-light);
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <h1>URMS | Admin Dashboard</h1>
    <button>Logout</button>
  </header>

  <main>
    <!-- Buttons Section -->
    <div class="card-grid">
      <div class="card">
        <h2>Handle Students</h2>
        <button>Go</button>
        <p style="margin-top:0.5rem;">Manage students by Year & Section. CRUD for student records.</p>
      </div>

      <div class="card">
        <h2>Handle Teachers</h2>
        <button>Go</button>
        <p style="margin-top:0.5rem;">Manage teachers by Department. CRUD for teacher records.</p>
      </div>

      <div class="card">
        <h2>Create Class</h2>
        <button>Create</button>
        <p style="margin-top:0.5rem;">Fill in course details, assign teacher, schedule, and room.</p>
      </div>
    </div>

    <!-- List of Classes -->
    <section>
      <h2 style="color:var(--primary-color); margin-bottom:1rem;">List of Classes</h2>
      <table>
        <thead>
          <tr>
            <th>Course Title</th>
            <th>Schedule</th>
            <th>Room</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="color:blue; cursor:pointer; text-decoration:underline;">Programming 101</td>
            <td>Mon & Wed 8:00AM - 9:30AM</td>
            <td>Room 204</td>
            <td>
              <button class="action-btn edit-btn">Edit</button>
              <button class="action-btn delete-btn">Delete</button>
            </td>
          </tr>
          <tr>
            <td style="color:blue; cursor:pointer; text-decoration:underline;">Database Systems</td>
            <td>Tue & Thu 1:00PM - 2:30PM</td>
            <td>Lab 101</td>
            <td>
              <button class="action-btn edit-btn">Edit</button>
              <button class="action-btn delete-btn">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>
