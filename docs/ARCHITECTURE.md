# System Architecture & Recommended Free Plugin Stack

This document details the modular architecture for the **Solar Energy Solutions** website, outlining how free WordPress plugins integrate with our custom child theme to deliver an enterprise-grade experience.

---

## 🏗️ Architecture Diagram

```text
                                  +---------------------------------------+
                                  |         WordPress Core (CMS)          |
                                  +---------------------------------------+
                                                      |
                  +-----------------------------------+-----------------------------------+
                  |                                   |                                   |
       +-----------------------+           +-----------------------+           +-----------------------+
       |   Astra / Kadence     |           |      WooCommerce      |           |  solar-energy-child   |
       |     Parent Theme      |           |    (eCommerce Core)   |           |     (Custom Theme)    |
       +-----------------------+           +-----------------------+           +-----------------------+
                  |                                   |                                   |
                  +-----------------------------------+-----------------------------------+
                                                      |
    +-------------------------------------------------+-------------------------------------------------+
    |                                                 |                                                 |
+----------------------+                   +----------------------+                   +----------------------+
|  ATUM Inventory Mgmt |                   | Forminator / SSA     |                   |  Rank Math / Wordfence|
|  (Stock & Logistics) |                   | (Forms & Booking)    |                   | (SEO & Security)     |
+----------------------+                   +----------------------+                   +----------------------+
```

---

## 🔌 Free Plugin Integration Matrix

| Objective | Recommended Plugin | Key Features & Implementation Notes |
| :--- | :--- | :--- |
| **eCommerce & Retail** | `WooCommerce` | Manages solar hardware, bundle packages, inverters, and battery accessories. |
| **Inventory Control** | `ATUM Inventory Management` | Provides real-time stock tracking, supplier management, and reorder triggers. |
| **Form Logic & Inquiries** | `Forminator` | Multi-step quote requests, conditional lead generation, and custom field logic. |
| **Installation Booking** | `Simply Schedule Appointments` | Allows customers to select site inspection dates; syncs with Google Calendar. |
| **Order & Technician Tracking**| `TrackShip for WooCommerce` | Automated SMS/Email order status updates for delivery and installation crews. |
| **Customer Portal** | `WP Customer Area` | Secure portal where clients access site inspection reports, invoices, and warranties. |
| **Live Chat & AI Bot** | `Tidio` | Free AI bot for instant customer inquiries, lead capture, and routing. |
| **SEO Optimization** | `Rank Math SEO` | Schema markup for Local Business, Product structured data, and XML sitemaps. |
| **Security & Auditing** | `Wordfence Security` | Firewall protection, malware scanning, and login brute-force prevention. |
| **Backup & Migration** | `All-in-One WP Migration` | Easy one-click export/import for migrating from local dev to Hostinger. |

---

## 🔒 Free Tier Operational Constraints & Workarounds

1. **Subscriptions & Maintenance Plans**:
   * *Free Plugin Solution*: Combine WooCommerce custom subscription product attributes with **WP Simple Pay** or standard WooCommerce recurring payment options.
2. **Technician Dispatch**:
   * *Free Plugin Solution*: Use custom order statuses in WooCommerce (`Installation Scheduled`, `Technician En Route`, `Completed`) coupled with email triggers via **WP Crontrol**.

---

## 🎨 Design System & UI Principles

- **Typography Balance**: Headings set to `text-balance` for clean visual alignment; numeric data set to `tabular-nums`.
- **Color Palette**: Modern energy slate blue (`#0f172a`), solar amber (`#f59e0b`), eco green (`#10b981`), and crisp neutral backgrounds (`#f8fafc`).
- **Mobile First**: All calculator shortcodes and product cards are optimized for small touch screens and field technician mobile devices.
