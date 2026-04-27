# Weg Custom Theme

A custom WordPress theme for a German migration guide website, featuring an interactive Visa Finder tool, modular design, and a clean, professional aesthetic inspired by German national colors.

## Project Overview

This project involves designing and developing a fully custom WordPress theme from scratch for a website focused on guiding users through the process of migrating to Germany. The theme emphasizes user-friendly navigation, interactive tools, and a professional aesthetic inspired by German national colors. The site serves as an entry point for visa information, guides, and resources, with a focus on accessibility, responsiveness, and modern web standards.

## Key Features

### Custom Theme Structure

- Built a modular WordPress theme using PHP templates (`header.php`, `footer.php`, `index.php`, `front-page.php`, `single.php`, `page-visa-finder.php`).
- Integrated WordPress hooks and functions for dynamic content rendering, including `get_header()`, `get_footer()`, `wp_nav_menu()`, and `comments_template()`.
- Ensured theme compatibility with WordPress standards, including proper enqueueing of stylesheets and scripts via `functions.php`.

### Header and Footer Design

- Created a distinctive header with a diagonal German flag accent (black, red, and gold stripes) using CSS `::before` pseudo-elements and `transform: skewX()` for a 60-degree angle effect.
- Applied matching diagonal stripes to the footer using `::after` pseudo-elements.
- Implemented responsive navigation menu with hover effects and mobile-friendly layout.

### Home Page (Front Page)

- Designed a compelling landing page with four key sections:
  - **Hero Section:** Bold headline and subtext introducing the site's purpose.
  - **Problem Statement:** Callout box highlighting common migration challenges.
  - **Solution Section:** Explanation of the platform's value proposition.
  - **Main Actions:** Interactive cards linking to "Read Guides" and "Visa Finder" with hover animations.
- Used semantic HTML and CSS Grid/Flexbox for layout, with elevated card designs and smooth transitions.

### Blog and Post Pages

- Developed a responsive blog index (`index.php`) displaying posts in a grid of cards, each with title, excerpt, date, and "Read Conversation" link.
- Created a single post template (`single.php`) for full article display, including author info, categories/tags, and a styled comment section.
- Enhanced comment forms by removing the optional "Website" field for simplicity, while maintaining name, email, and comment inputs.
- Styled comments with avatars, nested replies, and a clean form interface.

### Interactive Visa Finder Tool

- Built a dynamic, JavaScript-powered decision tree for visa eligibility assessment.
- Features a two-panel layout: left panel for step-by-step questions (YES/NO buttons), right panel for real-time visa status updates.
- Implemented state management with arrays for questions, rules, and active visas.
- Used deterministic logic to eliminate ineligible visas based on user answers, with visual feedback (green for active, red for eliminated).
- Added animations for question transitions and visa status changes, ensuring a smooth user experience.

### Styling and User Experience

- Applied a modern, clean design using system fonts (`-apple-system`, `BlinkMacSystemFont`, etc.) for cross-platform consistency.
- Incorporated German color scheme (black `#000000`, red `#DD0000`, gold `#FFCC00`) throughout the theme.
- Ensured full responsiveness with media queries, flexible layouts, and mobile-first principles.
- Added subtle animations (hover lifts, fades) and accessibility features (proper contrast, focus states).
- Optimized for performance with efficient CSS and minimal JavaScript dependencies.

## Technologies Used

- **Backend:** WordPress CMS, PHP for templating and theme logic.
- **Frontend:** HTML5, CSS3 (with advanced selectors like pseudo-elements and transforms), Vanilla JavaScript for interactivity.
- **Tools:** Local development environment (XAMPP), browser dev tools for testing, WordPress Codex for reference.
- **Best Practices:** Semantic markup, ARIA-friendly elements, SEO considerations (proper headings, meta tags), and cross-browser compatibility.

## Installation and Setup

1. **Prerequisites:**
   - WordPress 5.0 or higher installed on a web server with PHP 7.4+ and MySQL.
   - Basic knowledge of WordPress administration.

2. **Install the Theme:**
   - Download or clone this repository.
   - Upload the `weg-custom-theme` folder to your WordPress installation's `wp-content/themes/` directory.
   - In your WordPress admin dashboard, go to **Appearance > Themes**.
   - Activate the "Weg Custom Theme".

3. **Configure the Site:**
   - Set your front page to display a static page (under **Settings > Reading**).
   - Create a page titled "Visa Finder" and assign it the "Visa Finder" template.
   - Add menu items under **Appearance > Menus** and assign to the "Primary Menu" location.
   - For comments to work, ensure comments are enabled in **Settings > Discussion**.

4. **Customize Content:**
   - Add posts for the blog section.
   - Update theme colors or styles in `style.css` as needed.
   - For the Visa Finder, the URLs in the JavaScript can be updated to point to actual guide pages.

## Challenges and Solutions

- **Diagonal Flag Stripes:** Achieving precise 60-degree angles required creative use of CSS transforms and positioning, ensuring they integrated seamlessly without disrupting text readability.
- **Visa Finder Logic:** Balancing simplicity with accuracy in the decision tree involved mapping out user flows and edge cases, resulting in a rule-based system that adapts questions based on remaining options.
- **Responsive Design:** Maintaining visual integrity across devices necessitated careful use of Flexbox and Grid, with fallbacks for older browsers.
- **Comment Customization:** Removing the website field involved WordPress filters, ensuring the change didn't break core functionality.
