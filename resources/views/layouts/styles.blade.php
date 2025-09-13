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
        top: 20px;
        right: 20px;
        z-index: 998;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 15px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 249, 250, 0.95));
        padding: 15px 20px;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .logo-item {
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
        border-radius: 15px;
        padding: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid var(--secondary-color);
        position: relative;
        overflow: hidden;
    }
    .logo-item:hover {
        transform: scale(1.1) translateY(-2px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        border-color: var(--primary-color);
        background: linear-gradient(135deg, #ffffff, #e8f5e8);
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
    
    /* Sidebar Menu */
    .sidebar {
        position: fixed;
        top: 0;
        left: -320px;
        width: 320px;
        height: 100vh;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
        box-shadow: 4px 0 20px rgba(0,0,0,0.15);
        display: flex;
        flex-direction: column;
        border-right: 3px solid rgba(255, 255, 255, 0.1);
    }
    .sidebar.active {
        left: 0;
    }
    .sidebar-header {
        padding: 30px 25px;
        background: linear-gradient(135deg, rgba(0,0,0,0.2), rgba(0,0,0,0.1));
        color: white;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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
        padding: 18px 25px;
        color: white;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-left: 4px solid transparent;
        position: relative;
        font-weight: 500;
    }
    .menu-item:hover {
        background: linear-gradient(90deg, rgba(255,255,255,0.15), rgba(255,255,255,0.05));
        border-left-color: var(--accent-color);
        padding-left: 35px;
        transform: translateX(5px);
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
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        padding: 15px 18px;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        font-size: 1.1rem;
    }
    .menu-toggle:hover {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
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
    
    /* Footer */
    footer {
        background: linear-gradient(135deg, var(--primary-color) 0%, #1a4a1c 100%);
        color: white;
        padding: 50px 0 30px;
        text-align: center;
        margin-top: 80px;
        position: relative;
        overflow: hidden;
    }
    
    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--secondary-color), var(--accent-color), var(--secondary-color));
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
        font-size: 1.8rem;
        margin: 0 15px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-block;
        padding: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
    }
    .social-links a:hover {
        color: var(--accent-color);
        transform: translateY(-3px) scale(1.1);
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
        .logo-item {
            width: 60px;
            height: 60px;
        }
        .logo-corner {
            gap: 10px;
            padding: 8px 12px;
        }
    }
</style>
