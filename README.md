Fortezza Admin Dashboard - Laravel Blade Layout Frontend

This project is a complete implementation of the Fortezza Admin Dashboard using Laravel with Blade Layout, Components, and Vite for modern asset bundling, focused on Shop Products and Gallery Products CRUD operations.

🖼 Demo Screenshots
Shop Products
<img width="934" height="413" alt="image" src="https://github.com/user-attachments/assets/58ee288d-f0e8-4e40-b41c-8505e0dc57da" />


<p align="center"><i>Shop Products page displaying product list, add, edit, and delete functionality</i></p>
Gallery Products
<img width="928" height="402" alt="image" src="https://github.com/user-attachments/assets/9115e3f0-67e7-4842-80fb-d00e3b510fdf" />


<p align="center"><i>Gallery Products page showing gallery images, upload, edit, and delete functionality</i></p>
📋 Key Features
CRUD

✅ Shop Products CRUD (Create, Read, Update, Delete)
<img width="899" height="398" alt="image" src="https://github.com/user-attachments/assets/9fada7b1-921b-4174-bad0-60668aef924a" />


✅ Gallery Products CRUD (Create, Read, Update, Delete)
<img width="933" height="408" alt="image" src="https://github.com/user-attachments/assets/acdfd82d-ba57-41cf-95df-509f556df27d" />


✅ Image uploads:

Stored in the public/uploads folder

Image paths saved in the database

✅ Responsive Design with Tailwind CSS

Bonus

✅ Dashboard screenshot
<img width="1920" height="1695" alt="image" src="https://github.com/user-attachments/assets/5106606c-a624-4616-93ec-e7424b8d28af" />


✅ Alert notifications for each CRUD action (success, error)

✅ Optional dark mode toggle across all pages

📁 File Structure
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php          # Main layout
│   ├── components/
│   │   ├── navbar.blade.php       # Navbar
│   │   ├── footer.blade.php       # Footer
│   │   └── alert.blade.php        # Alert component
│   └── pages/
│       ├── shop-products.blade.php    # Shop Products CRUD page
│       └── gallery-products.blade.php # Gallery Products CRUD page
├── css/
│   └── app.css                    # Tailwind CSS directives
└── js/
    └── app.js                     # JS for dark mode or CRUD interactions

routes/
└── web.php                        # Route definitions

tailwind.config.js                 # Tailwind CSS configuration
vite.config.js                     # Vite configuration

🚀 How to Run
Prerequisites

Make sure you have installed:

PHP 8.2+

Composer


MySQL/MariaDB

Steps

Install Dependencies

composer install


Setup Environment

cp .env.example .env
php artisan key:generate


Run Development Servers

Terminal 1 - Laravel Server:

php artisan serve




Open Browser

http://127.0.0.1:8000

📦 Components
1. Navbar Component
<x-navbar />


Features:

Navigation menu (Shop Products, Gallery Products)

Dark mode toggle button
