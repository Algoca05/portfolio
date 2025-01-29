import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react()],
  build: {
    manifest: true,
    outDir: 'public/dist',
    rollupOptions: {
      input: './resources/js/app.js',
    },
  },
  publicDir: 'resources/static', // Cambia esto a un directorio separado
  esbuild: {
    loader: 'jsx',
    include: [
      'resources/js/**/*.jsx',
      'resources/js/**/*.js',
    ],
    exclude: [],
  },
  optimizeDeps: {
    esbuildOptions: {
      loader: {
        '.js': 'jsx',
      },
    },
  },
});