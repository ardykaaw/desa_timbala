<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Desa Timbala - Kabupaten Bombana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e3a8a;
            --secondary-color: #3b82f6;
            --accent-color: #f59e0b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f8fafc;
            --bg-white: #ffffff;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
            line-height: 1.6;
        }
        
        /* Modern Header */
        .main-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 1rem 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: var(--shadow-lg);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 70px;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo-section img {
            height: 50px;
            width: auto;
        }
        
        .site-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }
        
        .site-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
            margin: 0;
        }
        
        /* Desktop Menu */
        .desktop-menu {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            flex-wrap: nowrap;
            overflow: hidden;
            max-width: 100%;
            padding: 0.25rem 0;
        }
        
        .desktop-menu .menu-item {
            color: white;
            text-decoration: none;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.375rem;
            white-space: nowrap;
            font-size: 0.875rem;
            position: relative;
        }
        
        .desktop-menu .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }
        
        .desktop-menu .menu-item i {
            font-size: 0.875rem;
            width: 16px;
            text-align: center;
        }
        
        .desktop-menu .menu-item.admin-login {
            background: var(--accent-color);
            margin-left: 0.5rem;
            font-weight: 600;
        }
        
        .desktop-menu .menu-item.admin-login:hover {
            background: #d97706;
            transform: translateY(-1px);
        }
        
        /* Tooltip untuk menu items */
        .desktop-menu .menu-item[title]:hover::after {
            content: attr(title);
            position: absolute;
            bottom: -35px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            font-size: 0.75rem;
            white-space: nowrap;
            z-index: 1000;
            pointer-events: none;
        }
        
        .desktop-menu .menu-item[title]:hover::before {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            border: 4px solid transparent;
            border-bottom-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            pointer-events: none;
        }
        
        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 0.5rem;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .mobile-menu-toggle:hover {
            background: #d97706;
            transform: translateY(-2px);
        }
        
        /* Logo Corner - Modern Design */
        .logo-corner {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 998;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.95);
            padding: 15px;
            border-radius: 20px;
            box-shadow: var(--shadow-xl);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .logo-item {
            background: white;
            border-radius: 10px;
            padding: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            transition: all 0.3s ease;
            border: 2px solid var(--secondary-color);
            position: relative;
        }
        .logo-item:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0,0,0,0.25);
            border-color: var(--primary-color);
        }
        .logo-item img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 5px;
        }
        .logo-label {
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary-color);
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.7rem;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 999;
        }
        .logo-item:hover .logo-label {
            opacity: 1;
        }
        
        /* Modern Card Styles */
        .modern-card {
            background: var(--bg-white);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
        }
        
        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
        }
        
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }
        
        /* Village Head Section - Modern */
        .village-head-section {
            padding: 5rem 0;
            background: var(--bg-light);
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-badge {
            display: inline-block;
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* News Card Styles */
        .news-card {
            background: rgb(255, 255, 255);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .news-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 10px;
        }
        .news-header i {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-right: 10px;
        }
        .news-header h3 {
            color: var(--primary-color);
            margin: 0;
            font-size: 1.3rem;
        }
        .news-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .news-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .news-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 1rem;
            transition: color 0.3s ease;
            cursor: pointer;
        }
        .news-title:hover {
            color: var(--secondary-color);
        }
        .news-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 8px;
        }
        .news-source {
            color: var(--accent-color);
            font-weight: 500;
        }
        .news-link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        .news-link:hover {
            color: var(--secondary-color);
            transform: translateX(3px);
        }
        .news-link i {
            margin-left: 5px;
        }
        
        /* Regent Card Styles */
        .regent-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .regent-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .regent-header {
            text-align: center;
            margin-bottom: 20px;
            width: 100%;
        }
        .regent-header h3 {
            color: var(--primary-color);
            margin: 0;
            font-size: 1.3rem;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--secondary-color);
        }
        .regent-photos {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }
        .regent-item {
            text-align: center;
        }
        .regent-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }
        
        .regent-photo:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-lg);
        }
        .regent-name {
            font-size: 1rem;
            color: var(--primary-color);
            margin-bottom: 5px;
            font-weight: 600;
        }
        .regent-position {
            font-size: 0.9rem;
            color: var(--text-light);
        }
        
        /* Village Head Card - Modified */
        .village-head-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .village-head-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .head-photo-container {
            position: relative;
            display: inline-block;
        }
        
        .head-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary-color);
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
        }
        
        .head-photo:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-xl);
        }
        .head-name {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 10px;
            text-align: center;
        }
        .head-position {
            font-size: 1.1rem;
            color: var(--text-light);
            text-align: center;
            margin-bottom: 20px;
        }
        .welcome-message {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--text-dark);
            text-align: justify;
            width: 100%;
        }
        
        /* Modern Responsive Design */
        @media (max-width: 1200px) {
            .desktop-menu .menu-item {
                padding: 0.5rem 0.6rem;
                font-size: 0.8rem;
            }
            
            .desktop-menu .menu-item i {
                font-size: 0.8rem;
            }
            
            .desktop-menu .menu-item span {
                display: none;
            }
        }
        
        @media (max-width: 1100px) {
            .desktop-menu .menu-item {
                padding: 0.5rem 0.5rem;
                font-size: 0.75rem;
            }
        }
        
        @media (max-width: 1000px) {
            .desktop-menu .menu-item {
                padding: 0.4rem 0.4rem;
                font-size: 0.7rem;
            }
        }
        
        @media (max-width: 992px) {
            .desktop-menu {
                display: none !important;
            }
            
            .mobile-menu-toggle {
                display: block !important;
            }
            
            .logo-corner {
                position: relative;
                top: auto;
                right: auto;
                flex-direction: row;
                justify-content: center;
                margin: 2rem auto;
                z-index: 1;
                width: 100%;
                max-width: 500px;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 768px) {
            .main-header {
                padding: 0.75rem 0;
            }
            
            .site-title {
                font-size: 1.25rem;
            }
            
            .site-subtitle {
                font-size: 0.8rem;
            }
            
            .desktop-menu {
                display: none !important;
            }
            
            .mobile-menu-toggle {
                display: block !important;
            }
            
            .hero-section {
                height: 80vh;
                margin-top: 70px;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .hero-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-hero {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
            
            .modern-card {
                margin-bottom: 1.5rem;
            }
            
            .regent-photos {
                flex-direction: column;
            }
            
            .regent-item {
                margin-bottom: 1rem;
            }
            
            .logo-item {
                width: 50px;
                height: 50px;
            }
            
            .logo-corner {
                gap: 8px;
                padding: 10px;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .sidebar {
                width: 100%;
                right: -100%;
            }
        }
        
        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.75rem;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
            
            .modern-card {
                padding: 1.5rem;
            }
        }
        
        /* Modern Sidebar Menu */
        .sidebar {
            position: fixed;
            top: 0;
            right: -350px;
            width: 350px;
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            transition: right 0.3s ease;
            z-index: 1000;
            box-shadow: -2px 0 20px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }
        
        .sidebar.active {
            right: 0;
        }
        
        .sidebar-header {
            padding: 1.5rem;
            background: rgba(0,0,0,0.1);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .sidebar-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .sidebar-close:hover {
            background: rgba(255,255,255,0.1);
        }
        
        .sidebar-menu {
            padding: 1rem 0;
            flex: 1;
            overflow-y: auto;
        }
        
        .sidebar .menu-item {
            display: block;
            padding: 1rem 1.5rem;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-weight: 500;
        }
        
        .sidebar .menu-item:hover {
            background: rgba(255,255,255,0.1);
            border-left-color: var(--accent-color);
            padding-left: 2rem;
        }
        
        .sidebar .menu-item i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }
        
        .sidebar .menu-item.admin-login {
            margin-top: auto;
            background: rgba(0,0,0,0.2);
            border-top: 1px solid rgba(255,255,255,0.1);
            border-left: none;
        }
        
        .sidebar .menu-item.admin-login:hover {
            background: rgba(0,0,0,0.3);
            padding-left: 1.5rem;
        }
        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }
        .overlay.active {
            opacity: 1;
            visibility: visible;
        }
        /* Modern Hero Section */
        .hero-section {
            position: relative;
            height: 100vh;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.8), rgba(59, 130, 246, 0.8)), url('{{ asset("images/pantai 5.jpg") }}') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 80px;
        }
        
        .hero-content {
            text-align: center;
            color: white;
            max-width: 800px;
            padding: 0 2rem;
        }
        
        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
            animation: fadeInUp 1s ease;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s;
            animation-fill-mode: both;
        }
        
        .hero-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease 0.4s;
            animation-fill-mode: both;
        }
        
        .btn-hero {
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-hero-primary {
            background: var(--accent-color);
            color: white;
            box-shadow: var(--shadow-lg);
        }
        
        .btn-hero-primary:hover {
            background: #d97706;
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
            color: white;
        }
        
        .btn-hero-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }
        
        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
            color: white;
        }
        /* Admin Login Modal */
        .login-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 2000;
        }
        .login-modal.active {
            display: flex;
        }
        .login-modal-content {
            background: white;
            border-radius: 15px;
            padding: 40px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            animation: modalSlideIn 0.3s ease;
        }
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        .login-header h3 {
            color: var(--primary-color);
            margin: 0;
        }
        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(151, 188, 98, 0.25);
        }
        .btn-login {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-login:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .btn-close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-light);
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .btn-close-modal:hover {
            color: var(--text-dark);
        }
        /* Content Sections */
        .content-section {
            padding: 60px 0;
            display: none;
        }
        .content-section.active {
            display: block;
        }
        .section-title {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--secondary-color);
        }
        .info-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.12);
        }
        .info-card h4 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.3rem;
        }
        .info-card p {
            color: var(--text-light);
            line-height: 1.6;
        }
        /* Map Container */
        .map-container {
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            height: 400px;
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .map-info {
            margin-top: 15px;
            padding: 15px;
            background: var(--bg-light);
            border-radius: 8px;
            font-size: 0.9rem;
            color: var(--text-light);
        }
        .map-info h5 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        .map-info p {
            margin-bottom: 5px;
        }
        .map-info a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }
        .map-info a:hover {
            text-decoration: underline;
        }
        /* Visi & Misi Styles */
        .vision-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
            font-style: italic;
            text-align: center;
            padding: 1rem;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 0.5rem;
            border-left: 4px solid var(--primary-color);
        }
        
        .mission-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .mission-list li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
            padding: 0.75rem;
            background: #f8fafc;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .mission-list li:hover {
            background: #e2e8f0;
            transform: translateX(5px);
        }
        
        .mission-list li i {
            color: var(--success-color);
            margin-right: 0.75rem;
            margin-top: 0.25rem;
            font-size: 1rem;
        }
        
        .goal-item {
            text-align: center;
            padding: 1.5rem;
            background: #f8fafc;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .goal-item:hover {
            background: #e2e8f0;
            transform: translateY(-5px);
        }
        
        .goal-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }
        
        .goal-item h5 {
            color: var(--text-dark);
            margin-bottom: 0.75rem;
            font-weight: 600;
        }
        
        .goal-item p {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Struktur Organisasi Cards */
        .org-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        .org-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .org-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 3px solid var(--secondary-color);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        .org-position {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        .org-name {
            color: var(--primary-color);
            font-size: 1.1rem;
            font-weight: 600;
        }
        /* Wisata Cards */
        .wisata-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        .wisata-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .wisata-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .wisata-content {
            padding: 20px;
        }
        .wisata-title {
            color: var(--primary-color);
            font-size: 1.3rem;
            margin-bottom: 10px;
        }
        .wisata-description {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .wisata-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: var(--text-light);
        }
        /* Form Styles */
        .form-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }
        .form-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(151, 188, 98, 0.25);
        }
        .btn-submit {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-submit:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .form-label {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 8px;
        }
        .required {
            color: #dc3545;
        }
        /* Publikasi Styles */
        .publikasi-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
            justify-content: center;
        }
        .publikasi-tab {
            background: white;
            border: 2px solid var(--secondary-color);
            color: var(--primary-color);
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        .publikasi-tab:hover {
            background: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
        }
        .publikasi-tab.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        .publikasi-content {
            display: none;
        }
        .publikasi-content.active {
            display: block;
            animation: fadeInUp 0.5s ease;
        }
        .publikasi-item {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-left: 4px solid var(--secondary-color);
            transition: all 0.3s ease;
        }
        .publikasi-item:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .publikasi-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .publikasi-title {
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
        }
        .publikasi-year {
            background: var(--accent-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        .publikasi-info {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        .publikasi-description {
            color: var(--text-dark);
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .publikasi-actions {
            display: flex;
            gap: 10px;
        }
        .btn-download {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .btn-download:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }
        .btn-view {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            padding: 8px 20px;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .btn-view:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        /* Form Publikasi Styles */
        .form-publikasi {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }
        .dynamic-fields {
            margin-top: 20px;
        }
        .field-group {
            background: var(--bg-light);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            position: relative;
        }
        .remove-field {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .remove-field:hover {
            background: #c82333;
            transform: scale(1.1);
        }
        .btn-add-field {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
            transition: all 0.3s ease;
        }
        .btn-add-field:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }
        /* Admin Dashboard */
        .admin-dashboard {
            display: none;
            background: var(--admin-bg);
            min-height: 100vh;
        }
        .admin-dashboard.active {
            display: block;
        }
        .admin-header {
            background: var(--primary-color);
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .admin-sidebar {
            position: fixed;
            left: 0;
            top: 70px;
            width: 250px;
            height: calc(100vh - 70px);
            background: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            overflow-y: auto;
        }
        .admin-menu {
            padding: 20px 0;
        }
        .admin-menu-item {
            display: block;
            padding: 15px 25px;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        .admin-menu-item:hover, .admin-menu-item.active {
            background: var(--bg-light);
            border-left-color: var(--primary-color);
            color: var(--primary-color);
        }
        .admin-menu-item i {
            margin-right: 10px;
            width: 20px;
        }
        .admin-content {
            margin-left: 250px;
            padding: 30px;
        }
        .admin-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .stat-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        .stat-card:nth-child(1) .stat-icon { color: #007bff; }
        .stat-card:nth-child(2) .stat-icon { color: #28a745; }
        .stat-card:nth-child(3) .stat-icon { color: #ffc107; }
        .stat-card:nth-child(4) .stat-icon { color: #dc3545; }
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 5px;
        }
        .stat-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        .admin-panel {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        .admin-panel-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .btn-add {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .btn-add:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table th,
        .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        .data-table th {
            background: var(--bg-light);
            font-weight: 600;
            color: var(--primary-color);
        }
        .data-table tr:hover {
            background: var(--bg-light);
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .btn-edit {
            background: #ffc107;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 3px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }
        .btn-edit:hover {
            background: #e0a800;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 3px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }
        .btn-delete:hover {
            background: #c82333;
        }
        .btn-logout {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .village-head-card {
                padding: 30px 20px;
            }
            
            .head-photo {
                width: 150px;
                height: 150px;
            }
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .admin-sidebar.mobile-open {
                transform: translateX(0);
            }
            .admin-content {
                margin-left: 0;
            }
            .admin-stats {
                grid-template-columns: 1fr;
            }
            .publikasi-tabs {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 10px;
            }
            .publikasi-tab {
                white-space: nowrap;
            }
            .map-container {
                height: 300px;
            }
        }
        /* Modern Footer */
        .modern-footer {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 5rem;
        }
        
        .footer-brand {
            margin-bottom: 2rem;
        }
        
        .footer-logo {
            height: 60px;
            width: auto;
            margin-bottom: 1rem;
        }
        
        .footer-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .footer-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 1rem;
        }
        
        .footer-description {
            font-size: 0.9rem;
            line-height: 1.6;
            opacity: 0.8;
        }
        
        .footer-heading {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: white;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .footer-links a:hover {
            color: var(--accent-color);
            padding-left: 0.5rem;
        }
        
        .contact-info {
            margin-top: 1rem;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }
        
        .contact-item i {
            font-size: 1.2rem;
            color: var(--accent-color);
            margin-right: 1rem;
            margin-top: 0.25rem;
            width: 20px;
        }
        
        .contact-item strong {
            display: block;
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
        }
        
        .contact-item p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.8;
            line-height: 1.4;
        }
        
        .footer-social {
            margin-top: 2rem;
            text-align: center;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }
        
        .social-link:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
            color: white;
        }
        
        .footer-bottom {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .copyright {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .developer {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.8;
        }
        /* Success Message */
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
            border: 1px solid #c3e6cb;
        }
        .success-message.show {
            display: block;
            animation: fadeInUp 0.5s ease;
        }
        /* Error Message */
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
            border: 1px solid #f5c6cb;
        }
        .error-message.show {
            display: block;
            animation: fadeInUp 0.5s ease;
        }
        /* Hide other sections when admin is logged in */
        body.admin-logged-in .hero-section,
        body.admin-logged-in .village-head-section,
        body.admin-logged-in .content-section,
        body.admin-logged-in footer,
        body.admin-logged-in .menu-toggle,
        body.admin-logged-in .sidebar,
        body.admin-logged-in .overlay {
            display: none;
        }
    </style>
</head>
<body>
    
    
    <!-- Logo Corner -->
    <div class="logo-corner">
        <div class="logo-item">
            <img src="{{ asset('images/logo 1.png') }}" alt="Logo Desa Timbala">
            <div class="logo-label">Desa Timbala</div>
        </div>
        <div class="logo-item">
            <img src="{{ asset('images/l 2.png') }}" alt="Logo Kabupaten Bombana">
            <div class="logo-label">Kabupaten Bombana</div>
        </div>
        <div class="logo-item">
            <img src="{{ asset('images/l 3.png') }}" alt="Logo BUMDes">
            <div class="logo-label">Kemendes</div>
        </div>
    </div>
    <!-- Modern Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-map-marker-alt"></i> Kecamatan Poleang Barat, Kabupaten Bombana
            </div>
            <h1 class="hero-title">Selamat Datang di<br>Desa Timbala</h1>
            <p class="hero-subtitle">Desa yang maju, mandiri, dan sejahtera berbasis pertanian dan UMKM dengan didukung sumber daya manusia yang berkualitas serta lingkungan yang lestari</p>
            <div class="hero-actions">
                <a href="#" class="btn-hero btn-hero-primary" onclick="showSection('profil')">
                    <i class="fas fa-info-circle"></i> Pelajari Lebih Lanjut
                </a>
                <a href="#" class="btn-hero btn-hero-secondary" onclick="showSection('layanan')">
                    <i class="fas fa-concierge-bell"></i> Layanan Desa
                </a>
            </div>
        </div>
    </section>
    <!-- Admin Login Modal -->
    <div class="login-modal" id="login-modal">
        <div class="login-modal-content">
            <button class="btn-close-modal" onclick="closeLoginModal()">
                <i class="fas fa-times"></i>
            </button>
            <div class="login-header">
                <i class="fas fa-user-shield"></i>
                <h3>Login Admin</h3>
            </div>
            <div class="error-message" id="login-error">
                <i class="fas fa-exclamation-circle"></i> Username atau password salah!
            </div>
            <form id="login-form">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>
        </div>
    </div>
    <!-- Village Head Section - Modern -->
    <section class="village-head-section" id="home-section">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <i class="fas fa-home"></i> Beranda
                </div>
                <h2 class="section-title">Selamat Datang di Desa Timbala</h2>
                <p class="section-subtitle">Mari bersama-sama membangun desa yang maju, mandiri, dan sejahtera</p>
            </div>
            
            <div class="row">
                <!-- News Card - Left Column -->
                <div class="col-lg-4 col-md-5 mb-4">
                    <div class="modern-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h3 class="card-title">Berita Desa</h3>
                        </div>
                        <div class="news-item">
                            <h4 class="news-title" onclick="window.open('https://bombanakab.go.id/berita/pembangunan-jalan-desa', '_blank')">Pembangunan Jalan Desa Tahap Dua Dimulai</h4>
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> 15 November 2023</span>
                                <span class="news-source">Dinas PU</span>
                            </div>
                            <a href="https://bombanakab.go.id/berita/pembangunan-jalan-desa" target="_blank" class="news-link">
                                Baca selengkapnya <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                        <div class="news-item">
                            <h4 class="news-title" onclick="window.open('https://bombanakab.go.id/berita/pelatihan-umkm', '_blank')">Pelatihan Kewirausahaan untuk UMKM Desa Timbala</h4>
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> 10 November 2023</span>
                                <span class="news-source">Diskop UKM</span>
                            </div>
                            <a href="https://bombanakab.go.id/berita/pelatihan-umkm" target="_blank" class="news-link">
                                Baca selengkapnya <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                        <div class="news-item">
                            <h4 class="news-title" onclick="window.open('https://bombanakab.go.id/berita/blt-dd', '_blank')">Penyaluran BLT-DD Tahap Akhir Tahun 2023</h4>
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> 5 November 2023</span>
                                <span class="news-source">Desa Timbala</span>
                            </div>
                            <a href="https://bombanakab.go.id/berita/blt-dd" target="_blank" class="news-link">
                                Baca selengkapnya <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                        <div class="news-item">
                            <h4 class="news-title" onclick="window.open('https://bombanakab.go.id/berita/festival-jambu-mete', '_blank')">Festival Panen Jambu Mete Desa Timbala</h4>
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> 1 November 2023</span>
                                <span class="news-source">Disparbud</span>
                            </div>
                            <a href="https://bombanakab.go.id/berita/festival-jambu-mete" target="_blank" class="news-link">
                                Baca selengkapnya <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Village Head Card - Middle Column -->
                <div class="col-lg-4 col-md-5 mb-4">
                    <div class="modern-card text-center">
                        <div class="card-header justify-content-center">
                            <div class="card-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h3 class="card-title">Kepala Desa</h3>
                        </div>
                        <div class="head-photo-container mb-3">
                            <img src="{{ asset('images/M. YASIR.jpg') }}" alt="Kepala Desa" class="head-photo">
                        </div>
                        <h2 class="head-name">M. YASIR, S.M</h2>
                        <p class="head-position text-muted mb-4">Kepala Desa Timbala</p>
                        <div class="welcome-message text-start">
                            <p class="mb-3"><strong>Assalamualaikum Warahmatullahi Wabarakatuh,</strong></p>
                            <p class="mb-3">Selamat datang di Sistem Informasi Desa Timbala. Sebagai Kepala Desa, saya mengucapkan terima kasih atas kunjungan Anda di website resmi desa kami.</p>
                            <p class="mb-3">Website ini hadir sebagai wujud komitmen kami dalam mewujudkan transparansi dan pelayanan prima kepada seluruh masyarakat Desa Timbala.</p>
                            <p class="mb-0"><strong>Wassalamualaikum Warahmatullahi Wabarakatuh.</strong></p>
                        </div>
                    </div>
                </div>
                
                <!-- Regent Card - Right Column -->
                <div class="col-lg-4 col-md-2 mb-4">
                    <div class="modern-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-landmark"></i>
                            </div>
                            <h3 class="card-title">Pemerintah Kabupaten</h3>
                        </div>
                        <div class="regent-photos">
                            <div class="regent-item mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/bupati.jpg') }}" alt="Bupati Bombana" class="regent-photo me-3">
                                    <div>
                                        <h5 class="regent-name mb-1">Ir. H. BURHANUDDIN. M.Si</h5>
                                        <p class="regent-position text-muted mb-0">Bupati Bombana</p>
                                    </div>
                                </div>
                            </div>
                            <div class="regent-item mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/wakil bupati.jpg') }}" alt="Wakil Bupati Bombana" class="regent-photo me-3">
                                    <div>
                                        <h5 class="regent-name mb-1">AHMAD YANI, S.Pd., M.Pd</h5>
                                        <p class="regent-position text-muted mb-0">Wakil Bupati Bombana</p>
                                    </div>
                                </div>
                            </div>    
                            <div class="regent-item mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/ketua TP-PKK Kab. Bombana.jpg') }}" alt="Ketua TP-PKK Kab. Bombana" class="regent-photo me-3">
                                    <div>
                                        <h5 class="regent-name mb-1">Hj.FATMAWATI KASIM MAREWA, S. Sos</h5>
                                        <p class="regent-position text-muted mb-0">Ketua TP-PKK Kab. Bombana</p>
                                    </div>
                                </div>
                            </div>
                            <div class="regent-item">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/ibu kades.jpg') }}" alt="Ketua TP-PKK Desa Timbala" class="regent-photo me-3">
                                    <div>
                                        <h5 class="regent-name mb-1">Hj. FITRIAH YASIR</h5>
                                        <p class="regent-position text-muted mb-0">Ketua TP-PKK Desa Timbala</p>          
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- @include('sections.profil')
    @include('sections.sejarah')
    @include('sections.wisata')
    @include('sections.publikasi')
    @include('sections.visimisi')
    @include('sections.struktur')
    @include('sections.layanan')
    @include('sections.kontak') --}}
    
    <!-- Admin Dashboard -->
    <div class="admin-dashboard" id="admin-dashboard">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">APBDES Tahun Anggaran 2024</h3>
                        <span class="publikasi-year">2024</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 20 Desember 2023 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 2.5 MB
                    </div>
                    <div class="publikasi-description">
                        Anggaran Pendapatan dan Belanja Desa Timbala Tahun Anggaran 2024 mencakup pendapatan desa, belanja desa, dan pembiayaan desa. Total anggaran Rp 1.500.000.000 dengan rincian belanja pembangunan 40%, belanja operasional 35%, dan belanja tak terduga 25%.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">APBDES Perubahan Tahun 2023</h3>
                        <span class="publikasi-year">2023</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 15 September 2023 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 1.8 MB
                    </div>
                    <div class="publikasi-description">
                        Perubahan APBDES Tahun 2023 dilakukan karena adanya penyesuaian anggaran untuk beberapa kegiatan prioritas dan penambahan dana insentif bagi RT/RW.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
            </div>
            <!-- RPJMDES Content -->
            <div id="rpjmdes-content" class="publikasi-content">
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">RPJMDES 2021-2026</h3>
                        <span class="publikasi-year">2021-2026</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 10 Januari 2021 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 3.2 MB
                    </div>
                    <div class="publikasi-description">
                        Rencana Pembangunan Jangka Menengah Desa Timbala periode 2021-2026 memuat visi, misi, tujuan, sasaran, strategi, dan kebijakan pembangunan desa untuk 5 tahun ke depan.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
            </div>
            <!-- RKPDES Content -->
            <div id="rkpdes-content" class="publikasi-content">
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">RKPDES Tahun 2024</h3>
                        <span class="publikasi-year">2024</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 5 Desember 2023 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 2.1 MB
                    </div>
                    <div class="publikasi-description">
                        Rencana Kerja Pemerintah Desa Tahun 2024 berisi rincian kegiatan pembangunan yang akan dilaksanakan dalam satu tahun anggaran sesuai dengan prioritas RPJMDES.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">RKPDES Tahun 2023</h3>
                        <span class="publikasi-year">2023</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 1 Desember 2022 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 1.9 MB
                    </div>
                    <div class="publikasi-description">
                        RKPDES Tahun 2023 telah berhasil melaksanakan 85% dari total rencana kerja dengan fokus pada infrastruktur jalan dan pemberdayaan UMKM.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
            </div>
            <!-- ADD Content -->
            <div id="add-content" class="publikasi-content">
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">Alokasi Dana Desa Tahun 2024</h3>
                        <span class="publikasi-year">2024</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 25 November 2023 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 1.5 MB
                    </div>
                    <div class="publikasi-description">
                        Alokasi Dana Desa Tahun 2024 sebesar Rp 800.000.000 akan dialokasikan untuk pembangunan infrastruktur 60%, pemberdayaan masyarakat 25%, dan administrasi umum 15%.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
            </div>
            <!-- DDS Content -->
            <div id="dds-content" class="publikasi-content">
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">Dana Desa Tahun 2024</h3>
                        <span class="publikasi-year">2024</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 30 November 2023 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 2.8 MB
                    </div>
                    <div class="publikasi-description">
                        Dana Desa Tahun 2024 sebesar Rp 1.200.000.000 dengan rincian untuk bidang infrastruktur Rp 720.000.000, bidang pemberdayaan Rp 360.000.000, dan bidang administrasi Rp 120.000.000.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">Laporan Realisasi Dana Desa 2023</h3>
                        <span class="publikasi-year">2023</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 20 Januari 2024 | 
                        <i class="fas fa-file-excel"></i> Format: Excel | 
                        <i class="fas fa-download"></i> Ukuran: 1.2 MB
                    </div>
                    <div class="publikasi-description">
                        Laporan realisasi penggunaan Dana Desa Tahun 2023 mencapai 98% dengan realisasi fisik 95%. Terdapat 25 kegiatan yang telah selesai dilaksanakan.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download Excel</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
            </div>
            <!-- Produk Hukum Content -->
            <div id="produk-hukum-content" class="publikasi-content">
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">Peraturan Desa No. 1 Tahun 2024</h3>
                        <span class="publikasi-year">2024</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 15 Januari 2024 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 856 KB
                    </div>
                    <div class="publikasi-description">
                        Peraturan Desa tentang APBDES Tahun Anggaran 2024 yang telah disahkan melalui musyawarah desa dan mendapatkan persetujuan dari Bupati.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">Peraturan Desa No. 3 Tahun 2023</h3>
                        <span class="publikasi-year">2023</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 10 Maret 2023 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 723 KB
                    </div>
                    <div class="publikasi-description">
                        Peraturan Desa tentang Penyelenggaraan Administrasi Pemerintahan Desa yang mengatur tata cara pelayanan administrasi kepada masyarakat.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
            </div>
            <!-- SK Kepala Desa Content -->
            <div id="sk-kepala-desa-content" class="publikasi-content">
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">SK Kepala Desa No. 05 Tahun 2024</h3>
                        <span class="publikasi-year">2024</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 5 Februari 2024 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 432 KB
                    </div>
                    <div class="publikasi-description">
                        Surat Keputusan Kepala Desa tentang Pembentukan Tim Pelaksana Kegiatan Pembangunan Tahun Anggaran 2024.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
                <div class="publikasi-item">
                    <div class="publikasi-header">
                        <h3 class="publikasi-title">SK Kepala Desa No. 12 Tahun 2023</h3>
                        <span class="publikasi-year">2023</span>
                    </div>
                    <div class="publikasi-info">
                        <i class="fas fa-calendar"></i> Ditetapkan: 20 Juni 2023 | 
                        <i class="fas fa-file-pdf"></i> Format: PDF | 
                        <i class="fas fa-download"></i> Ukuran: 567 KB
                    </div>
                    <div class="publikasi-description">
                        Surat Keputusan Kepala Desa tentang Penetapan Penerima Bantuan Langsung Tunai Desa Tahun 2023.
                    </div>
                    <div class="publikasi-actions">
                        <button class="btn-download"><i class="fas fa-download"></i> Download PDF</button>
                        <button class="btn-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>
                </div>
            </div>
            <!-- Form Input Publikasi -->
            <div class="form-publikasi">
                <h3 class="form-title"><i class="fas fa-plus-circle"></i> Input Data Publikasi</h3>
                <div class="success-message" id="success-message-publikasi">
                    <i class="fas fa-check-circle"></i> Data publikasi berhasil disimpan!
                </div>
                <form id="form-publikasi">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Publikasi <span class="required">*</span></label>
                            <select class="form-select" id="jenis-publikasi" onchange="updateFormFields()" required>
                                <option value="">Pilih Jenis Publikasi</option>
                                <option value="apbdes">APBDES</option>
                                <option value="rpjmdes">RPJMDES</option>
                                <option value="rkpdes">RKPDES</option>
                                <option value="add">Alokasi Dana Desa (ADD)</option>
                                <option value="dds">Dana Desa (DDS)</option>
                                <option value="produk-hukum">Produk Hukum Dana Desa</option>
                                <option value="sk-kepala-desa">Surat Keputusan Kepala Desa</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tahun <span class="required">*</span></label>
                            <input type="number" class="form-control" id="tahun" min="2000" max="2030" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor Dokumen</label>
                            <input type="text" class="form-control" id="nomor-dokumen" placeholder="Contoh: 01/2024">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Penetapan <span class="required">*</span></label>
                            <input type="date" class="form-control" id="tanggal-penetapan" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Dokumen <span class="required">*</span></label>
                            <input type="text" class="form-control" id="judul-dokumen" placeholder="Masukkan judul dokumen" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Format File <span class="required">*</span></label>
                            <select class="form-select" id="format-file" required>
                                <option value="">Pilih Format</option>
                                <option value="pdf">PDF</option>
                                <option value="doc">DOC/DOCX</option>
                                <option value="xls">XLS/XLSX</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ukuran File (MB)</label>
                            <input type="number" class="form-control" id="ukuran-file" step="0.1" placeholder="Contoh: 2.5">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Upload File</label>
                            <input type="file" class="form-control" id="file-upload">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Deskripsi <span class="required">*</span></label>
                            <textarea class="form-control" id="deskripsi" rows="4" placeholder="Masukkan deskripsi dokumen" required></textarea>
                        </div>
                        
                        <!-- Dynamic Fields Container -->
                        <div id="dynamic-fields" class="dynamic-fields"></div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i> Simpan Publikasi
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Visi Misi Section -->
    <section class="content-section" id="visimisi-section">
        <div class="container">
            <h2 class="section-title">Visi & Misi</h2>
            <div class="info-card">
                <h4><i class="fas fa-eye"></i> Visi</h4>
                <p>"Terwujudnya Desa Timbala yang Maju, Mandiri, dan Sejahtera Berbasis Pertanian dan UMKM dengan Didukung Sumber Daya Manusia yang Berkualitas serta Lingkungan yang Lestari"</p>
            </div>
            <div class="info-card">
                <h4><i class="fas fa-bullseye"></i> Misi</h4>
                <ol>
                    <li>Mewujudkan dan mengembangkan kegiatan keagamaan untuk menambah keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.</li>
                    <li>Membangun dan meningkatkan hasil perikanan dan pertanian dengan jalan penataan pengairan, perbaikan jalan usaha tani, pola pemupukan, dan tanam yang baik, serta edukasi penangkapan ikan bagi nelayan</li>
                    <li>Membangun sarana olahraga yang layak bagi masyarakat terutama Sepak Bola/Futsal</li>
                    <li>Peningkatan sarana dan prasarana pelayanan dasar Desa </li>
                    <li>Menata Pemerintahan Desa Timbala yang kompak dan bertanggung jawab dalam mengemban amanat masyarakat</li>
                    <li>Meningkatkan pelayanan masyarakat secara terpadu dan optimal.
                    <li>Menumbuh Kembangkan Kelompok Tani dan Gabungan Kelompok Tani serta bekerja sama denga HIPPA untuk memfasilitasi kebutuhan Petani</li>
                    <li>Menumbuh kembangkan usaha kecil dan menengah.</li>
                    <li>Membangun dan mendorong majunya bidang pendidikan baik formal maupun nonformal yang mudah diakses dan dinikmati seluruh warga masyarakat tanpa terkecuali yang mampu menghasilkan insan intelektual, inovatif dan relegi .</li>
                    <li>Membangun dan mendorong usaha-usaha untuk pengembangan dan optimalisasi sektor perikanan, pertanian, peternakan, dan kewira usahaan</li>
                    </li>
                </ol>
            </div>
        </div>
    </section>
    <!-- Visi & Misi Section -->
    <section class="content-section" id="visimisi-section">
        <div class="container">
            <h2 class="section-title">Visi & Misi Desa Timbala</h2>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="modern-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h3 class="card-title">Visi Desa</h3>
                        </div>
                        <div class="card-body">
                            <p class="vision-text">
                                "Desa Timbala yang maju, mandiri, dan sejahtera berbasis pertanian dan UMKM dengan didukung sumber daya manusia yang berkualitas serta lingkungan yang lestari"
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="modern-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <h3 class="card-title">Misi Desa</h3>
                        </div>
                        <div class="card-body">
                            <ul class="mission-list">
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    Mengembangkan sektor pertanian dan UMKM sebagai tulang punggung perekonomian desa
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    Mewujudkan tata kelola pemerintahan yang baik, bersih, dan transparan
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    Melestarikan lingkungan hidup dan menjaga keberlanjutan ekosistem
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    Meningkatkan infrastruktur dan sarana prasarana desa
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    Mengembangkan potensi wisata desa untuk meningkatkan pendapatan masyarakat
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tujuan Pembangunan -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="modern-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-target"></i>
                            </div>
                            <h3 class="card-title">Tujuan Pembangunan Desa</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="goal-item">
                                        <div class="goal-icon">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <h5>Pendidikan Berkualitas</h5>
                                        <p>Meningkatkan akses dan kualitas pendidikan untuk semua lapisan masyarakat</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="goal-item">
                                        <div class="goal-icon">
                                            <i class="fas fa-seedling"></i>
                                        </div>
                                        <h5>Pertanian Modern</h5>
                                        <p>Mengembangkan pertanian berkelanjutan dengan teknologi modern</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="goal-item">
                                        <div class="goal-icon">
                                            <i class="fas fa-handshake"></i>
                                        </div>
                                        <h5>Pemerintahan Baik</h5>
                                        <p>Mewujudkan tata kelola pemerintahan yang akuntabel dan partisipatif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Section -->
    <section class="content-section" id="struktur-section">
        <div class="container">
            <h2 class="section-title">Struktur Organisasi Pemerintahan Desa</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/M. YASIR.jpg') }}" alt="Kepala Desa" class="org-photo">
                        <p class="org-position">Kepala Desa</p>
                        <p class="org-name">M. YASIR, S.M</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/foto sekdes.jpg') }}" alt="Sekretaris Desa" class="org-photo">
                        <p class="org-position">Sekretaris Desa</p>
                        <p class="org-name">ARISMAN, S.Pd</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/kasi kesejahtraan.jpg') }}" alt="Kasi Pemerintahan" class="org-photo">
                        <p class="org-position">Kasi Pemerintahan</p>
                        <p class="org-name">...........</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/kasi kesejahtraan.jpg') }}" alt="Kasi Kesejahteraan" class="org-photo">
                        <p class="org-position">Kasi Kesejahteraan</p>
                        <p class="org-name">HARMAWATI</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/kasi pelayanan.jpg') }}" alt="Kasi Pelayanan" class="org-photo">
                        <p class="org-position">Kasi Pelayanan</p>
                        <p class="org-name">AGUSTAN</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/kaur keuangan.jpg') }}" alt="Kaur Keuangan" class="org-photo">
                        <p class="org-position">Kaur Keuangan</p>
                        <p class="org-name">RENOLD TASLIM</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/foto perencanaan.jpg') }}" alt="Kaur Perencanaan" class="org-photo">
                        <p class="org-position">Kaur Perencanaan</p>
                        <p class="org-name">HAMZAH</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/kaur umum.jpg') }}" alt="Kaur Umum" class="org-photo">
                        <p class="org-position">Kaur Umum</p>
                        <p class="org-name">MUHAMMAD FAJARUDDIN</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/foto sekdes.jpg') }}" alt="Kepala Dusun Timbala 1" class="org-photo">
                        <p class="org-position">KEPALA DUSUN TIMBALA 1</p>
                        <p class="org-name">IRFAN</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/foto padusun 2.jpg') }}" alt="Kepala Dusun Timbala 2" class="org-photo">
                        <p class="org-position">KEPALA DUSUN TIMBALA 2</p>
                        <p class="org-name">IQRAM</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/pak dusun lapri.jpg') }}" alt="Kepala Dusun Lapri" class="org-photo">
                        <p class="org-position">KEPALA DUSUN LAPRI</p>
                        <p class="org-name">YUSALFA</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/pak dusun matirowalie.jpg') }}" alt="Kepala Dusun Mattirowalie" class="org-photo">
                        <p class="org-position">KEPALA DUSUN MATTIROWALIE</p>
                        <p class="org-name">JUSTANG</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Layanan Desa Section -->
    <section class="content-section" id="layanan-section">
        <div class="container">
            <h2 class="section-title">Layanan Desa</h2>
            
            <!-- Administrasi Kependudukan -->
            <div class="form-section">
                <h3 class="form-title"><i class="fas fa-id-card"></i> Administrasi Kependudukan</h3>
                <div class="success-message" id="success-message-admin">
                    <i class="fas fa-check-circle"></i> Pengajuan Anda telah berhasil dikirim! Kami akan memproses permohonan Anda dalam 1-3 hari kerja.
                </div>
                <form id="form-admin">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Layanan <span class="required">*</span></label>
                            <select class="form-select" required>
                                <option value="">Pilih Jenis Layanan</option>
                                <option value="ktp">Kartu Tanda Penduduk (KTP)</option>
                                <option value="kk">Kartu Keluarga (KK)</option>
                                <option value="akta-kelahiran">Akta Kelahiran</option>
                                <option value="akta-kematian">Akta Kematian</option>
                                <option value="pindah">Surat Keterangan Pindah</option>
                                <option value="datang">Surat Keterangan Datang</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIK <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="Masukkan 16 digit NIK" maxlength="16" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tempat, Tanggal Lahir <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="Contoh: Jakarta, 01-01-1990" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin <span class="required">*</span></label>
                            <select class="form-select" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Alamat Lengkap <span class="required">*</span></label>
                            <textarea class="form-control" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No. Telepon <span class="required">*</span></label>
                            <input type="tel" class="form-control" placeholder="Masukkan nomor telepon aktif" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan email (opsional)">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Upload KTP/KK Lama</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Upload Pas Foto</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Keterangan Tambahan</label>
                            <textarea class="form-control" rows="3" placeholder="Masukkan keterangan tambahan jika ada"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i> Kirim Pengajuan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Surat-Surat Desa -->
            <div class="form-section">
                <h3 class="form-title"><i class="fas fa-file-alt"></i> Surat-Surat Desa</h3>
                <div class="success-message" id="success-message-surat">
                    <i class="fas fa-check-circle"></i> Pengajuan surat Anda telah berhasil dikirim! Silakan ambil surat di kantor desa dalam 1-2 hari kerja.
                </div>
                <form id="form-surat">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Surat <span class="required">*</span></label>
                            <select class="form-select" required>
                                <option value="">Pilih Jenis Surat</option>
                                <option value="domisili">Surat Keterangan Domisili</option>
                                <option value="usaha">Surat Keterangan Usaha</option>
                                <option value="belum-menikah">Surat Keterangan Belum Menikah</option>
                                <option value="penghasilan">Surat Keterangan Penghasilan</option>
                                <option value="keramaian">Surat Izin Keramaian</option>
                                <option value="bepergian">Surat Izin Bepergian</option>
                                <option value="tidak-mampu">Surat Keterangan Tidak Mampu</option>
                                <option value="lahir">Surat Keterangan Lahir</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIK <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="Masukkan 16 digit NIK" maxlength="16" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tempat, Tanggal Lahir <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="Contoh: Jakarta, 01-01-1990" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin <span class="required">*</span></label>
                            <select class="form-select" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pekerjaan <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="Masukkan pekerjaan" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Alamat Lengkap <span class="required">*</span></label>
                            <textarea class="form-control" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No. Telepon <span class="required">*</span></label>
                            <input type="tel" class="form-control" placeholder="Masukkan nomor telepon aktif" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Keperluan Surat <span class="required">*</span></label>
                            <textarea class="form-control" rows="3" placeholder="Jelaskan keperluan pembuatan surat" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Upload KTP/KK</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i> Kirim Pengajuan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Layanan Lainnya -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="info-card">
                        <h4><i class="fas fa-hand-holding-usd"></i> Bantuan Sosial</h4>
                        <p>Pelayanan pendataan dan penyaluran bantuan sosial seperti PKH, BPNT, dan BLT Desa.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-card">
                        <h4><i class="fas fa-seedling"></i> Pertanian</h4>
                        <p>Pembinaan dan bantuan untuk kelompok tani, penyediaan bibit unggul, dan pelatihan pertanian modern.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-card">
                        <h4><i class="fas fa-store"></i> UMKM</h4>
                        <p>Pelatihan kewirausahaan, bantuan modal usaha, dan promosi produk UMKM desa.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-card">
                        <h4><i class="fas fa-heartbeat"></i> Kesehatan</h4>
                        <p>Pelayanan kesehatan dasar melalui posyandu, penyuluhan kesehatan, dan kerjasama dengan puskesmas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kontak Section -->
    <section class="content-section" id="kontak-section">
        <div class="container">
            <h2 class="section-title">Kontak Desa Timbala</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-map-marker-alt"></i> Alamat</h4>
                        <p>Kantor Desa Timbala<br>
                        Jl. Poros Kolaka-Bombana, Dusun Timbala I<br>
                        Kecamatan Poleang Barat, Kabupaten Bombana<br>
                        Sulawesi Tenggara 93772</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-phone"></i> Kontak</h4>
                        <p>Telepon: (0405) 123456<br>
                        Email: desatimbalabersatu77@gmail.com<br>
                        Website: www.desatimbala.bombana.com</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-clock"></i> Jam Layanan</h4>
                        <p>Senin - Jumat: 08.00 - 15.00 WIB<br>
                        Sabtu: 08.00 - 11.00 WIB<br>
                        Minggu: Tutup</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-map"></i> Peta Lokasi</h4>
                        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.0948158658!2d121.4761815!3d-4.6453071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNMKwMzgnNDMuMSJTIDEyMcKwMjgnMzQuMyJF!5e0!3m2!1sen!2sid!4v1234567890" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Admin Dashboard -->
    <div class="admin-dashboard" id="admin-dashboard">
        <header class="admin-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="mb-0"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</h4>
                    </div>
                    <div class="col-auto">
                        <span class="me-3">Selamat datang, <strong id="admin-name">Admin</strong></span>
                        <button class="btn-logout" onclick="logout()">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <nav class="admin-sidebar">
            <div class="admin-menu">
                <a href="#" class="admin-menu-item active" onclick="showAdminPanel('dashboard')">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="#" class="admin-menu-item" onclick="showAdminPanel('publikasi')">
                    <i class="fas fa-newspaper"></i> Publikasi
                </a>
                <a href="#" class="admin-menu-item" onclick="showAdminPanel('layanan')">
                    <i class="fas fa-concierge-bell"></i> Layanan
                </a>
                <a href="#" class="admin-menu-item" onclick="showAdminPanel('pengajuan')">
                    <i class="fas fa-clipboard-list"></i> Pengajuan
                </a>
                <a href="#" class="admin-menu-item" onclick="showAdminPanel('pengunjung')">
                    <i class="fas fa-users"></i> Pengunjung
                </a>
                <a href="#" class="admin-menu-item" onclick="showAdminPanel('settings')">
                    <i class="fas fa-cog"></i> Pengaturan
                </a>
            </div>
        </nav>
        <main class="admin-content">
            <!-- Dashboard Panel -->
            <div id="dashboard-panel" class="admin-panel-content">
                <div class="admin-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="stat-number">24</div>
                        <div class="stat-label">Total Publikasi</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="stat-number">156</div>
                        <div class="stat-label">Pengajuan Layanan</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-number">1,234</div>
                        <div class="stat-label">Pengunjung</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="stat-number">5,678</div>
                        <div class="stat-label">Total Views</div>
                    </div>
                </div>
                <div class="admin-panel">
                    <div class="admin-panel-title">
                        <span><i class="fas fa-chart-line"></i> Aktivitas Terkini</span>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenis Aktivitas</th>
                                    <th>Detail</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>20 Nov 2024</td>
                                    <td>Pengajuan KTP</td>
                                    <td>Ahmad Suryadi</td>
                                    <td><span class="badge bg-warning">Proses</span></td>
                                </tr>
                                <tr>
                                    <td>19 Nov 2024</td>
                                    <td>Upload Publikasi</td>
                                    <td>APBDES 2024</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td>18 Nov 2024</td>
                                    <td>Pengajuan Surat Domisili</td>
                                    <td>Siti Nurhaliza</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td>17 Nov 2024</td>
                                    <td>Komentar Wisata</td>
                                    <td>Air Terjun Timbala</td>
                                    <td><span class="badge bg-info">Baru</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Publikasi Panel -->
            <div id="publikasi-panel" class="admin-panel-content" style="display: none;">
                <div class="admin-panel">
                    <div class="admin-panel-title">
                        <span><i class="fas fa-newspaper"></i> Manajemen Publikasi</span>
                        <button class="btn-add" onclick="showAddPublikasi()">
                            <i class="fas fa-plus"></i> Tambah Publikasi
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Jenis</th>
                                    <th>Tahun</th>
                                    <th>Tanggal Upload</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>APBDES Tahun 2024</td>
                                    <td>APBDES</td>
                                    <td>2024</td>
                                    <td>20 Nov 2024</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn-delete"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>RPJMDES 2021-2026</td>
                                    <td>RPJMDES</td>
                                    <td>2021</td>
                                    <td>15 Nov 2024</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn-delete"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Layanan Panel -->
            <div id="layanan-panel" class="admin-panel-content" style="display: none;">
                <div class="admin-panel">
                    <div class="admin-panel-title">
                        <span><i class="fas fa-concierge-bell"></i> Manajemen Layanan</span>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nama Layanan</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Pengajuan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Administrasi Kependudukan</td>
                                    <td>Layanan Umum</td>
                                    <td>45</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn-delete"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Surat-Surat Desa</td>
                                    <td>Layanan Umum</td>
                                    <td>38</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn-delete"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Pengajuan Panel -->
            <div id="pengajuan-panel" class="admin-panel-content" style="display: none;">
                <div class="admin-panel">
                    <div class="admin-panel-title">
                        <span><i class="fas fa-clipboard-list"></i> Daftar Pengajuan</span>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Jenis Layanan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>20 Nov 2024</td>
                                    <td>Ahmad Suryadi</td>
                                    <td>KTP Baru</td>
                                    <td><span class="badge bg-warning">Proses</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-edit"><i class="fas fa-eye"></i> Detail</button>
                                            <button class="btn-delete"><i class="fas fa-check"></i> Selesai</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>19 Nov 2024</td>
                                    <td>Siti Nurhaliza</td>
                                    <td>Surat Domisili</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-edit"><i class="fas fa-eye"></i> Detail</button>
                                            <button class="btn-delete"><i class="fas fa-download"></i> Download</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Pengunjung Panel -->
            <div id="pengunjung-panel" class="admin-panel-content" style="display: none;">
                <div class="admin-panel">
                    <div class="admin-panel-title">
                        <span><i class="fas fa-users"></i> Statistik Pengunjung</span>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Page Views</th>
                                    <th>Unique Visitors</th>
                                    <th>Halaman Populer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>20 Nov 2024</td>
                                    <td>234</td>
                                    <td>89</td>
                                    <td>Profil Desa</td>
                                </tr>
                                <tr>
                                    <td>19 Nov 2024</td>
                                    <td>189</td>
                                    <td>76</td>
                                    <td>Wisata Desa</td>
                                </tr>
                                <tr>
                                    <td>18 Nov 2024</td>
                                    <td>156</td>
                                    <td>65</td>
                                    <td>Publikasi</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Settings Panel -->
            <div id="settings-panel" class="admin-panel-content" style="display: none;">
                <div class="admin-panel">
                    <div class="admin-panel-title">
                        <span><i class="fas fa-cog"></i> Pengaturan</span>
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Desa</label>
                                <input type="text" class="form-control" value="Desa Timbala">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kepala Desa</label>
                                <input type="text" class="form-control" value="M. YASIR, S.M">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="desatimbalabersatu77@gmail.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="text" class="form-control" value="(0405) 123456">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" rows="3">Jl. Poros Kolaka-Bombana, Dusun Timbala I, Kecamatan Poleang Barat, Kabupaten Bombana, Sulawesi Tenggara 93772</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-save"></i> Simpan Pengaturan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar menu
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }
        // Show login modal
        function showLoginModal() {
            document.getElementById('login-modal').classList.add('active');
            toggleMenu(); // Close sidebar
        }
        // Close login modal
        function closeLoginModal() {
            document.getElementById('login-modal').classList.remove('active');
            document.getElementById('login-form').reset();
            document.getElementById('login-error').classList.remove('show');
        }
        // Show content section
        function showSection(sectionName) {
            // Hide all sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            // Hide home section
            document.getElementById('home-section').style.display = 'none';
            // Show selected section
            const targetSection = document.getElementById(sectionName + '-section');
            if (targetSection) {
                targetSection.classList.add('active');
            }
            // Close sidebar
            toggleMenu();
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        // Show home section
        function showHome() {
            // Hide all sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            // Show home section
            document.getElementById('home-section').style.display = 'block';
            // Close sidebar
            toggleMenu();
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        
        // Show Visi & Misi section
        function showVisimisi() {
            showSection('visimisi');
        }
        // Show publikasi content
        function showPublikasi(type) {
            // Hide all publikasi content
            const contents = document.querySelectorAll('.publikasi-content');
            contents.forEach(content => {
                content.classList.remove('active');
            });
            // Remove active class from all tabs
            const tabs = document.querySelectorAll('.publikasi-tab');
            tabs.forEach(tab => {
                tab.classList.remove('active');
            });
            // Show selected content
            const targetContent = document.getElementById(type + '-content');
            if (targetContent) {
                targetContent.classList.add('active');
            }
            // Add active class to clicked tab
            event.target.classList.add('active');
        }
        // Show admin panel
        function showAdminPanel(panelName) {
            // Hide all panels
            const panels = document.querySelectorAll('.admin-panel-content');
            panels.forEach(panel => {
                panel.style.display = 'none';
            });
            // Remove active class from all menu items
            const menuItems = document.querySelectorAll('.admin-menu-item');
            menuItems.forEach(item => {
                item.classList.remove('active');
            });
            // Show selected panel
            const targetPanel = document.getElementById(panelName + '-panel');
            if (targetPanel) {
                targetPanel.style.display = 'block';
            }
            // Add active class to clicked menu item
            event.target.classList.add('active');
        }
        // Update form fields based on publication type
        function updateFormFields() {
            const jenisPublikasi = document.getElementById('jenis-publikasi').value;
            const dynamicFields = document.getElementById('dynamic-fields');
            
            // Clear existing dynamic fields
            dynamicFields.innerHTML = '';
            
            // Add specific fields based on publication type
            switch(jenisPublikasi) {
                case 'apbdes':
                    addFieldGroup(dynamicFields, 'Total Anggaran', 'text', 'total-anggaran', 'Masukkan total anggaran (Rp)');
                    addFieldGroup(dynamicFields, 'Pendapatan Desa', 'number', 'pendapatan-desa', 'Masukkan jumlah pendapatan desa');
                    addFieldGroup(dynamicFields, 'Belanja Desa', 'number', 'belanja-desa', 'Masukkan jumlah belanja desa');
                    break;
                case 'rpjmdes':
                    addFieldGroup(dynamicFields, 'Tahun Mulai', 'number', 'tahun-mulai', 'Masukkan tahun mulai RPJMDES');
                    addFieldGroup(dynamicFields, 'Tahun Selesai', 'number', 'tahun-selesai', 'Masukkan tahun selesai RPJMDES');
                    addFieldGroup(dynamicFields, 'Visi', 'textarea', 'visi', 'Masukkan visi RPJMDES');
                    break;
                case 'rkpdes':
                    addFieldGroup(dynamicFields, 'Jumlah Kegiatan', 'number', 'jumlah-kegiatan', 'Masukkan jumlah kegiatan');
                    addFieldGroup(dynamicFields, 'Total Anggaran', 'text', 'total-anggaran', 'Masukkan total anggaran (Rp)');
                    break;
                case 'add':
                    addFieldGroup(dynamicFields, 'Jumlah ADD', 'text', 'jumlah-add', 'Masukkan jumlah ADD (Rp)');
                    addFieldGroup(dynamicFields, 'Sumber Dana', 'text', 'sumber-dana', 'Masukkan sumber dana');
                    break;
                case 'dds':
                    addFieldGroup(dynamicFields, 'Jumlah Dana Desa', 'text', 'jumlah-dds', 'Masukkan jumlah dana desa (Rp)');
                    addFieldGroup(dynamicFields, 'Realisasi', 'text', 'realisasi', 'Masukkan realisasi (Rp)');
                    break;
                case 'produk-hukum':
                    addFieldGroup(dynamicFields, 'Jenis Peraturan', 'text', 'jenis-peraturan', 'Contoh: Peraturan Desa');
                    addFieldGroup(dynamicFields, 'Tentang', 'textarea', 'tentang', 'Masukkan tentang peraturan');
                    break;
                case 'sk-kepala-desa':
                    addFieldGroup(dynamicFields, 'Tentang', 'textarea', 'tentang', 'Masukkan tentang surat keputusan');
                    addFieldGroup(dynamicFields, 'Dasar Hukum', 'text', 'dasar-hukum', 'Masukkan dasar hukum');
                    break;
            }
        }
        // Add field group to dynamic fields
        function addFieldGroup(container, label, type, id, placeholder) {
            const fieldGroup = document.createElement('div');
            fieldGroup.className = 'field-group';
            
            const labelElement = document.createElement('label');
            labelElement.className = 'form-label';
            labelElement.textContent = label;
            
            const inputElement = document.createElement(type === 'textarea' ? 'textarea' : 'input');
            inputElement.className = 'form-control';
            inputElement.id = id;
            inputElement.placeholder = placeholder;
            if (type === 'textarea') {
                inputElement.rows = 3;
            } else {
                inputElement.type = type;
            }
            
            fieldGroup.appendChild(labelElement);
            fieldGroup.appendChild(inputElement);
            container.appendChild(fieldGroup);
        }
        // Login functionality
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('login-error');
            
            // Simple validation (in real app, this should be server-side)
            if (username === 'admin' && password === 'admin123') {
                // Successful login
                document.body.classList.add('admin-logged-in');
                document.getElementById('admin-dashboard').classList.add('active');
                document.getElementById('admin-name').textContent = username;
                
                // Close modal
                closeLoginModal();
                
                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                // Failed login
                errorMessage.classList.add('show');
                
                // Hide error message after 3 seconds
                setTimeout(() => {
                    errorMessage.classList.remove('show');
                }, 3000);
            }
        });
        // Logout functionality
        function logout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.body.classList.remove('admin-logged-in');
                document.getElementById('admin-dashboard').classList.remove('active');
                
                // Reset to home page
                showHome();
            }
        }
        // Show add publikasi form
        function showAddPublikasi() {
            alert('Form tambah publikasi akan muncul di sini. Fitur ini dapat dikembangkan lebih lanjut.');
        }
        // Form submission handlers
        document.getElementById('form-admin').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show success message
            const successMessage = document.getElementById('success-message-admin');
            successMessage.classList.add('show');
            
            // Reset form
            this.reset();
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.classList.remove('show');
            }, 5000);
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        document.getElementById('form-surat').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show success message
            const successMessage = document.getElementById('success-message-surat');
            successMessage.classList.add('show');
            
            // Reset form
            this.reset();
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.classList.remove('show');
            }, 5000);
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        document.getElementById('form-publikasi').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show success message
            const successMessage = document.getElementById('success-message-publikasi');
            successMessage.classList.add('show');
            
            // Reset form
            this.reset();
            
            // Clear dynamic fields
            document.getElementById('dynamic-fields').innerHTML = '';
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.classList.remove('show');
            }, 5000);
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        // Close modal when clicking outside
        document.getElementById('login-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLoginModal();
            }
        });
        // Close sidebar when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                const loginModal = document.getElementById('login-modal');
                
                if (sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                }
                
                if (loginModal.classList.contains('active')) {
                    closeLoginModal();
                }
            }
        });
        // Input formatting for NIK
        document.querySelectorAll('input[maxlength="16"]').forEach(input => {
            input.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '');
            });
        });
    </script>
    <script>
    // Base URL untuk API
    const API_URL = 'backend/api/';
    
    // Fungsi untuk login admin
    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        
        fetch(API_URL + 'auth.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username: username,
                password: password
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Simpan data admin di session storage
                sessionStorage.setItem('admin', JSON.stringify(data.data));
                
                // Redirect ke halaman admin
                window.location.href = 'backend/admin/index.php';
            } else {
                // Tampilkan pesan error
                document.getElementById('login-error').classList.add('show');
                
                // Sembunyikan pesan error setelah 3 detik
                setTimeout(() => {
                    document.getElementById('login-error').classList.remove('show');
                }, 3000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    
    // Fungsi untuk mengirim form pengajuan administrasi
    document.getElementById('form-admin').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const data = {};
        
        // Konversi FormData ke objek
        for (let [key, value] of formData.entries()) {
            data[key] = value;
        }
        
        // Tambahkan file jika ada
        const fileInputs = this.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            if (input.files.length > 0) {
                data[input.name] = input.files[0];
            }
        });
        
        // Kirim data ke server
        fetch(API_URL + 'pengajuan.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Tampilkan pesan sukses
                document.getElementById('success-message-admin').classList.add('show');
                
                // Reset form
                this.reset();
                
                // Sembunyikan pesan sukses setelah 5 detik
                setTimeout(() => {
                    document.getElementById('success-message-admin').classList.remove('show');
                }, 5000);
            } else {
                alert('Gagal mengirim pengajuan: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    
    // Fungsi untuk mengirim form pengajuan surat
    document.getElementById('form-surat').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const data = {};
        
        // Konversi FormData ke objek
        for (let [key, value] of formData.entries()) {
            data[key] = value;
        }
        
        // Tambahkan file jika ada
        const fileInputs = this.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            if (input.files.length > 0) {
                data[input.name] = input.files[0];
            }
        });
        
        // Kirim data ke server
        fetch(API_URL + 'pengajuan.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Tampilkan pesan sukses
                document.getElementById('success-message-surat').classList.add('show');
                
                // Reset form
                this.reset();
                
                // Sembunyikan pesan sukses setelah 5 detik
                setTimeout(() => {
                    document.getElementById('success-message-surat').classList.remove('show');
                }, 5000);
            } else {
                alert('Gagal mengirim pengajuan: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    
    // Fungsi untuk mengirim form publikasi
    document.getElementById('form-publikasi').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const data = {};
        
        // Konversi FormData ke objek
        for (let [key, value] of formData.entries()) {
            data[key] = value;
        }
        
        // Kirim data ke server
        fetch(API_URL + 'publikasi.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Tampilkan pesan sukses
                document.getElementById('success-message-publikasi').classList.add('show');
                
                // Reset form
                this.reset();
                
                // Sembunyikan pesan sukses setelah 5 detik
                setTimeout(() => {
                    document.getElementById('success-message-publikasi').classList.remove('show');
                }, 5000);
            } else {
                alert('Gagal menyimpan publikasi: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    
    // Fungsi untuk memuat data publikasi
    function loadPublikasi(jenis = '') {
        let url = API_URL + 'publikasi.php';
        
        if (jenis) {
            url += '?jenis=' + jenis;
        }
        
        fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Tampilkan data publikasi
                const publikasiContainer = document.getElementById(jenis + '-content');
                
                if (publikasiContainer) {
                    let html = '';
                    
                    data.data.forEach(item => {
                        html += `
                            <div class="publikasi-item">
                                <div class="publikasi-header">
                                    <h3 class="publikasi-title">${item.judul}</h3>
                                    <span class="publikasi-year">${item.tahun}</span>
                                </div>
                                <div class="publikasi-info">
                                    <i class="fas fa-calendar"></i> Ditetapkan: ${new Date(item.tanggal_penetapan).toLocaleDateString('id-ID')} | 
                                    <i class="fas fa-file-${item.format_file.toLowerCase()}"></i> Format: ${item.format_file} | 
                                    <i class="fas fa-download"></i> Ukuran: ${item.ukuran_file} MB
                                </div>
                                <div class="publikasi-description">
                                    ${item.deskripsi}
                                </div>
                                <div class="publikasi-actions">
                                    <button class="btn-download" onclick="downloadFile('${item.file_path}')">
                                        <i class="fas fa-download"></i> Download
                                    </button>
                                    <button class="btn-view" onclick="viewDetail('${item.id}')">
                                        <i class="fas fa-eye"></i> Lihat Detail
                                    </button>
                                </div>
                            </div>
                        `;
                    });
                    
                    publikasiContainer.innerHTML = html;
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    
    // Fungsi untuk mendownload file
    function downloadFile(filePath) {
        window.open(filePath, '_blank');
    }
    
    // Fungsi untuk melihat detail
    function viewDetail(id) {
        alert('Detail untuk ID: ' + id);
    }
    
    // Fungsi untuk mencatat pengunjung
    function trackVisitor() {
        fetch(API_URL + 'pengunjung.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                page_views: 1,
                unique_visitors: 1,
                halaman_populer: window.location.pathname
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Visitor tracked:', data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    
    // Track visitor saat halaman dimuat
    trackVisitor();
</script>
</body>
</html>