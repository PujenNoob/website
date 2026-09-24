<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Menu Test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        
        .test-header {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        
        .test-button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }
        
        .test-button:hover {
            background: #0056b3;
        }
        
        .debug-info {
            background: #e9ecef;
            padding: 1rem;
            border-radius: 4px;
            margin: 1rem 0;
            font-family: monospace;
            white-space: pre-wrap;
        }
        
        /* Mobile Menu Styles */
        .mobile-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-top: 1px solid #e9ecef;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-100%);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .mobile-menu.active {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .mobile-nav ul {
            padding: 1rem 0;
            list-style: none;
            margin: 0;
        }

        .mobile-nav ul li {
            border-bottom: 1px solid #f8f9fa;
        }

        .mobile-nav ul li:last-child {
            border-bottom: none;
        }

        .mobile-nav-link {
            display: block;
            padding: 1rem 1.5rem;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .mobile-nav-link:hover {
            background-color: #f8f9fa;
            color: #007bff;
            text-decoration: none;
        }

        /* Mobile menu toggle button styles */
        #mobile-menu-toggle {
            transition: all 0.3s ease;
            position: relative;
            z-index: 9999;
            pointer-events: auto;
            min-width: 44px;
            min-height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: none;
            cursor: pointer;
        }

        #mobile-menu-toggle:hover {
            background-color: #f8f9fa !important;
            border-radius: 4px;
        }

        #mobile-menu-toggle.active {
            background-color: #e9ecef !important;
        }

        #mobile-menu-toggle i {
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="test-header">
        <h1>Mobile Menu Test</h1>
        <p>This is a simple test to debug the mobile menu functionality.</p>
        
        <button class="test-button" onclick="testElements()">Test Elements</button>
        <button class="test-button" onclick="testClick()">Test Click</button>
        <button class="test-button" onclick="clearDebug()">Clear Debug</button>
    </div>
    
    <div class="debug-info" id="debug-info">Debug information will appear here...</div>
    
    <!-- Test Mobile Menu -->
    <div style="position: relative; background: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 1rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <h3>Test Mobile Menu</h3>
            <button class="btn btn-link p-2" id="mobile-menu-toggle" type="button" style="border: none; background: none; cursor: pointer;">
                <i class="fas fa-bars" style="font-size: 1.2rem; color: #333;"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobile-menu">
            <div style="padding: 1rem;">
                <nav class="mobile-nav">
                    <ul>
                        <li><a href="#" class="mobile-nav-link">Home</a></li>
                        <li><a href="#" class="mobile-nav-link">Shop</a></li>
                        <li><a href="#" class="mobile-nav-link">About</a></li>
                        <li><a href="#" class="mobile-nav-link">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script>
        let debugInfo = document.getElementById('debug-info');
        
        function log(message) {
            debugInfo.textContent += new Date().toLocaleTimeString() + ': ' + message + '\n';
            console.log(message);
        }
        
        function clearDebug() {
            debugInfo.textContent = 'Debug information cleared...\n';
        }
        
        function testElements() {
            const toggle = document.getElementById('mobile-menu-toggle');
            const menu = document.getElementById('mobile-menu');
            
            log('Testing elements...');
            log('Toggle element found: ' + (toggle ? 'YES' : 'NO'));
            log('Menu element found: ' + (menu ? 'YES' : 'NO'));
            
            if (toggle) {
                log('Toggle element classes: ' + toggle.className);
                log('Toggle element style: ' + toggle.style.cssText);
            }
            
            if (menu) {
                log('Menu element classes: ' + menu.className);
                log('Menu element style: ' + menu.style.cssText);
            }
        }
        
        function testClick() {
            const toggle = document.getElementById('mobile-menu-toggle');
            if (toggle) {
                log('Simulating click on toggle button...');
                toggle.click();
            } else {
                log('ERROR: Toggle button not found!');
            }
        }
        
        // Initialize mobile menu
        function initMobileMenu() {
            log('Initializing mobile menu...');
            
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuToggle && mobileMenu) {
                log('Mobile menu elements found, adding event listeners');
                
                mobileMenuToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    log('Mobile menu toggle clicked');
                    
                    // Toggle the active class on mobile menu
                    mobileMenu.classList.toggle('active');
                    
                    // Toggle the active class on the button for visual feedback
                    mobileMenuToggle.classList.toggle('active');
                    
                    // Change icon from bars to X when open
                    const icon = mobileMenuToggle.querySelector('i');
                    if (mobileMenu.classList.contains('active')) {
                        icon.className = 'fas fa-times';
                        log('Mobile menu opened');
                    } else {
                        icon.className = 'fas fa-bars';
                        log('Mobile menu closed');
                    }
                });
                
                // Close mobile menu when clicking on a link
                const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
                mobileNavLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.remove('active');
                        mobileMenuToggle.classList.remove('active');
                        const icon = mobileMenuToggle.querySelector('i');
                        icon.className = 'fas fa-bars';
                        log('Mobile menu closed via link click');
                    });
                });
                
                log('Mobile menu initialization complete');
            } else {
                log('ERROR: Mobile menu elements not found!');
                log('Toggle element: ' + mobileMenuToggle);
                log('Menu element: ' + mobileMenu);
            }
        }
        
        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initMobileMenu);
        } else {
            initMobileMenu();
        }
        
        log('Script loaded and ready');
    </script>
</body>
</html>
