# Admin Panel Documentation

## Overview

This Laravel application now includes a fully-featured admin panel built with the Argon Dashboard template. The admin panel provides comprehensive user management, form submission management, and authentication features.

## Features

### 1. User Authentication
- **Login**: Users can log in with email and password
- **Registration**: New users can register (default role: user)
- **Logout**: Secure logout functionality
- **Remember Me**: Option to stay logged in

### 2. Admin Dashboard
- Overview statistics (Total Users, Submissions, Admin Users, Regular Users)
- Recent Submissions display
- Recent Users display
- Responsive design with Argon Dashboard template

### 3. User Management
- View all users with pagination
- Create new users with custom roles (Admin/User)
- Edit existing users
- Delete users (except yourself)
- User status tracking (verified/unverified)

### 4. Submission Management
- View all form submissions with pagination
- View detailed submission information
- Delete submissions
- Quick access to submission details

## Default Credentials

After running migrations and seeders, you can log in with:

- **Admin Account**:
  - Email: `admin@example.com`
  - Password: `password`

- **Regular User Account**:
  - Email: `john@example.com`
  - Password: `password`

## Installation & Setup

1. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

2. **Configure Environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configure Database**:
   Update your `.env` file with database credentials:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/database/database.sqlite
   ```
   
   Or for MySQL:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Run Migrations and Seeders**:
   ```bash
   php artisan migrate --seed
   ```
   This will create:
   - 1 Admin user
   - 12 Regular users
   - 5 Sample submissions

5. **Start Development Server**:
   ```bash
   php artisan serve
   ```

6. **Access the Application**:
   - Public Form: http://localhost:8000
   - Login Page: http://localhost:8000/login
   - Admin Dashboard: http://localhost:8000/admin/dashboard (requires admin role)

## Routes

### Public Routes
- `GET /` - Public form submission page
- `POST /submit` - Submit form data
- `GET /login` - Login page
- `POST /login` - Process login
- `GET /register` - Registration page
- `POST /register` - Process registration
- `POST /logout` - Logout user

### Admin Routes (require authentication + admin role)
- `GET /admin/dashboard` - Admin dashboard
- `GET /admin/users` - List all users
- `GET /admin/users/create` - Create user form
- `POST /admin/users` - Store new user
- `GET /admin/users/{user}/edit` - Edit user form
- `PUT /admin/users/{user}` - Update user
- `DELETE /admin/users/{user}` - Delete user
- `GET /admin/submissions` - List all submissions
- `GET /admin/submissions/{submission}` - View submission details
- `DELETE /admin/submissions/{submission}` - Delete submission

## Testing

Run the test suite:
```bash
php artisan test
```

The test suite includes:
- Authentication tests (login, registration)
- Admin dashboard access tests
- User management tests (CRUD operations)
- Submission management tests
- Authorization tests (admin vs regular user access)

## Database Schema

### Users Table
- `id` - Primary key
- `name` - User's full name
- `email` - Unique email address
- `password` - Hashed password
- `role` - User role (admin/user)
- `email_verified_at` - Email verification timestamp
- `remember_token` - Remember me token
- `timestamps` - Created/updated timestamps

### Submissions Table
- `id` - Primary key
- `name` - Submitter's name
- `email` - Submitter's email
- `message` - Submission message
- `timestamps` - Created/updated timestamps

## Security Features

- CSRF protection on all forms
- Password hashing with bcrypt
- Role-based access control (admin middleware)
- Authentication middleware
- Session management
- Input validation

## UI Components

The admin panel uses the Argon Dashboard template which includes:
- Responsive sidebar navigation
- Modern card-based layout
- Beautiful tables with pagination
- Form components with validation feedback
- Alert messages for user feedback
- Gradient color scheme

## Customization

### Adding New Admin Features
1. Create a new controller in `app/Http/Controllers/Admin/`
2. Add routes in `routes/web.php` within the admin middleware group
3. Create views in `resources/views/admin/`
4. Add navigation links in `resources/views/admin/partials/sidebar.blade.php`

### Changing User Roles
The system currently supports two roles: `admin` and `user`. To add more roles:
1. Update the User model's role validation
2. Modify the IsAdmin middleware or create new role-based middleware
3. Update seeders to include new roles

## Credits

- **Laravel Framework**: https://laravel.com
- **Argon Dashboard**: https://www.creative-tim.com/product/argon-dashboard
- **Bootstrap**: https://getbootstrap.com

## License

This project is open-sourced software licensed under the MIT license.
