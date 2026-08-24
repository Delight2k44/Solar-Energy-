/**
 * Kinetix Solar Configurator Script
 * Manages multi-step navigation and calculator AJAX dispatcher
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // Check if configurator page elements exist
    const slider = document.getElementById('knx-usage-slider');
    if (!slider) return;
    
    // Update usage value display dynamically on input
    const usageVal = document.getElementById('knx-usage-value');
    slider.addEventListener('input', function() {
        usageVal.textContent = this.value + ' kWh';
    });
    
    // Stepper elements
    const steps = document.querySelectorAll('.knx-step');
    const stepPanels = document.querySelectorAll('.knx-config-step');
    let currentStep = 1;
    
    // Navigation functionality
    function goToStep(stepNum) {
        if (stepNum < 1 || stepNum > 4) return;
        
        currentStep = stepNum;
        
        // Update panel visibility
        stepPanels.forEach(panel => {
            if (parseInt(panel.getAttribute('data-step')) === currentStep) {
                panel.style.display = 'block';
            } else {
                panel.style.display = 'none';
            }
        });
        
        // Update stepper headers styling
        steps.forEach(step => {
            const stepId = parseInt(step.getAttribute('data-step'));
            if (stepId === currentStep) {
                step.classList.add('active');
                step.style.background = 'rgba(245, 158, 11, 0.15)';
                step.style.border = '1px solid rgba(245, 158, 11, 0.3)';
                step.style.color = '#fbbf24';
                step.style.fontWeight = '700';
                
                const circle = step.querySelector('span');
                if (circle) {
                    circle.style.background = 'linear-gradient(135deg, #f59e0b, #d97706)';
                    circle.style.color = '#0f172a';
                }
            } else if (stepId < currentStep) {
                step.classList.remove('active');
                step.style.background = 'rgba(52, 211, 153, 0.1)';
                step.style.border = '1px solid rgba(52, 211, 153, 0.2)';
                step.style.color = '#34d399';
                step.style.fontWeight = '600';
                
                const circle = step.querySelector('span');
                if (circle) {
                    circle.style.background = '#34d399';
                    circle.style.color = '#0f172a';
                }
            } else {
                step.classList.remove('active');
                step.style.background = 'rgba(255, 255, 255, 0.03)';
                step.style.border = '1px solid rgba(255, 255, 255, 0.1)';
                step.style.color = 'rgba(255, 255, 255, 0.6)';
                step.style.fontWeight = '600';
                
                const circle = step.querySelector('span');
                if (circle) {
                    circle.style.background = 'rgba(255, 255, 255, 0.1)';
                    circle.style.color = 'rgba(255, 255, 255, 0.6)';
                }
            }
        });
    }
    
    // Attach buttons event listeners
    document.querySelectorAll('.knx-next-step').forEach(btn => {
        btn.addEventListener('click', () => goToStep(currentStep + 1));
    });
    
    document.querySelectorAll('.knx-prev-step').forEach(btn => {
        btn.addEventListener('click', () => goToStep(currentStep - 1));
    });
    
    // ============================================
    // CALCULATOR SUBMIT: AJAX DISPATCH & STATIC FALLBACK
    // ============================================
    const submitBtn = document.querySelector('.knx-submit-calc');
    if (submitBtn) {
        submitBtn.addEventListener('click', function() {
            this.textContent = 'Calculating...';
            this.disabled = true;
            
            const monthlyKwh = slider.value;
            const province = document.getElementById('knx-province').value;
            const batteryNeeded = document.querySelector('input[name="battery"]:checked').value;
            
            // Check if running on static preview or WordPress
            if (typeof knxData === 'undefined') {
                // Local static preview calculation fallback
                setTimeout(() => {
                    this.textContent = 'Calculate Recommendation';
                    this.disabled = false;
                    
                    const sun_hours = {
                        'gauteng': 5.5, 'western_cape': 5.8, 'kwazulu_natal': 5.2,
                        'eastern_cape': 5.4, 'mpumalanga': 5.3, 'limpopo': 5.7,
                        'north_west': 5.6, 'free_state': 5.5, 'northern_cape': 6.2,
                    };
                    const peak_sun = sun_hours[province] || 5.5;
                    const daily_kwh = monthlyKwh / 30;
                    const system_kw = Math.ceil( ( daily_kwh / peak_sun ) * 1.3 );
                    const panels_needed = Math.ceil( system_kw * 1000 / 550 );
                    const inverter_size = Math.ceil( system_kw * 1.2 );
                    const battery_kwh = parseInt(batteryNeeded) ? Math.ceil( daily_kwh * 1.5 ) : 0;
                    
                    const panel_price = 4500;
                    const inverter_price = 8500;
                    const battery_price = 18000;
                    const install_base = 15000;
                    
                    const total = ( panels_needed * panel_price ) 
                               + ( inverter_size * inverter_price )
                               + ( battery_kwh * battery_price )
                               + install_base;
                    
                    document.getElementById('res-system-size').textContent = system_kw.toFixed(1);
                    document.getElementById('res-panels').textContent = panels_needed;
                    document.getElementById('res-inverter').textContent = inverter_size;
                    document.getElementById('res-battery').textContent = battery_kwh;
                    document.getElementById('res-total-price').textContent = total.toLocaleString('en-US');
                    document.getElementById('res-monthly-savings').textContent = Math.floor(monthlyKwh * 2.5).toLocaleString('en-US');
                    document.getElementById('res-payback').textContent = (total / (monthlyKwh * 2.5 * 12)).toFixed(1);
                    document.getElementById('res-co2').textContent = Math.floor(monthlyKwh * 12 * 0.9).toLocaleString('en-US');
                    
                    goToStep(4);
                }, 800);
                return;
            }
            
            const formData = new FormData();
            formData.append('action', 'knx_calculate_system');
            formData.append('nonce', knxData.nonce);
            formData.append('monthly_kwh', monthlyKwh);
            formData.append('province', province);
            formData.append('battery_needed', batteryNeeded);
            
            fetch(knxData.ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                this.textContent = 'Calculate Recommendation';
                this.disabled = false;
                
                if (data.success) {
                    // Update results display values
                    document.getElementById('res-system-size').textContent = data.data.system_kw;
                    document.getElementById('res-panels').textContent = data.data.panels_needed;
                    document.getElementById('res-inverter').textContent = data.data.inverter_size;
                    document.getElementById('res-battery').textContent = data.data.battery_kwh;
                    document.getElementById('res-total-price').textContent = data.data.total_price;
                    document.getElementById('res-monthly-savings').textContent = data.data.monthly_saving;
                    document.getElementById('res-payback').textContent = data.data.payback_years;
                    document.getElementById('res-co2').textContent = data.data.co2_saved;
                    
                    // Proceed to step 4 (results panel)
                    goToStep(4);
                } else {
                    alert('Calculation failed. Please verify inputs and try again.');
                }
            })
            .catch(err => {
                this.textContent = 'Calculate Recommendation';
                this.disabled = false;
                console.error('Error dispatching solar sizer request:', err);
                alert('Network connection error. Please try again.');
            });
        });
    }
});
