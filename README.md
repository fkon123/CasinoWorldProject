
# Casino World Project

Welcome to the **Casino World Project**! This repository contains a custom WordPress theme and plugin for a fictional casino site.

## Prerequisites

Make sure you have the following installed:

- **Docker** (for setting up the local environment)
- **Node.js** and **npm** (for managing Tailwind CSS and related packages)

## Setup Instructions

Follow these steps to set up the project on your local machine:

### 1. Clone the Repository

```bash
git clone https://github.com/fkon123/CasinoWorldProject.git
```

### 2. Navigate to the Theme Directory

```bash
cd CasinoWorldProject/src/themes/casino-world
```

### 3. Initialize npm

```bash
npm init -y
```

### 4. Install Dependencies

Install Tailwind CSS, PostCSS, and Autoprefixer:

```bash
npm install tailwindcss postcss autoprefixer
```

### 5. Start Tailwind Watcher

Run the following command to watch for changes in your CSS:

```bash
npx tailwindcss -i ./style.css -o ./output.css --watch
```

### 6. Create the `.env` File

Create a `.env` file in the root directory and add values to the required variables, as the example.

### 7. Set Up the Docker Environment

Navigate back to the project root:

```bash
cd ../../../
```

Start the Docker containers:

```bash
docker-compose -p casinoapp up
```

### 8. Access the Local Environment

- WordPress: [http://localhost:80](http://localhost:80)
- phpMyAdmin: [http://localhost:8081](http://localhost:8081)

### 9. Install WordPress

Once WordPress is up and running, complete the installation through the browser.

### 10. Enable the Custom Theme and Plugin

After installing WordPress:

1. Activate the **Casino World** custom theme.
2. Enable the **Casino World Admin** plugin.

## Magic is Ready!

🎉 **Your Casino World project is now set up!** 🎉

---

## Technologies Used

- **Tailwind CSS**: For styling the theme.
- **Docker**: To set up the WordPress and database environment.
- **Node.js & npm**: For managing JavaScript dependencies and bundling assets.
- **PhpMyAdmin**: For easy database management.
- **Wordpress latest image v.6.2.2**
- **MySql latest image**
- **NGinx!**
