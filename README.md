# Portfolio Website

A custom lightweight PHP MVC framework built from scratch for learning and project use. This portfolio website serves as a reference implementation demonstrating how to use the framework effectively.

Built with modern technologies including Tailwind CSS v4 and DaisyUI 5 for a beautiful, responsive UI.

**Live Preview:** [agassibustarga.page.gd](https://agassibustarga.page.gd/)

![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.0-38B2AC?logo=tailwind-css&logoColor=white)
![DaisyUI](https://img.shields.io/badge/DaisyUI-5.0-5A0EF8?logo=daisyui&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green)

## Purpose

This project serves two purposes:

1. **Custom MVC Framework** - A lightweight, easy-to-understand PHP MVC framework that you can use as a foundation for your own projects
2. **Reference Implementation** - The portfolio website demonstrates best practices for using the framework, including routing, controllers, models, views, and authentication

## Features

### Framework Features
- Clean MVC architecture
- Simple routing system
- Database abstraction with PDO
- Auto-migrations and seeders
- PSR-4 autoloading
- Environment-based configuration
- Session-based authentication
- File upload helpers
- Flash messages

### Public Site
- Modern, responsive design with smooth animations
- Hero section with profile information
- Projects showcase with detailed project pages
- Tech stack display organized by category
- Services section
- Certifications gallery
- Contact information with social links

### Admin Panel
- Secure login with fixed credentials
- Dashboard with content statistics
- Full CRUD operations for all content sections
- Image upload support
- DaisyUI 5 components for modern UI
- Responsive sidebar navigation

## Quick Start

### Prerequisites
- PHP 8.1 or higher
- MySQL/MariaDB
- Composer
- Node.js & npm

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Agaseeyyy/portfolio.git
   cd portfolio
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Configure environment**
   ```bash
   cp .env.example .env
   ```
   Edit `.env` with your settings:
   ```env
   DB_HOST=localhost
   DB_NAME=your_database
   DB_USER=your_username
   DB_PASS=your_password
   
   ADMIN_USER=admin
   ADMIN_PASS=your_secure_password
   ```

5. **Build CSS assets**
   ```bash
   npm run build
   ```

6. **Set up your web server**
   - Point the web server **document root at the project root** (this directory, which contains `.htaccess`).
   - The root `.htaccess` rewrites requests to `public/index.php` and blocks direct access to PHP source, config, `vendor/`, and `node_modules/`. Keep it at the document root.
   - For local development under a subpath (e.g. `http://localhost/portfolio`), set `APP_PATH=/portfolio` in `.env` — the `.htaccess` adapts automatically. For a domain-root deploy use `APP_PATH=` (empty).

7. **Access the site**
   - Public site: `http://localhost/portfolio` (or your domain root in production)
   - Admin panel: `http://localhost/portfolio/admin`

## Project Structure

```
portfolio/
├── app/
│   ├── controllers/       # Route controllers
│   │   └── Admin/         # Admin panel controllers
│   ├── core/              # Core framework classes
│   ├── helpers/           # Helper functions
│   └── models/            # Database models
├── database/
│   ├── migrations/        # Database migrations
│   └── seeds/             # Database seeders
├── public/                # Web assets (served under /public via .htaccess; not the docroot)
│   ├── images/            # Static images
│   └── uploads/           # User uploads
├── resources/            # CSS source + view templates (compiled css/js are referenced as /resources/...)
│   ├── css/               # CSS source files and compiled output
│   └── views/             # PHP view templates
│       ├── admin/         # Admin panel views
│       └── public/        # Public site views
└── routes/
    └── web.php            # Route definitions
```

## Development

### CSS Development

For development, run the watch command to automatically rebuild CSS when you make changes:

```bash
npm run dev
```

This watches both admin and public CSS files for changes.

For production builds:
```bash
npm run build           # Build all CSS
npm run build:admin     # Build admin CSS only
npm run build:public    # Build public CSS only
```

### Database
The application automatically runs migrations and seeders in development mode. To reset the database, delete it and refresh the page.

## Configuration

### Environment Variables

| Variable | Description | Default |
|----------|-------------|---------|
| `APP_ENV` | Environment (local/production) | `local` |
| `APP_DEBUG` | Show errors | `true` |
| `APP_PATH` | URL base path for a subpath install (e.g. `/portfolio`). Leave **empty** for a domain-root deploy. | `/portfolio` (local) / `` (prod) |
| `DB_HOST` | Database host | `localhost` |
| `DB_NAME` | Database name | - |
| `DB_USER` | Database user | `root` |
| `DB_PASS` | Database password | - |
| `ADMIN_USER` | Admin username | `admin` |
| `ADMIN_PASS` | Admin password | `admin123` |

## Security Notes

- Change default admin credentials in production
- Set `APP_DEBUG=false` in production
- Keep `.env` file secure and never commit it
- The root `.htaccess` denies direct web access to `app/`, `core/`, `config/`, `database/`, `routes/`, `vendor/`, `node_modules/`, `.env`, and `resources/views/`. Keep it at the document root; do not serve the project from inside `public/`.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Author

**Agassi Bustarga**
- GitHub: [@Agaseeyyy](https://github.com/Agaseeyyy)

---

Star this repo if you found it helpful!
