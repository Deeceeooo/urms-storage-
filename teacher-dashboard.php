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

    .section {
      background: var(--text-light);
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      padding: 1.5rem;
      margin-bottom: 2rem;
    }

    .section h2 {
      color: var(--primary-color);
      margin-bottom: 1rem;
      font-size: 1.2rem;
    }

    .profile-info {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }

    .profile-info div {
      padding: 0.5rem;
      border-bottom: 1px solid #ddd;
    }

    .profile-info strong {
      color: var(--secondary-color);
    }

    .toggle-btn {
      background: var(--primary-color);
      color: var(--text-light);
      padding: 0.5rem 1rem;
      border: none;
      border-radius: var(--border-radius);
      cursor: pointer;
      transition: background var(--transition-speed);
    }

    .toggle-btn:hover {
      background: var(--secondary-color);
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
      padding: 0.3rem 0;
      border-bottom: 1px dashed #ccc;
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

    td a {
      color: blue;
      text-decoration: underline;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <h1>URMS | Teacher Dashboard</h1>
    <button>Logout</button>
  </header>

  <main>
    <!-- Profile Section -->
    <section class="section">
      <h2>Profile</h2>
      <div class="profile-info">
        <div><strong>Name:</strong> Maria Dela Cruz</div>
        <div><strong>Department:</strong> Computer Science</div>
        <div><strong>Faculty:</strong> Information Technology</div>
      </div>
    </section>

    <!-- Advisory Class -->
    <section class="section">
      <h2>Advisory Class</h2>
      <button class="toggle-btn" onclick="toggleAdvisory()">Show Students</button>
      <ul id="advisory-list" class="student-list hidden">
        <li>Juan Dela Cruz</li>
        <li>Ana Reyes</li>
        <li>Mark Villanueva</li>
        <li>Sophia Cruz</li>
      </ul>
    </section>

    <!-- Classes Section -->
    <section class="section">
      <h2>Classes</h2>
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
            <td><a href="#">Programming 101</a></td>
            <td>Mon & Wed 8:00AM - 9:30AM</td>
            <td>Room 204</td>
          </tr>
          <tr>
            <td><a href="#">Database Systems</a></td>
            <td>Tue & Thu 1:00PM - 2:30PM</td>
            <td>Lab 101</td>
          </tr>
          <tr>
            <td><a href="#">Web Development</a></td>
            <td>Fri 10:00AM - 1:00PM</td>
            <td>Lab 202</td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <script>
    function toggleAdvisory() {
      const list = document.getElementById("advisory-list");
      list.classList.toggle("hidden");
    }
  </script>
</body>
</html>
