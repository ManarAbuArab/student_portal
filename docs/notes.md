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