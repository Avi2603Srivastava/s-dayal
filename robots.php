<?php require 'process/global.php'; ?>
User-agent: * 
Allow:
Disallow: /*.pdf$

Sitemap: https://<?php $uri = $WebSettings->websiteUrl(); echo $uri; ?>/sitemap.xml