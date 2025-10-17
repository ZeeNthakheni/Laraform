# Laraform Admin Panel

A fully-featured admin panel for managing form submissions with user authentication, built with Laravel 10 and inspired by the Argon Dashboard template.

## Features

- **User Authentication**: Login and registration system with admin role support
- **Dashboard**: Overview with statistics and recent submissions
- **Submission Management**: Full CRUD operations for form submissions
- **Responsive Design**: Mobile-friendly interface that works on all devices
- **Test Coverage**: 23 passing tests including authentication and admin functionality
- **Database Seeders**: Pre-populated test data for development

## Screenshots

### Login Page
![Login Page](https://github.com/user-attachments/assets/af3d95e0-e26f-413f-8c0c-3d2d9344009e)

### Admin Dashboard
![Admin Dashboard](https://github.com/user-attachments/assets/0b49daec-ab85-48e0-8a10-b3ac3a6ea164)

### Submissions List
![Submissions List](https://github.com/user-attachments/assets/f085ec9b-7ea3-428a-b326-3ef21acf42b9)

### Mobile Responsive
![Mobile View](https://github.com/user-attachments/assets/a9b4fca0-c232-4c25-b5f9-c6e5823a3537)

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd Laraform
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node dependencies:
```bash
npm install
```

4. Copy the environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in `.env` file. For SQLite:
```
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

7. Create SQLite database file (if using SQLite):
```bash
touch database/database.sqlite
```

8. Run migrations and seeders:
```bash
php artisan migrate --seed
```

9. Start the development server:
```bash
php artisan serve
```

## Default Credentials

After seeding, you can login with:

**Admin User:**
- Email: `admin@example.com`
- Password: `password`

**Regular User:**
- Email: `user@example.com`
- Password: `password`

## Admin Panel Features

### Dashboard
- View total submissions count
- View total users count
- See recent activity
- Quick access to latest submissions

### Submission Management
- **View All Submissions**: Paginated list with 15 items per page
- **View Details**: See complete submission information
- **Create New**: Add submissions manually
- **Edit**: Update existing submissions
- **Delete**: Remove submissions with confirmation

### User Roles
- **Admin**: Full access to admin panel and all features
- **Regular User**: No admin access (redirected with 403 error)

## Testing

Run all tests:
```bash
php artisan test
```

The test suite includes:
- Authentication tests (login, logout, registration)
- Admin dashboard access tests
- Submission CRUD operation tests
- Middleware and permission tests

All 23 tests pass successfully.

## Technology Stack

- **Backend**: Laravel 10
- **Database**: SQLite (default), MySQL supported
- **Frontend**: Blade templates with custom CSS
- **Design**: Inspired by Argon Dashboard
- **Icons**: Font Awesome 6
- **Fonts**: Open Sans

## Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   └── SubmissionController.php
│   │   │   └── Auth/
│   │   │       └── AuthController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       └── submissions.php
├── database/
│   ├── migrations/
│   │   ├── 2025_10_17_112820_create_users_table.php
│   │   ├── 2025_10_17_112820_create_password_reset_tokens_table.php
│   │   └── 2024_01_05_061456_create_submissions_table.php
│   ├── seeders/
│   │   ├── UserSeeder.php
│   │   ├── SubmissionSeeder.php
│   │   └── DatabaseSeeder.php
│   └── factories/
│       ├── UserFactory.php
│       └── SubmissionsFactory.php
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── layout.blade.php
│       │   ├── dashboard.blade.php
│       │   └── submissions/
│       │       ├── index.blade.php
│       │       ├── show.blade.php
│       │       ├── create.blade.php
│       │       └── edit.blade.php
│       └── auth/
│           ├── login.blade.php
│           └── register.blade.php
├── routes/
│   └── web.php
└── tests/
    └── Feature/
        ├── Admin/
        │   ├── DashboardTest.php
        │   └── AdminSubmissionTest.php
        └── Auth/
            └── AuthenticationTest.php
```

## Routes

### Public Routes
- `GET /` - Home page (submissions form)
- `POST /submit` - Submit form
- `GET /login` - Login page
- `POST /login` - Login action
- `GET /register` - Registration page
- `POST /register` - Registration action
- `POST /logout` - Logout action

### Admin Routes (requires authentication + admin role)
- `GET /admin/dashboard` - Admin dashboard
- `GET /admin/submissions` - List all submissions
- `GET /admin/submissions/create` - Create submission form
- `POST /admin/submissions` - Store new submission
- `GET /admin/submissions/{id}` - View submission details
- `GET /admin/submissions/{id}/edit` - Edit submission form
- `PUT /admin/submissions/{id}` - Update submission
- `DELETE /admin/submissions/{id}` - Delete submission

## Security Features

- CSRF protection on all forms
- Password hashing using bcrypt
- Admin middleware for role-based access
- Authentication middleware for protected routes
- Session-based authentication
- Remember me functionality

## Responsive Design

The admin panel is fully responsive with:
- Mobile-first approach
- Breakpoint at 768px for tablet/mobile
- Collapsible sidebar on mobile devices
- Touch-friendly interface elements
- Optimized table layouts for small screens

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
