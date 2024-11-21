document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('nav a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));

            if (target) {
                const headerOffset = 70; // Adjust this value based on your header height
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    const greetingElement = document.getElementById('greeting');
    const hours = new Date().getHours();
    let greetingText = 'Hi, I\'m Sandeep!';

    if (hours < 12) {
        greetingText = 'Good Morning, I\'m Sandeep!';
    } else if (hours < 18) {
        greetingText = 'Good Afternoon, I\'m Sandeep!';
    } else {
        greetingText = 'Good Evening, I\'m Sandeep!';
    }

    greetingElement.textContent = greetingText;

    const skillsLink = document.querySelector('nav a[href="services"]');
    if (skillsLink) {
        skillsLink.addEventListener('click', function(e) {
            e.preventDefault();

            const skillsSection = document.getElementById('skills');
            if (skillsSection) {
                const headerOffset = 70; // Adjust this value based on your header height
                const elementPosition = skillsSection.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    }
});

// Contact form validation
document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var subject = document.getElementById('subject').value.trim();
    var message = document.getElementById('message').value.trim();

    if (name === '' || email === '' || subject === '' || message === '') {
        alert('Please fill in all fields.');
        return;
    }

    if (!validateEmail(email)) {
        alert('Please enter a valid email address.');
        return;
    }

    this.submit();
});

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('nav ul li a');

    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default anchor behavior
            const targetId = link.getAttribute('href').substring(1); // Get target section id
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                const headerOffset = 70; // Adjust this value based on your header height
                const elementPosition = targetSection.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// AJAX for newsletter subscription
document.getElementById('subscription-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var email = document.getElementById('email-subscription').value;
    fetch('subscribe.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'email=' + encodeURIComponent(email)
    }).then(response => response.text()).then(result => {
        document.getElementById('subscription-response').textContent = result;
        document.getElementById('subscription-form').reset();
    }).catch(error => console.error('Error:', error));
});