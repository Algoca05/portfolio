import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react()],
  build: {
    manifest: true,
    outDir: 'public/dist',
    rollupOptions: {
      input: './resources/js/app.jsx',
    },
  },
  publicDir: 'resources/static',
  esbuild: {
    loader: 'jsx', // Cambia esto a una cadena
  },
  optimizeDeps: {
    esbuildOptions: {
      loader: 'jsx', // Cambia esto a una cadena
    },
  },
});