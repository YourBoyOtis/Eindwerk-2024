document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('dark-mode-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light'; // Default to light mode

    if (currentTheme === 'dark') {
        document.body.setAttribute('data-theme', 'dark');
    }

    toggleButton.addEventListener('click', function() {
        const isDarkMode = document.body.getAttribute('data-theme') === 'dark';
        if (isDarkMode) {
            document.body.removeAttribute('data-theme');
            localStorage.setItem('theme', 'light');
        } else {
            document.body.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        }
    });
});

