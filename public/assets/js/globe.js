/*GLOBE*/
function EWFGlobe(cv, landImg, cfg, o) {
  o = o || {}; var GW = cv.width, k = GW / cfg.W, CX = cfg.cx * k, CY = cfg.cy * k, R = cfg.R * k, tilt = (o.tilt || 27) * Math.PI / 180, ct = Math.cos(tilt), st = Math.sin(tilt), ctx = cv.getContext('2d');
  var t = document.createElement('canvas'); t.width = landImg.naturalWidth || landImg.width; t.height = landImg.naturalHeight || landImg.height;
  var tc = t.getContext('2d'); tc.drawImage(landImg, 0, 0); var TW = t.width, TH = t.height, td = tc.getImageData(0, 0, TW, TH).data, M = new Uint8Array(TW * TH), i, j;
  for (i = 0; i < M.length; i++)M[i] = td[i * 4];
  var x0 = Math.floor(CX - R - 2), y0 = Math.floor(CY - R - 2), S = Math.ceil(2 * R + 5), img = ctx.createImageData(S, S), D = img.data;
  var PX = [], UR = [], VV = [], AL = [], OC = [], LD = [], lx = .42, ly = .52, lz = .74, ln = Math.sqrt(lx * lx + ly * ly + lz * lz); lx /= ln; ly /= ln; lz /= ln;
  function lerp(a, b, u) { return a + (b - a) * u }
  for (j = 0; j < S; j++)for (i = 0; i < S; i++) {
    var X = (x0 + i + .5 - CX) / R, Y = -(y0 + j + .5 - CY) / R, d2 = X * X + Y * Y, a = Math.min(1, Math.max(0, (1 - Math.sqrt(d2)) * R)); if (a <= 0) continue;
    var Z = Math.sqrt(Math.max(0, 1 - d2)), Yw = Y * ct + Z * st, Zw = -Y * st + Z * ct, lat = Math.asin(Math.max(-1, Math.min(1, Yw))), lon = Math.atan2(X, Zw);
    var L = Math.max(0, X * lx + Y * ly + Z * lz), u = Math.min(1, .2 + .9 * L) * (.82 + .18 * Z);
    PX.push((j * S + i) * 4); UR.push(lon / (2 * Math.PI) * TW); VV.push(Math.min(TH - 1.001, Math.max(0, (.5 - lat / Math.PI) * TH - .5))); AL.push(a * 255);
    OC.push(lerp(136, 218, u), lerp(136, 218, u), lerp(140, 220, u)); LD.push(lerp(196, 255, u) - OC[OC.length - 3], lerp(86, 152, u) - OC[OC.length - 2], lerp(4, 40, u) - OC[OC.length - 1]);
  }
  var n = PX.length; PX = Int32Array.from(PX); UR = Float32Array.from(UR); VV = Float32Array.from(VV); AL = Uint8Array.from(AL); var Q0 = new Int32Array(n), FV = new Float32Array(n); for (i = 0; i < n; i++) { Q0[i] = (VV[i] | 0) * TW; FV[i] = VV[i] - (VV[i] | 0) } OC = Float32Array.from(OC); LD = Float32Array.from(LD);
  /* grid statis (paralel) + meridian */
  var DEG = Math.PI / 180, LAT = [], P = []; for (i = -90; i <= 90; i += 3)LAT.push(i * DEG);
  function sx(p) { return CX + p[0] * R } function sy(p) { return CY - p[1] * R }
  function view(x, y, z) { return [x, y * ct - z * st, y * st + z * ct] }
  function cut(a, b) { var q = a[2] / (a[2] - b[2]); return [a[0] + (b[0] - a[0]) * q, a[1] + (b[1] - a[1]) * q, 0] }
  function trace(pf, m) {
    var pr = null, pv = false, p, v, q; for (var s = 0; s <= m; s++) {
      p = pf(s); v = p[2] >= 0;
      if (pr) { if (v && pv) ctx.lineTo(sx(p), sy(p)); else if (v) { q = cut(pr, p); ctx.moveTo(sx(q), sy(q)); ctx.lineTo(sx(p), sy(p)) } else if (pv) { q = cut(pr, p); ctx.lineTo(sx(q), sy(q)) } } else if (v) ctx.moveTo(sx(p), sy(p)); pr = p; pv = v
    }
  }
  var lw = Math.max(1, R / 190);
  function draw(lam0) {
    var off = lam0 / 360 * TW + TW / 2 - .5, o2 = img.data, u, u0, u1, fu, fv, q, m, p, b, a, c, d, e; off = ((off % TW) + TW) % TW;
    for (var s = 0; s < n; s++) {
      u = UR[s] + off; if (u >= TW) u -= TW; else if (u < 0) u += TW; u0 = u | 0; fu = u - u0; u1 = u0 + 1; if (u1 >= TW) u1 = 0; q = Q0[s]; fv = FV[s];
      a = M[q + u0]; c = M[q + u1]; d = M[q + TW + u0]; e = M[q + TW + u1]; m = ((a + (c - a) * fu) * (1 - fv) + (d + (e - d) * fu) * fv) * 0.00392157; p = PX[s]; b = s * 3;
      o2[p] = OC[b] + LD[b] * m; o2[p + 1] = OC[b + 1] + LD[b + 1] * m; o2[p + 2] = OC[b + 2] + LD[b + 2] * m; o2[p + 3] = AL[s]
    }
    ctx.putImageData(img, x0, y0);
    ctx.lineWidth = lw; ctx.strokeStyle = 'rgba(236,118,22,.82)'; ctx.lineJoin = 'round'; ctx.beginPath();
    for (var g = 0; g < 36; g++) { var dl = (g * 10 - lam0) * DEG, sd = Math.sin(dl), cd = Math.cos(dl); trace(function (s) { var la = LAT[s]; return view(Math.cos(la) * sd, Math.sin(la), Math.cos(la) * cd) }, LAT.length - 1) }
    for (var pl = -80; pl <= 80; pl += 10) { var la = pl * DEG, cl = Math.cos(la), sl = Math.sin(la); trace(function (s) { var A = s * 6 * DEG; return view(cl * Math.sin(A), sl, cl * Math.cos(A)) }, 60) }
    ctx.stroke()
  }
  return { draw: draw }
}
/*ENDGLOBE*/

(function () {
  var cv = document.getElementById('gl'), land = document.getElementById('land'), CFG = { "W": 760.0, "H": 853.0, "cx": 360.4, "cy": 306.11, "R": 295.56 };
  if (!cv || !land) return;
  function go() {
    var g, L0 = 105; try { g = EWFGlobe(cv, land, CFG); g.draw(L0) } catch (x) { var lg = document.querySelector('.logo'); if (lg) lg.classList.add('static'); return }
    if (window.matchMedia('(prefers-reduced-motion:reduce)').matches) return;
    var t0 = performance.now(), skip = 0, fr = 0, slow = 0;
    (function f(t) {
      requestAnimationFrame(f); if (skip && (fr++ % 2)) return; var s = performance.now(); g.draw(L0 - (t - t0) / 1000 * 11);
      if (!skip && performance.now() - s > 13 && ++slow > 20) skip = 1
    })(t0)
  }
  if (land.complete && land.naturalWidth) go(); else land.onload = go
})();
