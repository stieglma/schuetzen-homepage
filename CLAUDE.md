# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a custom WordPress theme for "Schützenverein Edelweiß Gaishofen" (a German shooting club). The theme is localized for German and includes custom functionality for team member management, galleries, and club-specific features.

## Development Setup

### Local WordPress Development
This theme should be placed in a WordPress installation's themes directory:
```bash
# Copy theme to WordPress themes directory
cp -r . /path/to/wordpress/wp-content/themes/schuetzen-edelweiss/

# Or create a symbolic link for development
ln -s /path/to/this/repo /path/to/wordpress/wp-content/themes/schuetzen-edelweiss
```

### WordPress Requirements
- WordPress 5.0 or higher
- PHP 7.4 or higher
- Support for custom post types and taxonomies

## Architecture & Structure

### Theme Files
- **index.php**: Main template file and fallback template
- **front-page.php**: Custom front page template
- **header.php**: Standard header template
- **header-front.php**: Special header for front page
- **footer.php**: Footer template
- **style.css**: Main stylesheet with theme information
- **functions.php**: Theme functions, hooks, and custom functionality

### Page Templates
- **page.php**: Default page template
- **single.php**: Single post template
- **single-team_member.php**: Custom template for team member posts
- **archive.php**: Archive page template
- **archive-team_member.php**: Team members archive template
- **taxonomy-team_category.php**: Team category taxonomy template
- **404.php**: Error page template
- **search.php**: Search results template
- **searchform.php**: Search form template

### Assets Organization
- **assets/css/**: Additional stylesheets and CSS files
- **assets/js/**: JavaScript files and libraries
- **assets/img/**: Theme images, icons, and graphics
- **assets/fonts/**: Web fonts and font files

### Include Files
- **inc/customizer.php**: WordPress Customizer settings and controls
- **inc/team-members.php**: Custom post type and taxonomy registration for team members

### Template Parts
- **template-parts/**: Reusable template components and partials

### Internationalization
- **languages/**: Translation files for German localization

## Key Features

### Custom Post Types
- **Team Members**: Custom post type for club members with categories
- Team member profiles with photos, roles, and biographical information
- Custom taxonomy for team categories/groups

### Theme Customization
- WordPress Customizer integration for theme options
- Custom header and footer configurations
- Responsive design with mobile-first approach

### German Localization
- Fully localized for German language (de_DE)
- Translation-ready with proper text domains
- German date formats and cultural conventions

## Development Workflow

1. **Template Changes**: Modify PHP template files in the root directory
2. **Styling Updates**: Edit `style.css` or files in `assets/css/`
3. **JavaScript**: Add/modify files in `assets/js/`
4. **Functionality**: Extend `functions.php` or create new files in `inc/`
5. **Testing**: Test in local WordPress installation with theme activated

## Custom Functionality

### Team Member Management
- Custom post type registration for team members
- Taxonomy system for organizing members by category/role
- Custom template files for displaying member information
- Archive and single views for team member content

### Theme Hooks and Filters
- Custom WordPress hooks and filters defined in `functions.php`
- Theme-specific action and filter implementations
- Integration with WordPress core functionality

## File Structure Best Practices

- Follow WordPress template hierarchy conventions
- Use proper WordPress coding standards
- Implement security best practices (sanitization, validation)
- Ensure responsive design compatibility
- Maintain accessibility standards