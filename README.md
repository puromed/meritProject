
```markdown
# Student Merit System

A web-based merit tracking system built with CakePHP 5.x for managing student achievements and eligibility.

## Table of Contents
- [Project Structure](#project-structure)
- [Features](#features)
- [Current Status](#current-status)
- [Note For Teammate](#first-time-only)


## Project Structure

### Key Components
- 

UsersController.php

 - Authentication logic
- 

PagesController.php

 - Dashboard handling
- 

Pages

 - Role-based dashboard views
- 

Users

 - Login and user management views

### Features
- User Authentication
  - Admin/User roles
  - Secure login/logout
  - Role-based access control
- Dashboard System
  - Admin dashboard with statistics
  - User dashboard with quick actions
- Student Merit Management
  - Track student achievements
  - Merit point system
  - Activity logging

## Development

Built using:
- CakePHP 5.x
- Bootstrap 5.x
- MySQL/MariaDB

## Current Status
- Authentication implemented ✓
- Role-based dashboards ✓
- Basic CRUD operations ✓
- Ready for frontend enhancements

## Note For Teammates

### First Time Setup
1. Download and install Git from: https://git-scm.com/downloads

2. Open Command Prompt (cmd) and set up your GitHub identity:
```bash
git config --global user.name "Your Name"
git config --global user.email "your.email@example.com"
```

3. Get the project files:
- Create a new folder where you want the project
-  Open Command Prompt in that folder
- Copy and paste this command:
### First Time Only
```bash
git clone https://github.com/puromed/meritProject.git
```

4. Set up the project
- Open Laragon
- Open phpMyAdmin and create a new database named 'emerit'
- Go to project folder, open the terminal and copy this
```bash
copy config\app_local.example.php config\app_local.php
```
- Edit app_local.php and update these settings:
```php
<?php
'username' => 'root'
'password' => ''
'database' => 'emerit'
```
5. Install project
```bash
composer install
bin/cake migrations migrate
bin/cake cache clear_all
```
### Test the website
1. Go to https://localhost/meritProject
2. Login with:
- Admin: test123@localhost.com / test123
- User: cuba@localhost.com / cuba

### Making Changes
After cloning the repository, do this after each update to the folder, clone is done once to get the folder, pull is getting the latest update from the folder.

1. Before starting work, open the command prompt/powershell and run in the folder
```bash
git pull origin main
```
2. After Making Changes (one at a time):
```bash
git add.
git commit -m "Write comment what has been done"
git push
```
