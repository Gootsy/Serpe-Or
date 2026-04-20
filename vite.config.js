import { defineConfig } from 'vite';
import { ViteImageOptimizer } from 'vite-plugin-image-optimizer';

export default defineConfig({
  // A MODIFIER avec le nom de dossier du projet
  base: process.env.NODE_ENV === 'production' ? '/vite/public_html/dist/' : '/',

  build: {
    outDir: 'public_html/dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: 'src/main.js',
    },
    assetsInlineLimit: 0, // Force l'exportation en fichiers plutôt qu'en base64
  },
  css: {
    devSourcemap: true, // Aide au debug dans l'inspecteur du navigateur
  },
  server: {
    cors: true,
    origin: 'http://localhost:5173',
  },
  plugins: [
    {
      name: 'php-reload',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.php')) {
          server.ws.send({
            type: 'full-reload',
            path: '*',
          });
        }
      },
    },
    ViteImageOptimizer({
      /* Options de configuration par défaut pour les formats courants */
      png: {
        quality: 80,
      },
      jpeg: {
        quality: 60,
      },
      jpg: {
        quality: 60,
      },
      webp: {
        lossless: true,
      },
      avif: {
        lossless: true,
      },
      // Supprime les métadonnées inutiles des SVG
      svg: {
        multipass: true,
        plugins: [
          {
            name: 'preset-default',
            params: {
              overrides: {
                cleanupNumericValues: false,
                removeViewBox: false, // Important pour garder le ratio des SVG
              },
            },
          },
        ],
      },
    }),
  ],
});