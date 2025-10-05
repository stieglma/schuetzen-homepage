# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a German website for "Schützenverein Edelweiß Gaishofen" (a shooting club) built with Pelican, a Python static site generator. The site is localized for German (de_DE.UTF-8) and uses a custom theme with specialized plugins for image processing and galleries.

## Development Commands

### Using Makefile (Primary Method)
```bash
# Generate the website
make html

# Clean output directory
make clean

# Regenerate files upon modification (watch mode)
make regenerate

# Build and serve locally at http://localhost:8000
make serve

# Serve with auto-regeneration (development mode)
make devserver

# Generate using production settings
make publish
```

### Using Invoke Tasks (Alternative Method)
```bash
# Build local version
invoke build

# Build with delete switch
invoke rebuild

# Auto-regenerate on file changes
invoke regenerate

# Serve at http://localhost:8000
invoke serve

# Build then serve
invoke reserve

# Build production version
invoke preview

# Clean generated files
invoke clean
```

### Dependency Management
```bash
# Install dependencies (if using pipenv)
pipenv install

# Or using pip
pip install -r requirements.txt
```

## Architecture & Structure

### Content Organization
- **content/articles/**: Blog posts and articles in Markdown format
- **content/images/**: Static images organized by event/topic subdirectories
- **content/extra/**: Additional static files (favicon, etc.)

### Theme System
- **theme/templates/**: Jinja2 templates (base.html, index.html, blog.html, article.html, tag.html)
- **theme/static/**: CSS, JavaScript, images, and web fonts
- **theme/static/css/**: Bootstrap-based styling with custom CSS
- **theme/static/js/**: jQuery, Bootstrap, and Magnific Popup libraries

### Plugin Architecture
- **plugins/gallery/**: Custom gallery plugin for organizing event photos
- **plugins/assets/**: Asset bundling and optimization
- **plugins/image_process/**: Image processing and thumbnail generation
- Built-in minify plugin for HTML/CSS/JS optimization

### Configuration Files
- **pelicanconf.py**: Main development configuration with German locale settings
- **publishconf.py**: Production configuration (if exists)
- **Makefile**: Build automation with Pelican commands
- **tasks.py**: Invoke-based task definitions

## Key Configuration Settings

The site uses German locale (`de_DE.UTF-8`) with specific customizations:
- Custom URL structure for articles (`blog/{slug}/`)
- Image processing with thumbnail generation
- Gallery system for event photos
- Minification for performance optimization
- Custom icon set defined in pelicanconf.py for UI elements

## Development Workflow

1. **Adding Content**: Create new Markdown files in `content/articles/`
2. **Adding Images**: Place images in `content/images/` with appropriate subdirectories
3. **Theme Changes**: Modify templates in `theme/templates/` or styles in `theme/static/css/`
4. **Plugin Development**: Extend functionality in `plugins/` directory
5. **Testing**: Use `make devserver` for live development with auto-reload

## Image Handling

The site uses a sophisticated image processing system:
- Thumbnails are automatically generated in multiple sizes
- Gallery plugin organizes images by event/article
- Image metadata and processing defined in pelicanconf.py
- Supports various image formats with PIL/Pillow

## Performance Features

- HTML/CSS/JS minification via pelican-minify plugin
- Asset bundling through webassets
- Optimized image thumbnails
- Static file optimization for web delivery