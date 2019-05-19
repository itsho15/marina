    <div class="chatLive"><i class="fa fa-comment"></i></div>
      <!-- Scripts -->
    @php
        /*
         All Scripts Compiled it all.js file
        <script src="{{ url('/js/jquery-1.11.0.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="{{ url('js/bootstrap.js') }}"></script>
        <script src="{{ url('js/bootstrap-carousel.js') }}"></script>
        <script src="{{ url('js/owl.carousel.js') }}"></script>
        <script src="{{ url('js/wow.min.js') }}"></script>
        <script src="{{ url('js/responsiveCarousel.min.js') }}"></script>
        <script src="{{ url('js/materialize.js') }}"></script>
        <script src="{{ url('js/ekko-lightbox.js') }}"></script>
        <script src="{{ url('js/jquery.tooltipster.min.js') }}"></script>
        <script src="{{ url('js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('js/bootstrap-clockpicker.min.js') }}"></script>
        <script src="{{ url('js/jquery.smoothState.js') }}"></script>
        <script src="{{ url('js/hijri-date.js') }}"></script>
        <script src="{{ url('js/datepicker.js') }}"></script>
        <script src="{{ url('js/timepicki.js') }}"></script>
        <script src="{{ url('js/java.js') }}"></script>
        */
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{ url('js/all.js') }}"></script>
    @stack('js')
</body>
</html>