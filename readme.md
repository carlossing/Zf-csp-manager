# Zend Framework Csp Manager
---

## Descripción

Módulo que permite agregar y personalizar las cabeceras CSP.

CSP es una medida de seguridad adoptada por los navegadores para mitigar los ataques XSS, para mayor información leer el árticulo de OWASP.
[https://www.owasp.org/index.php/Content_Security_Policy](https://www.owasp.org/index.php/Content_Security_Policy)

## Instalación

- Ejecutar
```
    composer require carlossing/CspManager
```

- Agregar en modules.config.php
```php
    'CspManager',
```


- Agregar a todos los recuros script 
```php
    <script src="demo.js" nonce="<?= $this->cspCode ?>"></script>
```
