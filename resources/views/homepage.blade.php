<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Desa Timbala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c5f2d;
            --secondary-color: #97bc62;
            --accent-color: #f9bc60;
            --text-dark: #333;
            --text-light: #666;
            --bg-light: #f8f9fa;
            --admin-bg: #f5f5f5;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
        }
        
        /* Logo Corner - Fixed Position - Horizontal Layout */
        .logo-corner {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 998;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 15px;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px 15px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            backdrop-filter: blur(5px);
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
        
        /* Village Head Section - Modified */
        .village-head-section {
            padding: 60px 0;
            background: var(--bg-light);
            margin-top: 20px;
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
            max-height: 500px;
            overflow-y: auto;
        }
        
        /* Custom Scrollbar for News Card */
        .news-card::-webkit-scrollbar {
            width: 6px;
        }
        
        .news-card::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .news-card::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }
        
        .news-card::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-color);
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
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 10px;
            border: 3px solid var(--secondary-color);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
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
        .head-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 5px solid var(--secondary-color);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .logo-corner {
                position: relative;
                top: auto;
                right: auto;
                flex-direction: row;
                justify-content: center;
                margin-bottom: 20px;
                z-index: 1;
                width: 100%;
                max-width: 400px;
                margin-left: auto;
                margin-right: auto;
            }
        }
        
        @media (max-width: 768px) {
            .news-card, .regent-card, .village-head-card {
                margin-bottom: 20px;
            }
            .regent-photos {
                flex-direction: column;
                gap: 15px;
            }
            .regent-item {
                display: flex;
                align-items: center;
                text-align: left;
                gap: 15px;
                padding: 10px;
                background: rgba(151, 188, 98, 0.1);
                border-radius: 10px;
            }
            .regent-photo {
                width: 80px;
                height: 80px;
                flex-shrink: 0;
            }
            .regent-name {
                font-size: 0.9rem;
                margin-bottom: 3px;
            }
            .regent-position {
                font-size: 0.8rem;
                margin: 0;
            }
            .logo-item {
                width: 60px;
                height: 60px;
            }
            .logo-corner {
                gap: 10px;
                padding: 8px 12px;
            }
        }
        
        @media (max-width: 480px) {
            .regent-item {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            .regent-photo {
                width: 70px;
                height: 70px;
            }
            .regent-name {
                font-size: 0.85rem;
            }
            .regent-position {
                font-size: 0.75rem;
            }
        }
        
        /* Existing styles remain unchanged */
        /* Sidebar Menu */
        .sidebar {
            position: fixed;
            top: 0;
            left: -300px;
            width: 300px;
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            transition: left 0.3s ease;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }
        .sidebar.active {
            left: 0;
        }
        .sidebar-header {
            padding: 20px;
            background: rgba(0,0,0,0.1);
            color: white;
            text-align: center;
        }
        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
        }
        .sidebar-menu {
            padding: 20px 0;
            flex: 1;
            overflow-y: auto;
        }
        .menu-item {
            display: block;
            padding: 15px 25px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        .menu-item:hover {
            background: rgba(255,255,255,0.1);
            border-left-color: var(--accent-color);
            padding-left: 35px;
        }
        .menu-item i {
            margin-right: 10px;
            width: 20px;
        }
        .menu-item.admin-login {
            margin-top: auto;
            background: rgba(0,0,0,0.2);
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .menu-item.admin-login:hover {
            background: rgba(0,0,0,0.3);
        }
        /* Menu Toggle Button */
        .menu-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .menu-toggle:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
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
        /* Hero Section */
        .hero-section {
            position: relative;
            height: 90vh;
            min-height: 400px;
            background: url('{{ asset("images/pantai 5.jpg") }}') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.5));
        }
        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            animation: fadeInUp 1s ease;
        }
        .hero-subtitle {
            font-size: 1.5rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
            animation: fadeInUp 1s ease 0.2s;
            animation-fill-mode: both;
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
        /* Footer */
        footer {
            background: var(--primary-color);
            color: white;
            padding: 30px 0;
            text-align: center;
            margin-top: 50px;
        }
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .social-links {
            margin-top: 20px;
        }
        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: var(--accent-color);
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
            <div class="logo-label">KabupatenBombana</div>
        </div>
        <div class="logo-item">
            <img src="{{ asset('images/l 3.png') }}" alt="Logo BUMDes">
            <div class="logo-label">Kemendes</div>
        </div>
    </div>
    
    <!-- Menu Toggle Button -->
    <button class="menu-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Sidebar Menu -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-landmark"></i> Desa Timbala</h3>
        </div>
        <div class="sidebar-menu">
            <a href="/" class="menu-item" onclick="showHome()">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="/profil" class="menu-item" onclick="showSection('profil')">
                <i class="fas fa-info-circle"></i> Profil Desa
            </a>
            <a href="/sejarah" class="menu-item" onclick="showSection('sejarah')">
                <i class="fas fa-history"></i> Sejarah Desa
            </a>
            <a href="/wisata" class="menu-item" onclick="showSection('wisata')">
                <i class="fas fa-camera"></i> Wisata Desa
            </a>
            <a href="/publikasi" class="menu-item" onclick="showSection('publikasi')">
                <i class="fas fa-newspaper"></i> Publikasi
            </a>
            <a href="/visimisi" class="menu-item" onclick="showSection('visimisi')">
                <i class="fas fa-bullseye"></i> Visi & Misi
            </a>
            <a href="/struktur" class="menu-item" onclick="showSection('struktur')">
                <i class="fas fa-sitemap"></i> Struktur Organisasi
            </a>
            <a href="/layanan" class="menu-item" onclick="showSection('layanan')">
                <i class="fas fa-concierge-bell"></i> Layanan Desa
            </a>
            <a href="/kontak" class="menu-item" onclick="showSection('kontak')">
                <i class="fas fa-phone"></i> Kontak
            </a>
        </div>
        <a href="/login" class="menu-item admin-login" onclick="showLoginModal()">
            <i class="fas fa-user-shield"></i> Login Admin
        </a>
    </nav>
    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="toggleMenu()"></div>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">DESA TIMBALA</h1>
            <p class="hero-subtitle">Timbala Bersatu</p>
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
    <!-- Village Head Section - Modified -->
    <section class="village-head-section" id="home-section">
        <div class="container">
            <div class="row">
                <!-- News Card - Left Column -->
                <div class="col-lg-4 col-md-5 mb-4">
                    <div class="news-card">
                        <div class="news-header">
                            <i class="fas fa-newspaper"></i>
                            <h3>Berita Desa</h3>
                        </div>
                        @forelse($news as $item)
                        <div class="news-item">
                            <h4 class="news-title" onclick="window.location.href='{{ route('news.detail', $item->slug) }}'">{{ $item->title }}</h4>
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> {{ $item->formatted_published_at }}</span>
                                <span class="news-source">{{ ucfirst($item->category) }}</span>
                            </div>
                            <a href="{{ route('news.detail', $item->slug) }}" class="news-link">
                                Baca selengkapnya <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                        @empty
                        <div class="news-item">
                            <h4 class="news-title">Belum ada berita</h4>
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> -</span>
                                <span class="news-source">Admin</span>
                            </div>
                            <p class="text-muted">Berita akan segera hadir di sini.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                
                <!-- Village Head Card - Middle Column -->
                <div class="col-lg-4 col-md-5 mb-4">
                    <div class="village-head-card">
                        <img src="{{ asset('images/M. YASIR.jpg') }}" alt="Kepala Desa" class="head-photo">
                        <h2 class="head-name">M. YASIR, S.M</h2>
                        <p class="head-position">Kepala Desa Timbala</p>
                        <div class="welcome-message">
                            <p>Assalamualaikum Warahmatullahi Wabarakatuh,</p>
                            <p>Selamat datang di Sistem Informasi Desa Timbala. Sebagai Kepala Desa, saya mengucapkan terima kasih atas kunjungan Anda di website resmi desa kami. Website ini hadir sebagai wujud komitmen kami dalam mewujudkan transparansi dan pelayanan prima kepada seluruh masyarakat Desa Timbala.</p>
                            <p>Melalui platform ini, kami berharap dapat memberikan informasi yang akurat dan terkini seputar kegiatan desa, program pembangunan, serta berbagai layanan yang tersedia untuk masyarakat. Mari kita bersama-sama membangun Desa Timbala yang lebih baik, maju, dan sejahtera.</p>
                            <p>Wassalamualaikum Warahmatullahi Wabarakatuh.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Regent Card - Right Column -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="regent-card">
                        <div class="regent-header">
                            <h3>Pemerintah Kabupaten</h3>
                        </div>
                        <div class="regent-photos">
                            <div class="regent-item">
                                <img src="{{ asset('images/bupati.jpg') }}" alt="Bupati Bombana" class="regent-photo">
                                <h4 class="regent-name">Ir. H. BURHANUDDIN. M.Si</h4>
                                <p class="regent-position">Bupati Bombana</p>
                            </div>
                            <div class="regent-item">
                                <img src="{{ asset('images/wakil bupati.jpg') }}" alt="Wakil Bupati Bombana" class="regent-photo">
                                <h4 class="regent-name">AHMAD YANI, S.Pd., M.Pd</h4>
                                <p class="regent-position">Wakil Bupati Bombana</p>
                            </div>    
                            <div class="regent-item">
                                <img src="{{ asset('images/ketua TP-PKK Kab. Bombana.jpg') }}" alt="Wakil Bupati Bombana" class="regent-photo">
                                <h4 class="regent-name">Hj.FATMAWATI KASIM MAREWA, S. Sos</h4>
                                <p class="regent-position">Ketua TP-PKK Kab. Bombana</p>
                            </div>
                            <div class="regent-item">
                                <img src="{{ asset('images/ibu kades.jpg') }}" alt="Wakil Bupati Bombana" class="regent-photo">
                                <h4 class="regent-name">Hj. FITRIAH YASIR</h4>
                                <p class="regent-position">Ketua TP-PKK Desa Timbala</p>          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Profil Desa Section -->
    <section class="content-section" id="profil-section">
        <div class="container">
            <h2 class="section-title">Profil Desa Timbala</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-map-marker-alt"></i> Letak Geografis</h4>
                        <p>Desa Timbala terletak di Kecamatan Poleang Barat, Kabupaten Bombana. Desa ini memiliki luas wilayah sebesar 12,25 Km dengan ketinggian ketinggian ± 10 dp] di atas permukaan laut. Batas-batas desa meliputi sebelah utara Desa Matabundu, sebelah selatan Desa Bulumanai, sebelah timur Desa Ranokomea, dan sebelah barat Teluk Bone.</p>
                        
                        <div class="map-container">
                            <img src="" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></img>
                        </div>
                        
                        <div class="map-info">
                            <h5><i class="fas fa-info-circle"></i> Informasi Lokasi</h5>
                            <p><strong>Alamat:</strong> Jl. poros kolaka-bombana, Dusun Timbala I, Desa Timbala, Kecamatan Poleang Barat, Kabupaten Bombana, Sulawesi Tenggara, Kode Pos 93772</p>
                            <p><strong>Koordinat:</strong> -4.6453071, 121.4761815</p>
                            <p><strong>Buka di Google Maps:</strong> <a href="https://maps.app.goo.gl/n2frsRxw5L91B9St9?g_st=aw" target="_blank">Klik di sini</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-users"></i> Demografi</h4>
                        <p>Jumlah penduduk Desa Timbala saat ini adalah 1461 jiwa yang terdiri dari 764 laki-laki dan 705 perempuan. Mayoritas penduduk bekerja di sektor pertanian dan perikanan.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-industry"></i> Potensi Desa</h4>
                        <p>Potensi di bidang pertanian dan perkebunan merupakan potensi unggulan yang terdapat di Desa Timbala. Komoditas jambu mete, jagung, singkong, Pisang, tanaman hortikultura sangat dominan didukung oleh lahan yang subur, iklim yang baik serta kemampuan petani dalam bidang pertanian yang memadai.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-school"></i> Sarana dan Prasarana</h4>
                        <p>Desa Timbala dilengkapi dengan berbagai fasilitas umum antara lain 1 SD Negeri, 1 TK, 1 Puskesmas Pembantu, 1 posyandu, 2 masjid, balai desa, lapangan futsal, pondok pesantren, pasar serta jalan desa yang sudah beraspal sepanjang 10 km.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sejarah Desa Section -->
    <section class="content-section" id="sejarah-section">
        <div class="container">
            <h2 class="section-title">Sejarah Desa Timbala</h2>
            <div class="info-card">
                <h4>Asal Usul Desa</h4>
                <p>Desa Timbala yang Kita Kenal saat ini, dulunya merupakan suatu wilayah perkampungan Masyarakat Moronene yang berada dalam Wilayah Desa Toari Buton.
Perkampungan suku moronene sudah ada sejak zaman dahulu sebelum indonesia merdeka dengan kondisi tanah yang subur dan ditubuhi dengan hutan yang menghijau serta berada pada dataran rendah dan dekat dengan pantai sehingga hal ini membuat para pelaut bugis dari bone selalu singgah dan pada akhirnya menetap dan medirikan perkampungan peristiwa ini disebabkan karena pada saat itu kerajaan bone telah runtuh atau dikelnal dengan "Rumpa Bone" sehingga membuat penduduk setempat (moronene) tersingkir dan membuka lahan pertanian yang baru atau biasa pula hidup berpindah-pindah.
Dari tahun ketahun pemukiman yang dihuni oleh mayoritas suku bugis bone ini berkembang pesat sehingga dibagi menjadi 4 (empat) perkampungan yaitu:
    Elle buloe,
    Elle jatie,
    Kumbala,
    Bulu tababbangnge
.</p>
            </div>
            <div class="info-card">
                <h4>Pembentukan Desa</h4>
                <p>pada tahun 1977 pemerintah desa Timbala dimekarkan dari desa indik yaitu desa Toari, adapun nama desa Timbala yakni diambil dari kata Kumbala yang berarti nakal.</p>
            </div>
            <div class="info-card">
                <h4>Perkembangan Desa</h4>
                <p>Sejak berdirinya, Desa Timbala telah mengalami banyak perkembangan signifikan. Dari desa yang tadinya hanya mengandalkan pertanian tradisional, kini telah berkembang dengan adanya berbagai inovasi pertanian modern, perkembangan UMKM, serta peningkatan sumber daya manusia melalui berbagai program pendidikan dan pelatihan.</p>
            </div>
        </div>
    </section>
    <!-- Wisata Desa Section -->
    <section class="content-section" id="wisata-section">
        <div class="container">
            <h2 class="section-title">PANTAI TANJUNG INDAH TIMBALA</h2>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="wisata-card">
                        <img src="{{ asset('images/villa.jpg') }}" alt="Air Terjun Timbala" class="wisata-image">
                        <div class="wisata-content">
                            <h3 class="wisata-title">villa</h3>
                            <p class="wisata-description">villa yang berada dipantai tanjung indah timbala yang terletak tepat di tepi laut, menghadirkan suasana tenang dengan panorama biru samudra yang luas. bangunan ini dirancang untuk memberikan kenyamanan maksimal bagi wisatawan yang berkunjung.</p>
                            <div class="wisata-info">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="wisata-card">
                        <img src="{{ asset('images/wc umum.jpg') }}" alt="Hutan Pinus" class="wisata-image">
                        <div class="wisata-content">
                            <h3 class="wisata-title">WC umum</h3>
                            <p class="wisata-description">WC umum diarea pantai berfungsi sebagai sarana sanitasi bagi pengunjung. fasilitas ini disediakan untuk mendukung kenyamanan wisatawan, menjaga kebersihan lingkungan serta mencegah terjadinya pencemaran pada pantai.</p>
                            <div class="wisata-info">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="wisata-card">
                        <img src="{{ asset('images/warung.jpg') }}" alt="Sawah Terasering" class="wisata-image">
                        <div class="wisata-content">
                            <h3 class="wisata-title">Warung</h3>
                            <p class="wisata-description">warung juga menjadi salah satu fasilitas di pantaai yang berfungsi sebagai tempat penyedia makanan, minuman, dan kebutuhan ringan bagi wisatawan yang datang berkunjung. fasilitas ini tidak hanya mendukung kenyamanan pengunjung, tetpi juga memberikan manfaat ekonomi bagi masyarakat sekitar.</p>
                            <div class="wisata-info">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="wisata-card">
                        <img src="{{ asset('images/penyediaan tempat sampah.jpg') }}" alt="Kolam Renang Alami" class="wisata-image">
                        <div class="wisata-content">
                            <h3 class="wisata-title">Tempat sampah</h3>
                            <p class="wisata-description">Penyediaan tempat sampah di  pantai berguna untuk menjaga kebersihan, keindahan, dan kelestarian lingkungan. fasilitas  ini membantu pengunjung membuang sampah pada tempatnya, sehingga pantai tetap nyaman dikunjungi dan bebas dari pencemaran.</p>
                            <div class="wisata-info">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="wisata-card">
                        <img src="{{ asset('images/gedung aula serba guna.jpg') }}" alt="Bukit Sungai" class="wisata-image">
                        <div class="wisata-content">
                            <h3 class="wisata-title">Gedung aula serbaguna</h3>
                            <p class="wisata-description">Gedung aula serbaguna yang berada diarea pantai tanjung indah timbala merupakan fasilitas pendukung pariwisata dan kegiatan masyarakat. bangunan ini berfungsi sebagai tempat berkumpul, mengadakan acara, maupun pusat kegiatan yang dapat dimanfaatkan oleh wisatawan, peengelola, maupun warga setempat.</p>
                            <div class="wisata-info">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="wisata-card">
                        <img src="{{ asset('images/bale bale.jpg') }}" alt="Wisata Budaya" class="wisata-image">
                        <div class="wisata-content">
                            <h3 class="wisata-title">Bale bale</h3>
                            <p class="wisata-description">Bale bale merupakan sebutan yang sering di gunakan oleh warga timbala yang tertuju pada salah satu tempat duduk yang berbahan dasarkan kayu yang hampir meyerupai gazebo. walaupun dengan kondisi yang sederhana bale bale memiliki banyak fungsi salah satunya yaitu digunakan sebagian pengunjung atau warga untuk duduk menikmati sunset di pantai tanjung indah timbala.</p>
                            <div class="wisata-info">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Publikasi Section -->
    <section class="content-section" id="publikasi-section">
        <div class="container">
            <h2 class="section-title">Publikasi Desa</h2>
            
            <!-- Tab Navigation -->
            <div class="publikasi-tabs">
                <div class="publikasi-tab active" onclick="showPublikasi('apbdes')">APBDES</div>
                <div class="publikasi-tab" onclick="showPublikasi('rpjmdes')">RPJMDES</div>
                <div class="publikasi-tab" onclick="showPublikasi('rkpdes')">RKPDES</div>
                <div class="publikasi-tab" onclick="showPublikasi('add')">Alokasi Dana Desa</div>
                <div class="publikasi-tab" onclick="showPublikasi('dds')">Dana Desa</div>
                <div class="publikasi-tab" onclick="showPublikasi('produk-hukum')">Produk Hukum</div>
                <div class="publikasi-tab" onclick="showPublikasi('sk-kepala-desa')">SK Kepala Desa</div>
            </div>
            <!-- APBDES Content -->
            <div id="apbdes-content" class="publikasi-content active">
                <div class="publikasi-item">
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
                        <img src="https://picsum.photos/seed/budi-santoso/120/120.jpg" alt="Kasi Pemerintahan" class="org-photo">
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
                        <img src="{{ asset('images/kaur umum.jpg') }}" alt="Kaur Perencanaan" class="org-photo">
                        <p class="org-position">Kaur umum</p>
                        <p class="org-name">MUHAMMAD FAJARUDDIN</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/andi bahrun.jpg') }}" alt="Kaur Perencanaan" class="org-photo">
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
                        <img src="{{ asset('images/pak dusun lapri.jpg') }}" alt="Kaur Perencanaan" class="org-photo">
                        <p class="org-position">KEPALA DUSUN LAPRI</p>
                        <p class="org-name">YUSALFA</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="org-card">
                        <img src="{{ asset('images/pak dusun matirowalie.jpg') }}" alt="pak dusun matirowalie" class="org-photo">
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
                        Jl. Desa Timbala No. 1<br>
                        Kecamatan Example, Kabupaten Example<br>
                        Provinsi Example 12345</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-phone"></i> Kontak</h4>
                        <p>Telepon: (0274) 123456<br>
                        Email: desatimbalabersatu77@gmail.com<br>
                        Website: www.desatimbala.bombana.com</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-clock"></i> Jam Layanan</h4>
                        <p>Senin - juma'at: 08.00 - 15.00 WIB<br>
                        sabtu: 08.00 - 11.00 WIB<br>
                        Minggu: Tutup</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card">
                        <h4><i class="fas fa-map"></i> Peta Lokasi</h4>
                        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.0948158658!2d110.403638314775!3d-7.770019994368799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1i0!2i0!3f0!3m2!1i3!1i2!1m1!1s0x0%3A0x0!2zN8KwNDYnMTIuMSJTIDExMMKwMjQnMTMuMSJF!5e0!3m2!1sen!2sid!4v1234567890" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
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
                                <input type="text" class="form-control" value="Ahmad Suryadi">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="desatimbala@example.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="text" class="form-control" value="(0274) 123456">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" rows="3">Jl. Desa Timbala No. 1, Kecamatan Example, Kabupaten Example</textarea>
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
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Sistem Informasi Desa Timbala. Hak Cipta Dilindungi.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>
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

    // Function to view news
    function viewNews(id) {
        // For now, show alert. In the future, this can be a modal or separate page
        alert('Fitur detail berita akan segera tersedia. ID Berita: ' + id);
    }
</script>
</body>
</html>