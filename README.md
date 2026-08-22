# ☀️ Solar Energy Solutions & eCommerce Website

> Modern, trustworthy, and scalable WordPress eCommerce codebase for solar installation, equipment retail, maintenance subscriptions, and interactive financing calculators.

---

## 📌 Project Overview

This repository contains the custom theme code, interactive configurator plugins, and modular setup specifications for an energy company specializing in solar solutions (installation, retail, and maintenance), designed to scale seamlessly into wind, biogas, and battery storage solutions in the future.

---

## 🛠️ Technical Stack

| Component | Technology / Plugin |
| :--- | :--- |
| **CMS Platform** | WordPress (Latest Version) |
| **Parent Theme** | Astra / Kadence (Free, Lightweight) |
| **Child Theme** | `solar-energy-child` (Included in this repo) |
| **eCommerce Engine** | WooCommerce |
| **Inventory Management** | ATUM Inventory Management |
| **Calculators & Forms** | `solar-configurator` & `solar-financing` (Custom Shortcodes) + Forminator |
| **Booking & Scheduling** | Simply Schedule Appointments / BookingPress |
| **Customer Portal** | WP Customer Area / Client Portal |
| **SEO & Security** | Rank Math SEO + Wordfence Security |
| **Live Chat** | Tidio AI Chatbot |

---

## 📁 Repository Directory Structure

```text
Solar-Energy-/
├── README.md                           # Main repository guide
├── .gitignore                          # Git ignore rules for WP development
├── docs/
│   ├── ARCHITECTURE.md                 # System overview & plugin integration matrix
│   ├── CONFIGURATOR_SPECS.md           # Solar sizing & loan repayment formulas
│   └── HOSTINGER_MIGRATION_GUIDE.md    # Hostinger deployment & migration guide
└── wp-content/
    ├── themes/
    │   └── solar-energy-child/          # Custom Child Theme
    │       ├── style.css               # Theme declaration & global styling
    │       ├── functions.php           # Enqueues, shortcode registration, and hooks
    │       ├── inc/
    │       │   ├── configurator.php    # [solar_configurator] shortcode PHP handler
    │       │   ├── financing.php       # [solar_financing_calculator] shortcode handler
    │       │   └── woocommerce.php     # WooCommerce integration hooks
    │       └── assets/
    │           ├── css/
    │           │   └── solar-calculators.css   # Modern, high-contrast UI styling
    │           └── js/
    │               ├── solar-configurator.js  # Interactive multi-step sizing logic
    │               └── solar-financing.js     # Interactive repayment calculator
    └── plugins/
        └── solar-energy-core/          # Custom Core Plugin
            └── solar-energy-core.php   # Custom Post Types & REST API hooks
```

---

## ⚡ Interactive Shortcodes

This child theme provides two built-in interactive calculators that can be placed on any page or post using Gutenberg or Elementor:

### 1. Solar System Sizing Configurator
```html
[solar_configurator]
```
Allows customers to input their monthly electricity bill, roof exposure, and battery requirements to receive an instant system size (kW), estimated monthly savings, and instant price quote.

### 2. Financing & Rebate Repayment Calculator
```html
[solar_financing_calculator]
```
Allows customers to estimate their monthly loan repayments after applying local solar incentive rebates.

---

## 🚀 Local Setup & Development

1. **Install WordPress Locally**: Use [LocalWP](https://localwp.com/) or a Docker/XAMPP environment.
2. **Clone Repository**:
   ```bash
   git clone https://github.com/Delight2k44/Solar-Energy-.git
   ```
3. **Link Child Theme**: Copy `wp-content/themes/solar-energy-child` into your local `wp-content/themes/` directory.
4. **Activate Theme**: Go to `WP Admin -> Appearance -> Themes` and activate **Solar Energy Child Theme** (ensure parent theme Astra or Kadence is installed).
5. **Activate Core Plugin**: Go to `WP Admin -> Plugins` and activate **Solar Energy Core**.

---

## 📦 Deploying to Hostinger

Refer to the complete step-by-step guide in [`docs/HOSTINGER_MIGRATION_GUIDE.md`](docs/HOSTINGER_MIGRATION_GUIDE.md).

---

## 📄 License & Maintainer

Maintained by **Delight2k44**. Built for scalability, high performance, and accessibility.