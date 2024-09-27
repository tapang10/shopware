import MinimalCartPlugin from './js/minimal-cart.js';

const PluginManager = window.PluginManager;
PluginManager.override('OffCanvasCart', MinimalCartPlugin);
