document.addEventListener('DOMContentLoaded', function() {
    // Add animation to buttons
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });
    
    // Add focus effects to form inputs
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.borderColor = '#2980b9';
            this.style.boxShadow = '0 0 0 2px rgba(41, 128, 185, 0.2)';
        });
        
        input.addEventListener('blur', function() {
            this.style.borderColor = '#ddd';
            this.style.boxShadow = 'none';
        });
    });
    
    // Easter egg for XSS challenge
    console.log('%cLooking for XSS hints? Try injecting <script>alert(1)</script> in the search bar!', 
                'color: #27ae60; font-size: 14px; font-weight: bold;');
    
    console.log('%cFor SQLi, try classic payloads like " OR 1=1 -- "', 
                'color: #2980b9; font-size: 14px; font-weight: bold;');
});