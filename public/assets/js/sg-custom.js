/* =============================================================================
   SG Education — shared UI behaviour
   public/assets/js/sg-custom.js  (loaded once in layouts/main.blade.php)

   1. Accordion  (.sg-faq-list > .sg-faq-item > .sg-faq-btn / .sg-faq-panel)
   2. Count-up   (.sg-countup[data-target][data-decimals])
   Remove any other .sg-faq-btn click handler you may have added elsewhere,
   otherwise items would open and immediately close again.
   ============================================================================= */
(function () {
    'use strict';
    if (window.__sgUi) return;
    window.__sgUi = true;

    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- 1. Accordion ---------- */
    var uid = 0;
    document.querySelectorAll('.sg-faq-item').forEach(function (item) {
        var btn = item.querySelector('.sg-faq-btn');
        var panel = item.querySelector('.sg-faq-panel');
        if (!btn || !panel) return;
        uid++;
        btn.id = btn.id || 'sg-faq-btn-' + uid;
        panel.id = panel.id || 'sg-faq-panel-' + uid;
        btn.setAttribute('aria-controls', panel.id);
        panel.setAttribute('role', 'region');
        panel.setAttribute('aria-labelledby', btn.id);
        btn.setAttribute('aria-expanded', item.classList.contains('is-open') ? 'true' : 'false');
    });

    document.addEventListener('click', function (e) {
        var btn = e.target.closest && e.target.closest('.sg-faq-btn');
        if (!btn) return;
        var item = btn.closest('.sg-faq-item');
        var list = btn.closest('.sg-faq-list');
        var willOpen = !item.classList.contains('is-open');

        // One open at a time within the same list
        if (list) {
            list.querySelectorAll('.sg-faq-item.is-open').forEach(function (other) {
                if (other === item) return;
                other.classList.remove('is-open');
                var b = other.querySelector('.sg-faq-btn');
                if (b) b.setAttribute('aria-expanded', 'false');
            });
        }
        item.classList.toggle('is-open', willOpen);
        btn.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
    });

    /* ---------- 2. Count-up (final values are already in the HTML) ---------- */
    var nums = document.querySelectorAll('.sg-countup[data-target]');
    if (nums.length && !reduce && 'IntersectionObserver' in window) {
        var run = function (el) {
            var target = parseFloat(el.getAttribute('data-target')) || 0;
            var decimals = parseInt(el.getAttribute('data-decimals'), 10) || 0;
            var start = null, duration = 1800;
            function step(ts) {
                if (!start) start = ts;
                var p = Math.min((ts - start) / duration, 1);
                el.textContent = (target * (1 - Math.pow(1 - p, 3))).toFixed(decimals);
                if (p < 1) requestAnimationFrame(step);
                else el.textContent = target.toFixed(decimals);
            }
            requestAnimationFrame(step);
        };
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { run(en.target); io.unobserve(en.target); }
            });
        }, { threshold: 0.4 });
        nums.forEach(function (el) {
            el.textContent = (0).toFixed(parseInt(el.getAttribute('data-decimals'), 10) || 0);
            io.observe(el);
        });
    }
})();