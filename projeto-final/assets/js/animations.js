document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.card, .metric-card, .action-card, .activity-item').forEach(el => {
        el.classList.add('animate-on-scroll');
        observer.observe(el);
    });

    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    document.querySelectorAll('input, textarea, select').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('input-focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('input-focused');
        });
    });

    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="loading-spinner"></span> Enviando...';
                
                setTimeout(() => {
                    submitBtn.classList.remove('loading');
                    submitBtn.innerHTML = originalText;
                }, 3000);
            }
        });
    });

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

    window.showToast = function(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <div class="toast-content">
                <span class="material-symbols-outlined">${type === 'success' ? 'check_circle' : type === 'error' ? 'error' : 'info'}</span>
                <span>${message}</span>
            </div>
            <button class="toast-close">
                <span class="material-symbols-outlined">close</span>
            </button>
        `;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.add('show');
        }, 100);
        
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 5000);
        
        toast.querySelector('.toast-close').addEventListener('click', () => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300);
        });
    };

    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.parallax');
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.speed || 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });

    function typeWriter(element, text, speed = 100) {
        let i = 0;
        element.innerHTML = '';
        
        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        
        type();
    }

    const mainTitle = document.querySelector('.page-title');
    if (mainTitle && mainTitle.textContent.includes('Bem-vindo')) {
        const originalText = mainTitle.textContent;
        typeWriter(mainTitle, originalText, 80);
    }

    function animateCounter(element, target, duration = 2000) {
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 16);
    }

    const metricObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const valueElement = entry.target.querySelector('.metric-value');
                if (valueElement) {
                    const targetValue = parseInt(valueElement.textContent);
                    if (!isNaN(targetValue)) {
                        animateCounter(valueElement, targetValue);
                    }
                }
                metricObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.metric-card').forEach(card => {
        metricObserver.observe(card);
    });

    const style = document.createElement('style');
    style.textContent = `
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }
        
        .animate-on-scroll.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .loading-spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 8px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            padding: var(--space-4);
            display: flex;
            align-items: center;
            gap: var(--space-3);
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 1000;
            max-width: 400px;
            border: 1px solid var(--gray-100);
        }
        
        .toast.show {
            transform: translateX(0);
        }
        
        .toast-content {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            flex: 1;
        }
        
        .toast-close {
            background: none;
            border: none;
            color: var(--gray-500);
            cursor: pointer;
            padding: var(--space-1);
            border-radius: var(--radius-sm);
            transition: all var(--transition-fast);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .toast-close:hover {
            background: var(--gray-100);
            color: var(--gray-700);
        }
        
        .toast-success {
            border-left: 4px solid var(--success-500);
        }
        
        .toast-error {
            border-left: 4px solid var(--danger-500);
        }
        
        .toast-info {
            border-left: 4px solid var(--primary-500);
        }

        .toast .material-symbols-outlined {
            font-size: var(--font-size-lg);
        }

        .toast-success .material-symbols-outlined:first-child {
            color: var(--success-500);
        }

        .toast-error .material-symbols-outlined:first-child {
            color: var(--danger-500);
        }

        .toast-info .material-symbols-outlined:first-child {
            color: var(--primary-500);
        }

        @media (max-width: 768px) {
            .toast {
                top: 10px;
                right: 10px;
                left: 10px;
                max-width: none;
                transform: translateY(-100%);
            }
            
            .toast.show {
                transform: translateY(0);
            }
        }
        
        .input-focused {
            transform: scale(1.02);
        }
        
        .input-focused input {
            border-color: var(--primary-400);
            box-shadow: 0 0 0 3px var(--primary-100);
        }
    `;
    
    document.head.appendChild(style);
});

window.utils = {
    debounce: function(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },
    
    throttle: function(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },
    
    formatDate: function(date) {
        return new Intl.DateTimeFormat('pt-BR', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }).format(new Date(date));
    },
    
    generateId: function() {
        return Math.random().toString(36).substr(2, 9);
    }
}; 