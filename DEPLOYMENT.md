# Deployment Guide - Desa Timbala

## Prerequisites
- PHP 8.1+ dengan extensions: BCMath, Ctype, cURL, DOM, Fileinfo, JSON, Mbstring, OpenSSL, PCRE, PDO, Tokenizer, XML
- MySQL 5.7+ atau MariaDB 10.3+
- Composer
- Git
- Web server (Apache/Nginx)

## Deployment Steps

### 1. Clone Repository
```bash
git clone https://github.com/yourusername/desa-timbala.git
cd desa-timbala
```

### 2. Install Dependencies
```bash
composer install --no-dev --optimize-autoloader
```

### 3. Environment Configuration
```bash
cp .env.example .env
# Edit .env file dengan konfigurasi produksi
nano .env
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Database Setup
```bash
# Buat database di MySQL
mysql -u root -p
CREATE DATABASE desa_timbala;
exit

# Run migrations dan seeders
php artisan migrate --force
php artisan db:seed --force
```

### 6. Storage Link
```bash
php artisan storage:link
```

### 7. Set Permissions
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

### 8. Optimize for Production
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 9. Copy JavaScript Files
```bash
# Copy file JavaScript ke public directory
cp js/admin-berita-simple.js public/js/admin-berita-simple.js
cp js/layanan.js public/js/layanan.js
cp js/admin-layanan.js public/js/admin-layanan.js
cp js/admin-publikasi.js public/js/admin-publikasi.js
```

### 10. Web Server Configuration

#### Apache (.htaccess)
Pastikan mod_rewrite enabled dan file .htaccess sudah ada di public directory.

#### Nginx
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/desa-timbala/public;
    
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    
    index index.php;
    
    charset utf-8;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
    
    error_page 404 /index.php;
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
    
    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## Update Deployment

### 1. Pull Latest Changes
```bash
git pull origin main
```

### 2. Run Update Script (Recommended)
```bash
chmod +x update-production.sh
./update-production.sh
```

### 3. Manual Update (jika script tidak ada)
```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Copy JavaScript files
mkdir -p public/js
cp js/admin-berita-simple.js public/js/admin-berita-simple.js
cp js/layanan.js public/js/layanan.js
cp js/admin-layanan.js public/js/admin-layanan.js
cp js/admin-publikasi.js public/js/admin-publikasi.js

# Set permissions
chmod -R 755 public/js
chown -R www-data:www-data public/js
```

### 4. Initial Deploy (First Time)
```bash
chmod +x deploy-production.sh
./deploy-production.sh
```

## Troubleshooting

### 1. Permission Issues
```bash
sudo chown -R www-data:www-data /path/to/desa-timbala
sudo chmod -R 755 /path/to/desa-timbala
```

### 2. Storage Link Issues
```bash
php artisan storage:link
```

### 3. Cache Issues
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### 4. JavaScript Files Not Loading
Pastikan file JavaScript sudah di-copy ke public directory:
```bash
ls -la public/js/
```

## Security Checklist

- [ ] APP_DEBUG=false di .env
- [ ] APP_ENV=production di .env
- [ ] File .env tidak accessible dari web
- [ ] Storage directory tidak accessible dari web
- [ ] Vendor directory tidak accessible dari web
- [ ] Database credentials aman
- [ ] SSL certificate terpasang (HTTPS)

## Monitoring

- Monitor error logs: `tail -f storage/logs/laravel.log`
- Monitor web server logs
- Monitor database performance
- Monitor disk space usage

## Backup

### Database Backup
```bash
mysqldump -u username -p desa_timbala > backup_$(date +%Y%m%d_%H%M%S).sql
```

### File Backup
```bash
tar -czf backup_files_$(date +%Y%m%d_%H%M%S).tar.gz /path/to/desa-timbala
```
