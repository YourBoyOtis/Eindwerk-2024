document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('dark-mode-toggle');
    const logo = document.getElementById('logo');
    const currentTheme = localStorage.getItem('theme') || 'light'; // Default to light mode

    function setLogo(theme) {
        if (theme === 'dark') {
            logo.src = 'images/LogoDark.png'; // Path to your dark mode logo
        } else {
            logo.src = 'images/LogoLight.jpg'; // Path to your light mode logo
        }
    }

    // Set the initial theme and logo
    if (currentTheme === 'dark') {
        document.body.setAttribute('data-theme', 'dark');
        setLogo('dark');
    } else {
        setLogo('light');
    }

    toggleButton.addEventListener('click', function() {
        const isDarkMode = document.body.getAttribute('data-theme') === 'dark';
        if (isDarkMode) {
            document.body.removeAttribute('data-theme');
            localStorage.setItem('theme', 'light');
            setLogo('light');
        } else {
            document.body.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
            setLogo('dark');
        }
    });
});
