# Sprachunterstützung / Language Support

Das Edelweiss Gaishofen Theme unterstützt deutsche Übersetzungen.

## Verwendung / Usage

Die deutsche Übersetzung (`de_DE.po`) ist bereits enthalten. Um sie zu aktivieren:

1. Stellen Sie sicher, dass Ihre WordPress-Installation auf Deutsch eingestellt ist
2. Gehen Sie zu **Einstellungen > Allgemein**
3. Setzen Sie "Sprache der Website" auf "Deutsch"

## Übersetzung kompilieren / Compiling Translation

Falls nötig, können Sie die .po-Datei zu einer .mo-Datei kompilieren:

```bash
# Mit msgfmt (wenn verfügbar)
msgfmt -o de_DE.mo de_DE.po

# Oder nutzen Sie Online-Tools wie:
# - https://po2mo.net/
# - Poedit (Desktop-Anwendung)
```

## Übersetzungen hinzufügen / Adding Translations

Um neue Übersetzungen hinzuzufügen:

1. Bearbeiten Sie `de_DE.po` mit einem Texteditor oder Poedit
2. Kompilieren Sie zu `de_DE.mo`
3. Laden Sie beide Dateien in den `/languages/` Ordner hoch

## Für andere Sprachen / For Other Languages

Um weitere Sprachen hinzuzufügen, erstellen Sie neue .po-Dateien:
- Französisch: `fr_FR.po`
- Italienisch: `it_IT.po`
- Englisch: `en_US.po`

Basis für neue Übersetzungen ist die `de_DE.po` Datei.