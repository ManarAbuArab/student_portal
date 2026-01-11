**Docker Issues & Solutions**

## 1. Database Connection Problem (Main Issue)

**Problem**: While running the project inside Docker, the application was unable to connect to the MySQL database. The website either showed database connection errors or did not load data.
**Cause**: Inside Docker containers, localhost does not refer to the MySQL service. The database runs in a separate container, so using localhost caused the connection to fail.
**Solution**: I fixed this by changing the database host in the PHP connection file from "localhost" to "db". This works because db is the service name defined in docker-compose.yml, and Docker automatically handles internal networking between containers.

---

## 2. Virtualization Not Detected
**Problem:** Docker Desktop could not start because virtualization was not detected on my Windows machine.  
**Cause:** The CPU supports virtualization, but it was disabled in BIOS. 
**Solution:** 
	1.	Restarted laptop and entered BIOS (F1 at startup).
	2.	Navigated to Security → Virtualization.
	3.	Changed Intel Virtualization Technology from Disabled → Enabled.
	4.	Saved changes (F10) and restarted the computer.
	5.	Verified in Task Manager → CPU → Virtualization: Enabled.

Result: Docker Desktop started successfully and containers could run.
-----
## 📝 Deployment Notes

- Issue: Dockerfile not found on Back4App  
  Solution: Renamed file to 'Dockerfile' and placed it in the root directory

- Issue: Apache warning "Could not reliably determine the server's fully qualified domain name"  
  Solution: This is a normal warning; project still runs successfully

- Deployment Steps:
  1. Cloned GitHub repo to Back4App
  2. Built Docker image from Dockerfile
  3. Ran container
  4. Verified project works at Public URL
---
VPS Deployment Notes

One of the primary challenges encountered during the deployment process was understanding the differences between local Docker-based development and deployment within Back4App’s managed VPS-like environment.

Unlike a traditional VPS setup, Back4App abstracts direct access to Docker and Git installation and management. This required adapting the deployment approach and understanding how container execution is handled by the platform without manual terminal configuration.

Another challenge involved correctly configuring the application entry point. This issue was resolved by ensuring that the main `index.php` file was placed in the default directory expected by the Apache container, enabling the Student Portal application to be served properly.

Overall, this deployment process enhanced understanding of container-based deployment models, environment abstraction, and best practices for preparing applications for production environments.

---

# Notes on Student Portal Project

## Docker Challenges & Lessons

- I learned that Docker creates an isolated environment, so configuration settings like database hostnames and ports must be set correctly inside the container.  
- Docker Compose makes it much easier to run multiple services together (PHP + MySQL) without manually configuring each service.  
- Even if Docker cannot run on a local machine due to hardware limitations, preparing Dockerfile, docker-compose.yml, and clear instructions in the README ensures anyone else can run the project successfully.  
- Choosing proper service names in docker-compose is crucial because PHP scripts need to use the service name (e.g., `db`) instead of `localhost` to connect to the database.

## Git & GitHub Lessons

- I learned that Git is not just for storing code, but a professional tool to organize the project: meaningful commits, well-structured files, and a clear README.  
- Writing clear commit messages helps show project progress and document the changes.  
- GitHub makes the project accessible for anyone to run or review, especially with good documentation and screenshots showing the results.  
- My first push experience taught me about authentication (via browser or token) and handling GitHub permissions properly.

## General Lessons Learned
- Docker relies on virtualization; BIOS settings must be checked if containers fail.
- Docker Compose simplifies running multiple services (PHP + MySQL).
- Good documentation (README + notes) is as important as writing the code itself, as it explains how to run and test the project.  
- Organizing files and folders professionally makes the project ready for submission and easier to grade.  
- Taking screenshots of every step (Docker build, container running, project UI) is essential to prove the project works.  
- I realized that projects using Docker require patience and understanding of internal networking and service communication.
-----
# Lessons Learned from Deploying Student Portal

1. **Importance of Dockerfile naming and location**
   - Back4App deployment failed initially because the file name was `dockerfile` instead of `Dockerfile`.
   - Solution: Renamed file and placed it in the root of the repo.

2. **Using Back4App Containers as VPS**
   - Learned how to deploy a PHP + MySQL project in a containerized environment without setting up a full VPS.
   - Learned how to access logs and debug deployment issues.

3. **Handling Apache warnings**
   - Apache sometimes gives warnings like "Could not reliably determine the server's fully qualified domain name".
   - Learned these warnings don’t prevent the project from running.

4. **Version control importance**
   - Using Git & GitHub made it easy to track changes and redeploy the project.

5. **Project structure**
   - Organizing files into `src/`, `assets/`, and `docs/` improves clarity for deployment and grading.

6. **Testing and validation**
   - Always test all modules (login, signup, todo, personal schedule) after deployment to ensure the app works as expected.
