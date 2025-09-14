#!/bin/bash

# Update Script untuk Produksi
# Jalankan di server produksi setelah git pull

echo "🔄 Starting production update..."

# 1. Handle git conflicts and pull latest changes
echo "📥 Handling git conflicts and pulling latest changes..."

# Backup local changes
echo "💾 Backing up local changes..."
git stash push -m "Local changes before pull $(date)"

# Handle untracked files that might conflict
echo "📁 Handling untracked files..."
mkdir -p backup_images
if [ -f "public/images/Foto Bupati Bombana.png" ]; then
    mv "public/images/Foto Bupati Bombana.png" backup_images/
fi
if [ -f "public/images/Ibu Bupati.png" ]; then
    mv "public/images/Ibu Bupati.png" backup_images/
fi
if [ -f "public/images/Wakil Bupati.png" ]; then
    mv "public/images/Wakil Bupati.png" backup_images/
fi

# Pull latest changes
git pull origin main

# Restore images
echo "🖼️ Restoring images..."
if [ -d "backup_images" ]; then
    mv backup_images/* public/images/ 2>/dev/null || true
    rmdir backup_images 2>/dev/null || true
fi

# 2. Install dependencies
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader

# 3. Clear caches
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan services:clear-cache

# 4. Run migrations
echo "🗄️ Running migrations..."
php artisan migrate --force

# 5. Copy JavaScript files to public
echo "📁 Copying JavaScript files..."
mkdir -p public/js
cp js/admin-berita-simple.js public/js/admin-berita-simple.js
cp js/layanan.js public/js/layanan.js
cp js/admin-layanan.js public/js/admin-layanan.js
cp js/admin-publikasi.js public/js/admin-publikasi.js

# 6. Set admin email configuration
echo "📧 Setting admin email configuration..."
php artisan config:cache
echo "Admin email set to: ardykaaw26@gmail.com"

# 7. Optimize for production
echo "⚡ Optimizing for production..."
php artisan route:cache
php artisan view:cache

# 7. Set permissions
echo "🔐 Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public/js

# 8. Set ownership
echo "👤 Setting ownership..."
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
chown -R www-data:www-data public/js

echo "✅ Production update completed successfully!"
echo "🌐 Your application is updated and ready!"
