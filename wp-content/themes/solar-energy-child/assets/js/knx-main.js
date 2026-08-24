/**
 * Kinetix Solar main script file
 * Drives page animations, stat counters, and FAQ accordions
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // ANIMATIONS: INTERSECTION OBSERVER
    // ============================================
    const animateElements = document.querySelectorAll('.knx-animate');
    
    const animationObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                
                // If it's a stat counter, trigger the counter animation
                const counter = entry.target.querySelector('.knx-stat__number');
                if (counter) {
                    animateCounter(counter);
                }
                
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });
    
    animateElements.forEach(el => animationObserver.observe(el));
    
    // ============================================
    // COUNTER FUNCTION
    // ============================================
    function animateCounter(counterEl) {
        const target = parseFloat(counterEl.getAttribute('data-target') || 0);
        const suffix = counterEl.getAttribute('data-suffix') || '';
        const duration = 2000; // 2 seconds
        const startTime = performance.now();
        
        function updateCount(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Ease out cubic
            const easeProgress = 1 - Math.pow(1 - progress, 3);
            const currentVal = Math.floor(easeProgress * target);
            
            counterEl.textContent = currentVal.toLocaleString('en-US') + suffix;
            
            if (progress < 1) {
                requestAnimationFrame(updateCount);
            } else {
                counterEl.textContent = target.toLocaleString('en-US') + suffix;
            }
        }
        
        requestAnimationFrame(updateCount);
    }
    
    // ============================================
    // FAQ ACCORDIONS
    // ============================================
    const faqQuestions = document.querySelectorAll('.knx-faq-item__question');
    
    faqQuestions.forEach(btn => {
        btn.addEventListener('click', function() {
            const currentItem = this.parentElement;
            const answer = this.nextElementSibling;
            
            // Toggle current item
            const isOpen = currentItem.classList.contains('is-open');
            
            // Close all items
            document.querySelectorAll('.knx-faq-item').forEach(item => {
                item.classList.remove('is-open');
                item.querySelector('.knx-faq-item__answer').style.maxHeight = '0px';
                item.querySelector('.knx-faq-item__answer').style.paddingBottom = '0px';
            });
            
            if (!isOpen) {
                currentItem.classList.add('is-open');
                answer.style.maxHeight = answer.scrollHeight + 24 + 'px'; // add padding offset
                answer.style.paddingBottom = '1.5rem';
            }
        });
    });
});
