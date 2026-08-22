/**
 * Solar Financing & Loan Repayment Client-Side Calculation Engine
 */
document.addEventListener('DOMContentLoaded', function () {
	const costInput = document.getElementById('fin-system-cost');
	const rebateInput = document.getElementById('fin-rebate-pct');
	const termSelect = document.getElementById('fin-loan-term');
	const rateInput = document.getElementById('fin-interest-rate');

	// Output Elements
	const resRebateSavings = document.getElementById('fin-res-rebate-savings');
	const resNetAmount = document.getElementById('fin-res-net-amount');
	const resMonthlyPay = document.getElementById('fin-res-monthly-pay');

	if (!costInput || !resMonthlyPay) {
		return; // Exit if not on financing page
	}

	function calculateFinancing() {
		const totalCost = parseFloat(costInput.value) || 0;
		const rebatePct = parseFloat(rebateInput.value) || 0;
		const termMonths = parseInt(termSelect.value, 10) || 120;
		const annualRate = parseFloat(rateInput.value) || 0;

		if (totalCost <= 0) {
			return;
		}

		// 1. Calculate Rebate Savings ($)
		const rebateSavings = totalCost * (rebatePct / 100);
		const netFinanced = totalCost - rebateSavings;

		// 2. Monthly Payment Calculation
		let monthlyPayment = 0;
		if (annualRate > 0) {
			const monthlyRate = annualRate / 100 / 12;
			monthlyPayment =
				(netFinanced * (monthlyRate * Math.pow(1 + monthlyRate, termMonths))) /
				(Math.pow(1 + monthlyRate, termMonths) - 1);
		} else {
			monthlyPayment = netFinanced / termMonths;
		}

		// Update UI
		resRebateSavings.textContent = '-R' + Math.round(rebateSavings).toLocaleString();
		resNetAmount.textContent = 'R' + Math.round(netFinanced).toLocaleString();
		resMonthlyPay.textContent = 'R' + Math.round(monthlyPayment).toLocaleString() + ' / mo';
	}

	// Attach Event Listeners
	costInput.addEventListener('input', calculateFinancing);
	rebateInput.addEventListener('input', calculateFinancing);
	termSelect.addEventListener('change', calculateFinancing);
	rateInput.addEventListener('input', calculateFinancing);

	// Run initial calculation
	calculateFinancing();
});
