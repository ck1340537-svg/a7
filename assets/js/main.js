(function(){
  var b=document.querySelector('.burger'),n=document.getElementById('nav');
  if(b&&n)b.addEventListener('click',function(){var o=n.classList.toggle('open');b.setAttribute('aria-expanded',o?'true':'false');});
  // Fiber lab
  var F={
    cotton:['Cotton','Soft, breathable and familiar. Cotton absorbs moisture well but holds on to it, so it can feel damp during long or sweaty days.',[55,85,45,60,30],'Everyday office and casual wear in mild weather.'],
    merino:['Merino wool','Fine wool fibres that feel soft rather than itchy. Merino regulates temperature, resists odour and stays warm even when slightly damp.',[80,75,90,65,60],'Hiking, travel, cold weather and multi-day wear.'],
    bamboo:['Bamboo viscose','A regenerated fibre made from bamboo pulp. It feels silky and cool against the skin and drapes beautifully, though it is less hard-wearing.',[70,95,50,45,55],'Warm days, lounging and sensitive skin.'],
    micro:['Microfiber blend','Ultra-fine polyester or nylon filaments, usually blended with a little elastane. Light, quick-drying and very durable, with a smooth, subtle sheen.',[95,80,55,90,95],'Running, gym sessions, sport and travel.']
  };
  var lab=document.getElementById('fiber');
  if(lab){var lbl=['Wicking','Softness','Warmth','Durability','Quick-dry'];
    function show(k){var f=F[k];lab.querySelector('h3').textContent=f[0];lab.querySelector('[data-k=d]').textContent=f[1];lab.querySelector('[data-k=b]').textContent=f[3];
      var h='';f[2].forEach(function(v,i){h+='<div class="meter"><span>'+lbl[i]+'</span><div class="bar"><i style="width:'+v+'%"></i></div><b>'+Math.round(v/10)+'</b></div>';});lab.querySelector('.meters').innerHTML=h;
      document.querySelectorAll('[data-fb]').forEach(function(x){x.setAttribute('aria-pressed',x.dataset.fb===k?'true':'false');});
      var im=document.querySelectorAll('[data-fimg]');im.forEach(function(i){i.hidden=i.dataset.fimg!==k;});}
    document.querySelectorAll('[data-fb]').forEach(function(x){x.addEventListener('click',function(){show(x.dataset.fb);});});show('micro');}
  // Height picker
  var HT={noshow:['No-show','Hidden below the shoe line','Loafers, low sneakers, boat shoes','Choose a silicone heel grip so they stay up.',8],
    ankle:['Ankle','Just covers the ankle bone','Running, gym, everyday trainers','Prevents shoe-collar rubbing on the Achilles.',22],
    crew:['Crew','Mid-calf, about 15–20 cm up the leg','Boots, office wear, casual looks','The most versatile height for most wardrobes.',48],
    knee:['Knee-high','Just below the knee','Tall boots, skirts, cold days, recovery wear','Check the cuff is wide enough to avoid pinching.',85]};
  var hp=document.getElementById('hpanel');
  if(hp){document.querySelectorAll('[data-h]').forEach(function(x){x.addEventListener('click',function(){var h=HT[x.dataset.h];
    document.querySelectorAll('[data-h]').forEach(function(y){y.setAttribute('aria-pressed','false');});x.setAttribute('aria-pressed','true');
    hp.querySelector('h3').textContent=h[0];hp.querySelector('[data-k=w]').textContent=h[1];hp.querySelector('[data-k=s]').textContent=h[2];hp.querySelector('[data-k=t]').textContent=h[3];
    var r=document.getElementById('sockfill');if(r){r.setAttribute('y',String(140-h[4]*1.2));r.setAttribute('height',String(h[4]*1.2));}});});}
  // Size finder
  var sf=document.getElementById('sizefind');
  function size(){if(!sf)return;var sys=sf.querySelector('input[name=sys]:checked').value,v=parseFloat(document.getElementById('shoe').value),us;
    us=sys==='m'?v:sys==='w'?v-1.5:(v-33)/1.33+1.5;
    var s=us<6?['S','Women’s US 4–7 · Men’s US up to 5.5 · EU 35–38']:us<9?['M','Women’s US 7.5–10 · Men’s US 6–8.5 · EU 39–42']:us<12?['L','Women’s US 10.5–12 · Men’s US 9–11.5 · EU 43–46']:['XL','Men’s US 12–15 · EU 47–49'];
    document.getElementById('sz').textContent=s[0];document.getElementById('sz-note').textContent=s[1];}
  function opts(){if(!sf)return;var sys=sf.querySelector('input[name=sys]:checked').value,sel=document.getElementById('shoe'),h='',a=sys==='e'?35:4,z=sys==='e'?49:(sys==='w'?13:15),st=sys==='e'?1:0.5,def=sys==='e'?41:(sys==='w'?8:9);
    for(var i=a;i<=z;i+=st)h+='<option'+(i===def?' selected':'')+'>'+i+'</option>';sel.innerHTML=h;size();}
  if(sf){sf.addEventListener('change',function(e){if(e.target.name==='sys')opts();else size();});opts();}
  // Cookie
  var c=document.getElementById('cookie'),v=null;try{v=localStorage.getItem('mb_cookie');}catch(e){}
  if(c&&!v)c.classList.add('show');
  document.querySelectorAll('[data-cookie]').forEach(function(x){x.addEventListener('click',function(){try{localStorage.setItem('mb_cookie',x.dataset.cookie);}catch(e){}c.classList.remove('show');});});
  var y=document.getElementById('year');if(y)y.textContent=new Date().getFullYear();
})();
