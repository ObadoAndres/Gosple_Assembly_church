# Philadelphia Gospel Assembly

A professional church website built with Laravel to help Philadelphia Gospel Assembly connect with its congregation, share biblical teaching, promote ministry activities, and communicate the mission of the church to the wider community.

## Overview

Philadelphia Gospel Assembly is a Pentecostal Christian church family in Dodoma, Tanzania, dedicated to evangelism, discipleship, leadership development, church planting, and community transformation. The website serves as a digital front door for visitors, members, and partners who want to learn about the church, its mission, and how to participate in its ministry.

This project provides a responsive public-facing website and a simple administrative backend for managing:

- Sermons and teachings
- Church events and gatherings
- Ministry information and profiles
- Announcements and updates
- Leadership and church information pages
- Giving and support resources

## Features

- Modern, responsive public website design
- About, vision, mission, and leadership pages
- Sermon archive with detailed sermon entries
- Event listings and event detail pages
- Ministries and outreach pages
- Admin dashboard for content management
- Laravel authentication and role-based access control for administrators
- Publish and unpublish workflows for sermons, events, ministries, and announcements
- Clean, maintainable codebase using Laravel 12 and modern frontend tooling

## Tech Stack

- PHP 8.2+
- Laravel 12
- SQLite (default database configuration)
- Vite for frontend asset compilation
- Blade templating
- Bootstrap/Tailwind-style custom design system for the church site

## Project Structure

```text
app/                 Application logic and controllers
bootstrap/           Laravel bootstrap files
config/              Configuration files
database/           Migrations and seeders
public/              Publicly served assets and entry point
resources/           Blade templates, CSS, JS, and frontend assets
routes/              Route definitions
storage/             Logs, cache, and local files
tests/               Automated tests
composer.json        PHP dependency and script configuration
package.json         Frontend dependency and script configuration
vite.config.js       Vite configuration
```

## Requirements

Before running the project, make sure the following are installed:

- PHP 8.2 or newer
- Composer
- Node.js 18+ and npm
- SQLite support enabled in PHP
- A local web server such as Laravel's built-in server or Apache/Nginx

## Quick Start

### Option 1: Use the project setup script

```bash
composer run setup
```

This script performs the main setup tasks:

- installs Composer dependencies
- creates `.env` from `.env.example` if needed
- generates the application key
- runs migrations
- installs frontend dependencies
- builds frontend assets

### Option 2: Manual setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

If you are using SQLite for local development, ensure the database file exists:

```bash
touch database/database.sqlite
php artisan migrate
```

## Running the Application

Start the local development server:

```bash
php artisan serve
```

For frontend hot-reloading during development:

```bash
npm run dev
```

Then open the application in your browser at:

```text
http://127.0.0.1:8000
```

## Admin Access

The website includes an administrative interface for church staff to manage site content. Administrators can log in through the application’s authentication system and manage:

- Sermons
- Events
- Ministries
- Announcements
- Church content updates

## Environment Configuration

The default environment file is configured for SQLite and a production-style domain. For local development, you may want to update `.env` with your own values:

```env
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=sqlite
```

## Useful Commands

```bash
php artisan test
php artisan route:list
php artisan migrate:fresh --seed
php artisan cache:clear
php artisan config:clear
```

## Contribution Guidelines

Contributions are welcome. To contribute:

1. Fork the repository.
2. Create a feature branch.
3. Make your changes with clear, focused updates.
4. Run relevant tests or validation checks.
5. Submit a pull request with a concise description of the change.

## License

This project is licensed under the MIT License.

## About the Project

This website is designed to reflect the mission and spiritual values of Philadelphia Gospel Assembly while making church information accessible and easy to navigate for both local and international audiences.
