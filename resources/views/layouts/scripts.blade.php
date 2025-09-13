<script>
    // Toggle sidebar menu
    function toggleMenu() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    }
    
    // Login functionality removed - now handled by separate login page
    
    // Ensure login button works properly
    document.addEventListener('DOMContentLoaded', function() {
        const loginButton = document.querySelector('.menu-item.admin-login');
        if (loginButton) {
            loginButton.addEventListener('click', function(e) {
                console.log('Login button clicked, navigating to login page');
                // Let the default link behavior handle navigation
            });
        }
    });
    
    // Show content section
    function showSection(sectionName) {
        // Hide all sections
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => {
            section.classList.remove('active');
        });
        // Hide home section
        const homeSection = document.getElementById('home-section');
        if (homeSection) {
            homeSection.style.display = 'none';
        }
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
        const homeSection = document.getElementById('home-section');
        if (homeSection) {
            homeSection.style.display = 'block';
        }
        // Close sidebar
        toggleMenu();
        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    // Login functionality removed - now handled by separate login page
    
    // Close sidebar when pressing Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            if (sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
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
