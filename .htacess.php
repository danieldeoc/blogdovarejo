<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /gazin/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /gazin/index.php [L]
</IfModule>