# Tokyo Discovery

This is the repository of Tokyo Discovery a simple Social Media Web Application built with using WAMP stack (Windows - Apache - MySQL - PHP), built for the purpose of learning PHP web development and application security testing.

## Project Structure

```
tokyodiscovery/
│
├── public/                     # Public web root (document root)
│   ├── index.php               # Entry point for all requests
│   ├── css/                    # Public CSS assets
│   └── js/                     # Public JS assets (optional)
│
├── app/                        # Application-specific code
│   ├── Controllers/            # HTTP controllers
│   ├── Models/                 # Business logic / database access
│   └── Views/                  # HTML templates
│
├── core/                       # Core framework logic
│   ├── Router.php              # Simple routing system
│   ├── Database.php            # PDO wrapper/connection
│   └── Views.php               # Static view renderer
│
├── config/                     # Configuration files
│   └── database.php            # DB connection settings
│
├── .htaccess                   # Rewrite to /public/index.php (Apache only)
├── README.md                   # Project overview

```

## Tech Stack

- PHP 8.x
- MySQL / MariaDB
- Apache (via XAMPP)
- HTML/CSS/JS (Vanilla)

## Setup 

First install [XAMPP](https://www.apachefriends.org/) is you haven't already. 

Start an Apache server and a MySQL server

The application should be available [here](http://localhost/)
