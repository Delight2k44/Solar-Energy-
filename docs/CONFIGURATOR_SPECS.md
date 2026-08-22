# Solar System & Financing Calculator Specifications

This document defines the underlying mathematical models, formulas, and client-side logic used by the custom shortcodes in `solar-energy-child`.

---

## ⚡ 1. Solar System Configurator (`[solar_configurator]`)

### Input Parameters
1. **Monthly Electricity Bill ($B$)**: Average monthly utility spend (USD).
2. **Electricity Rate ($R$)**: Cost per kWh (Default: `$0.16` / kWh).
3. **Sunlight Hours ($H$)**: Average peak sun hours per day (Default: `5.0` hours/day).
4. **Battery Backup Required ($Batt$)**: Yes / No option.

### Formulas & Calculation Logic

#### Step 1: Daily kWh Consumption ($C_{daily}$)
$$C_{daily} = \frac{B / R}{30.5}$$

#### Step 2: System Size Needed ($kW$)
Assuming a solar performance factor of $0.80$ (to account for inverter efficiency and temperature losses):
$$kW_{system} = \frac{C_{daily}}{H \times 0.80}$$

#### Step 3: Recommended Solar Panels ($N_{panels}$)
Using high-efficiency 400W panels ($0.400$ kW per panel):
$$N_{panels} = \lceil \frac{kW_{system}}{0.400} \rceil$$

#### Step 4: Estimated System Cost ($Cost_{base}$)
Average turn-key installation rate of `$2,400` per kW:
$$Cost_{base} = kW_{system} \times 2400$$

If Battery Backup is selected, add a 10kWh Lithium Battery storage pack (`+$7,500`).

#### Step 5: Estimated Monthly Savings ($Savings$)
$$Savings_{monthly} = B \times 0.85$$

---

## 💰 2. Solar Financing Calculator (`[solar_financing_calculator]`)

### Input Parameters
1. **Total System Cost ($P$)**: Total purchase price of equipment + installation.
2. **Government / Local Rebate ($Rebate$)**: Percentage rebate (Default: `30%` federal tax credit / incentive).
3. **Loan Term ($n$)**: Loan duration in months (e.g. 60, 84, 120 months).
4. **Annual Interest Rate ($r_{annual}$)**: APR rate (Default: `6.5%`).

### Formulas & Calculation Logic

#### Net Loan Amount ($P_{net}$)
$$P_{net} = P \times (1 - \frac{Rebate}{100})$$

#### Monthly Interest Rate ($i$)
$$i = \frac{r_{annual} / 100}{12}$$

#### Monthly Payment ($M$)
$$M = P_{net} \times \frac{i(1 + i)^n}{(1 + i)^n - 1}$$

---

## 💻 Frontend Implementation Notes

- Form state is managed client-side in pure JavaScript (`solar-configurator.js` and `solar-financing.js`).
- Dynamic updates occur instantaneously on input change.
- Form outputs include a direct action button: **"Request Custom On-Site Quote"** or **"Book Installation Inspection"**, pre-filling the user's calculated parameters into WooCommerce checkout or Forminator.
