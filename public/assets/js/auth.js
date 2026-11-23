(function () {
    var $ = function (s, r) { return (r || document).querySelector(s) };
    var $$ = function (s, r) { return Array.prototype.slice.call((r || document).querySelectorAll(s)) };
    
    var EYE = '<svg viewBox="0 0 24 24"><path d="M2 12s3.6-6.5 10-6.5S22 12 22 12s-3.6 6.5-10 6.5S2 12 2 12z"/><circle cx="12" cy="12" r="3"/><path class="sl" d="M4 4l16 16"/></svg>';
    var CAP = '<button class="cap" type="button"><span class="bx"></span>Saya bukan robot<span class="rc"><svg viewBox="0 0 32 32"><path d="M16 7a9 9 0 0 1 8.4 5.8l2.9-1.1L25 4.9 23 7.6A12.5 12.5 0 0 0 5.4 12z" fill="#1c3aa9"/><path d="M25 17a9 9 0 0 1-14.6 5.2l-2.7 1.6L12.4 28l1.6-3.3A12.5 12.5 0 0 0 28.4 20z" fill="#4285f4"/><path d="M7 16a9 9 0 0 1 .4-2.6L4 12.2l-1.6 5.2 3.3-.7z" fill="#ababab"/></svg>reCAPTCHA</span></button><span class="err">Centang verifikasi terlebih dulu.</span>';
    
    function toast(m) { 
        var t = $('#toast'); if (!t) return; 
        t.textContent = m; t.classList.add('on'); 
        clearTimeout(toast.t); 
        toast.t = setTimeout(function () { t.classList.remove('on') }, 3200); 
    }

    var RULES = { 
        len: function (s) { return s.length >= 8 }, 
        up: function (s) { return /[A-Z]/.test(s) }, 
        num: function (s) { return /\d/.test(s) }, 
        sym: function (s) { return /[^A-Za-z0-9\s]/.test(s) } 
    };
    var COL = ['', '#ef4444', '#f97316', '#eab308', '#16a34a'];
    var LBL = ['', 'Lemah', 'Cukup', 'Baik', 'Kuat'];

    function pwScore(box) {
        var pw = $('[data-pw]', box).value, sc = 0; 
        $$('.rules li', box).forEach(function (li) { 
            var ok = RULES[li.dataset.r](pw); 
            li.classList.toggle('ok', ok); 
            if (ok) sc++; 
        });
        $$('.meter i', box).forEach(function (b, i) { b.style.background = i < sc ? COL[sc] : '' }); 
        var l = $('.meterl span', box); 
        if (l) {
            l.textContent = pw ? LBL[sc] : ''; 
            l.style.color = COL[sc]; 
        }
        return sc;
    }

    function err(el, msg) { 
        var f = el.closest('.f'); if (!f) return; 
        f.classList.toggle('bad', !!msg); 
        var e = f.querySelector('.err');
        if (e) e.textContent = msg || '';
    }

    function pwOK(box) {
        var pw = $('[data-pw]', box), cf = $('[data-cf]', box), ok = true;
        if (pwScore(box) < 4) { err(pw, 'Password harus memenuhi semua syarat di bawah.'); ok = false }
        if (!cf.value || cf.value !== pw.value) { err(cf, cf.value ? 'Konfirmasi password tidak sama.' : 'Ulangi password Anda.'); ok = false } 
        return ok;
    }

    function capOK(f) { 
        var c = $('.cap', f), w = c ? c.closest('.capw') : null, ok = c && c.classList.contains('ok'); 
        if (w) w.classList.toggle('bad', !ok); 
        return !!ok; 
    }

    var em = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    function mailErr(i) { 
        var v = i.value.trim(), bad = !v || !em.test(v); 
        err(i, bad ? (v ? 'Format email belum benar.' : 'Email wajib diisi.') : ''); 
        return !bad; 
    }

    /* Inisialisasi Komponen Form Dinamis */
    function initAuthComponents(container) {
        container = container || document;

        $$('.eye', container).forEach(function (b) { b.innerHTML = EYE });
        $$('[data-cap]', container).forEach(function (e) { e.innerHTML = CAP });

        $$('.pw', container).forEach(function (box) {
            var n = box.dataset.n;
            box.innerHTML = '<label class="f"><b>Password <em>*</em></b><input name="' + n + '" data-pw type="password" autocomplete="new-password" placeholder="Buat password minimal 8 karakter"><button class="eye" type="button" aria-label="Tampilkan password">' + EYE + '</button><span class="err"></span></label>' +
                '<div class="meter"><i></i><i></i><i></i><i></i></div><div class="meterl"><span></span></div>' +
                '<ul class="rules"><li data-r="len">Minimal 8 karakter</li><li data-r="up">Huruf kapital (A–Z)</li><li data-r="num">Angka (0–9)</li><li data-r="sym">Simbol (! @ # $ …)</li></ul>' +
                '<label class="f"><b>Konfirmasi Password <em>*</em></b><input name="c' + n + '" data-cf type="password" autocomplete="new-password" placeholder="Ulangi password Anda"><button class="eye" type="button" aria-label="Tampilkan password">' + EYE + '</button><span class="err"></span></label>';
            
            var pw = $('[data-pw]', box), cf = $('[data-cf]', box);
            if (pw && cf) {
                pw.addEventListener('input', function () { 
                    pwScore(box); 
                    err(pw, ''); 
                    if (cf.value) err(cf, cf.value === pw.value ? '' : 'Konfirmasi password tidak sama.'); 
                });
                cf.addEventListener('input', function () { 
                    err(cf, cf.value === pw.value ? '' : 'Konfirmasi password tidak sama.'); 
                });
            }
        });

        $$('.cap', container).forEach(function (c) { 
            c.onclick = function () { 
                if (c.classList.contains('ok') || c.classList.contains('spin')) return; 
                c.classList.add('spin'); 
                setTimeout(function () { 
                    c.classList.remove('spin'); 
                    c.classList.add('ok'); 
                    var w = c.closest('.capw');
                    if (w) w.classList.remove('bad'); 
                }, 700); 
            }; 
        });

        $$('.f input', container).forEach(function (i) { 
            i.addEventListener('input', function () { 
                if (!i.hasAttribute('data-cf')) err(i, ''); 
            }); 
        });

        // Form Login
        var fl = $('#fLogin', container);
        if (fl) {
            fl.onsubmit = function (e) {
                var f = e.target, ok = mailErr(f.e);
                if (!f.p.value) { err(f.p, 'Password wajib diisi.'); ok = false; }
                if (!capOK(f)) ok = false;
                if (!ok) { e.preventDefault(); return; }
                if (f.dataset.real === '1' || (f.getAttribute('action') && f.getAttribute('action') !== '#')) { return; }
                e.preventDefault();
                toast('Tampilan demo: hubungkan form ini ke backend login.');
            };
        }

        // Form Register
        var fr = $('#fReg', container);
        if (fr) {
            fr.onsubmit = function (e) {
                var f = e.target, ok = mailErr(f.e);
                if (!pwOK($('.pw', f))) ok = false;
                if (!capOK(f)) ok = false;
                var ag = f.agree.checked;
                var agErr = $('#agreeErr', f);
                if (agErr) agErr.style.display = ag ? 'none' : 'block';
                if (!ag) ok = false;
                if (!ok) {
                    e.preventDefault();
                    var b = $('.f.bad input', f); if (b) b.focus();
                    return;
                }
                try { sessionStorage.setItem('ewfMail', f.e.value.trim()); } catch (x) { }
                if (f.dataset.real === '1' || (f.getAttribute('action') && f.getAttribute('action') !== '#')) { return; }
                e.preventDefault();
                next(f);
            };
        }

        // Form Forgot
        var ff = $('#fForgot', container);
        if (ff) {
            ff.onsubmit = function (e) {
                var f = e.target;
                if (!mailErr(f.e)) { e.preventDefault(); return; }
                if (f.dataset.real === '1' || (f.getAttribute('action') && f.getAttribute('action') !== '#')) { return; }
                e.preventDefault();
                var fm = $('#fm', container); if (fm) fm.textContent = f.e.value.trim();
                var sent = $('#sent', container); if (sent) sent.hidden = false;
                var dr = $('#demoReset', container); if (dr) dr.hidden = false;
                var fb = $('#fBtn', container); if (fb) fb.textContent = 'KIRIM ULANG';
            };
        }

        // Form Reset
        var fs = $('#fReset', container);
        if (fs) {
            fs.onsubmit = function (e) {
                var f = e.target;
                if (!pwOK($('.pw', f))) { e.preventDefault(); return; }
                if (f.dataset.real === '1' || (f.getAttribute('action') && f.getAttribute('action') !== '#')) { return; }
                e.preventDefault();
                toast('Password berhasil diperbarui. Silakan masuk.');
                setTimeout(function () { next(fs); }, 1000);
            };
        }

        // Form OTP
        var fo = $('#fOtp', container);
        if (fo) {
            var os = $$('#otp input', container), tmr, mail = $('#mail', container);
            try { 
                var sm = sessionStorage.getItem('ewfMail'); 
                if (sm && mail) mail.textContent = sm; 
            } catch (x) { }
            os.forEach(function (i, n) {
                i.addEventListener('input', function () { 
                    i.value = i.value.replace(/\D/g, ''); 
                    var o = $('#otp', container); if (o) o.classList.remove('bad'); 
                    var oe = $('#otpErr', container); if (oe) oe.style.display = 'none'; 
                    if (i.value && os[n + 1]) os[n + 1].focus(); 
                });
                i.addEventListener('keydown', function (e) { 
                    if (e.key === 'Backspace' && !i.value && os[n - 1]) os[n - 1].focus(); 
                });
                i.addEventListener('paste', function (e) { 
                    var t = (e.clipboardData.getData('text') || '').replace(/\D/g, '').slice(0, 6); 
                    if (!t) return; 
                    e.preventDefault(); 
                    t.split('').forEach(function (c, k) { if (os[k]) os[k].value = c; }); 
                    if (os[Math.min(t.length, 5)]) os[Math.min(t.length, 5)].focus(); 
                });
            });
            fo.onsubmit = function (e) {
                var full = os.every(function (i) { return i.value; });
                var o = $('#otp', container); if (o) o.classList.toggle('bad', !full);
                var oe = $('#otpErr', container); if (oe) oe.style.display = full ? 'none' : 'block';
                if (!full) { e.preventDefault(); return; }
                var hidden = fo.querySelector('input[name="code"]');
                if (hidden) { hidden.value = os.map(function (i) { return i.value; }).join(''); }
                if (fo.dataset.real === '1' || (fo.getAttribute('action') && fo.getAttribute('action') !== '#')) { return; }
                e.preventDefault();
                next(fo);
            };
            var rb = $('#resend', container);
            function startTimer() { 
                var s = 60; clearInterval(tmr); 
                if (!rb) return;
                rb.disabled = true; 
                rb.textContent = 'Kirim ulang kode (60)'; 
                tmr = setInterval(function () { 
                    s--; 
                    if (s <= 0) { 
                        clearInterval(tmr); 
                        rb.disabled = false; 
                        rb.textContent = 'Kirim ulang kode'; 
                    } else {
                        rb.textContent = 'Kirim ulang kode (' + s + ')'; 
                    }
                }, 1000); 
            }
            if (rb) {
                rb.onclick = function () { toast('Kode baru dikirim.'); startTimer(); }; 
                startTimer();
            }
        }

        var first = $('input', container); 
        if (first && window.innerWidth > 900) {
            first.focus({ preventScroll: true });
        }
    }

    /* ====== TRANSISI HALAMAN HALUS (SMOOTH SPA FORM SWAP) ====== */
    var isNavigating = false;
    function navigateTo(url, pushState) {
        if (pushState === undefined) pushState = true;
        var pane = $('#paneContent');
        if (!pane || isNavigating) { 
            if (!pane) location.href = url;
            return; 
        }

        isNavigating = true;

        // Efek animasi keluar (Smooth fade-out & slight lift)
        pane.style.opacity = '0';
        pane.style.transform = 'translateY(6px)';
        pane.style.pointerEvents = 'none';

        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function (res) {
                if (!res.ok) throw new Error('HTTP ' + res.status);
                return res.text();
            })
            .then(function (html) {
                var parser = new DOMParser();
                var doc = parser.parseFromString(html, 'text/html');
                var newPane = doc.getElementById('paneContent');
                if (!newPane) {
                    location.href = url;
                    return;
                }

                // Ganti judul dokumen
                if (doc.title) document.title = doc.title;

                // Update URL di browser tanpa reload
                if (pushState) {
                    history.pushState({ url: url }, '', url);
                }

                setTimeout(function () {
                    // Tukar konten form
                    pane.innerHTML = newPane.innerHTML;
                    initAuthComponents(pane);

                    // Efek animasi masuk (Smooth glide-in & fade-in)
                    requestAnimationFrame(function () {
                        pane.style.opacity = '1';
                        pane.style.transform = 'translateY(0)';
                        pane.style.pointerEvents = '';
                        isNavigating = false;
                    });
                }, 130);
            })
            .catch(function (err) {
                console.warn('Fallback standard navigation:', err);
                location.href = url;
            });
    }

    function next(f) { 
        if (f && f.dataset.next) {
            navigateTo(f.dataset.next, true);
        }
    }

    // Intersepsi Klik Tautan Internal Auth
    document.addEventListener('click', function (e) {
        var aToast = e.target.closest('[data-toast]'); 
        if (aToast) { e.preventDefault(); toast(aToast.dataset.toast); return; }

        var bEye = e.target.closest('.eye'); 
        if (bEye) { 
            var inp = bEye.parentNode.querySelector('input'), isPw = inp.type === 'password'; 
            inp.type = isPw ? 'text' : 'password'; 
            bEye.classList.toggle('on', isPw); 
            bEye.setAttribute('aria-label', isPw ? 'Sembunyikan password' : 'Tampilkan password'); 
            return;
        }

        // Cek apakah klik berasal dari link navigasi antar halaman auth
        var link = e.target.closest('a[href]');
        if (link && link.href) {
            try {
                var targetUrl = new URL(link.href, location.origin);
                var authKeywords = ['/login', '/register', '/verifikasi', '/lupa-password', '/reset-password', '/pendaftaran-berhasil'];
                var isAuthRoute = authKeywords.some(function (k) { return targetUrl.pathname.endsWith(k); });

                if (targetUrl.origin === location.origin && isAuthRoute) {
                    e.preventDefault();
                    if (targetUrl.href !== location.href) {
                        navigateTo(targetUrl.href, true);
                    }
                }
            } catch (ex) { }
        }
    });

    // Handle tombol Back/Forward browser
    window.addEventListener('popstate', function () {
        navigateTo(location.href, false);
    });

    // Inisialisasi awal saat halaman dibuka pertama kali
    initAuthComponents(document);
})();
