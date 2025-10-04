<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Dashboard | URMS</title>
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
      --border-radius: 10px;
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

    /* Header */
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

    /* Sections */
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

    /* Profile */
    .profile-container {
      display: flex;
      align-items: flex-start;
      gap: 20px;
      flex-wrap: wrap;
    }

    .profile-wrapper {
      position: relative;
      display: inline-block;
    }

    .profile-pic {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      overflow: hidden;
      border: 4px solid #800000;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
      transition: transform var(--transition-speed) ease;
      cursor: pointer;
    }

    .profile-pic:hover {
      transform: scale(1.05);
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
      width: 30px;
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 14px;
      border: none;
      transition: all var(--transition-speed) ease;
      z-index: 10;
    }

    .upload-btn:hover {
      background: #e0a800;
      transform: scale(1.1);
    }

    /* Profile Form */
    .profile-form {
      flex: 1;
      min-width: 300px;
    }

    .profile-field {
      display: flex;
      flex-direction: column;
      margin: 8px 0;
    }

    .profile-field label {
      font-weight: bold;
      color: var(--secondary-color);
      margin-bottom: 4px;
      font-size: 0.95rem;
    }

    .profile-field input {
      padding: 0.6rem;
      border: 1px solid #ddd;
      border-radius: var(--border-radius);
      font-size: 1rem;
      transition: border-color var(--transition-speed) ease;
      background: #f8f9fa;
    }

    .profile-field input:focus {
      border-color: var(--primary-color);
      outline: none;
      box-shadow: 0 0 5px rgba(82, 0, 0, 0.3);
      background: #fff;
    }

    .profile-field input:disabled {
      background: #f8f9fa;
      color: var(--text-dark);
      cursor: not-allowed;
    }

    .btn-group {
      margin-top: 1rem;
      display: flex;
      gap: 0.5rem;
      justify-content: flex-start;
    }

    .edit-btn, .save-btn, .cancel-btn {
      padding: 0.6rem 1.2rem;
      border-radius: var(--border-radius);
      border: none;
      cursor: pointer;
      font-weight: bold;
      font-size: 0.95rem;
      transition: all var(--transition-speed) ease;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }

    .edit-btn {
      background: var(--primary-color);
      color: var(--text-light);
    }

    .edit-btn:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
    }

    .save-btn {
      background: var(--success-color);
      color: var(--text-light);
    }

    .save-btn:hover {
      background: #218838;
      transform: translateY(-2px);
    }

    .cancel-btn {
      background: var(--error-color);
      color: var(--text-light);
    }

    .cancel-btn:hover {
      background: #c82333;
      transform: translateY(-2px);
    }

    /* Classmates */
    .classmates-title {
      margin-top: 1.5rem;
      color: var(--secondary-color);
      font-weight: bold;
      font-size: 1.1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    ul.classmates {
      list-style: none;
      padding: 0;
      margin: 0.5rem 0 0 0;
      max-height: 200px;
      overflow-y: auto;
    }

    ul.classmates li {
      padding: 0.5rem 0.6rem;
      border-bottom: 1px dashed #ccc;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      background: #f8f9fa;
      border-radius: var(--border-radius);
      margin-bottom: 0.5rem;
      transition: all var(--transition-speed) ease;
      font-size: 1rem;
    }

    ul.classmates li:hover {
      background: #e9ecef;
      transform: scale(1.02);
    }

    ul.classmates li::before {
      content: "👩‍🎓";
      flex-shrink: 0;
    }

    /* Table */
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

    /* Modal for Notifications (if needed, but using toast) */
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

    /* Responsive */
    @media (max-width: 768px) {
      .profile-container {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .profile-form {
        min-width: auto;
        width: 100%;
      }

      main {
        padding: 1rem;
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
    <h1>📚 URMS | Student Dashboard</h1>
    <button onclick="logout()">🔒 Logout</button>
  </header>

  <main>
    <!-- Profile Section -->
    <section class="section">
      <h2>👤 Profile</h2>
      <div class="profile-container">
        <!-- Profile Picture -->
        <div class="profile-wrapper">
          <div class="profile-pic">
            <img src="https://via.placeholder.com/120x120/800000/ffffff?text=👤" alt="Student Picture" id="profilePic">
          </div>
          <input type="file" id="profilePicInput" accept="image/*" style="display: none;" />
          <button class="upload-btn" onclick="document.getElementById('profilePicInput').click();">📷</button>
        </div>
        <!-- Profile Form -->
        <form id="profileForm" class="profile-form" novalidate>
          <div class="profile-field">
            <label for="studentName">Name</label>
            <input type="text" id="studentName" name="studentName" value="Chares Clare P. Balungo" disabled required />
          </div>
          <div class="profile-field">
            <label for="studentYear">Year</label>
            <input type="text" id="studentYear" name="studentYear" value="3rd Year" disabled required />
          </div>
          <div class="profile-field">
            <label for="studentSection">Section</label>
            <input type="text" id="studentSection" name="studentSection" value="BSIT-3A" disabled required />
          </div>
          <div class="profile-field">
            <label for="classAdviser">Class Adviser</label>
            <input type="text" id="classAdviser" name="classAdviser" value="Mr. Villanueva" disabled readonly />
          </div>
          <div class="btn-group">
            <button type="button" id="editBtn" class="edit-btn">✏️ Edit</button>
            <button type="submit" id="saveBtn" class="save-btn" style="display: none;">💾 Save</button>
            <button type="button" id="cancelBtn" class="cancel-btn" style="display: none;">❌ Cancel</button>
          </div>
        </form>
      </div>

      <h3 class="classmates-title">👥 List of Classmates</h3>
      <ul class="classmates" aria-label="List of Classmates">
        <li>Dixie Mae Gampic</li>
        <li>Jennifer Fajardo</li>
        <li>Ciara Wilsen Laranang</li>
        <li>Diana Sofia Sta. Ana</li>
      </ul>
    </section>

    <!-- Classes Section -->
    <section class="section">
      <h2>📖 Classes</h2>
      <table>
        <thead>
          <tr>
            <th>Course Title</th>
            <th>Units</th>
            <th>Instructor</th>
            <th>Room</th>
            <th>Schedule</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Programming 101</td>
            <td>3</td>
            <td>Mr. Lopez</td>
            <td>Room 204</td>
            <td>Mon & Wed 8:00AM - 9:30AM</td>
          </tr>
          <tr>
            <td>Database Systems</td>
            <td>3</td>
            <td>Ms. Rivera</td>
            <td>Lab 101</td>
            <td>Tue & Thu 1:00PM - 2:30PM</td>
          </tr>
          <tr>
            <td>Web Development</td>
            <td>3</td>
            <td>Mr. Gomez</td>
            <td>Lab 202</td>
            <td>Fri 10:00AM - 1:00PM</td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <script>
    // Elements
    const editBtn = document.getElementById('editBtn');
    const saveBtn = document.getElementById('saveBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const profileForm = document.getElementById('profileForm');
    const inputs = profileForm.querySelectorAll('input[type="text"]');
    const profilePic = document.getElementById('profilePic');
    const profilePicInput = document.getElementById('profilePicInput');

    // Store original values for reset
    const originalValues = {
      studentName: 'Chares Clare P. Balungo',
      studentYear: '3rd Year',
      studentSection: 'BSIT-3A',
      classAdviser: 'Mr. Villanueva'
    };

    // Enable editing mode
    editBtn.addEventListener('click', () => {
      inputs.forEach(input => {
        if (input.id !== 'classAdviser') {
          input.disabled = false;
        }
      });
      toggleButtons(true);
    });

    // Cancel editing and reset values
    cancelBtn.addEventListener('click', () => {
      inputs.forEach(input => {
        input.value = originalValues[input.id];
        input.disabled = true;
      });
      toggleButtons(false);
    });

    // Save changes
    profileForm.addEventListener('submit', (e) => {
      e.preventDefault();
      if (!profileForm.checkValidity()) {
        showToast('Please fill out all required fields.', 'error');
        return;
      }
      // Update original values (simulate save)
      inputs.forEach(input => {
        if (input.id !== 'classAdviser') {
          originalValues[input.id] = input.value;
        }
        input.disabled = true;
      });
      toggleButtons(false);
      showToast('Profile updated successfully!', 'success');
    });

    // Toggle button visibility
    function toggleButtons(editing) {
      editBtn.style.display = editing ? 'none' : 'flex';
      saveBtn.style.display = editing ? 'flex' : 'none';
      cancelBtn.style.display = editing ? 'flex' : 'none';
    }

    // Profile picture upload
    profilePicInput.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = (event) => {
          profilePic.src = event.target.result;
          showToast('Profile picture updated!', 'success');
        };
        reader.readAsDataURL(file);
      } else {
        showToast('Please select a valid image file.', 'error');
      }
      // Reset input
      profilePicInput.value = '';
    });

    // Toast notification
    function showToast(message, type) {
      const toast = document.createElement('div');
      toast.className = `toast ${type}`;
      toast.textContent = message;
      document.body.appendChild(toast);

      // Show toast
      setTimeout(() => toast.classList.add('show'), 100);

      // Hide and remove after 3 seconds
      setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => document.body.removeChild(toast), 300);
      }, 300
      
      // Logout function
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