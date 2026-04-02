# Apex Elementor Widgets

A custom Elementor addon plugin that provides a dedicated widget for every
section of the Apex Financial Consulting landing page. Each widget exposes
full content, colour, and typography controls inside the Elementor panel —
no code editing required after setup.

---

## Requirements

- WordPress 6.0 or higher
- PHP 8.0 or higher
- Elementor Free 3.0 or higher
- [Apex WP Theme](https://github.com/yourname/apex-wp-theme) (recommended)

---

## Widgets Included

| Widget | Elementor Label | Section |
|---|---|---|
| `apex_navbar` | Apex Navbar | Site navigation and CTA button |
| `apex_hero` | Apex Hero | Hero headline, subtext, buttons, animated stats card |
| `apex_services` | Apex Services | Services grid with icon, title, and description per card |
| `apex_trust_bar` | Apex Trust Bar | Client logo / name strip with text or image mode |
| `apex_about` | Apex About | Two-column about section with animated number and feature checklist |
| `apex_testimonials` | Apex Testimonials | Testimonial cards with star rating, quote, and author |
| `apex_cta` | Apex CTA | Call-to-action box with email, URL, or anchor link |
| `apex_footer` | Apex Footer | Footer grid with menus, contact details, and social links |

---

## Installation

1. Download or clone this repository into your WordPress plugins directory:
```bash
   cd wp-content/plugins/
   git clone https://github.com/yourname/apex-elementor-widgets.git
```

2. Log in to your WordPress admin panel.
3. Go to **Plugins → Installed Plugins** and activate **Apex Elementor Widgets**.
4. Open any page in Elementor — you will find all widgets listed under the
   **Apex Widgets** category in the left panel.

---

## Folder Structure
```
apex-elementor-widgets/
├── apex-elementor-widgets.php   ← Plugin bootstrap, category registration
└── widgets/
    ├── navbar-widget.php
    ├── hero-widget.php
    ├── services-widget.php
    ├── trust-bar-widget.php
    ├── about-widget.php
    ├── testimonials-widget.php
    ├── cta-widget.php
    └── footer-widget.php
```

---

## How It Works

The main plugin file auto-discovers every `*-widget.php` file inside the
`/widgets/` folder and registers it with Elementor automatically. To add a
new widget, create a new file in `/widgets/` following the naming convention
`section-name-widget.php` with a class named `Apex_Sectionname_Widget`.
No changes to the main plugin file are needed.

---

## What Each Widget Controls

### Apex Navbar
- Logo text and accent character
- Primary navigation menu (via WordPress Menus)
- CTA button text and URL

### Apex Hero
- Badge text with show/hide toggle
- Headline (main + accent text independently)
- Subheadline and two buttons with separate URLs
- Animated stats card — full repeater (number, suffix, label)

### Apex Services
- Section label, title, and description
- Service cards — full repeater (icon picker, title, description, optional link)
- Column count (1–4) and fade-up animation toggle

### Apex Trust Bar
- Intro label with show/hide toggle
- Display mode — text names or image logos
- Full repeater with optional link per item
- Layout direction, alignment, and gap controls

### Apex About
- Animated number, suffix, and caption in the visual panel
- Optional background image for the visual panel
- Section label, title, and description
- Feature checklist — shared icon, full repeater (title + description)

### Apex Testimonials
- Section label, title, and description
- Global star rating with per-card override
- Full repeater — quote, avatar (initials or photo), author name, role
- Column count (1–3)

### Apex CTA
- Title and description
- Button with link type switcher — email address, custom URL, or page anchor
- Optional button icon with before/after position
- Background type — solid colour, gradient, or image with overlay

### Apex Footer
- Logo text and accent character
- About tagline
- Services and Company menus (via WordPress Menus)
- Contact details — email, phone, address
- Social links — LinkedIn, Twitter/X, Instagram
- Copyright text

---

## Style Controls (all widgets)

Every widget exposes a **Style tab** in Elementor with:

- Colour pickers for all text elements
- Full typography controls (font, size, weight, line height, letter spacing)
- Background colour, border, border radius, and box shadow for containers
- Spacing controls (padding, margin, gap) where relevant

---

## Author

**Santanu Sabata**
- Website: [https://santanusabata.netlify.app](https://santanusabata.netlify.app)
- Email: [santanuwp@gmail.com](mailto:santanuwp@gmail.com)

Feel free to reach out for questions, custom WordPress development,
or Elementor widget work.

---

## Support & Contributions

Found a bug or have a feature request? Open an issue on GitHub or send
an email to [santanuwp@gmail.com](mailto:santanuwp@gmail.com) and I'll
get back to you as soon as possible.

Contributions are welcome — fork the repo, make your changes, and open
a pull request.

---

## License

[GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html) — in line with
WordPress and Elementor licensing requirements.
```

---

## Suggested GitHub Repo Structure
```
yourname/
├── apex-wp-theme/          ← one repo
│   ├── README.md
│   ├── style.css
│   ├── functions.php
│   ├── header.php
│   ├── footer.php
│   ├── front-page.php
│   ├── index.php
│   └── assets/
│       ├── css/style.css
│       └── js/script.js
│
└── apex-elementor-widgets/ ← separate repo
    ├── README.md
    ├── apex-elementor-widgets.php
    └── widgets/
        ├── navbar-widget.php
        ├── hero-widget.php
        ├── services-widget.php
        ├── trust-bar-widget.php
        ├── about-widget.php
        ├── testimonials-widget.php
        ├── cta-widget.php
        └── footer-widget.php
