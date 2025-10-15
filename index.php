<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portfolio — Reda Lakhledj | BTS SIO SLAM</title>
    <meta name="description" content="Portfolio — Reda Lakhledj, BTS SIO SLAM (2024–2026), alternant chez ParIstanbul. Projets, missions, compétences et contact." />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

    <style>
        :root{
            --bg:#0a0b0f; --panel:#0f1117; --ink:#e8ecf3; --muted:#9aa3b2; --line:#1b2030;
            --acc:#ea4444; --pri:#6aa3ff; --radius:18px; --shadow:0 12px 32px rgba(0,0,0,.45);
        }
        *{box-sizing:border-box}
        html,body{height:100%}
        body{margin:0;background:var(--bg);color:var(--ink);font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial;font-size:15px;overflow-x:hidden}
        h1,h2,h3{margin:.2rem 0 .8rem;font-weight:600;letter-spacing:.2px}
        p{margin:.4rem 0 .9rem}
        a{color:inherit;text-decoration:none}
        .wrap{width:min(1120px,92vw);margin-inline:auto}

        /* Header centré */
        header{position:sticky;top:0;z-index:40;background:rgba(10,11,15,.6);backdrop-filter:saturate(140%) blur(12px);border-bottom:1px solid var(--line)}
        .nav{display:flex;align-items:center;justify-content:center;padding:.7rem 0}
        .links{display:flex;gap:1rem;flex-wrap:wrap}
        .links a{opacity:.85;position:relative}
        .links a::after{content:"";position:absolute;left:0;right:0;bottom:-6px;height:2px;background:linear-gradient(90deg,var(--pri),var(--acc));transform:scaleX(0);transform-origin:left;transition:transform .25s ease}
        .links a:hover{opacity:1}.links a:hover::after{transform:scaleX(1)}

        /* Background FX */
        .fx{position:fixed;inset:0;z-index:-2;pointer-events:none;background:
                radial-gradient(1200px 600px at 80% -10%, rgba(127,90,240,.22), transparent 60%),
                radial-gradient(900px 500px at -10% 80%, rgba(234,68,68,.18), transparent 60%),
                radial-gradient(800px 400px at 110% 70%, rgba(106,163,255,.18), transparent 60%);
            animation:shift 18s ease-in-out infinite alternate}
        @keyframes shift{0%{transform:translate3d(0,0,0) scale(1)}100%{transform:translate3d(0,-20px,0) scale(1.03)}}
        .gridfx{position:fixed;inset:-200px;z-index:-3;opacity:.2;background:
                linear-gradient(transparent 31px,#1b2030 32px),
                linear-gradient(90deg,transparent 31px,#1b2030 32px);
            background-size:32px 32px;mask-image:radial-gradient(ellipse 60% 50% at 50% 50%, #000 60%, transparent 100%);animation:floatgrid 22s linear infinite}
        @keyframes floatgrid{from{transform:translateY(0)}to{transform:translateY(-64px)}}

        /* Marquee juste sous la nav */
        .marquee-wrap{
            border-top:1px solid var(--line);
            border-bottom:1px solid var(--line);
            background:rgba(255,255,255,.02);
        }
        .marquee{overflow:hidden}
        .marquee .track{
            display:flex;gap:1.2rem;padding:.6rem 0;
            min-width:max-content;
            animation:defilement 18s linear infinite;
            will-change:transform;
        }
        .pill{border:1px solid var(--line);border-radius:999px;padding:.35rem .7rem;background:#0c1019;color:#c8d0e3}
        @keyframes defilement{from{transform:translateX(0)}to{transform:translateX(-50%)}}

        /* Sections */
        section{padding:3.2rem 0}
        .hero{padding:2.2rem 0 3.2rem}
        .hero-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:2rem}
        .card{background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);padding:1.2rem;box-shadow:var(--shadow)}
        .badge{display:inline-flex;gap:.5rem;align-items:center;padding:.35rem .6rem;border-radius:999px;background:rgba(106,163,255,.12);color:#cfe0ff;border:1px solid rgba(106,163,255,.25);font-weight:600}
        .cta{display:inline-flex;align-items:center;gap:.6rem;padding:.7rem 1rem;border-radius:12px;border:1px solid var(--line);background:linear-gradient(180deg,#131722,#0f1117);transition:transform .18s ease,box-shadow .18s ease,border-color .18s}
        .cta:hover{transform:translateY(-2px);box-shadow:0 10px 20px rgba(0,0,0,.35);border-color:#26304a}

        .blob{position:absolute;inset:auto -8% -14% auto;width:320px;height:320px;filter:blur(18px);opacity:.5;z-index:-1}

        .terminal{border:1px solid var(--line);border-radius:14px;overflow:hidden;background:#0b0f1a}
        .term-head{display:flex;align-items:center;gap:.4rem;padding:.5rem .6rem;background:linear-gradient(180deg,#121a2b,#0b0f1a)}
        .dot{width:10px;height:10px;border-radius:50%}.dot.red{background:#ff5f56}.dot.yellow{background:#ffbd2e}.dot.green{background:#27c93f}
        .term-title{margin-left:.3rem;color:#b9c2d3;font-size:.9rem;opacity:.85}
        .term-body{padding:1rem;font-family:"JetBrains Mono",ui-monospace,Menlo,Consolas,"Courier New",monospace;color:#e6ecff;min-height:230px;line-height:1.6}
        .prompt{color:#8da2fb}.cursor{display:inline-block;width:8px;height:1em;background:#e6ecff;margin-left:2px;animation:blink 1s steps(1,end) infinite;vertical-align:-2px}
        @keyframes blink{50%{opacity:0}}

        .sectitle{display:flex;align-items:center;gap:.6rem;margin-bottom:1rem}
        .dot.badge-dot{width:10px;height:10px;border-radius:50%;background:radial-gradient(circle at 30% 30%, var(--acc), var(--pri))}
        .grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1rem}
        .project .thumb{height:180px;border-radius:14px;border:1px solid var(--line);background:linear-gradient(135deg, rgba(106,163,255,.12), rgba(234,68,68,.12));display:grid;place-items:center;color:#cdd6e6}
        .tags{display:flex;gap:.5rem;flex-wrap:wrap}
        .tag{font-size:.85rem;padding:.25rem .45rem;border:1px dashed #2b3247;border-radius:8px;color:#c8d0e3;background:#0c101a}
        .timeline{display:grid;grid-auto-flow:column;grid-auto-columns:1fr;gap:1rem;overflow-x:auto;padding-bottom:.5rem}
        .step{min-width:240px;background:var(--panel);border:1px solid var(--line);border-radius:14px;padding:.9rem}
        .skills,.chips{display:flex;flex-wrap:wrap;gap:.6rem}
        .chip{padding:.55rem .7rem;border-radius:999px;border:1px solid var(--line);background:#0c1019;color:#c8d0e3}

        .contact{display:grid;grid-template-columns:1.1fr .9fr;gap:1rem}
        input,textarea{width:100%;padding:.75rem .85rem;border-radius:12px;border:1px solid var(--line);background:#0c1019;color:var(--ink);outline:none}
        input::placeholder,textarea::placeholder{color:#68718a}
        textarea{min-height:120px;resize:vertical}.btn{cursor:pointer;border:none}
        footer{padding:2rem 0;color:var(--muted);text-align:center;border-top:1px solid var(--line)}

        .reveal{opacity:0;transform:translateY(18px);transition:opacity .6s ease,transform .6s ease}
        .reveal.in{opacity:1;transform:none}

        /* Flash message */
        .flash{margin-top:.6rem;padding:.65rem .8rem;border-radius:10px;border:1px solid var(--line);background:#0c1019}
        .flash.ok{border-color:#2f8f46;background:rgba(47,143,70,.12);color:#cfead6}
        .flash.err{border-color:#a23b3b;background:rgba(234,68,68,.12);color:#ffd6d6}
        .hidden{display:none}

        @media (max-width:900px){
            .hero-grid,.grid,.contact{grid-template-columns:1fr}
            .blob{display:none}
        }
    </style>
</head>
<body>
<div class="fx"></div><div class="gridfx"></div>

<!-- NAV centrée -->
<header>
    <div class="wrap nav">
        <nav class="links">
            <a href="#projets">Projets</a>
            <a href="#formations">Formations</a>
            <a href="#skills">Compétences</a>
            <a href="#contact">Contact</a>
        </nav>
    </div>
</header>

<!-- MARQUEE juste en dessous de la nav -->
<div class="marquee-wrap">
    <div class="wrap">
        <div class="marquee">
            <div class="track">
                <span class="pill">BTS SIO SLAM</span><span class="pill">Alternance ParIstanbul</span><span class="pill">2024 → 2026</span>
                <span class="pill">PHP • Symfony • JS</span><span class="pill">MySQL • Doctrine</span><span class="pill">HTML • CSS</span>
                <span class="pill">Git • Linux • WAMP</span><span class="pill">BTS SIO SLAM</span>
            </div>
        </div>
    </div>
</div>

<main class="wrap">
    <!-- HERO -->
    <section class="hero">
        <div class="hero-grid card" style="position:relative;overflow:hidden">
            <svg class="blob" viewBox="0 0 600 600" aria-hidden="true">
                <defs><linearGradient id="g" x1="0" x2="1" y1="0" y2="1"><stop offset="0%" stop-color="var(--acc)"/><stop offset="100%" stop-color="var(--pri)"/></linearGradient></defs>
                <path id="blobPath" fill="url(#g)" d="M424.3,311.1Q431.6,372.1,382.1,406Q332.6,439.9,271.7,461.8Q210.7,483.6,179.6,430.3Q148.6,377,120.6,326.5Q92.6,276,106.5,213.3Q120.3,150.6,170.4,113.4Q220.6,76.3,280,83.2Q339.4,90.1,375.1,132.8Q410.7,175.4,418.2,237.7Q425.8,300.1,424.3,311.1Z"/>
            </svg>

            <div class="reveal">
                <div class="badge">BTS SIO — SLAM • 2ᵉ année • 20 ans</div>
                <h1 style="font-size:2.35rem;margin:.65rem 0 .2rem">Reda Lakhledj</h1>
                <p><b>Alternant chez ParIstanbul</b> — Lycée Robert Schuman (Dugny), Promo <b>2024 → 2026</b>.</p>
                <p class="muted">Étudiant passionné en développement et gestion de projet. Curieux, impliqué et rigoureux.</p>
                <div class="chips"><span class="chip">Programmation</span><span class="chip">Vidéo & design</span><span class="chip">Jeux vidéo</span></div>
                <div style="display:flex;gap:.6rem;margin-top:.8rem">
                    <a class="cta" href="#projets">Voir mes projets</a>
                    <a class="cta" href="#contact">Me contacter</a>
                </div>
            </div>

            <!-- Terminal -->
            <div class="reveal">
                <div class="terminal card" style="padding:0">
                    <div class="term-head"><span class="dot red"></span><span class="dot yellow"></span><span class="dot green"></span><span class="term-title">reda@portfolio — bash</span></div>
                    <div class="term-body"><pre id="term"></pre></div>
                </div>
                <small class="muted">Terminal démo — commandes Symfony/Composer/Git</small>
            </div>
        </div>
    </section>

    <!-- PROJETS -->
    <section id="projets">
        <div class="sectitle"><span class="dot badge-dot"></span><h2>Projets réalisés</h2></div>
        <div class="grid">
            <article class="project card reveal">
                <div class="thumb">Nuit de l'Info 2024</div>
                <h3>Challenge national</h3>
                <p class="muted">Participation à la Nuit de l’Info 2024 — création d’une application web en équipe avec PHP et SQL autour d’un thème imposé.</p>
                <div class="tags"><span class="tag">PHP</span><span class="tag">SQL</span><span class="tag">Collab</span></div>
            </article>
            <article class="project card reveal">
                <div class="thumb">Gestion Bibliothèque</div>
                <h3>CRUD & Authentification</h3>
                <p class="muted">Application de gestion (emprunts, retours, lecteurs) avec login sécurisé et base de données MySQL.</p>
                <div class="tags"><span class="tag">PHP</span><span class="tag">MySQL</span><span class="tag">CRUD</span></div>
            </article>
            <article class="project card reveal">
                <div class="thumb">Cantine & Alternance</div>
                <h3>Symfony / Doctrine</h3>
                <p class="muted">Plateforme de gestion des repas et alternances avec triggers SQL et DataTables interactives.</p>
                <div class="tags"><span class="tag">Symfony</span><span class="tag">Twig</span><span class="tag">Doctrine</span></div>
            </article>
            <article class="project card reveal">
                <div class="thumb">Dashboard & API</div>
                <h3>Monitoring dynamique</h3>
                <p class="muted">Visualisation des données API avec graphiques et effets d’apparition.</p>
                <div class="tags"><span class="tag">JS</span><span class="tag">REST</span></div>
            </article>
        </div>
    </section>

    <!-- FORMATIONS -->
    <section id="formations">
        <div class="sectitle"><span class="dot badge-dot"></span><h2>Formations</h2></div>
        <div class="timeline reveal">
            <div class="step"><b>2024–2026 — BTS SIO SLAM</b><br>Lycée Robert Schuman (Dugny)<br><span class="muted">Programmation (Java, PHP, SQL, HTML), bases de données, gestion de projets.</span></div>
            <div class="step"><b>2023–2024 — Licence LLCE (1 an)</b><br>INALCO — Indonésien-malaisien</div>
            <div class="step"><b>2022–2023 — Baccalauréat général</b><br><span class="muted">Bac général.</span></div>
        </div>
    </section>

    <!-- COMPÉTENCES -->
    <section id="skills">
        <div class="sectitle"><span class="dot badge-dot"></span><h2>Compétences</h2></div>
        <div class="skills reveal">
            <div class="chip">PHP</div><div class="chip">Symfony</div><div class="chip">Twig</div>
            <div class="chip">Java</div><div class="chip">HTML/CSS/JS</div>
            <div class="chip">SQL • MySQL/MariaDB</div><div class="chip">Doctrine ORM</div>
            <div class="chip">Git • GitHub</div><div class="chip">Suite Adobe • Office</div>
            <div class="chip">Linux • WAMP/MAMP</div><div class="chip">SEO • Accessibilité</div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact">
        <div class="sectitle"><span class="dot badge-dot"></span><h2>Contact</h2></div>
        <div class="contact">

            <form class="card" id="contactForm" action="contact.php" method="POST">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:.6rem">
                    <div><label class="muted">Nom</label><input name="name" placeholder="Ton nom" required></div>
                    <div><label class="muted">Email</label><input name="email" type="email" placeholder="email@exemple.com" required></div>
                </div>
                <div style="margin-top:.6rem"><label class="muted">Message</label>
                    <textarea name="message" placeholder="Parlons de ton projet…" required></textarea>
                </div>
                <input type="text" name="website" style="display:none">
                <button class="cta btn" id="sendBtn" style="margin-top:.8rem">Envoyer</button>
                <small class="muted" id="contactNote">(Envoi sécurisé via PHPMailer)</small>
                <div id="flash" class="flash hidden" role="status" aria-live="polite"></div>
            </form>

            <div class="card reveal">
                <h3>Coordonnées</h3>
                <p class="muted" style="margin:.2rem 0">Téléphone</p>
                <p><b>07 63 45 60 80</b></p>
                <p class="muted" style="margin:.2rem 0">Email</p>
                <p><b><a href="mailto:lreda2801@mail.com">lreda2801@mail.com</a></b></p>
                <div class="chips" style="margin-top:.6rem">
                    <a class="chip" href="https://github.com/Redalak" target="_blank" rel="noreferrer">GitHub</a>
                    <a class="chip" href="#" target="_blank" rel="noreferrer">LinkedIn</a>
                    <a class="chip" href="mailto:lreda2801@mail.com">Email direct</a>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>© <span id="year"></span> Reda Lakhledj — BTS SIO SLAM. Thème sombre animé.</footer>

<!-- GSAP -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script>
    // GSAP reveal
    gsap.registerPlugin(ScrollTrigger);
    document.querySelectorAll('.reveal').forEach(el=>{
        ScrollTrigger.create({trigger:el,start:"top 85%",onEnter:()=>el.classList.add('in')});
    });
    document.getElementById('year').textContent=new Date().getFullYear();

    // Blob morph
    const blob=document.getElementById('blobPath');
    const shapes=[ "M424.3,311.1Q431.6,372.1,382.1,406Q332.6,439.9,271.7,461.8Q210.7,483.6,179.6,430.3Q148.6,377,120.6,326.5Q92.6,276,106.5,213.3Q120.3,150.6,170.4,113.4Q220.6,76.3,280,83.2Q339.4,90.1,375.1,132.8Q410.7,175.4,418.2,237.7Q425.8,300.1,424.3,311.1Z",
        "M454.4,320.8Q424.6,381.6,375.8,430.1Q327,478.6,264.9,468.4Q202.9,458.1,149.6,420.9Q96.3,383.8,99.6,317.1Q103,250.3,111.8,188.6Q120.7,126.8,173.5,93.7Q226.3,60.6,290.4,70.4Q354.6,80.3,402.5,123.6Q450.4,167,467.7,228.5Q485.1,290.1,454.4,320.8Z",
        "M430.8,307.6Q435.3,365.2,392.8,408.9Q350.2,452.7,291,466.4Q231.8,480.2,187,438.1Q142.1,396,119.8,341.8Q97.5,287.7,104.6,217.7Q111.7,147.6,164.3,108.9Q216.8,70.3,285.5,61.7Q354.2,53.2,390.5,109.4Q426.9,165.5,429.9,227.8Q433,290.2,430.8,307.6Z"];
    let idx=0; setInterval(()=>{idx=(idx+1)%shapes.length;blob.setAttribute('d',shapes[idx]);},2600);

    // Terminal typing
    const lines=[
        'reda@host % git clone https://github.com/reda-lakhledj/portfolio.git',
        "Cloning into 'portfolio'...", 'done.',
        'reda@host % composer create-project symfony/skeleton myapp',
        'Installing dependencies from lock file','Generating optimized autoload files',
        'reda@host % php bin/console make:entity Etudiant',
        ' created: src/Entity/Etudiant.php',' updated: src/Repository/EtudiantRepository.php',
        'reda@host % php bin/console make:migration','Generated new migration "Version2025XXXXXX".',
        'reda@host % php bin/console doctrine:migrations:migrate','  ++ migrating','  ++ ok',
        'reda@host % symfony server:start -d','Server listening on https://127.0.0.1:8000 ✔'
    ];
    const term=document.getElementById('term'); let li=0,ci=0;
    function typeNext(){
        if(li>=lines.length){setTimeout(()=>{term.textContent='';li=0;ci=0;typeNext();},1500);return;}
        const cur=lines[li];
        if(ci<=cur.length){term.innerHTML='<span class="prompt">$</span> '+cur.slice(0,ci)+'<span class="cursor"></span>';ci++;setTimeout(typeNext,14+Math.random()*22);}
        else{term.textContent=(term.textContent.replace(/\u2588?$/,''))+'\n';li++;ci=0;setTimeout(typeNext,180);}
    } typeNext();

    // Marquee continue : duplique une fois pour un défilement sans coupure
    const track = document.querySelector('.marquee .track');
    if (track && !track.dataset.duplique) {
        track.innerHTML += track.innerHTML;
        track.dataset.duplique = '1';
    }

    // ---- FORM + FLASH ----
    const form = document.getElementById('contactForm');
    const btn  = document.getElementById('sendBtn');
    const note = document.getElementById('contactNote');
    const flash= document.getElementById('flash');

    function showFlash(msg, ok=true){
        flash.textContent = msg;
        flash.classList.remove('hidden','ok','err');
        flash.classList.add(ok ? 'ok' : 'err');
        if(ok) setTimeout(()=>flash.classList.add('hidden'), 6000);
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        flash.classList.add('hidden');
        btn.disabled = true;
        btn.textContent = 'Envoi…';
        note.textContent = '(Envoi en cours)';
        try {
            const res  = await fetch('contact.php', {
                method: 'POST',
                body: new FormData(form),
                headers: { 'X-Requested-With': 'fetch' }
            });
            const data = await res.json().catch(()=>({ok:false,error:'Réponse invalide'}));

            if (res.ok && data.ok) {
                btn.textContent = 'Envoyé ✓';
                note.textContent = 'Merci !';
                showFlash('Message envoyé avec succès. ', true);
                form.reset();
            } else {
                btn.textContent = 'Réessayer';
                note.textContent = 'Erreur…';
                showFlash(data.error || 'Erreur inconnue. Vérifie les champs puis réessaie.', false);
            }
        } catch (err) {
            btn.textContent = 'Réessayer';
            note.textContent = 'Réseau indisponible.';
            showFlash('Impossible de contacter le serveur (réseau).', false);
        } finally {
            setTimeout(()=>{ btn.disabled = false; btn.textContent = 'Envoyer'; }, 1800);
        }
    });
</script>
</body>
</html>