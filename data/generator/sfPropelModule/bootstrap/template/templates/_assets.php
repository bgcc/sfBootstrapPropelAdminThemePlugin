<?php if (isset($this->params['css']) && ($this->params['css'] !== false)): ?>
[?php use_stylesheet('<?php echo $this->params['css'] ?>', 'first'); ?]
<?php endif; ?>

[?php use_javascript('/sfBootstrapPropelAdminThemePlugin/js/theme.js', 'last'); ?]
