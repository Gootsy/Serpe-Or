
# Installation d'un projet Vite dans un dossier WAMP

## Prequis : installer Node.js & npm

## Exemple dans un dossier test dans WAMP : C:\wamp64\www\mon-projet

## 1. Dans le Terminal, il faut se placer dans le dossier "mon-projet", au besoin :

cd mon-projet

## 2. Créer le fichier package.json

npm init -y

## 3. Installation de Vite, Sass, PostCSS, Autoprefixer et Image-optimizer

npm install vite sass autoprefixer postcss vite-plugin-image-optimizer sharp svgo --save-dev

## 4. Configuration de PostCSS et autoprefixer : créer un fichier postcss.config.js à la racine et y mettre le code suivant :

```js
export default {
  plugins: {
    autoprefixer: {},
  },
};
```

## 5. Configuration de Vite : créer un fichier vite.config.js à la racine et y mettre le code suivant :

```js
import { defineConfig } from "vite";

export default defineConfig({
  base: process.env.NODE_ENV === "production" ? "/mon-projet/public_html/dist/" : "/",

  build: {
    outDir: "public_html/dist",
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: "src/main.js",
    },
  },
  css: {
    devSourcemap: true, // Aide au debug dans l'inspecteur du navigateur
  },
  server: {
    cors: true,
    origin: "http://localhost:5173",
  },
});
```
## 6. Structure du projet

mon-projet/
├── node_modules/             # Dépendances (Vite, Sass, Imagemin...)
├── src/                      # SOURCES (Ton espace de travail)
│   ├── images/               # Tes images brutes (à importer dans JS/SCSS)
│   │   └── photo.jpg
│   ├── scss/                 # Tes fichiers Sass
│   │   ├── _variables.scss   # Variables Sass
│   │   ├── _buttons.scss     # Partials Sass
│   │   ├── _header.scss      # Partials Sass
│   │   ├── _content.scss     # Partials Sass
│   │   ├── _footer.scss      # Partials Sass
│   │   └── main.scss         # Fichier Sass principal
│   └── main.js               # Point d'entrée JS (importe le SCSS et les images)
├── public_html/              # RACINE SERVEUR (Ce que WAMP affiche)
│   ├── dist/                 # DESTINATION (Généré par Vite après 'npm run build')
│   │   ├── assets/           # Images compressées et CSS compilé
│   │   └── .vite/            # Contient le manifest.json
│   ├── includes/             # Tes fichiers PHP (header, footer, db...)
│   └── index.php             # Ton fichier PHP principal
├── [.gitignore]              # Pour exclure node_modules et dist du versioning
├── package.json              # Scripts et dépendances
├── postcss.config.js         # Configuration pour Autoprefixer
└── vite.config.js            # Configuration de l'usine Vite
