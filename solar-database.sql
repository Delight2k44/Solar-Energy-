-- ==========================================================================
-- Kinetix Engineering Solutions E-Commerce Database Seeding Script (WordPress Schema)
-- Targets: wp_posts and wp_postmeta tables (Default WordPress Prefix: wp_)
-- ==========================================================================

-- --------------------------------------------------------------------------
-- 1. SEED DEFAULT SITE PAGES & ASSIGN CUSTOM TEMPLATES
-- --------------------------------------------------------------------------

-- Home Page (ID: 10001)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	10001, 1, NOW(), NOW(), 'Solar Energy Homepage', 
	'Home', '', 'publish', 'closed', 'closed', 
	'home', '', '', NOW(), NOW(), 
	'', 0, 'http://localhost/home', 0, 'page', 
	'', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(10001, '_wp_page_template', 'page-templates/template-home.php')
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Solar System Configurator Page (ID: 10002)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	10002, 1, NOW(), NOW(), '[solar_configurator]', 
	'Solar System Configurator', '', 'publish', 'closed', 'closed', 
	'solar-configurator', '', '', NOW(), NOW(), 
	'', 0, 'http://localhost/solar-configurator', 0, 'page', 
	'', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(10002, '_wp_page_template', 'page-templates/template-configurator.php')
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Financing & Rebates Page (ID: 10003)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	10003, 1, NOW(), NOW(), '[solar_financing_calculator]', 
	'Financing & Rebates', '', 'publish', 'closed', 'closed', 
	'financing', '', '', NOW(), NOW(), 
	'', 0, 'http://localhost/financing', 0, 'page', 
	'', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(10003, '_wp_page_template', 'page-templates/template-financing.php')
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Book Installation Page (ID: 10004)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	10004, 1, NOW(), NOW(), 'Schedule your on-site inspection.', 
	'Book Installation Inspection', '', 'publish', 'closed', 'closed', 
	'schedule-inspection', '', '', NOW(), NOW(), 
	'', 0, 'http://localhost/schedule-inspection', 0, 'page', 
	'', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(10004, '_wp_page_template', 'page-templates/template-scheduling.php')
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Client Portal Page (ID: 10005)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	10005, 1, NOW(), NOW(), 'Client energy dashboard.', 
	'Client Portal', '', 'publish', 'closed', 'closed', 
	'client-portal', '', '', NOW(), NOW(), 
	'', 0, 'http://localhost/client-portal', 0, 'page', 
	'', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(10005, '_wp_page_template', 'page-templates/template-portal.php')
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- --------------------------------------------------------------------------
-- 2. SEED BRANDING LOGO & PRODUCT PICTURES (MEDIA LIBRARY ATTACHMENTS)
-- --------------------------------------------------------------------------

-- Logo Image (ID: 30001)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	30001, 1, NOW(), NOW(), 'Branding Logo', 
	'logo', '', 'inherit', 'closed', 'closed', 
	'logo', '', '', NOW(), NOW(), 
	'', 0, 'wp-content/themes/solar-energy-child/assets/images/logo.jpg', 0, 'attachment', 
	'image/jpeg', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(30001, '_wp_attached_file', 'solar-energy-child/assets/images/logo.jpg')
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Solar Panel Product Image (ID: 30002)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	30002, 1, NOW(), NOW(), 'Monocrystalline Solar Panel', 
	'solar_panel', '', 'inherit', 'closed', 'closed', 
	'solar_panel', '', '', NOW(), NOW(), 
	'', 0, 'wp-content/themes/solar-energy-child/assets/images/solar_panel.jpg', 0, 'attachment', 
	'image/jpeg', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(30002, '_wp_attached_file', 'solar-energy-child/assets/images/solar_panel.jpg')
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Hybrid Inverter Product Image (ID: 30003)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	30003, 1, NOW(), NOW(), 'Smart Hybrid Inverter', 
	'inverter', '', 'inherit', 'closed', 'closed', 
	'inverter', '', '', NOW(), NOW(), 
	'', 0, 'wp-content/themes/solar-energy-child/assets/images/inverter.jpg', 0, 'attachment', 
	'image/jpeg', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(30003, '_wp_attached_file', 'solar-energy-child/assets/images/inverter.jpg')
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Lithium Battery Product Image (ID: 30004)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	30004, 1, NOW(), NOW(), 'Lithium Battery Storage Pack', 
	'battery', '', 'inherit', 'closed', 'closed', 
	'battery', '', '', NOW(), NOW(), 
	'', 0, 'wp-content/themes/solar-energy-child/assets/images/battery.jpg', 0, 'attachment', 
	'image/jpeg', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(30004, '_wp_attached_file', 'solar-energy-child/assets/images/battery.jpg')
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- --------------------------------------------------------------------------
-- 3. SEED WOOCOMMERCE PRODUCT DATA (POSTS & PRODUCT META RELATIONSHIPS)
-- --------------------------------------------------------------------------

-- Product 1: JA Solar 550W Panel (ID: 20001)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	20001, 1, NOW(), NOW(), 'High-efficiency monocrystalline solar panel engineered for maximum daily yield and long-term durability.', 
	'JA Solar 550W DeepBlue 3.0 Monocrystalline Panel', '', 'publish', 'open', 'closed', 
	'ja-solar-550w-panel', '', '', NOW(), NOW(), 
	'', 0, 'http://localhost/product/ja-solar-550w-panel', 0, 'product', 
	'', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(20001, '_sku', 'SOL-PAN-JA550'),
(20001, '_regular_price', '3299'),
(20001, '_price', '3299'),
(20001, '_manage_stock', 'yes'),
(20001, '_stock', '15'),
(20001, '_stock_status', 'instock'),
(20001, '_thumbnail_id', '30002') -- Linked to solar_panel.jpg
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Product 2: Sunsynk 8kW Inverter (ID: 20002)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	20002, 1, NOW(), NOW(), 'Smart hybrid inverter with advanced touch screen, dual MPPT inputs, and certified loadshedding protection.', 
	'Sunsynk 8kW Hybrid Inverter (Single Phase)', '', 'publish', 'open', 'closed', 
	'sunsynk-8kw-inverter', '', '', NOW(), NOW(), 
	'', 0, 'http://localhost/product/sunsynk-8kw-inverter', 0, 'product', 
	'', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(20002, '_sku', 'SOL-INV-SS8'),
(20002, '_regular_price', '28499'),
(20002, '_price', '28499'),
(20002, '_manage_stock', 'yes'),
(20002, '_stock', '8'),
(20002, '_stock_status', 'instock'),
(20002, '_thumbnail_id', '30003') -- Linked to inverter.jpg
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Product 3: Freedom Won Lite Home 10/8 Battery (ID: 20003)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	20003, 1, NOW(), NOW(), 'Modular lithium iron phosphate storage battery pack featuring a 10-year warranty and high-cycle longevity.', 
	'Freedom Won Lite Home 10/8 LiFePO4 Battery', '', 'publish', 'open', 'closed', 
	'freedom-won-lite-10kwh', '', '', NOW(), NOW(), 
	'', 0, 'http://localhost/product/freedom-won-lite-10kwh', 0, 'product', 
	'', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(20003, '_sku', 'SOL-BAT-FW10'),
(20003, '_regular_price', '58999'),
(20003, '_price', '58999'),
(20003, '_manage_stock', 'yes'),
(20003, '_stock', '5'),
(20003, '_stock_status', 'instock'),
(20003, '_thumbnail_id', '30004') -- Linked to battery.jpg
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);


-- Product 4: Sunsynk 5kW + Battery Starter Kit (ID: 20004)
INSERT INTO `wp_posts` (
	`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, 
	`post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, 
	`post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, 
	`post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, 
	`post_mime_type`, `comment_count`
) VALUES (
	20004, 1, NOW(), NOW(), 'A complete starter combo kit designed to keep your essential household loads online during Stage 6 loadshedding.', 
	'Sunsynk 5kW Hybrid Inverter + 5kWh Battery Starter Kit', '', 'publish', 'open', 'closed', 
	'sunsynk-5kw-starter-kit', '', '', NOW(), NOW(), 
	'', 0, 'http://localhost/product/sunsynk-5kw-starter-kit', 0, 'product', 
	'', 0
) ON DUPLICATE KEY UPDATE `post_title` = VALUES(`post_title`);

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES 
(20004, '_sku', 'SOL-KIT-START5'),
(20004, '_regular_price', '74999'),
(20004, '_price', '74999'),
(20004, '_manage_stock', 'yes'),
(20004, '_stock', '12'),
(20004, '_stock_status', 'instock'),
(20004, '_thumbnail_id', '30003') -- Linked to inverter.jpg
ON DUPLICATE KEY UPDATE `meta_value` = VALUES(`meta_value`);
