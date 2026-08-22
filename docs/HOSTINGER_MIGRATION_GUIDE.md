# Hostinger Migration Guide for Solar Energy WordPress Website

This guide walks you through migrating your completed local WordPress site (`Solar-Energy-`) to your **Hostinger WordPress Hosting** plan cleanly and safely.

---

## 🛠️ Prerequisites

Before starting the migration, ensure you have:
1. Active Hostinger Hosting Account & Domain Name pointed to Hostinger nameservers.
2. Clean WordPress installation initialized on Hostinger via Hostinger hPanel.
3. Access to WP Admin on both Local Environment and Hostinger.

---

## 📦 Step-by-Step Migration Process

### Method 1: All-in-One WP Migration Plugin (Recommended & Easiest)

#### Step 1: Export Local Site
1. Log in to your local WordPress dashboard (`http://localhost` or `http://solar-energy.local`).
2. Go to **Plugins -> Add New** and search for **All-in-One WP Migration**.
3. Install and Activate the plugin.
4. Go to **All-in-One WP Migration -> Export**.
5. Click **Export To -> FILE**.
6. Download the resulting `.wpress` archive file to your computer.

#### Step 2: Import to Hostinger
1. Log in to your Hostinger WP Admin dashboard (`https://yourdomain.com/wp-admin`).
2. Go to **Plugins -> Add New**, install and activate **All-in-One WP Migration**.
3. Go to **All-in-One WP Migration -> Import**.
4. Drag and drop your `.wpress` file into the import box.
5. Click **PROCEED** when prompted to overwrite the empty database.
6. Once completed, go to **Settings -> Permalinks** and click **Save Changes** twice to refresh URL routing.

---

### Method 2: Manual Git / FTP Deployment (For Developers)

If you prefer deploying theme updates via Git or FTP:

1. **FTP Access**: Retrieve your Hostinger FTP credentials from `hPanel -> Files -> FTP Accounts`.
2. **Theme Folder**: Upload `wp-content/themes/solar-energy-child` to `/public_html/wp-content/themes/` on Hostinger.
3. **Core Plugin**: Upload `wp-content/plugins/solar-energy-core` to `/public_html/wp-content/plugins/`.
4. **Activate**: Log in to Hostinger WP Admin and activate the child theme and plugin.

---

## ⚙️ Post-Migration Checklist on Hostinger

- [ ] **Permalinks**: Re-save Permalinks under `Settings -> Permalinks` (select `Post name`).
- [ ] **SSL / HTTPS**: Enable SSL Certificate in Hostinger hPanel under `Security -> SSL`.
- [ ] **WooCommerce Endpoints**: Check WooCommerce checkout, cart, and account pages under `WooCommerce -> Settings -> Advanced`.
- [ ] **Shortcode Verification**: Visit pages containing `[solar_configurator]` and `[solar_financing_calculator]` to verify interactive forms.
- [ ] **Cache Activation**: Turn on LiteSpeed Cache (included in Hostinger) under `WP Admin -> LiteSpeed Cache`.
- [ ] **Security**: Activate Wordfence firewall scan.
