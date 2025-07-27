<?php
require 'process/global.php';
header("Content-Type: application/xml; charset=utf-8");
$uri = $WebSettings->websiteUrl();
$base_url = "https://$uri";
$parsedBaseUrl = parse_url($base_url);
$baseHost = $parsedBaseUrl['host'];

$date = new DateTime();
$date->modify('+5 hours 30 minutes');
$sitmapDate = $date->format('Y-m-d\TH:i:sP');

function getLinksFromWebsite($url, $baseHost)
{
    $html = @file_get_contents($url);
    if (!$html) return [$url];

    preg_match_all('/<a\s+[^>]*href=["\']([^"\']+)["\']/i', $html, $matches);

    $links = array_unique($matches[1]);
    $absoluteLinks = [];

    foreach ($links as $link) {
        if (strpos($link, '#') !== false || strpos($link, 'javascript:void(0)') !== false || strpos($link, 'mailto') !== false || strpos($link, 'tel') !== false) {
            continue;
        }
        if (!preg_match('/^(http|https):\/\//', $link)) {
            $link = rtrim($url, '/') . '/' . ltrim($link, '/');
        }
        $parsedLink = parse_url($link);
        $linkHost = $parsedLink['host'] ?? '';
        if ($linkHost === $baseHost) {
            $absoluteLinks[] = $link;
        }
    }

    return $absoluteLinks;
}

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 
                            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <?php
    $links = getLinksFromWebsite($base_url, $baseHost);
    array_unshift($links, $base_url);
    $links = array_values(array_unique($links));
    foreach ($links as $link):
        $priority =  $link === $base_url ? "1.00" : "0.80";
    ?>
        <url>
            <loc><?= htmlspecialchars($link, ENT_XML1, 'UTF-8') ?></loc>
            <lastmod><?= $sitmapDate ?></lastmod>
            <priority><?= $priority ?></priority>
        </url>
    <?php endforeach; ?>
</urlset>