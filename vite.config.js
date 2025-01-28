import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react()],
  build: {
    rollupOptions: {
      input: {
        main: './resources/js/app.js',  // Asegúrate de que esta ruta sea correcta
      },
    },
  },
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