# Food Recipe Management System

## Student Information
- Name: Yunik Bhattarai  
- Student ID: 2505816  
- Module: Full Stack Development  
- Module Leader: Deepson Shrestha  
- Tutors: Pankaj Saha, Arvind Nepal, Avimanyu Rimal

---

## Live Website
https://student.bicnepal.edu.np/~np02cs4a240001/

---

## GitHub Repository
https://github.com/yunik-bhattarai/Food-Recipe-Management-System.git

---

## Login Credentials
**Username:** yunik  
**Password:** 12345678  

You can also create a new account using the signup page.

---

## Project Description
The Food Recipe Management System is a PHP-based web application that allows users to register, log in, and manage food recipes. Users can add, edit, delete, and search recipes along with managing ingredients efficiently through a clean and secure interface.

---

## Features Implemented

### Authentication & User Management
- User registration (Signup)
- User login with session-based authentication
- Secure logout functionality
- Password hashing using bcrypt (`password_hash`)
- Password verification using `password_verify()`
- Unique username enforcement
- Session-based access control for protected pages
- Unauthorized access prevention using custom PHP authentication checks

---

### Recipe Management (CRUD)
- Add new food recipes
- Edit existing recipes
- Delete recipes
- View full recipe details
- Recipe difficulty level selection (Easy / Medium / Hard)
- Cuisine categorization (Nepali / Indian / Western)
- Timestamped recipe creation

---

### Ingredient Management
- Add multiple ingredients dynamically
- Edit ingredients while updating recipes
- Ingredient storage using relational database design
- Ingredients linked to recipes using foreign keys
- Automatic ingredient cleanup using `ON DELETE CASCADE`

---

### Search & Filtering
- Search recipes by recipe title
- Search recipes by cuisine
- Partial keyword matching
- Real-time filtering of results

---

### Ajax & JavaScript Enhancements
- Ajax-based ingredient autocomplete
- Fetch API usage for asynchronous requests
- Live ingredient suggestions without page reload
- Dynamic ingredient input field generation
- Client-side DOM manipulation using JavaScript

---

### Frontend & UI
- Twig template engine integration
- Template inheritance using base layouts
- Reusable UI components
- Clean form-based UI
- Responsive layout using CSS
- Consistent styling across pages

---

### Template Engine (Twig)
- Separation of logic and presentation
- Automatic HTML escaping (XSS prevention)
- Secure variable rendering
- Clean and maintainable template structure

---

### Database & Data Integrity
- MySQL / MariaDB relational database
- Normalized database schema
- Foreign key constraints
- Referential integrity enforcement
- Auto-increment primary keys
- Proper indexing for faster lookups

---

### Security Features
- Password hashing using bcrypt
- SQL injection prevention using PDO prepared statements
- XSS protection using Twig auto-escaping
- Server-side input validation
- Session protection for authenticated routes
- CSRF risk minimized through controlled POST-only form submissions
- Sensitive credentials isolated in configuration files
- Error handling using try-catch blocks

---

### Backend Architecture
- Core PHP (no heavy frameworks)
- MVC-inspired separation (`public / includes / config / templates`)
- Centralized database connection
- Reusable authentication logic
- Clean routing through public entry files

---

### Project Structure & Maintainability
- Organized folder structure
- Separation of concerns
- Modular PHP files
- Reusable configuration setup
- Composer dependency management
- Vendor autoloading

---

### Development & Deployment
- Version control using Git
- Incremental commits to track development progress
- Hosted on college student server
- SCP / SFTP-based deployment
- Production-compatible configuration
- Tested on localhost and live server

---

### Documentation
- README.md with setup instructions
- SQL file with database structure and sample data
- Login credentials provided for testing
- Known issues documented

---

## Technologies Used
- PHP (Core PHP)
- MySQL / MariaDB
- Twig Template Engine
- HTML, CSS, JavaScript
- Ajax (Fetch API)
- Git & GitHub

---

## Composer Dependencies
This project uses Composer for dependency management (Twig template engine).

If the `vendor/` directory is missing after cloning the repository, run:
```bash
composer install


## Setup Instructions (Localhost)
1. Install XAMPP
2. Place the project inside the `htdocs` folder
3. Import `database.sql` using phpMyAdmin
4. Update database credentials in `config/db.php`
5. Open browser and visit:
   http://localhost/recipe_project/public/login.php

---

## Database
The database contains the following tables:
- users
- recipes
- ingredients

Sample data includes Nepali, Indian, and Western food recipes.

---

## Known Issues
- UI can be enhanced further
---

## Version Control
Git was used throughout development with multiple commits to track progress.


