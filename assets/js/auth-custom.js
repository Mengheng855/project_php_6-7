/* ========================================
   DURALUX AUTH FORMS - INTERACTIONS & ANIMATIONS
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize particles
    createParticles();

    // Add form interactions
    initializeFormInteractions();

    // Add loading states
    initializeLoadingStates();
});

function createParticles() {
    const particlesContainer = document.querySelector('.particles');
    if (!particlesContainer) return;

    // Create additional random particles
    for (let i = 0; i < 15; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.width = (Math.random() * 8 + 2) + 'px';
        particle.style.height = particle.style.width;
        particle.style.animationDelay = (Math.random() * 10) + 's';
        particle.style.animationDuration = (Math.random() * 4 + 6) + 's';
        particlesContainer.appendChild(particle);
    }
}

function initializeFormInteractions() {
    const inputs = document.querySelectorAll('.form-control');

    inputs.forEach(input => {
        // Add focus/blur animations
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
            validateInput(this);
        });

        // Add input animations
        input.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.parentElement.classList.add('has-content');
            } else {
                this.parentElement.classList.remove('has-content');
            }
        });
    });
}

function validateInput(input) {
    const formGroup = input.parentElement;
    const value = input.value.trim();

    // Remove previous validation classes
    formGroup.classList.remove('error', 'success');

    // Basic validation
    if (input.hasAttribute('required') && value === '') {
        formGroup.classList.add('error');
        showMessage(formGroup, 'This field is required');
        return false;
    }

    if (input.type === 'email' && value !== '') {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            formGroup.classList.add('error');
            showMessage(formGroup, 'Please enter a valid email');
            return false;
        }
    }

    if (input.type === 'password' && value !== '' && value.length < 6) {
        formGroup.classList.add('error');
        showMessage(formGroup, 'Password must be at least 6 characters');
        return false;
    }

    if (value !== '') {
        formGroup.classList.add('success');
        showMessage(formGroup, 'Looks good!');
    }

    return true;
}

function showMessage(formGroup, message) {
    let messageEl = formGroup.querySelector('.form-message');
    if (!messageEl) {
        messageEl = document.createElement('div');
        messageEl.className = 'form-message';
        formGroup.appendChild(messageEl);
    }
    messageEl.textContent = message;
}

function initializeLoadingStates() {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('.auth-submit');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.textContent = 'Processing...';

                // Simulate processing (remove this in production)
                setTimeout(() => {
                    submitBtn.classList.remove('loading');
                    submitBtn.textContent = submitBtn.dataset.originalText || 'Submit';
                }, 2000);
            }
        });
    });
}

// Add ripple effect to buttons
function addRippleEffect() {
    const buttons = document.querySelectorAll('.auth-submit');

    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.className = 'ripple-effect';

            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';

            button.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
}

// Add CSS for ripple effect
const rippleStyle = document.createElement('style');
rippleStyle.textContent = `
    .ripple-effect {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    .auth-submit {
        position: relative;
        overflow: hidden;
    }
`;
document.head.appendChild(rippleStyle);

// Initialize ripple effect
addRippleEffect();

// Add smooth scrolling for links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add keyboard navigation improvements
document.addEventListener('keydown', function(e) {
    // Enter key submits form
    if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
        const form = e.target.closest('form');
        if (form) {
            const submitBtn = form.querySelector('.auth-submit');
            if (submitBtn && !submitBtn.disabled) {
                submitBtn.click();
            }
        }
    }
});

// Add accessibility improvements
function enhanceAccessibility() {
    // Add ARIA labels where needed
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        if (!input.getAttribute('aria-label') && input.previousElementSibling) {
            input.setAttribute('aria-label', input.previousElementSibling.textContent);
        }
    });

    // Add focus management
    const focusableElements = document.querySelectorAll('input, button, a');
    focusableElements.forEach(el => {
        el.addEventListener('focus', function() {
            this.style.outline = '2px solid rgba(255, 255, 255, 0.8)';
        });

        el.addEventListener('blur', function() {
            this.style.outline = 'none';
        });
    });
}

enhanceAccessibility();