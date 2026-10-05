<?php
// Microfiber Bay — homepage
function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$tips = [
  'Turn socks inside out before washing so detergent reaches the side that touches your skin.',
  'Skip fabric softener on performance socks; it coats fibres and reduces wicking.',
  'Rotate at least three everyday pairs so elastic has time to recover between wears.',
  'Air-dry merino and microfiber socks flat or on a rack to protect their stretch.',
  'Match sock thickness to your shoes: thick cushioned socks need a little extra room.',
  'Trim toenails regularly; it is one of the simplest ways to prevent holes at the toe.',
  'Pair socks with a clip or mesh bag in the wash so they come out together.',
  'Pack one spare pair on long hikes or travel days to change into at lunch.',
];
$week = (int) date('W');
$tip = $tips[$week % count($tips)];
$m = (int) date('n');
if (in_array($m, [12, 1, 2])) { $season = ['Winter', 'Mid to heavy weight merino or wool blends, crew to knee height, and roomy boots so warm air can circulate.', ['Merino', 'Cushioned', 'Crew & knee']]; }
elseif (in_array($m, [3, 4, 5])) { $season = ['Spring', 'Light merino or cotton blends that handle cool mornings and warm afternoons, ideally quick-drying for rain showers.', ['Light merino', 'Cotton blend', 'Ankle & crew']]; }
elseif (in_array($m, [6, 7, 8])) { $season = ['Summer', 'Thin microfiber or bamboo blends, mesh ventilation zones and low cuts that keep feet cool in sneakers.', ['Microfiber', 'Bamboo', 'No-show & ankle']]; }
else { $season = ['Autumn', 'Mid-weight blends with a little cushioning for walks, and crew heights that pair well with boots and trousers.', ['Mid-weight', 'Wool blend', 'Crew']]; }
$msg = ''; $ok = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nl_email'])) {
    $email = trim((string) filter_input(INPUT_POST, 'nl_email', FILTER_SANITIZE_EMAIL));
    if (!empty($_POST['website'])) { $ok = true; $msg = 'Thank you.'; }
    elseif ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        @file_put_contents(__DIR__ . '/subscribers.txt', date('c') . "\t" . $email . PHP_EOL, FILE_APPEND | LOCK_EX);
        $ok = true; $msg = 'You are on the list. The first Bay Notes email arrives next month.';
    } else { $msg = 'Please enter a valid email address.'; }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Microfiber Bay | Sock Fibres, Fit, Sizing &amp; Care Guide</title>
<meta name="description" content="An independent sock guide: compare microfiber, merino, cotton and bamboo, choose the right sock height, convert shoe size to sock size and learn simple care habits.">
<meta name="robots" content="index, follow, max-image-preview:large">
<link rel="canonical" href="https://www.microfiberbay.com/">
<meta property="og:type" content="website"><meta property="og:site_name" content="Microfiber Bay">
<meta property="og:title" content="Microfiber Bay | Sock Fibres, Fit, Sizing &amp; Care Guide"><meta property="og:description" content="An independent sock guide: compare microfiber, merino, cotton and bamboo, choose the right sock height, convert shoe size to sock size and learn simple care habits.">
<meta property="og:url" content="https://www.microfiberbay.com/"><meta property="og:image" content="https://images.unsplash.com/photo-1585499583264-491df5142e83?auto=format&fit=crop&w=1200&q=75">
<meta name="twitter:card" content="summary_large_image"><meta name="theme-color" content="#0A2E3F">
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 40'%3E%3Crect width='40' height='40' rx='12' fill='%230A2E3F'/%3E%3Cpath d='M15 8h9v13l6 5a4.5 4.5 0 0 1-5.6 7L13 25a5 5 0 0 1-2-4V8' fill='%2319B5B0'/%3E%3C/svg%3E">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link rel="preconnect" href="https://images.unsplash.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Karla:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0LY0HY7L01"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-0LY0HY7L01');
</script>
<script type="application/ld+json">[{"@context": "https://schema.org", "@type": "Organization", "name": "Microfiber Bay", "url": "https://www.microfiberbay.com/", "email": "hello@microfiberbay.com", "telephone": "+1-888-777-5845", "address": {"@type": "PostalAddress", "streetAddress": "181 Mercer Street", "addressLocality": "New York", "addressRegion": "NY", "postalCode": "10012", "addressCountry": "US"}}, {"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "What is microfiber, exactly?", "acceptedAnswer": {"@type": "Answer", "text": "Microfiber describes synthetic filaments finer than one denier, which is thinner than a strand of silk. In socks it is usually polyester or nylon, often blended with a little elastane for stretch. The fine filaments create a soft, smooth fabric that moves moisture away from the skin quickly."}}, {"@type": "Question", "name": "Are cotton socks bad for running?", "acceptedAnswer": {"@type": "Answer", "text": "Not bad, but not ideal for long or hot runs. Cotton absorbs sweat and stays wet, which can increase friction. Many runners prefer synthetic or merino blends that wick moisture and dry faster."}}, {"@type": "Question", "name": "Will merino wool socks itch?", "acceptedAnswer": {"@type": "Answer", "text": "Merino fibres are much finer than traditional wool, so most people find them soft and comfortable. Blends with nylon also improve durability and smoothness."}}, {"@type": "Question", "name": "How often should I replace my socks?", "acceptedAnswer": {"@type": "Answer", "text": "Look for thinning at the heel and toe, cuffs that no longer hold, or fabric that has lost its cushioning. Rotating several pairs and washing them gently helps them last longer."}}, {"@type": "Question", "name": "Should socks be washed inside out?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, it is a good habit. Turning socks inside out helps remove skin cells and sweat from the inner surface and reduces pilling on the outside."}}, {"@type": "Question", "name": "Does Microfiber Bay sell socks?", "acceptedAnswer": {"@type": "Answer", "text": "No. Microfiber Bay is an independent educational guide. We do not sell socks and we are not affiliated with any brand or retailer."}}]}]</script>
</head>
<body>
<a class="skip" href="#main">Skip to content</a>
<header class="hdr">
  <div class="wrap">
    <a class="logo" href="index.php" aria-label="Microfiber Bay home"><svg viewBox="0 0 40 40" aria-hidden="true"><rect width="40" height="40" rx="12" fill="#0A2E3F"/><path d="M15 8h9v13l6 5a4.5 4.5 0 0 1-5.6 7L13 25a5 5 0 0 1-2-4V8" fill="#19B5B0"/><path d="M15 12h9" stroke="#D4E85C" stroke-width="2.4"/><path d="M6 31c4 0 4-3 8-3s4 3 8 3 4-3 8-3 4 3 4 3" fill="none" stroke="#D4E85C" stroke-width="1.8"/></svg><span>Microfiber<b>Bay</b></span></a>
    <nav id="nav" aria-label="Main navigation"><ul class="nav"><li><a href="index.php" aria-current="page">Home</a></li><li><a href="fiber-guide.html">Fiber Guide</a></li><li><a href="fit-care.html">Fit &amp; Care</a></li><li><a href="about.html">About</a></li><li><a href="contact.html">Contact</a></li></ul></nav>
    <button class="burger" aria-label="Open menu" aria-expanded="false" aria-controls="nav"><span></span><span></span><span></span></button>
  </div>
</header>
<main id="main">
<section class="hero">
  <div class="wrap">
    <div class="hero-grid">
      <div>
        <span class="tag">The sock knowledge harbour</span>
        <h1>Happier feet start with <em>the right fibre</em>.</h1>
        <p class="lead">Microfiber Bay is an independent guide to socks: how microfiber, merino, cotton and bamboo really feel, which height suits which shoe, how to find your size and how to make every pair last longer.</p>
        <div class="ctas"><a class="btn" href="#lab">Try the Fiber Lab</a><a class="btn btn--line" href="fiber-guide.html">Read the fiber guide</a></div>
      </div>
      <div class="blob">
        <div class="main"><img src="https://images.unsplash.com/photo-1585499583264-491df5142e83?auto=format&fit=crop&w=800&q=75" alt="blue, white and yellow socks laid out together" width="800" height="840" fetchpriority="high"></div>
        <div class="chip"><img src="https://images.unsplash.com/photo-1589895868947-b51095d437f3?auto=format&fit=crop&w=400&q=75" alt="feet in white socks resting on a brown blanket" width="400" height="400"></div>
        <div class="bubble"><b>&lt;1 denier</b>the thickness of a single microfiber filament, finer than silk</div>
      </div>
    </div>
    <div class="facts">
      <div><b>250,000</b><span>sweat glands in a pair of feet, roughly</span></div>
      <div><b>4</b><span>common sock heights: no-show to knee-high</span></div>
      <div><b>3</b><span>pairs in rotation helps elastic recover</span></div>
      <div><b>30&deg;C</b><span>a gentle wash temperature for most socks</span></div>
    </div>
    <div class="weekly" aria-live="polite">
      <div class="wk"><small>WEEK</small><span><?php echo $week; ?></span></div>
      <div><h2>Sock tip of the week</h2><p><?php echo e($tip); ?></p></div>
    </div>
  </div>
</section>

<section class="sec dark" id="lab" aria-labelledby="lab-t">
  <div class="wrap">
    <div class="sec-head"><div><span class="tag">Fiber Lab</span><h2 id="lab-t">Compare sock fibres at a glance</h2></div><p class="muted">Tap a fibre to see how it typically performs. Scores are general guidance out of 10; knit, thickness and blend percentages all change how a sock behaves.</p></div>
    <div class="lab">
      <div><div class="pic" data-fimg="cotton" hidden><img src="https://images.unsplash.com/photo-1633527992904-53f86f81a23a?auto=format&fit=crop&w=800&q=75" alt="close-up of an open cotton boll on the plant" width="800" height="680" loading="lazy"></div><div class="pic" data-fimg="merino" hidden><img src="https://images.unsplash.com/photo-1553319831-475829b41904?auto=format&fit=crop&w=800&q=75" alt="flock of sheep grazing on a green field" width="800" height="680" loading="lazy"></div><div class="pic" data-fimg="bamboo" hidden><img src="https://images.unsplash.com/photo-1525124480298-565f20ea00ae?auto=format&fit=crop&w=800&q=75" alt="close-up of green bamboo stalks" width="800" height="680" loading="lazy"></div><div class="pic" data-fimg="micro"><img src="https://images.unsplash.com/photo-1574883140236-2e2cb0835792?auto=format&fit=crop&w=800&q=75" alt="spools of colourful thread lined up" width="800" height="680" loading="lazy"></div></div>
      <div class="lab-card">
        <div class="chips" role="group" aria-label="Choose a fibre"><button type="button" data-fb="micro" aria-pressed="true">Microfiber</button><button type="button" data-fb="merino" aria-pressed="false">Merino</button><button type="button" data-fb="cotton" aria-pressed="false">Cotton</button><button type="button" data-fb="bamboo" aria-pressed="false">Bamboo</button></div>
        <div id="fiber" aria-live="polite"><h3>Microfiber blend</h3><p data-k="d">Ultra-fine polyester or nylon filaments, usually blended with a little elastane. Light, quick-drying and very durable.</p><div class="meters"></div><p class="best"><strong>Best for:</strong> <span data-k="b">Running, gym sessions, sport and travel.</span></p></div>
      </div>
    </div>
  </div>
</section>

<section class="sec" aria-labelledby="oc-t">
  <div class="wrap">
    <div class="sec-head"><div><span class="tag">For every moment</span><h2 id="oc-t">Socks matched to your day</h2></div><p class="muted">The best sock depends on what your feet are doing. Here is a quick guide to the features that matter most for each activity.</p></div>
    <div class="bento">
      <article class="tile big"><img src="https://images.unsplash.com/photo-1776860850757-a12ec6e457e2?auto=format&fit=crop&w=900&q=75" alt="runner's legs in colourful socks and athletic shoes" width="900" height="900" loading="lazy"><div class="cap"><h3>Running &amp; training</h3><p>Microfiber or synthetic blends, a snug arch band, seamless toes and light cushioning under the forefoot.</p></div></article>
      <article class="tile"><img src="https://images.unsplash.com/photo-1773515611225-b85ff42cb082?auto=format&fit=crop&w=600&q=75" alt="pink hiking boots with yellow laces and checked socks" width="600" height="440" loading="lazy"><div class="cap"><h3>Hiking</h3><p>Merino blends, crew height, padded heel.</p></div></article>
      <article class="tile txt"><h3>Golden rule</h3><p>Choose socks first, then try on shoes wearing them. Thickness can change your fit by half a size.</p></article>
      <article class="tile"><img src="https://images.unsplash.com/photo-1639753039220-e5c037d49f0f?auto=format&fit=crop&w=600&q=75" alt="person wearing striped socks with brown shoes" width="600" height="440" loading="lazy"><div class="cap"><h3>Office</h3><p>Fine-gauge cotton or merino, crew or over-calf.</p></div></article>
      <article class="tile"><img src="https://images.unsplash.com/photo-1641482850218-7a2fed872551?auto=format&fit=crop&w=600&q=75" alt="woman sitting on a blue sofa wearing white socks" width="600" height="440" loading="lazy"><div class="cap"><h3>Lounging</h3><p>Soft bamboo or brushed blends, relaxed cuffs.</p></div></article>
    </div>
  </div>
</section>

<section class="sec" style="padding-top:0" aria-labelledby="ht-t">
  <div class="wrap heights">
    <div>
      <span class="tag">Height picker</span>
      <h2 id="ht-t">Which sock height do you need?</h2>
      <p class="muted">Pick a height to see where it sits and which shoes it suits best.</p>
      <div class="hbtns" role="group" aria-label="Sock height"><button type="button" data-h="noshow" aria-pressed="false">No-show</button><button type="button" data-h="ankle" aria-pressed="false">Ankle</button><button type="button" data-h="crew" aria-pressed="true">Crew</button><button type="button" data-h="knee" aria-pressed="false">Knee-high</button></div>
      <div class="hpanel" id="hpanel" aria-live="polite">
        <div class="leg" aria-hidden="true"><svg viewBox="0 0 100 150"><path d="M38 6h22v104l22 16a10 10 0 0 1-6 18H30a8 8 0 0 1-8-8V112L38 100Z" fill="#EEF8F6" stroke="#0A2E3F" stroke-width="2"/><clipPath id="lc"><path d="M38 6h22v104l22 16a10 10 0 0 1-6 18H30a8 8 0 0 1-8-8V112L38 100Z"/></clipPath><rect id="sockfill" clip-path="url(#lc)" x="0" y="82.4" width="100" height="57.6" fill="#19B5B0"/><rect clip-path="url(#lc)" x="0" y="140" width="100" height="10" fill="#0A2E3F"/></svg></div>
        <h3>Crew</h3>
        <dl><dt>Where it sits</dt><dd data-k="w">Mid-calf, about 15&ndash;20 cm up the leg</dd><dt>Best with</dt><dd data-k="s">Boots, office wear, casual looks</dd><dt>Tip</dt><dd data-k="t">The most versatile height for most wardrobes.</dd></dl>
      </div>
    </div>
    <div class="hpics" style="display:grid;grid-template-columns:1fr 1fr;gap:14px">
      <div class="pic"><img src="https://images.unsplash.com/photo-1733410027829-c6622454c8b3?auto=format&fit=crop&w=600&q=75" alt="white sneakers worn with purple ankle socks" width="600" height="660" loading="lazy"></div>
      <div class="pic" style="margin-top:40px"><img src="https://images.unsplash.com/photo-1640348307534-50cec0f35a63?auto=format&fit=crop&w=600&q=75" alt="legs in long striped socks resting on a bed" width="600" height="660" loading="lazy"></div>
    </div>
  </div>
</section>

<section class="sec sizer" id="size" aria-labelledby="sz-t">
  <div class="wrap">
    <div class="sec-head"><div><span class="tag">Size finder</span><h2 id="sz-t">Turn your shoe size into a sock size</h2></div><p class="muted">Most socks use S, M, L and XL ranges based on shoe size. Brands vary slightly, so always check their own chart; this tool gives a reliable starting point.</p></div>
    <div class="sz-box">
      <form id="sizefind" onsubmit="return false">
        <div class="fld"><span style="display:block;font-weight:700;font-size:.9rem;margin-bottom:6px;color:var(--bay)" id="sys-l">Size system</span>
          <div class="seg" role="radiogroup" aria-labelledby="sys-l"><label><input type="radio" name="sys" value="w"><span>US Women</span></label><label><input type="radio" name="sys" value="m" checked><span>US Men</span></label><label><input type="radio" name="sys" value="e"><span>EU</span></label></div></div>
        <div class="fld"><label for="shoe">Your shoe size</label><select id="shoe"></select></div>
        <p class="muted small" style="margin:0">Between sizes? Size up for cushioned or wool socks, and stay true to size for thin, stretchy microfiber.</p>
      </form>
      <div class="r" aria-live="polite"><span style="font-weight:700;letter-spacing:.12em;font-size:.8rem">YOUR SOCK SIZE</span><div class="big" id="sz">L</div><p id="sz-note" style="margin:8px 0 0">Women&#8217;s US 10.5&ndash;12 &middot; Men&#8217;s US 9&ndash;11.5 &middot; EU 43&ndash;46</p></div>
    </div>
  </div>
</section>

<section class="band" aria-labelledby="cr-t">
  <img src="https://images.unsplash.com/photo-1600014190031-11dccd559665?auto=format&fit=crop&w=1800&q=75" alt="white and blue laundry drying on a line in the sun" width="1800" height="1200" loading="lazy">
  <div class="wrap">
    <span class="tag" style="color:var(--lime)">Care routine</span>
    <h2 id="cr-t">Four habits that double a sock&#8217;s life</h2>
    <p style="max-width:620px;color:#DCEBEE">Most socks wear out from heat and friction rather than from walking. A gentle routine keeps fibres springy and colours bright.</p>
    <ol class="steps">
      <li><p><strong>Inside out.</strong> Wash with the inner side facing out to lift sweat and reduce surface pilling.</p></li>
      <li><p><strong>Cool and gentle.</strong> 30&ndash;40&deg;C on a gentle cycle protects elastane and wool.</p></li>
      <li><p><strong>No softener.</strong> It clogs technical fibres and weakens their moisture-wicking ability.</p></li>
      <li><p><strong>Air-dry.</strong> Tumble heat is the biggest enemy of stretch; dry flat or on a rack.</p></li>
    </ol>
  </div>
</section>

<section class="sec" aria-labelledby="se-t">
  <div class="wrap season">
    <div class="pic"><img src="https://images.unsplash.com/photo-1604335398980-ededcadcc37d?auto=format&fit=crop&w=800&q=75" alt="row of white front-loading washing machines" width="800" height="600" loading="lazy"></div>
    <div>
      <span class="tag">Right now</span>
      <h2 id="se-t">What to wear this <?php echo e($season[0]); ?></h2>
      <p><?php echo e($season[1]); ?></p>
      <p><?php foreach ($season[2] as $p): ?><span class="pill"><?php echo e($p); ?></span><?php endforeach; ?></p>
      <p class="muted">Seasonal suggestions are for the Northern Hemisphere and update automatically each month.</p>
      <a class="btn btn--bay" href="fit-care.html">Full fit &amp; care guide</a>
    </div>
  </div>
</section>

<section class="sec" style="padding-top:0" aria-labelledby="fq-t">
  <div class="wrap faq-grid">
    <div><span class="tag">Questions</span><h2 id="fq-t">Sock questions, answered</h2><p class="muted">Have a question we haven&#8217;t covered? Our editors are happy to help.</p><a class="btn btn--bay" href="contact.html">Ask a question</a><div class="pic"><img src="https://images.unsplash.com/photo-1584563665126-afcc291afbe0?auto=format&fit=crop&w=800&q=75" alt="pink, yellow and blue socks side by side" width="800" height="600" loading="lazy"></div></div>
    <div><details open><summary>What is microfiber, exactly?</summary><p>Microfiber describes synthetic filaments finer than one denier, which is thinner than a strand of silk. In socks it is usually polyester or nylon, often blended with a little elastane for stretch. The fine filaments create a soft, smooth fabric that moves moisture away from the skin quickly.</p></details><details><summary>Are cotton socks bad for running?</summary><p>Not bad, but not ideal for long or hot runs. Cotton absorbs sweat and stays wet, which can increase friction. Many runners prefer synthetic or merino blends that wick moisture and dry faster.</p></details><details><summary>Will merino wool socks itch?</summary><p>Merino fibres are much finer than traditional wool, so most people find them soft and comfortable. Blends with nylon also improve durability and smoothness.</p></details><details><summary>How often should I replace my socks?</summary><p>Look for thinning at the heel and toe, cuffs that no longer hold, or fabric that has lost its cushioning. Rotating several pairs and washing them gently helps them last longer.</p></details><details><summary>Should socks be washed inside out?</summary><p>Yes, it is a good habit. Turning socks inside out helps remove skin cells and sweat from the inner surface and reduces pilling on the outside.</p></details><details><summary>Does Microfiber Bay sell socks?</summary><p>No. Microfiber Bay is an independent educational guide. We do not sell socks and we are not affiliated with any brand or retailer.</p></details></div>
  </div>
</section>

<section class="sec" style="padding-top:0" id="notes" aria-labelledby="nl-t">
  <div class="wrap">
    <div class="nl">
      <div class="in">
        <span class="tag" style="color:var(--lime)">Monthly email</span>
        <h2 id="nl-t">Bay Notes</h2>
        <p>One short email a month with a fibre explained, a seasonal care reminder and a reader question answered. No advertising and no spam.</p>
        <?php if ($msg): ?><p class="<?php echo $ok ? 'ok' : 'err'; ?>" role="status"><?php echo e($msg); ?></p><?php endif; ?>
        <form method="post" action="index.php#notes">
          <label for="ne" class="skip">Email address</label>
          <input type="email" id="ne" name="nl_email" placeholder="Your email address" required autocomplete="email">
          <input type="text" name="website" tabindex="-1" autocomplete="off" style="display:none" aria-hidden="true">
          <button class="btn" type="submit">Subscribe</button>
        </form>
        <p class="small">Read our <a href="privacy-policy.html">Privacy Policy</a>. Unsubscribe any time.</p>
      </div>
      <div class="pic"><img src="https://images.unsplash.com/photo-1727498830440-339a797d8423?auto=format&fit=crop&w=900&q=75" alt="display case filled with socks in many colours" width="900" height="700" loading="lazy"></div>
    </div>
  </div>
</section>
</main>
<footer class="ftr">
  <div class="wrap">
    <div class="ftr-grid">
      <div><a class="logo" href="index.php"><svg viewBox="0 0 40 40" aria-hidden="true"><rect width="40" height="40" rx="12" fill="#0A2E3F"/><path d="M15 8h9v13l6 5a4.5 4.5 0 0 1-5.6 7L13 25a5 5 0 0 1-2-4V8" fill="#19B5B0"/><path d="M15 12h9" stroke="#D4E85C" stroke-width="2.4"/><path d="M6 31c4 0 4-3 8-3s4 3 8 3 4-3 8-3 4 3 4 3" fill="none" stroke="#D4E85C" stroke-width="1.8"/></svg><span>Microfiber<b>Bay</b></span></a><p>An independent guide to socks: fibres, fit, sizing and care, written to help your feet stay comfortable from the first step of the day to the last.</p></div>
      <div><h4>Explore</h4><a href="fiber-guide.html">Fiber Guide</a><a href="fit-care.html">Fit &amp; Care</a><a href="index.php#lab">Fiber Lab</a><a href="index.php#size">Size Finder</a></div>
      <div><h4>Policies</h4><a href="privacy-policy.html">Privacy Policy</a><a href="terms-and-conditions.html">Terms &amp; Conditions</a><a href="cookie-policy.html">Cookie Policy</a><a href="disclaimer.html">Disclaimer</a><a href="editorial-policy.html">Editorial Policy</a></div>
      <div><h4>Contact</h4><p>181 Mercer Street, New York, NY 10012, United States</p><a href="tel:+18887775845">+1-888-777-5845</a><a href="mailto:hello@microfiberbay.com">hello@microfiberbay.com</a></div>
    </div>
    <div class="ftr-base"><span>&copy; <?php echo date("Y"); ?> Microfiber Bay. All rights reserved.</span><span>Photography from Unsplash under the Unsplash License. Not affiliated with any sock or apparel brand.</span></div>
  </div>
</footer>
<div class="cookie" id="cookie" role="dialog" aria-label="Cookie notice"><p>We use essential cookies and, with your permission, analytics cookies to understand which guides help most. <a href="cookie-policy.html">Cookie Policy</a></p><button class="y" data-cookie="accepted">Accept</button><button data-cookie="declined">Essential only</button></div>
<script src="assets/js/main.js" defer></script>
</body>
</html>
