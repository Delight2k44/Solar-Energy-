<?php
/**
 * Template Name: Solar Configurator
 * 
 * @package Kinetix_Solar
 */
get_header();
?>

<section class="knx-section" style="min-height:100vh;padding-top:6rem;">
    <div class="knx-container">
        <div class="knx-section-title knx-animate">
            <span class="knx-badge knx-badge--amber" style="margin-bottom:1rem;">Free Instant Quote</span>
            <h1 class="knx-h1">Solar System Sizer</h1>
            <p>Answer 3 simple questions and get your personalized system recommendation</p>
        </div>
        
        <!-- Progress Stepper -->
        <div class="knx-animate" style="display:flex;gap:1rem;justify-content:center;margin-bottom:3rem;flex-wrap:wrap;">
            <div class="knx-step active" data-step="1" style="display:flex;align-items:center;gap:0.5rem;padding:0.75rem 1.25rem;background:rgba(245,158,11,0.15);border:1px solid rgba(245,158,11,0.3);border-radius:999px;color:#fbbf24;font-weight:700;font-size:0.85rem;">
                <span style="width:24px;height:24px;background:linear-gradient(135deg,#f59e0b,#d97706);color:#0f172a;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.75rem;">1</span>
                Location
            </div>
            <div class="knx-step" data-step="2" style="display:flex;align-items:center;gap:0.5rem;padding:0.75rem 1.25rem;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.1);border-radius:999px;color:rgba(255,255,255,0.6);font-weight:600;font-size:0.85rem;">
                <span style="width:24px;height:24px;background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.6);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.75rem;">2</span>
                Usage
            </div>
            <div class="knx-step" data-step="3" style="display:flex;align-items:center;gap:0.5rem;padding:0.75rem 1.25rem;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.1);border-radius:999px;color:rgba(255,255,255,0.6);font-weight:600;font-size:0.85rem;">
                <span style="width:24px;height:24px;background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.6);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.75rem;">3</span>
                Battery
            </div>
            <div class="knx-step" data-step="4" style="display:flex;align-items:center;gap:0.5rem;padding:0.75rem 1.25rem;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.1);border-radius:999px;color:rgba(255,255,255,0.6);font-weight:600;font-size:0.85rem;">
                <span style="width:24px;height:24px;background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.6);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.75rem;">4</span>
                Results
            </div>
        </div>
        
        <!-- Configurator Form -->
        <div class="knx-glass knx-animate" style="max-width:700px;margin:0 auto;padding:3rem;">
            
            <!-- Step 1: Location -->
            <div class="knx-config-step" data-step="1">
                <h3 class="knx-h3" style="margin-bottom:1.5rem;color:#ffffff;">Where is your property located?</h3>
                <select id="knx-province" style="width:100%;padding:1rem;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.2);border-radius:12px;color:#fff;font-family:var(--knx-font);font-size:1rem;margin-bottom:1.5rem;">
                    <option value="gauteng">Gauteng</option>
                    <option value="western_cape">Western Cape</option>
                    <option value="kwazulu_natal">KwaZulu-Natal</option>
                    <option value="eastern_cape">Eastern Cape</option>
                    <option value="mpumalanga">Mpumalanga</option>
                    <option value="limpopo">Limpopo</option>
                    <option value="north_west">North West</option>
                    <option value="free_state">Free State</option>
                    <option value="northern_cape">Northern Cape</option>
                </select>
                <p style="color:#94a3b8;font-size:0.9rem;margin-bottom:1.5rem;">This helps us calculate your average daily sun hours for accurate system sizing.</p>
                <button type="button" class="knx-btn knx-btn--primary knx-next-step" style="width:100%;">Continue</button>
            </div>
            
            <!-- Step 2: Usage -->
            <div class="knx-config-step" data-step="2" style="display:none;">
                <h3 class="knx-h3" style="margin-bottom:1.5rem;color:#ffffff;">What's your monthly electricity usage?</h3>
                <div style="margin-bottom:2.5rem;">
                    <label style="display:block;color:#94a3b8;font-size:0.9rem;margin-bottom:1rem;">Monthly kWh (check your electricity bill)</label>
                    <input type="range" id="knx-usage-slider" min="200" max="2000" value="600" style="width:100%;margin-bottom:1rem;accent-color:var(--knx-amber-500);">
                    <div style="display:flex;justify-content:space-between;color:#fbbf24;font-weight:700;">
                        <span>200 kWh</span>
                        <span id="knx-usage-value" style="font-size:1.75rem;text-shadow:0 0 10px rgba(245,158,11,0.3);">600 kWh</span>
                        <span>2000 kWh</span>
                    </div>
                </div>
                <div style="display:flex;gap:1rem;">
                    <button type="button" class="knx-btn knx-btn--ghost knx-prev-step" style="flex:1;">Back</button>
                    <button type="button" class="knx-btn knx-btn--primary knx-next-step" style="flex:1;">Continue</button>
                </div>
            </div>
            
            <!-- Step 3: Battery -->
            <div class="knx-config-step" data-step="3" style="display:none;">
                <h3 class="knx-h3" style="margin-bottom:1.5rem;color:#ffffff;">Do you want battery backup for load shedding?</h3>
                <div style="display:flex;gap:1rem;margin-bottom:2rem;flex-wrap:wrap;">
                    <label style="flex:1;min-width:200px;padding:1.5rem;background:rgba(255,255,255,0.03);border:2px solid rgba(245,158,11,0.5);border-radius:16px;cursor:pointer;text-align:center;transition:all 0.3s;display:block;">
                        <input type="radio" name="battery" value="1" checked style="margin-bottom:0.75rem;">
                        <div style="color:#fff;font-weight:700;margin-bottom:0.5rem;">Yes, I need backup</div>
                        <div style="color:#94a3b8;font-size:0.85rem;">Power during load shedding + solar storage</div>
                    </label>
                    <label style="flex:1;min-width:200px;padding:1.5rem;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.1);border-radius:16px;cursor:pointer;text-align:center;transition:all 0.3s;display:block;">
                        <input type="radio" name="battery" value="0" style="margin-bottom:0.75rem;">
                        <div style="color:#fff;font-weight:700;margin-bottom:0.5rem;">No, solar only</div>
                        <div style="color:#94a3b8;font-size:0.85rem;">Grid-tied daytime offset only (no battery backup)</div>
                    </label>
                </div>
                <div style="display:flex;gap:1rem;">
                    <button type="button" class="knx-btn knx-btn--ghost knx-prev-step" style="flex:1;">Back</button>
                    <button type="button" class="knx-btn knx-btn--primary knx-submit-calc" style="flex:1;">Calculate Recommendation</button>
                </div>
            </div>

            <!-- Step 4: Results -->
            <div class="knx-config-step" data-step="4" style="display:none;">
                <h3 class="knx-h3" style="margin-bottom:1.5rem;color:#ffffff;">Your Custom Solar Recommendation</h3>
                
                <div class="knx-results-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;margin-bottom:2rem;text-align:left;">
                    <div style="background:rgba(255,255,255,0.02);padding:1.25rem;border-radius:12px;border:1px solid rgba(255,255,255,0.05);">
                        <div style="font-size:0.8rem;color:var(--knx-slate-400);text-transform:uppercase;">Recommended System</div>
                        <div style="font-size:1.75rem;font-weight:800;color:#fff;"><span id="res-system-size">0.0</span> kW</div>
                    </div>
                    <div style="background:rgba(255,255,255,0.02);padding:1.25rem;border-radius:12px;border:1px solid rgba(255,255,255,0.05);">
                        <div style="font-size:0.8rem;color:var(--knx-slate-400);text-transform:uppercase;">Solar Panels</div>
                        <div style="font-size:1.5rem;font-weight:800;color:#fff;"><span id="res-panels">0</span> x 550W</div>
                    </div>
                    <div style="background:rgba(255,255,255,0.02);padding:1.25rem;border-radius:12px;border:1px solid rgba(255,255,255,0.05);">
                        <div style="font-size:0.8rem;color:var(--knx-slate-400);text-transform:uppercase;">Inverter Capacity</div>
                        <div style="font-size:1.5rem;font-weight:800;color:#fff;"><span id="res-inverter">0</span> kW Hybrid</div>
                    </div>
                    <div style="background:rgba(255,255,255,0.02);padding:1.25rem;border-radius:12px;border:1px solid rgba(255,255,255,0.05);">
                        <div style="font-size:0.8rem;color:var(--knx-slate-400);text-transform:uppercase;">Battery Storage</div>
                        <div style="font-size:1.5rem;font-weight:800;color:#fff;"><span id="res-battery">0</span> kWh</div>
                    </div>
                </div>

                <div class="knx-savings-box" style="background:linear-gradient(135deg,rgba(52,211,153,0.1),rgba(56,189,248,0.1));padding:1.5rem;border-radius:16px;border:1px solid rgba(52,211,153,0.2);margin-bottom:2rem;text-align:left;display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                    <div>
                        <div style="font-size:0.8rem;color:var(--knx-slate-400);text-transform:uppercase;">Est. Total Price</div>
                        <div style="font-size:2rem;font-weight:900;color:#34d399;">R <span id="res-total-price">0</span></div>
                    </div>
                    <div>
                        <div style="font-size:0.8rem;color:var(--knx-slate-400);text-transform:uppercase;">Est. Monthly Saving</div>
                        <div style="font-size:1.75rem;font-weight:900;color:#38bdf8;">R <span id="res-monthly-savings">0</span></div>
                    </div>
                    <div>
                        <div style="font-size:0.8rem;color:var(--knx-slate-400);text-transform:uppercase;">Payback Period</div>
                        <div style="font-size:1.15rem;font-weight:700;color:#fff;"><span id="res-payback">0.0</span> Years</div>
                    </div>
                    <div>
                        <div style="font-size:0.8rem;color:var(--knx-slate-400);text-transform:uppercase;">CO2 Offsets</div>
                        <div style="font-size:1.15rem;font-weight:700;color:#fff;"><span id="res-co2">0</span> kg/yr</div>
                    </div>
                </div>

                <div style="display:flex;gap:1rem;flex-wrap:wrap;">
                    <button type="button" class="knx-btn knx-btn--ghost knx-prev-step" style="flex:1;">Back</button>
                    <a href="#contact" class="knx-btn knx-btn--primary" style="flex:1.5;">Book Free Site Audit & CoC</a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
