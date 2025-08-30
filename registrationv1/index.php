<?php
// Include database connection
require_once 'dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Registration Page</title>
    <link rel="stylesheet" href="registration.css" />
    <link rel="stylesheet" href="responsive.css" />
    <script src="responsive.js"></script>
    <style>
      .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
      }
      .popup-content {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      }
      .popup h3 {
        color: #155724;
        margin-top: 0;
      }
      .popup-btn {
        background-color: #1a73e8;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <header class="header">
      <div class="logo-title">
        <img src="../logo.png" alt="Logo" class="site-logo" />
        <span class="site-name"
          ><h3>
            <span class="highlight-yellow">ISATU </span
            ><span class="highlight-blue">Vehicle Registration System</span>
          </h3></span
        >
      </div>
      <!-- <div class="header-right">
        <a href="login.php" class="login-btn">Login</a>
        <a href="registration.php" class="register-btn">Register Vehicle</a>
      </div> -->
    </header>

    <div class="container">
      <h2><span class="highlight">Vehicle</span> <span>Registration</span></h2>
      <p>
        Please fill out the form completely and upload the required documents.
      </p>

      <form id="registrationForm" method="POST" enctype="multipart/form-data">
        <section>
          <h3>User Information</h3>
          <div class="checkbox-group">
            <label>
              <input type="radio" name="userType" value="student" required />
              Student
            </label>
            <label>
              <input type="radio" name="userType" value="faculty" required />
              Faculty
            </label>
            <label>
              <input type="radio" name="userType" value="non-teaching" required />
              Non-Teaching Personnel
            </label>
          </div>

          <div class="grid-3">
            <input type="text" name="lastName" placeholder="Lastname" required />
            <input type="text" name="firstName" placeholder="Firstname" required />
            <input type="text" name="middleName" placeholder="Middlename" />
          </div>

          <div class="grid-2">
            <input type="email" name="email" placeholder="Email Address" required />
            <input type="text" name="contactNum" placeholder="Contact Number" required />
          </div>

          <div class="grid-3">
            <select name="college" required>
              <option value="CAS">(CAS) College of Arts and Sciences</option>
              <option value="CEA">(CEA) College of Engineering and Architecture</option>
              <option value="CCI">(CCI) College of Information and Informatics</option>
              <option value="COE">(COE) College of Education</option>
              <option value="CIT">(CIT) College of Industrial Technology</option>
            </select>
            <input type="text" name="course" placeholder="Course" required />
            <select name="academicYear" required>
              <option value="">Select Academic Year</option>
              <option value="2025-2026">2025-2026</option>
              <option value="2026-2027">2026-2027</option>
            </select>
          </div>

          <div class="grid-3">
            <select name="yearLevel">
              <option value="">Year Level (For Students)</option>
              <option value="1st">1st</option>
              <option value="2nd">2nd</option>
              <option value="3rd">3rd</option>
              <option value="4th">4th</option>
            </select>
            <input type="text" name="section" placeholder="Section" />
          </div>

          <div class="upload-box">
            <label>Upload Scanned Copy of Driver's License</label>
            <div class="upload-area">
              Drag and drop files here or
              <span class="browse">click to browse</span>
              <input type="file" name="driversLicense" accept="image/*,application/pdf" style="display: none" required />
            </div>
          </div>
        </section>

        <div id="vehicle-sections">
          <section class="vehicle-section">
            <div class="section-header">
              <h3>Vehicle Information</h3>
              <button type="button" class="btn-delete-vehicle">Remove</button>
            </div>

            <div class="grid-3">
              <select name="vehicleType[]" required>
                <option value="">Select Vehicle Type</option>
                <option value="Car">Car</option>
                <option value="Motorcycle">Motorcycle</option>
              </select>
              <input type="text" name="manufacturer[]" placeholder="Manufacturer" required />
              <input type="text" name="model[]" placeholder="Model" required />
            </div>

            <div class="grid-3">
              <input type="text" name="color[]" placeholder="Color" required />
              <input type="text" name="plateNumber[]" placeholder="Plate Number" required />
              <select name="numWheels[]" required>
                <option value="">Select Number of Wheels</option>
                <option value="2">2</option>
                <option value="4">4</option>
              </select>
            </div>

            <div class="grid-3">
              <select name="fuelType[]" required>
                <option value="">Select Fuel Type</option>
                <option value="Gasoline">Gasoline</option>
                <option value="Diesel">Diesel</option>
                <option value="Electric">Electric</option>
                <option value="Hybrid">Hybrid</option>
              </select>
              <input type="text" name="cubicCapacity[]" placeholder="Cubic Capacity" required />
            </div>

            <div class="upload-box">
              <label>Upload Scanned Copy of Official Receipt (OR)</label>
              <div class="upload-area">
                Drag and drop files here or
                <span class="browse">click to browse</span>
                <input type="file" name="officialReceipt[]" accept="image/*,application/pdf" style="display: none" required />
              </div>
            </div>

            <div class="upload-box">
              <label>Upload Scanned Copy of Certificate of Registration (CR)</label>
              <div class="upload-area">
                Drag and drop files here or
                <span class="browse">click to browse</span>
                <input type="file" name="certRegistration[]" accept="image/*,application/pdf" style="display: none" required />
              </div>
            </div>
          </section>
        </div>
        <button type="button" class="add-btn" id="addVehicleBtn">+ Add More Vehicle</button>

        <div class="agreement">
          <input type="checkbox" required /> I agree to the university's traffic regulations, security policies, and penalties for violations
        </div>
        <div class="button-row">
          <button type="submit" class="submit-btn">Submit Application</button>
        </div>
      </form>
    </div>

    <!-- Success Popup -->
    <div id="successPopup" class="popup">
      <div class="popup-content">
        <h3>Registration Submitted Successfully!</h3>
        <p>Your application has been received and will be reviewed by an administrator.</p>
        <p>Your temporary ID: <strong id="tempID"></strong></p>
        <button class="popup-btn" onclick="closePopup()">OK</button>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Form submission with AJAX
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
          e.preventDefault();
          
          // Validate form
          const requiredFields = this.querySelectorAll('[required]');
          let allValid = true;
          
          requiredFields.forEach(field => {
            if (!field.value) {
              allValid = false;
              field.style.borderColor = 'red';
            } else {
              field.style.borderColor = '';
            }
          });
          
          if (!allValid) {
            alert('Please fill in all required fields');
            return;
          }
          
          // Submit form with AJAX
          const formData = new FormData(this);
          
          fetch('process_registration.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Show success popup
              document.getElementById('tempID').textContent = data.tempOwnerID;
              document.getElementById('successPopup').style.display = 'flex';
            } else {
              alert('Error: ' + data.message);
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting the form');
          });
        });
        
        // Close popup function
        window.closePopup = function() {
          document.getElementById('successPopup').style.display = 'none';
          document.getElementById('registrationForm').reset();
        };

        function initUploadArea(area) {
          const fileInput = area.querySelector('input[type="file"]');
          const browse = area.querySelector('.browse');
          
          area.addEventListener('dragover', function(e) {
            e.preventDefault();
            area.classList.add('dragover');
          });
          
          area.addEventListener('dragleave', function(e) {
            area.classList.remove('dragover');
          });
          
          area.addEventListener('drop', function(e) {
            e.preventDefault();
            area.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
              fileInput.files = e.dataTransfer.files;
              showFileName(area, e.dataTransfer.files[0].name);
            }
          });
          
          browse.addEventListener('click', function() {
            fileInput.click();
          });
          
          fileInput.addEventListener('change', function(e) {
            if (e.target.files.length) {
              showFileName(area, e.target.files[0].name);
            }
          });
        }
        
        function showFileName(area, fileName) {
          const existing = area.querySelector('.file-name');
          if (existing) existing.remove();
          
          const fileDiv = document.createElement('div');
          fileDiv.className = 'file-name';
          fileDiv.textContent = 'Selected: ' + fileName;
          fileDiv.style.marginTop = '10px';
          fileDiv.style.fontSize = '12px';
          fileDiv.style.color = '#059669';
          area.appendChild(fileDiv);
        }
        
        document.querySelectorAll('.upload-area').forEach(initUploadArea);
        
        document.getElementById('addVehicleBtn').addEventListener('click', function() {
          const vehicleSections = document.getElementById('vehicle-sections');
          const lastSection = vehicleSections.querySelector('.vehicle-section:last-child');
          const newSection = lastSection.cloneNode(true);
          
          newSection.querySelectorAll('input, select').forEach(function(el) {
            if (el.type === 'file') {
              el.value = '';
            } else if (el.tagName.toLowerCase() === 'select') {
              el.selectedIndex = 0;
            } else {
              el.value = '';
            }
          });
          
          newSection.querySelectorAll('.file-name').forEach(fn => fn.remove());
          vehicleSections.appendChild(newSection);
          newSection.querySelectorAll('.upload-area').forEach(initUploadArea);
          
          // Add delete functionality to the new section
          const deleteBtn = newSection.querySelector('.btn-delete-vehicle');
          if (deleteBtn) {
            deleteBtn.addEventListener('click', handleDeleteVehicle);
          }
          
          // Show all delete buttons when adding a new section
          updateDeleteButtonVisibility();
        });
        
        // Handle delete vehicle functionality
        function handleDeleteVehicle() {
          const vehicleSections = document.getElementById('vehicle-sections');
          const sections = vehicleSections.querySelectorAll('.vehicle-section');
          
          // Don't delete if it's the only section
          if (sections.length <= 1) {
            return;
          }
          
          // Confirm deletion
          if (confirm('Are you sure you want to remove this vehicle?')) {
            const section = this.closest('.vehicle-section');
            section.classList.add('removing');
            
            setTimeout(() => {
              section.remove();
              
              // Check if only one section remains and hide delete buttons if so
              const remainingSections = vehicleSections.querySelectorAll('.vehicle-section');
              if (remainingSections.length <= 1) {
                const deleteButtons = document.querySelectorAll('.btn-delete-vehicle');
                deleteButtons.forEach(btn => btn.style.display = 'none');
              }
            }, 300);
          }
        }
        
        // Add delete functionality to existing buttons
        document.querySelectorAll('.btn-delete-vehicle').forEach(btn => {
          btn.addEventListener('click', handleDeleteVehicle);
        });
        
        // Hide delete buttons if only one vehicle section exists
        function updateDeleteButtonVisibility() {
          const vehicleSections = document.getElementById('vehicle-sections');
          const sections = vehicleSections.querySelectorAll('.vehicle-section');
          const deleteButtons = document.querySelectorAll('.btn-delete-vehicle');
          
          if (sections.length <= 1) {
            deleteButtons.forEach(btn => btn.style.display = 'none');
          } else {
            deleteButtons.forEach(btn => btn.style.display = 'block');
          }
        }
        
        // Check button visibility on page load
        updateDeleteButtonVisibility();
      });
    </script>
  </body>
</html>