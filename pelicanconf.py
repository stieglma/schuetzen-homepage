#!/usr/bin/env python
# -*- coding: utf-8 -*- #
from __future__ import unicode_literals

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
PLUGINS = ["assets", "minify"]

MINIFY = {
  'remove_comments': True,
  'remove_all_empty_space': True,
  'remove_optional_attribute_quotes': False
}

# Uncomment following line if you want document-relative URLs when developing
#RELATIVE_URLS = True
