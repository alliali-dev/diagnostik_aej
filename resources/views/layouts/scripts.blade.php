<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->


<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/customizer.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/footer.min.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('app-assets/table/dataTables.colVis.js') }}"></script>
<script src="//cdn.datatables.net/colvis/1.1.2/js/dataTables.colVis.min.js"></script>
{{--<script src="{{ asset('app-assets/vendors/js/forms/select/select2.min.js') }}"></script>--}}
<!-- END: Page Vendor JS-->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@yield('js')
<script>
    function webClock() {
        // Time base
        const utc = new Date().getTime();
        const offset = 36E5;
        const standard = new Date(utc + offset);

        const q = standard.getUTCDay();
        const d = standard.getUTCDate();
        const m = standard.getUTCMonth();
        const y = standard.getUTCFullYear();
        const h = standard.getUTCHours();
        const mn = standard.getUTCMinutes();
        const s = standard.getUTCSeconds();

        const Q = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];

        const M = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

        // SSD values
        const Uh = h % 10;
        const Th = (h % 100 - h % 10) / 10;

        const Umn = mn % 10;
        const Tmn = (mn % 100 - mn % 10) / 10;

        const Us = s % 10;
        const Ts = (s % 100 - s % 10) / 10;

        // Plain text only - No SVG
        const fullClock = document.querySelectorAll('.full-clock');
        fullClock.forEach((_elem, i) => {
            fullClock[i].innerHTML = `${Q[q]} ${d} ${M[m]} ${y} ${Th}${Uh}:${Tmn}${Umn}`;
        });

        // SVG
        const hourT = document.querySelectorAll('.th');
        hourT.forEach((_elem, i) => {
            hourT[i].innerHTML = `${Th}`;
        });
        const hourU = document.querySelectorAll('.uh');
        hourU.forEach((_elem, i) => {
            hourU[i].innerHTML = `${Uh}`;
        });

        const minuteT = document.querySelectorAll('.tmn');
        minuteT.forEach((_elem, i) => {
            minuteT[i].innerHTML = `${Tmn}`;
        });
        const minuteU = document.querySelectorAll('.umn');
        minuteU.forEach((_elem, i) => {
            minuteU[i].innerHTML = `${Umn}`;
        });

        const secondT = document.querySelectorAll('.ts');
        secondT.forEach((_elem, i) => {
            secondT[i].innerHTML = `${Ts}`;
        });
        const secondU = document.querySelectorAll('.us');
        secondU.forEach((_elem, i) => {
            secondU[i].innerHTML = `${Us}`;
        });
    }

    var clockTimer;

    function clockCtrl() {
        const options = {
            root: undefined,
            rootMargin: '0px',
            threshold: 1
        };

        const elems = document.querySelectorAll('.clock');
        function callback(elems, observer) {
            if (elems[0].isIntersecting) {
                clockTimer = setInterval(webClock, 1000);
                // observer.unobserve(elems[0].target);
            } else {
                clearInterval(clockTimer);
            }
        }
        const observer = new IntersectionObserver(callback, options);
        observer.observe(elems[0]);
    }
</script>
