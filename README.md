# Petty Cash Application

This is a web-based petty cash app developed using Laravel. The application allows users to create, manage, and organize their expenses into categories.

## Table of Contents

- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)

## Features

- **User Authentication:** Secure user authentication and authorization system to protect user data.
- **Type Creation:** Users can create types or categories.
- **Add Expenses:** Create tasks in an catagorical format relating to the type it belongs to.
- **Responsive Design:** The application is responsive and works on various devices and screen sizes.

## Getting Started

Follow these instructions to set up and run the application on your local machine.

### Prerequisites

Before you begin, make sure you have the following installed:

- [PHP](https://www.php.net/) (>=7.3)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [NPM](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/) or another database of your choice

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Kashan-amd/pettycach_app
   ```

2. Navigate to the project directory:

   ```bash
   cd pettycash_app
   ```

3. Install PHP dependencies using Composer:

   ```bash
   composer install
   ```

4. Install JavaScript dependencies using NPM:

   ```bash
   npm install
   ```

5. Create a `.env` file by copying `.env.example` and update it with your database configuration:

   ```bash
   cp .env.example .env
   ```

6. Generate a new application key:

   ```bash
   php artisan key:generate
   ```

7. Migrate the database:

   ```bash
   php artisan migrate
   ```
8. Run Yarn:

   ```bash
   yarn dev
   ```

9. Start the development server:

   ```bash
   php artisan serve
   ```

10. Visit `http://localhost:8000` in your web browser to access the application.
