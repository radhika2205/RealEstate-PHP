# Real Estate Management System

## Project Overview

Welcome to the **Real Estate Management System**! This is a comprehensive web-based application designed to simplify the process of buying, selling, and renting properties. Built with PHP and MySQL, this system provides a user-friendly interface for customers to browse listings and a powerful admin panel for managing the platform.

## Features

- **User Accounts**: Secure registration and login for users.
- **Property Listings**: Users can submit properties for sale or rent with detailed information and images.
- **Search & Filter**: Advanced search functionality to find properties by location, type, price, and more.
- **Property Details**: Comprehensive view of property details including amenities, floor plans, and location.
- **Admin Dashboard**: sophisticated admin panel to manage users, properties, and site settings.
- **Responsive Design**: Optimized for viewing on desktops, tablets, and mobile devices.

## Technology Stack

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Server**: Apache (via XAMPP/WAMP)

## Installation Guide

Follow these steps to set up the project locally:

1.  **Download the Project**:
    - Clone this repository or download the ZIP file.
    - Extract the folder to your server's root directory (e.g., `htdocs` in XAMPP or `www` in WAMP).

2.  **Database Setup**:
    - Open phpMyAdmin (usually at `http://localhost/phpmyadmin`).
    - Create a new database named `realestatephp`.
    - Import the SQL file located at: `DATABASE FILE/realestatephp (8).sql` into the newly created database.

3.  **Configuration**:
    - The database connection settings are located in `config.php`.
    - Default settings used:
      - Host: `localhost`
      - Username: `root`
      - Password: `""` (empty)
      - Database: `realestatephp`
    - If your MySQL configuration differs, update `config.php` accordingly.

4.  **Run the Application**:
    - Open your web browser and navigate to: `http://localhost/RealEstate-PHP` (or the folder name you used).

## Usage

### User Access
- Navigate to the homepage to browse properties.
- Register or Login to contact agents or list your own properties.

### Admin Access
- Access the Admin Panel at: `http://localhost/RealEstate-PHP/admin`
- **Default Admin Credentials**:
  - **Username**: `radhi`
  - **Password**: `radhi2205`

> [!IMPORTANT]
> Please ensure you change the default admin credentials after the first login for security purposes.

## Folder Structure

- `admin/`: Contains all admin panel related files.
- `css/`, `js/`, `fonts/`, `images/`: Frontend assets.
- `include/`: Reusable PHP components (header, footer, etc.).
- `DATABASE FILE/`: Contains the SQL dump for the database.
- `config.php`: Database connection file.
- `index.php`: Main landing page of the application.

## Contact

For any queries or support, please feel free to reach out.

---
*Generated for Real Estate PHP Project*
