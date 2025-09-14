#!/bin/bash

# Deploy Script untuk Produksi
# Jalankan di server produksi setelah git pull

echo "🚀 Starting deployment..."

# 1. Update dependencies
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader

# 2. Clear caches
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# 3. Optimize for production
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 4. Run migrations
echo "🗄️ Running migrations..."
php artisan migrate --force

# 5. Seed database if needed
echo "🌱 Seeding database..."
php artisan db:seed --force

# 6. Set permissions
echo "🔐 Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# 7. Copy JavaScript files to public
echo "📁 Copying JavaScript files..."
cp js/admin-berita-simple.js public/js/admin-berita-simple.js
cp js/layanan.js public/js/layanan.js
cp js/admin-layanan.js public/js/admin-layanan.js
cp js/admin-publikasi.js public/js/admin-publikasi.js

# 8. Set ownership
echo "👤 Setting ownership..."
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache

echo "✅ Deployment completed successfully!"
echo "🌐 Your application is ready for production!"
