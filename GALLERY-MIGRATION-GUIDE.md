# Galerie Migration: Eigenes System → FooGallery Plugin

## Übersicht

Das Theme wurde aktualisiert und nutzt jetzt das FooGallery Plugin anstelle des eigenen Galerie-Systems. Dies bietet bessere Wartung, mehr Funktionen und verbesserte Benutzerfreundlichkeit.

## Installationsschritte

### 1. FooGallery Plugin installieren

1. Gehen Sie zu **Plugins > Installieren** im WordPress Admin-Bereich
2. Suchen Sie nach "FooGallery"
3. Installieren und aktivieren Sie das **FooGallery** Plugin von FooPlugins
4. Gehen Sie zu **FooGallery > Einstellungen** um die Grundeinstellungen zu konfigurieren

### 2. Empfohlene FooGallery Einstellungen

- **Standard-Galerie-Vorlage**: Wählen Sie "Responsive Bildergalerie" oder "Ausgerichtete Galerie"
- **Lightbox**: Aktivieren Sie "FooBox Image Viewer" oder "Einfach"
- **Lazy Loading**: Für bessere Performance aktivieren
- **Bild-Ladeeffekt**: Auf "Einblenden" setzen für sanfte Übergänge

## Migrationsprozess

### Für bestehende Galerie-Alben

Falls Sie bereits Galerien in `/wp-content/uploads/galleries/[album-name]/` haben:

1. **Neue Galerie im Admin erstellen**:
   - Gehen Sie zu **FooGallery > Galerie hinzufügen**
   - Geben Sie den gleichen Namen wie Ihr Ordner (z.B. "Schützenfest 2023")
   - Wählen Sie die Vorlage "Responsive Bildergalerie"

2. **Bilder hochladen**:
   - Klicken Sie auf "Medien hinzufügen"
   - Laden Sie alle Bilder aus Ihrem alten Galerie-Ordner hoch
   - Wählen Sie alle Bilder aus und klicken Sie auf "Galerie erstellen"

3. **Galerie konfigurieren**:
   - Setzen Sie die Miniaturansicht-Größe (empfohlen: 300x200px)
   - Aktivieren Sie die Lightbox falls gewünscht
   - Stellen Sie die Galerie-Layout-Optionen ein

4. **In Beitrag einfügen**:
   - Bearbeiten Sie Ihren Blog-Beitrag, der die alte Galerie nutzte
   - Entfernen Sie den alten "Gallery Album" Meta-Feld Wert
   - Klicken Sie im Beitrags-Editor auf "Galerie hinzufügen"
   - Wählen Sie Ihre neu erstellte Galerie
   - Fügen Sie den Shortcode ein

### Für neue Galerien

1. **Galerie erstellen**: Gehen Sie zu **FooGallery > Galerie hinzufügen**
2. **Bilder hochladen**: Nutzen Sie "Medien hinzufügen" um Bilder hochzuladen
3. **Konfigurieren**: Wählen Sie Vorlage und Einstellungen
4. **Einfügen**: Nutzen Sie "Galerie hinzufügen" im Beitrags-Editor oder kopieren Sie den Shortcode

## Neuer Arbeitsablauf

### Galerien erstellen (Empfohlener Prozess)

1. **Event-Beitrag erstellen**:
   - Gehen Sie zu **Beiträge > Erstellen**
   - Schreiben Sie Ihren Event-Inhalt

2. **Passende Galerie erstellen**:
   - Gehen Sie zu **FooGallery > Galerie hinzufügen**
   - Benennen Sie sie genauso wie Ihr Event (z.B. "Schützenfest 2023")
   - Laden Sie Event-Fotos hoch

3. **Galerie einfügen**:
   - Zurück in Ihrem Beitrags-Editor, positionieren Sie den Cursor wo Sie die Galerie wollen
   - Klicken Sie "Galerie hinzufügen" über dem Editor
   - Wählen Sie Ihre Galerie aus und fügen Sie sie ein

### Alternative Methode - Shortcodes

Sie können Galerien auch direkt mit Shortcodes einfügen:

```
[foogallery id="123"]
```

Wobei `123` die Galerie-ID ist (zu finden unter FooGallery > Alle Galerien).

## Theme-Integration

Das Theme wurde aktualisiert um nahtlos mit FooGallery zu funktionieren:

- **Styling**: Galerien übernehmen automatisch das Theme-Styling
- **Lightbox**: Funktioniert mit der bestehenden Lightbox-Implementation des Themes
- **Responsive**: Galerien sind vollständig responsive und mobilfreundlich

## Vorteile des neuen Systems

- **Kein eigener Code**: Reduzierte Wartungslast
- **Bessere Admin-Benutzerfreundlichkeit**: Drag-Drop Galerie-Erstellung
- **Mehr Funktionen**: Mehrere Layout-Optionen, Lazy Loading, SEO-Optimierung
- **Professioneller Support**: Regelmäßige Updates und Community-Support
- **Mediathek-Integration**: Besseres Datei-Management

## Fehlerbehebung

### Galerie wird nicht angezeigt
- Prüfen Sie, dass das FooGallery Plugin aktiviert ist
- Überprüfen Sie den Shortcode: `[foogallery id="X"]`
- Stellen Sie sicher, dass Bilder tatsächlich in die Galerie hochgeladen wurden

### Styling-Probleme
- Leeren Sie alle Caching-Plugins
- Prüfen Sie das zusätzliche CSS des Themes auf Konflikte
- Probieren Sie verschiedene FooGallery Vorlagen aus

### Performance-Probleme
- Aktivieren Sie Lazy Loading in den FooGallery Einstellungen
- Optimieren Sie Bildgrößen (empfohlen: max. 1200px Breite)
- Aktivieren Sie Caching-Plugins

## Support

- **FooGallery Dokumentation**: https://fooplugins.com/foogallery-wordpress-gallery-plugin/
- **WordPress Support**: https://wordpress.org/support/plugin/foogallery/

## Migrations-Checkliste

- [ ] FooGallery Plugin installieren und aktivieren
- [ ] Grundlegende FooGallery Einstellungen konfigurieren
- [ ] Galerien für bestehende Inhalte erstellen
- [ ] Bestehende Beiträge aktualisieren um FooGallery Shortcodes zu nutzen
- [ ] Alte Galerie-Ordner-Referenzen aus Beiträgen entfernen
- [ ] Alle Galerien im Frontend testen
- [ ] Alte Galerie-Ordner aufräumen (optional - als Backup behalten)