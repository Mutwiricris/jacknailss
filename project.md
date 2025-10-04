# Jacknails Kenya - Nail Salon Booking System

A comprehensive nail salon booking and management system built with , specifically designed for the Kenyan market with M-Pesa payment integration.

## 🌟 Features

### Customer Features
- **Modern Landing Page**: Responsive design showcasing services, gallery, and testimonials
- **Service Booking**: Multi-step booking process with service selection, date/time picking, and client information
- **Payment Integration**: M-Pesa payment support for Kenyan customers
- **Booking Management**: View, modify, and cancel bookings with reference tracking

### Admin Dashboard
- **Dashboard Overview**: Real-time statistics, today's appointments, and quick actions
- **Service Management**: Complete CRUD operations for nail services with image uploads
- **Booking Management**: Comprehensive booking oversight with status tracking
- **Client Management**: Customer database with booking history
- **Payment Processing**: Payment tracking, status updates, and refund management
- **Time Slot Management**: Flexible appointment scheduling system
- **Analytics**: Business intelligence with revenue tracking and performance metrics

## 🛠 Tech Stack

### Backend
- **Laravel 12**: PHP framework with modern features
- **MySQL**: Primary database with UTF8MB4 support
- **Inertia.js**: Server-side rendering with SPA experience

### Frontend
- ** 3**: Progressive JavaScript framework with Composition API
- **TypeScript**: Type-safe development
- **TailwindCSS**: Utility-first CSS framework
- **Reka UI**: Modern component library
- **Lucide Icons**: Beautiful icon set

### Development Tools
- **Vite**: Fast build tool and development server
- **ESLint**: Code linting and formatting
- **Prettier**: Code formatting
- **Concurrently**: Run multiple development processes

## 📋 Requirements

- PHP 8.2+
- Node.js 18+
- MySQL 8.0+
- Composer


## 🚀 Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd jacknailsv2
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Configuration
Update your `.env` file with MySQL credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jacknails
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Create the database:
```bash
mysql -u root -p -e "CREATE DATABASE jacknails CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Storage Setup
```bash
# Create storage link
php artisan storage:link

# Create services directory
mkdir -p storage/app/public/services
```

### 7. Seed Database (Optional)
```bash
php artisan db:seed
```

### 8. Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 9. Start Development Server
```bash
# Single command for full development environment
composer run dev

# Or manually start services
php artisan serve
npm run dev
```


## 🗄 Database Schema

### Core Tables

#### Services
- `id`: Primary key
- `name`: Service name (150 chars)
- `description`: Service description (text)
- `price`: Decimal price (8,2)
- `duration_minutes`: Integer duration
- `image_url`: Service image path
- `is_popular`: Boolean flag
- `status`: Enum (active/inactive)

#### Bookings
- `id`: Primary key
- `booking_reference`: Unique reference
- `client_name`: Customer name
- `client_email`: Customer email
- `client_phone`: Customer phone
- `appointment_date`: Booking date
- `start_time`: Appointment start
- `end_time`: Appointment end
- `status`: Booking status
- `payment_status`: Payment status
- `total_amount`: Total cost

#### Payments
- `id`: Primary key
- `booking_id`: Foreign key to bookings
- `payment_reference`: M-Pesa reference
- `amount`: Payment amount
- `payment_method`: Payment method
- `status`: Payment status
- `mpesa_receipt_number`: M-Pesa receipt

#### Time Slots
- `id`: Primary key
- `date`: Available date
- `start_time`: Slot start time
- `end_time`: Slot end time
- `is_available`: Availability flag

## 🎨 Frontend Architecture

### Pages Structure
- **Dashboard**: Admin overview
- **Dashboard/**: Admin management pages
  - `Services.`: Service management
  - `Bookings.`: Booking management
  - `Analytics.`: Business analytics
  - `Clients.`: Customer management
  - `Payments.`: Payment processing

### Component Organization
- **UI Components**: 158+ reusable components in `/components/ui/`
- **Custom Components**: Business-specific components
- **Layouts**: Modular layout system with sidebar and landing layouts

### Key Features
- **TypeScript**: Full type safety
- **Responsive Design**: Mobile-first approach
- **Dark/Light Theme**: System preference detection
- **Toast Notifications**: User feedback system
- **Form Validation**: Client and server-side validation

## 🔌 API Endpoints

### Public Routes
- `GET /`: Landing page
- `GET /booking/*`: Booking workflow

### Admin Routes (Protected)
- `GET /dashboard`: Admin overview
- `GET /dashboard/services`: Service management
- `POST /dashboard/services`: Create service
- `PUT /dashboard/services/{id}`: Update service
- `DELETE /dashboard/services/{id}`: Delete service
- `GET /dashboard/bookings`: Booking management
- `GET /dashboard/analytics`: Analytics dashboard
- `GET /dashboard/payments`: Payment management

### Booking API
- `GET /booking/time-slots`: Available time slots
- `POST /booking/store`: Create booking
- `GET /booking/confirmation/{reference}`: Booking confirmation

## 💳 Payment Integration

### M-Pesa Integration
- **STK Push**: Automated payment requests
- **Payment Verification**: Real-time status checking
- **Receipt Management**: M-Pesa receipt tracking
- **Refund Support**: Payment reversal capabilities

### Payment Flow
1. Customer selects services and time slot
2. Payment request sent to M-Pesa
3. Customer completes payment on phone
4. System verifies payment status
5. Booking confirmed automatically

## 🎯 Service Categories

The system supports five main nail service categories:

1. **Manicure Services**: Basic nail care and polish
2. **Pedicure Services**: Foot care and nail treatments
3. **Acrylic Services**: Nail extensions and sculpting
4. **Nail Enhancements**: Decorative and artistic services
5. **Removal Services**: Service removal and maintenance

## 📊 Analytics Features

### Dashboard Metrics
- Total bookings and revenue
- Client acquisition and retention
- Service popularity rankings
- Peak hours analysis
- Monthly revenue trends

### Reporting
- Booking status breakdown
- Payment method analysis
- Service performance metrics
- Client booking history

## 🔧 Configuration

### Environment Variables
```env
# Application
APP_NAME="Jacknails Kenya"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Database
DB_CONNECTION=mysql
DB_DATABASE=jacknails

# M-Pesa Configuration
MPESA_CONSUMER_KEY=your_key
MPESA_CONSUMER_SECRET=your_secret
MPESA_SHORTCODE=your_shortcode
```

### Storage Configuration
- **Images**: Stored in `storage/app/public/services/`
- **Public Access**: Via `/storage/services/` URL
- **Max Upload**: 2MB per image
- **Formats**: JPG, PNG, GIF

## 🧪 Testing

### Run Tests
```bash
# Run all tests
composer test

# Run specific test suite
php artisan test --testsuite=Feature
```

### Test Coverage
- Feature tests for booking workflow
- Unit tests for models and services
- Authentication and authorization tests

## 🚀 Deployment

### Production Setup
1. Set `APP_ENV=production` in `.env`
2. Configure production database
3. Set up M-Pesa production credentials
4. Build production assets: `npm run build`
5. Optimize Laravel: `php artisan optimize`
6. Set up SSL certificate
7. Configure web server (Apache/Nginx)

### Performance Optimization
- **Caching**: Redis for sessions and cache
- **Queue Processing**: Background job processing
- **Asset Optimization**: Minified CSS/JS
- **Database Indexing**: Optimized queries

## 🔒 Security Features

- **Authentication**: Laravel Sanctum
- **Authorization**: Role-based permissions
- **CSRF Protection**: Built-in Laravel protection
- **Input Validation**: Server-side validation
- **File Upload Security**: Type and size restrictions
- **SQL Injection Prevention**: Eloquent ORM

## 🐛 Troubleshooting

### Common Issues

#### Database Connection Error
```bash
# Check database exists
mysql -u root -p -e "SHOW DATABASES;"

# Create database if missing
mysql -u root -p -e "CREATE DATABASE jacknails;"
```

#### Storage Permission Issues
```bash
# Fix storage permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

#### Asset Build Errors
```bash
# Clear cache and rebuild
npm run build
php artisan view:clear
php artisan config:clear
```

## 📝 Contributing

1. Fork the repository
2. Create a feature branch: `git checkout -b feature-name`
3. Make changes and test thoroughly
4. Commit with descriptive messages
5. Push to your fork and create a pull request

### Code Standards
- Follow PSR-12 for PHP code
- Use TypeScript for all JavaScript
- Follow  3 Composition API patterns
- Write descriptive commit messages

## 📄 License

This project is licensed under the MIT License. See the LICENSE file for details.

## 🤝 Support

For support and questions:
- Create an issue in the repository
- Check the troubleshooting section
- Review the Laravel and .js documentation

## 🔄 Version History

- **v1.0.0**: Initial release with core booking functionality
- **v1.1.0**: Added M-Pesa payment integration
- **v1.2.0**: Enhanced admin dashboard and analytics
- **v1.3.0**: Improved UI/UX and mobile responsiveness

---

Built with ❤️ for the Kenyan beauty industry
