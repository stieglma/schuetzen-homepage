#!/usr/bin/env python
# -*- coding: utf-8 -*- #
from __future__ import unicode_literals
import locale
locale.setlocale(locale.LC_ALL, "de_DE.utf8")

AUTHOR = 'Thomas Stieglmaier'
SITENAME = 'Schützenverein Edelweiß Gaishofen'
SITEURL = ''

THEME = 'theme'
PATH = 'content'

TIMEZONE = 'Europe/Berlin'

DEFAULT_LANG = 'de'

# Feed generation is usually not desired when developing
FEED_ALL_ATOM = None
CATEGORY_FEED_ATOM = None
TRANSLATION_FEED_ATOM = None
AUTHOR_FEED_ATOM = None
AUTHOR_FEED_RSS = None

DELETE_OUTPUT_DIRECTORY = True

ARTICLE_URL = 'blog/{slug}/'
ARTICLE_SAVE_AS = 'blog/{slug}/index.html'
ARTICLE_ORDER_BY = 'date'

DIRECT_TEMPLATES = ['index','blog']
PAGINATED_TEMPLATES = {}
DEFAULT_PAGINATION = False

SLUGIFY_SOURCE = 'title'

SUMMARY_MAX_LENGTH = 65

PLUGIN_PATHS = ['./plugins']
PLUGINS = ["assets", "image_process", "minify"]

MINIFY = {
  'remove_comments': True,
  'remove_all_empty_space': True,
  'remove_optional_attribute_quotes': False
}

DEFAULT_HEADER_IMAGE = "schuetzenverein.jpg"
IMAGE_PROCESS = {
    'same-size-thumb': {'type': 'image', 'ops': ["scale_in 350 300 True"]}
}

STATIC_PATHS = ['images', 'extra']
EXTRA_PATH_METADATA = {
  'extra/favicon.ico': {'path': 'favicon.ico'}
}

# Uncomment following line if you want document-relative URLs when developing
#RELATIVE_URLS = True
