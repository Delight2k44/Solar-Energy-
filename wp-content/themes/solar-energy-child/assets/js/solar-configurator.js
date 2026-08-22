/**
 * Solar System Configurator Client-Side Calculation Engine
 */
document.addEventListener('DOMContentLoaded', function () {
	const monthlyBillInput = document.getElementById('solar-monthly-bill');
	const utilityRateInput = document.getElementById('solar-utility-rate');
	const sunHoursSelect = document.getElementById('solar-sun-hours');
	const batteryOptSelect = document.getElementById('solar-battery-opt');

	// Result Elements
	const resSystemSize = document.getElementById('res-system-size');
	const resPanelCount = document.getElementById('res-panel-count');
	const resMonthlySavings = document.getElementById('res-monthly-savings');
	const resTotalCost = document.getElementById('res-total-cost');

	if (!monthlyBillInput || !utilityRateInput || !resSystemSize) {
		return; // Exit if not on calculator page
	}

	function calculateSolarSystem() {
		const bill = parseFloat(monthlyBillInput.value) || 0;
		const rate = parseFloat(utilityRateInput.value) || 0.16;
		const sunHours = parseFloat(sunHoursSelect.value) || 5.0;
		const includeBattery = batteryOptSelect.value === 'yes';

		if (bill <= 0 || rate <= 0) {
			return;
		}

		// 1. Daily Consumption (kWh) = (Monthly Bill / Tariff) / 30.5 days
		const monthlyKwh = bill / rate;
		const dailyKwh = monthlyKwh / 30.5;

		// 2. System Size Needed (kW) = Daily kWh / (Sun Hours * 0.80 Efficiency)
		const systemKw = dailyKwh / (sunHours * 0.80);

		// 3. Panels needed (400W panels = 0.400kW per panel)
		const panelCount = Math.ceil(systemKw / 0.400);

		// 4. Base Cost ($2,400 per kW turn-key) + optional battery ($7,500)
		let totalCost = systemKw * 2400;
		if (includeBattery) {
			totalCost += 7500;
		}

		// 5. Estimated Monthly Savings (85% bill offset)
		const monthlySavings = bill * 0.85;

		// Update UI with formatted values
		resSystemSize.textContent = systemKw.toFixed(1) + ' kW';
		resPanelCount.textContent = panelCount + ' Panels';
		resMonthlySavings.textContent = '$' + Math.round(monthlySavings).toLocaleString() + ' / mo';
		resTotalCost.textContent = '$' + Math.round(totalCost).toLocaleString();
	}

	// Attach Event Listeners
	monthlyBillInput.addEventListener('input', calculateSolarSystem);
	utilityRateInput.addEventListener('input', calculateSolarSystem);
	sunHoursSelect.addEventListener('change', calculateSolarSystem);
	batteryOptSelect.addEventListener('change', calculateSolarSystem);

	// Run initial calculation on page load
	calculateSolarSystem();
});
