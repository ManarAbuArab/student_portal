# Student Portal

## Overview
A PHP-based Student Portal that allows students to register, log in, manage tasks, and view personal schedules. The project uses a MySQL database to store user and task data. The project is containerized with Docker and version-controlled using GitHub.

---

## 🛠 Tech Stack

- **Backend:** PHP 8.2  
- **Frontend:** HTML, CSS, JavaScript  
- **Database:** MySQL 8.0  
- **Web Server:** Apache  
- **Containerization:** Docker & Docker Compose  
- **Version Control:** Git & GitHub  

---

## 📁 Project Structure (Simplified)

student_portal/
│── Dockerfile
│── docker-compose.yml
│── student_portal.sql
│── connection.php
│── index.php
│── src/
│   ├─ signup.php
│   ├─ login.php
│   ├─ todo.php
│   ├─ personal.php
│   └─ …
│── assets/
│   └─ css, js, images
│── docs/
│   ├─ screenshots/
│   └─ notes.md
│── README.md
│── .gitignore
│── .dockerignore

---

## ⚙️ Configuration Notes

- **Web Port:** 8080  
- **Database Port:** 3306  
- **Database Name:** student_portal  
- **MySQL User:** user
- **MySQL Password:** pass123  
- **Database Import:** Automatically loaded from `student_portal.sql`  
- **Important:** The database host inside Docker is `db`, not `localhost`.

---
🚀 VPS Deployment

This project was deployed to a Virtual Private Server (VPS) using Back4App Containers. Back4App provides a managed VPS-like environment where Docker is pre-installed, and container execution is handled automatically.

The Dockerized Student Portal project, originally developed in Assignment #2, was deployed on Back4App using its container-based workflow. The deployment process did not require manual installation of Git or Docker through a traditional SSH terminal.

The application runs inside Docker containers (Apache, PHP, and MySQL) and is publicly accessible through the deployment URL provided by Back4App.

🌐 Production URL
https://myproject1-zutwqb6j.b4a.run/
-----

## 🚀 How to Build and Run the Project

### 1️⃣ Prerequisites

Make sure you have installed:

- Docker Desktop  
- Git  

---

### 2️⃣ Clone Repository

```bash
git clone https://github.com/ManarAbuArab/student_portal.git
cd student_portal

---

3️⃣ Initialize Git (if not already done)

git init
git add .
git commit -m "feat: initial commit with project structure"
git remote add origin https://github.com/ManarAbuArab/student_portal.git
git push -u origin master

---

4️⃣ Build and Start Containers
docker-compose build
docker-compose up

Docker will:
	•	Build the PHP–Apache image
	•	Start MySQL
	•	Import student_portal.sql automatically

---

5️⃣ Access the Application
Open your browser and go to:
http://localhost:8080
✅ The Student Portal UI should load
✅ Data should appear from the database

🧪 How to Test the Project
	•	Register a new student account
	•	Log in with the credentials
	•	Add, view, and complete tasks in the To-Do module
	•	Check personal schedule and Q&A sections
	•	Confirm styles, images, and user data load correctly

If everything displays correctly → Project is working properly.


🛑 How to Stop Containers and Clean Up
# Stop containers
docker-compose down

# Stop and remove volumes (full cleanup)
docker-compose down -v
