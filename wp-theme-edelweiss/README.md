# Edelweiss Gaishofen WordPress Theme

A configurable WordPress theme originally converted from a Pelican static site generator theme for shooting clubs. Perfect for sports clubs, shooting associations, and similar organizations.

## Features

- **Fully Configurable**: Extensive WordPress Customizer integration allows for complete customization without code changes
- **One-Page Design**: Hero section, about, statistics, training, teams, and contact sections all on the front page
- **Blog Functionality**: Full WordPress blog with posts, categories, tags, and archives
- **Gallery Integration**: FooGallery plugin integration for professional photo galleries
- **Responsive Design**: Bootstrap-based responsive layout works on all devices
- **German Localization**: Complete German translations included, built for German language support and date formatting
- **SEO Optimized**: Proper HTML5 structure, meta tags, and WordPress SEO compatibility
- **Performance Optimized**: Minified assets, optimized images, and efficient code

## Installation

1. Download the theme files
2. Upload to `/wp-content/themes/edelweiss-gaishofen/`
3. Activate the theme in WordPress admin
4. Go to Appearance > Customize to configure the theme

## Configuration

### Theme Customizer Options

**Hero Section**
- Background image
- Button texts and links
- Logo display

**About Section**
- Title and content
- Configurable text sections

**Statistics Section**
- Background image
- Configurable statistics (shooters, teams, etc.)
- Counter animations

**Training Section**
- Choose between simple customizer settings or WordPress page
- Configurable training times (up to 5 different times)
- Training location and additional information
- Up to 3 training images with descriptions
- Full WordPress page integration for complex layouts

**Teams Section**
- Up to 6 team images
- Team names and result links
- Configurable team information

**Contact Section**
- Up to 3 contact persons
- Contact titles, names, and information
- Configurable icons for each contact

**Legal Pages**
- Imprint content
- Privacy policy content

### Gallery System

The theme integrates with the FooGallery plugin for professional photo management:

1. Install and activate the FooGallery plugin from WordPress.org
2. Go to FooGallery > Add Gallery to create new galleries
3. Upload images using the built-in media uploader
4. Insert galleries into posts using shortcodes or the gallery button
5. Galleries display with responsive layouts and lightbox functionality

**Siehe GALLERY-MIGRATION-GUIDE.md für detaillierte Einrichtungs- und Migrationsanleitungen.**

### Team Members Management

The theme uses a custom post type for managing team members dynamically:

#### Adding Team Members

1. Go to **Team Members > Add New** in WordPress admin
2. Set a featured image (team photo)
3. Enter the team member's name as the title
4. Add a description in the content area
5. Set the position/role (e.g., "1. Mannschaft Pistole")
6. Add results link if applicable
7. Set display order for homepage (lower numbers appear first)
8. Check "Show on Homepage" to display in the front page teams section
9. Assign to team categories (Vorstandschaft, Pistolenmannschaften, etc.)

#### Team Categories

The theme includes predefined categories:
- **Vorstandschaft** - Board members and leadership
- **Pistolenmannschaften** - Pistol shooting teams
- **Gewehrmannschaften** - Rifle shooting teams
- **Jugendmannschaften** - Youth teams

You can add more categories in **Team Members > Team Categories**.

#### Managing Team Display

- **Homepage Display**: Only team members with "Show on Homepage" checked appear on the front page
- **Display Order**: Control the order using the display order field (0 = first)
- **Archive Pages**: All team members appear on `/team-member/` archive page
- **Category Pages**: Filter by category at `/team-category/[category-name]/`

### Training Section Configuration

The training section offers two content management approaches:

#### Option 1: Simple Customizer Settings (Default)

Use **Appearance > Customize > Training Section** for basic configuration:

1. **Training Content Source**: Select "Use Customizer Settings (Simple)"
2. **Training Location**: Enter where training takes place
3. **Training Times**: Configure up to 5 different training days/times
4. **Additional Information**: Add extra details (supports HTML)
5. **Training Images**: Upload up to 3 images with descriptions

#### Option 2: WordPress Page (Advanced)

For complex layouts with custom formatting:

1. **Create Training Page**: Go to **Pages > Add New**
2. **Use Template**: Copy content from `training-page-template.html` in theme folder
3. **Customize Content**: Edit the page content using WordPress editor
4. **Configure Theme**: In **Appearance > Customize > Training Section**:
   - Set "Training Content Source" to "Use WordPress Page (Advanced)"
   - Select your created page in "Training Page" dropdown

#### Training Page Template Features

The included template (`training-page-template.html`) provides:
- Structured training times layout
- Professional styling with icons
- Image galleries with captions
- Information boxes and highlights
- Responsive column layouts
- Custom CSS examples

### Navigation Menu

Configure your navigation menu in Appearance > Menus:
- Assign menu to "Primary Menu" location
- Use anchor links (#about, #training, etc.) for one-page navigation
- Add blog and other page links as needed

### Language Support

The theme includes complete German translations (`/languages/de_DE.po`). To activate:

1. Set your WordPress language to German in **Settings > General**
2. The interface will automatically display in German

For additional languages or translation updates, see `/languages/README.md`.

## Customization

### Child Theme

For custom modifications, create a child theme:

1. Create new folder: `/wp-content/themes/edelweiss-child/`
2. Add `style.css` with theme header
3. Add `functions.php` for custom functions

### Custom CSS

Add custom CSS in Appearance > Customize > Additional CSS

### Template Overrides

Override templates by copying from parent theme to child theme and modifying.

## Required Plugins

**Essential:**
- **FooGallery**: For gallery functionality (replaces custom gallery system)

**Recommended for enhanced functionality:**
- **WordPress SEO (Yoast)**: For better SEO optimization
- **Contact Form 7**: For contact forms
- **WP Super Cache**: For performance optimization

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- IE 11+

## File Structure

```
wp-theme-edelweiss/
├── assets/
│   ├── css/          # Stylesheets
│   ├── js/           # JavaScript files
│   ├── fonts/        # Web fonts
│   └── img/          # Theme images
├── inc/
│   ├── customizer.php    # Customizer configuration
│   └── team-members.php  # Team members functionality
├── template-parts/   # Partial templates
├── *.php            # Template files
├── style.css        # Main stylesheet & theme info
└── README.md        # This file
```

## Development

### Building Assets

If modifying CSS/JS:

1. Edit source files in `assets/` directories
2. Minify for production
3. Update version numbers in functions.php

### Translation

The theme is translation-ready:

1. Generate .pot file from theme
2. Create language-specific .po files
3. Place in `/languages/` folder

## Support

For theme support and customization:

- Check WordPress.org documentation
- Review theme customizer options
- Consult WordPress developer resources

## License

GPL v2 or later - https://www.gnu.org/licenses/gpl-2.0.html

## Credits

- Original Pelican theme by Thomas Stieglmaier
- Bootstrap CSS framework
- Magnific Popup for lightboxes
- Font Awesome icons (converted to SVG)
- Google Fonts (Rubik)

## Changelog

### Version 1.1.0
- **Enhanced Training Section**: Choose between customizer settings or WordPress pages
- **Dynamic Team Management**: Custom post type for team members with categories
- **Gallery System Migration**: Replaced custom gallery with FooGallery plugin integration
- **Improved Admin Experience**: Rich team member management with sorting and filtering
- **Advanced Customization**: Flexible content sources for different complexity needs
- **Template System**: Pre-built page templates for easy content creation
- **Reduced Maintenance**: Eliminated custom gallery code for better long-term maintainability

### Version 1.0.0
- Initial release
- Complete Pelican to WordPress conversion
- Full customizer integration
- Gallery system implementation
- Responsive design
- German localization