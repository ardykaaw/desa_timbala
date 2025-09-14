#!/bin/bash

# Script untuk menyelesaikan konflik git di produksi
# Jalankan di server produksi

echo "🔧 Fixing git conflicts..."

# 1. Stash perubahan lokal
echo "💾 Stashing local changes..."
git stash push -m "Local changes before pull $(date)"

# 2. Handle untracked files
echo "📁 Handling untracked files..."
mkdir -p backup_images

# Pindahkan file gambar yang konflik
if [ -f "public/images/Foto Bupati Bombana.png" ]; then
    echo "Moving Foto Bupati Bombana.png..."
    mv "public/images/Foto Bupati Bombana.png" backup_images/
fi

if [ -f "public/images/Ibu Bupati.png" ]; then
    echo "Moving Ibu Bupati.png..."
    mv "public/images/Ibu Bupati.png" backup_images/
fi

if [ -f "public/images/Wakil Bupati.png" ]; then
    echo "Moving Wakil Bupati.png..."
    mv "public/images/Wakil Bupati.png" backup_images/
fi

# 3. Pull perubahan dari GitHub
echo "📥 Pulling from GitHub..."
git pull origin main

# 4. Restore file gambar
echo "🖼️ Restoring images..."
if [ -d "backup_images" ]; then
    mv backup_images/* public/images/ 2>/dev/null || true
    rmdir backup_images 2>/dev/null || true
fi

# 5. Set permissions
echo "🔐 Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public/js
chmod -R 755 public/images

# 6. Set ownership
echo "👤 Setting ownership..."
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
chown -R www-data:www-data public/js
chown -R www-data:www-data public/images

echo "✅ Git conflicts resolved successfully!"
echo "🌐 Your application is updated and ready!"
