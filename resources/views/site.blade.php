<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  @foreach ($posts as $key => $value)
    <url>
      <?php echo  _($value->name); ?>
        <loc></loc>
    </url>
  @endforeach

<url>
    <loc>https://laraget.com/blog</loc>
</url>
<url>
    <loc>https://laraget.com/about-me</loc>
</url>
<url>
    <loc>https://laraget.com/demos</loc>
</url>
</urlset>
