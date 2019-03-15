import os
from pelican import signals


def get_content_path(pelican):
    return pelican.settings.get('PATH')


def get_gallery_path(pelican):
    gallery_path = pelican.settings.get('GALLERY_PATH', 'images/gallery')
    content_path = get_content_path(pelican)

    return os.path.join(content_path, gallery_path)


def add_gallery_post(generator):
    gallerycontentpath = get_gallery_path(generator)

    for article in generator.articles:
        if 'gallery' in article.metadata.keys():
            album = article.metadata.get('gallery')
            galleryimages = []

            articlegallerypath=os.path.join(gallerycontentpath, album)
            print(articlegallerypath)

            if(os.path.isdir(articlegallerypath)):
                print("dir found")
                for i in os.listdir(articlegallerypath):
                    print(i)
                    if not i.startswith('.') and os.path.isfile(os.path.join(os.path.join(gallerycontentpath, album), i)):
                        galleryimages.append(i)

            article.album = album
            article.galleryimages = sorted(galleryimages)


def register():
    signals.article_generator_finalized.connect(add_gallery_post)
