import React from 'react';
import ReactDOM from 'react-dom/client';
import './bootstrap';
import App from './components/App';
import Example from './components/Example';

const root = ReactDOM.createRoot(document.getElementById('example'));

root.render(
  <React.StrictMode>
    <App />
    <Example />
  </React.StrictMode>
);