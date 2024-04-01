 <!-- partial:partials/_footer.html -->
 <footer class="footer">
     {{-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
         <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
             Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                 template</a> from BootstrapDash. All rights reserved.</span>
         <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
             with <i class="ti-heart text-danger ml-1"></i></span>
     </div>
     <div class="d-sm-flex justify-content-center justify-content-sm-between">
         <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                 href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
     </div> --}}
 </footer>
 <!-- partial -->
 </div>
 <!-- main-panel ends -->
 </div>
 <!-- page-body-wrapper ends -->
 </div>
 <!-- container-scroller -->

 <!-- plugins:js -->
 <script src="{{ asset('template') }}/vendors/js/vendor.bundle.base.js"></script>
 <!-- endinject -->
 <!-- Plugin js for this page -->
 {{-- <script src="{{ asset('template') }}/vendors/chart.js/Chart.min.js"></script>
 <script src="{{ asset('template') }}/vendors/datatables.net/jquery.dataTables.js"></script>
 <script src="{{ asset('template') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
 <script src="{{ asset('template') }}/js/dataTables.select.min.js"></script> --}}

 <!-- End plugin js for this page -->
 <!-- inject:js -->
 <script src="{{ asset('template') }}/js/off-canvas.js"></script>
 <script src="{{ asset('template') }}/js/hoverable-collapse.js"></script>
 <script src="{{ asset('template') }}/js/template.js"></script>
 <script src="{{ asset('template') }}/js/settings.js"></script>
 <script src="{{ asset('template') }}/js/todolist.js"></script>
 <!-- endinject -->
 <!-- Custom js for this page-->
 <script src="{{ asset('template') }}/js/dashboard.js"></script>
 <script src="{{ asset('template') }}/js/Chart.roundedBarCharts.js"></script>
 <!-- End custom js for this page-->

 <!-- Jquery JS -->
 <script type="text/javascript" src="{{ asset('library') }}/jquery361.js"></script>

 <!-- SweetAlert2 -->
 <script src="{{ asset('plugin') }}/sweetAlert2/sweetalert2.all.min.js"></script>

 <!-- DataTables -->
 <script type="text/javascript" src="{{ asset('plugin') }}/DataTables/datatables.min.js"></script>

 <!-- DatePicker -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

 <script>
     //  $('.dashnum-card').on('mouseenter', function() {
     //      $(this).removeClass('bg-blue-600')
     //      $(this).addClass('bg-blue-900')
     //  })

     //  $('.dashnum-card').on('mouseleave', function() {
     //      $(this).removeClass('bg-blue-900')
     //      $(this).addClass('bg-blue-600')
     //  })

     $('#check-desa').on('change',
         function() {
             if ($(this).is(":checked")) {

                 $.ajax({
                     url: "{{ route('desa-request') }}",
                     method: 'GET',
                     cache: false,
                     dataType: 'json',
                     success: function(data) {
                         var html = "";
                         data[0].forEach(elementDesa => {

                             html += '<option  value="' +
                                 elementDesa
                                 .id + '">' + elementDesa.nama +
                                 '</option>'

                         })
                         $("#desa_id_lokasi_wisata").html(
                             '<option value="" selected>Pilih Desa ...</option>' + html);
                     }
                 })

             } else {

                 var idKelurahan = $('#kelurahan_id_lokasi_wisata').val();
                 $.ajax({
                     url: "{{ route('kelurahan-request') }}",
                     method: 'GET',
                     cache: false,
                     dataType: 'json',
                     success: function(data) {
                         //  console.log(data[0])
                         var html = "";
                         data[0].forEach(elementKel => {
                             if (elementKel.id == idKelurahan) {
                                 if (elementKel.kelurahan_desa !== null) {
                                     elementKel.kelurahan_desa.forEach(elementKelDes => {
                                         data[1].forEach(elementDes => {
                                             if (elementKelDes.desa_id ==
                                                 elementDes.id) {
                                                 html += '<option value="' +
                                                     elementDes
                                                     .id + '">' + elementDes
                                                     .nama +
                                                     '</option>'
                                             }
                                         });
                                     })
                                 }
                             }
                         })
                         $("#desa_id_lokasi_wisata").html(
                             '<option value="" selected>Pilih Desa ...</option>' + html);
                     }
                 })

             }
         }
     );

     $('#myTable').DataTable();
     $('#myTable2').DataTable();
     $('#myTable3').DataTable();
     $('#myTable4').DataTable();
     $('#myTable5').DataTable();
     $('#myTable6').DataTable();

     $("#lokasi_wisata_id_lokasi_wisata").change(function() {
         var idLokasiWisata = $(this).val();
         $.ajax({
             url: "{{ route('lokasi_wisata-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 var html = "";
                 data[0].forEach(elementLokWis => {
                     if (elementLokWis.id == idLokasiWisata) {
                         if (elementLokWis.lokasi_wisata_sub_kriteria !== null) {
                             data[1].forEach(elementKrit => {
                                 var valid = true
                                 elementLokWis.lokasi_wisata_sub_kriteria.forEach(
                                     elementLokWisSubKrit => {

                                         if (elementKrit.id ==
                                             elementLokWisSubKrit.kriteria_id) {
                                             valid = false
                                         }
                                     })
                                 if (valid == false && elementKrit
                                     .bobot_perhitungan !== 'JSK') {
                                     html += '<option class="text-danger" value="' +
                                         elementKrit
                                         .id + '"disabled>' + elementKrit.nama +
                                         ' (kriteria sudah ada!)</option>'
                                 } else {
                                     html += '<option value="' + elementKrit
                                         .id + '">' + elementKrit.nama +
                                         '</option>'
                                 }

                             })
                         }
                     }
                 })
                 $("#kriteria_id_lokasi_wisata").html(
                     '<option value="" selected disabled>Pilih Kriteria ...</option>' + html);
             }
         })
     })

     $("#kriteria_id_lokasi_wisata").change(function() {
         var idKriteria = $(this).val();
         var idLokasiWisata = $('#lokasi_wisata_id_lokasi_wisata').val();
         $.ajax({
             url: "{{ route('kriteria_lokasi_wisata-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 var html = "";
                 data[0].forEach(elementKrit => {
                     if (elementKrit.bobot_perhitungan == 'BSK') {

                         if (elementKrit.id == idKriteria) {
                             if (elementKrit.kriteria_sub_kriteria !== null) {

                                 data[1].forEach(elementSubKrit => {

                                     elementSubKrit.kriteria_sub_kriteria.forEach(
                                         elementKritSubKrit => {
                                             if (elementKrit.id ==
                                                 elementKritSubKrit
                                                 .kriteria_id) {

                                                 html += '<option value="' +
                                                     elementSubKrit
                                                     .id + '">' + elementSubKrit
                                                     .nama +
                                                     '</option>'
                                             }

                                         });



                                 })
                             }
                         }

                     } else {
                         if (elementKrit.id == idKriteria) {

                             data[2].forEach(elementLokWis => {

                                 if (elementLokWis.id == idLokasiWisata) {

                                     if (elementLokWis.lokasi_wisata_sub_kriteria !==
                                         null) {



                                         data[1].forEach(
                                             elementSubKrit => {
                                                 var valid = true

                                                 elementLokWis
                                                     .lokasi_wisata_sub_kriteria
                                                     .forEach(
                                                         elementLokWisSubKrit => {


                                                             if (elementKrit
                                                                 .id ==
                                                                 elementLokWisSubKrit
                                                                 .kriteria_id
                                                             ) {

                                                                 if (elementSubKrit
                                                                     .id ==
                                                                     elementLokWisSubKrit
                                                                     .sub_kriteria_id
                                                                 ) {
                                                                     valid
                                                                         =
                                                                         false
                                                                 }
                                                             }
                                                         })


                                                 elementKrit
                                                     .kriteria_sub_kriteria
                                                     .forEach(
                                                         elementKritSubKrit => {


                                                             if (elementKrit
                                                                 .id ==
                                                                 elementKritSubKrit
                                                                 .kriteria_id
                                                             ) {
                                                                 if (elementSubKrit
                                                                     .id ==
                                                                     elementKritSubKrit
                                                                     .sub_kriteria_id
                                                                 ) {

                                                                     if (valid ==
                                                                         false) {
                                                                         html +=
                                                                             '<option class="text-danger" value="' +
                                                                             elementSubKrit
                                                                             .id +
                                                                             '"disabled>' +
                                                                             elementSubKrit
                                                                             .nama +
                                                                             ' (sub kriteria sudah ada!)</option>'
                                                                     } else {
                                                                         html +=
                                                                             '<option value="' +
                                                                             elementSubKrit
                                                                             .id +
                                                                             '">' +
                                                                             elementSubKrit
                                                                             .nama +
                                                                             '</option>'
                                                                     }
                                                                 }
                                                             }

                                                         })
                                             })
                                     }
                                 }
                             })
                         }
                     }

                 })
                 $("#sub_kriteria_id").html(
                     '<option value="" selected disabled>Pilih Sub Kriteria ...</option>' + html);
             }
         })
     })

     $("#kriteria_id").change(function() {
         var idKriteria = $(this).val();
         $.ajax({
             url: "{{ route('kriteria-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 console.log(data)
                 var html = "";
                 data[0].forEach(element => {
                     if (element.id == idKriteria) {
                         if (element.kriteria_sub_kriteria !== null) {
                             data[1].forEach(elementSubKrit => {
                                 var valid = true
                                 element.kriteria_sub_kriteria.forEach(
                                     elementKritSubKrit => {
                                         if (elementSubKrit.id ==
                                             elementKritSubKrit
                                             .sub_kriteria_id) {
                                             valid = false
                                         }
                                     })
                                 if (valid == false) {
                                     html += '<option class="text-danger" value="' +
                                         elementSubKrit
                                         .id + '"disabled>' + elementSubKrit.nama +
                                         ' (sub kriteria sudah ada!)</option>'
                                 } else {
                                     html += '<option value="' + elementSubKrit
                                         .id + '">' + elementSubKrit.nama +
                                         '</option>'
                                 }

                             })
                         }
                     }
                 })
                 $("#sub_kriteria_id").html(
                     '<option value="" selected disabled>Pilih Kriteria ...</option>' + html);
             }
         })
     })

     $("#kecamatan_id").change(function() {
         var idKecamatan = $(this).val();
         $.ajax({
             url: "{{ route('kecamatan-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 console.log(data)
                 var html = "";
                 data[0].forEach(element => {
                     if (element.id == idKecamatan) {
                         if (element.kecamatan_kelurahan !== null) {
                             data[1].forEach(elementKelurahan => {
                                 var valid = true
                                 element.kecamatan_kelurahan.forEach(
                                     elementKecKel => {
                                         if (elementKelurahan.id ==
                                             elementKecKel
                                             .kelurahan_id) {
                                             valid = false
                                         }
                                     })
                                 if (valid == false) {
                                     html += '<option class="text-danger" value="' +
                                         elementKelurahan
                                         .id + '"disabled>' + elementKelurahan.nama +
                                         ' (kelurahan sudah ada!)</option>'
                                 } else {
                                     html += '<option value="' + elementKelurahan
                                         .id + '">' + elementKelurahan.nama +
                                         '</option>'
                                 }

                             })
                         }
                     }
                 })
                 $("#kelurahan_id").html(
                     '<option value="" selected disabled>Pilih Kelurahan ...</option>' + html);
             }
         })
     })

     $("#kelurahan_id").change(function() {
         var idKelurahan = $(this).val();
         $.ajax({
             url: "{{ route('kelurahan-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 console.log(data)
                 var html = "";
                 data[0].forEach(element => {
                     if (element.id == idKelurahan) {
                         if (element.kelurahan_desa !== null) {
                             data[1].forEach(elementDesa => {
                                 var valid = true
                                 element.kelurahan_desa.forEach(
                                     elementKelDes => {
                                         if (elementDesa.id ==
                                             elementKelDes
                                             .desa_id) {
                                             valid = false
                                         }
                                     })
                                 if (valid == false) {
                                     html += '<option class="text-danger" value="' +
                                         elementDesa
                                         .id + '"disabled>' + elementDesa.nama +
                                         ' (desa sudah ada!)</option>'
                                 } else {
                                     html += '<option value="' + elementDesa
                                         .id + '">' + elementDesa.nama +
                                         '</option>'
                                 }

                             })
                         }
                     }
                 })
                 $("#desa_id").html(
                     '<option value="" selected disabled>Pilih Desa ...</option>' + html);
             }
         })
     })



     $("#lokasi_wisata_kriteria_id").change(function() {
         var idKriteria = $(this).val();
         $.ajax({
             url: "{{ route('lokasi_wisata_kriteria-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 console.log(data)
                 var html = "";
                 data[0].forEach(element => {
                     if (element.id == idKriteria) {
                         if (element.lokasi_wisata_kriteria !== null) {
                             data[1].forEach(elementLokWis => {
                                 var valid = true
                                 element.lokasi_wisata_kriteria.forEach(
                                     elementKrit => {
                                         if (elementLokWis.id == elementKrit
                                             .lokasi_wisata_id) {
                                             valid = false
                                         }
                                     })
                                 if (valid == false) {
                                     html += '<option class="text-danger" value="' +
                                         elementLokWis
                                         .id + '"disabled>' + elementLokWis.nama +
                                         ' (kriteria sudah ada!)</option>'
                                 } else {
                                     html += '<option value="' + elementLokWis
                                         .id + '">' + elementLokWis.nama +
                                         '</option>'
                                 }

                             })
                         }
                     }
                 })
                 $("#lokasi_wisata_id").html(
                     '<option value="" selected disabled>Pilih Lokasi Wisata ...</option>' + html
                 );
             }
         })
     })

     $("#kecamatan_id_lokasi_wisata").change(function() {
         var idKecamatan = $(this).val();
         $.ajax({
             url: "{{ route('kecamatan-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 //  console.log(data[0])
                 var html = "";
                 data[0].forEach(elementKec => {
                     if (elementKec.id == idKecamatan) {
                         if (elementKec.kecamatan_kelurahan !== null) {
                             elementKec.kecamatan_kelurahan.forEach(elementKecKel => {
                                 data[1].forEach(elementKel => {
                                     if (elementKecKel.kelurahan_id ==
                                         elementKel.id) {
                                         html += '<option value="' +
                                             elementKel
                                             .id + '">' + elementKel.nama +
                                             '</option>'
                                     }
                                 });
                             })
                         }
                     }
                 })
                 //  console.log(html)
                 $("#kelurahan_id_lokasi_wisata").html(
                     '<option value="" selected>Pilih Kelurahan ...</option>' + html);
             }
         })
     })

     $("#kelurahan_id_lokasi_wisata").change(function() {
         var idKelurahan = $(this).val();
         $.ajax({
             url: "{{ route('kelurahan-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 //  console.log(data[0])
                 var html = "";
                 data[0].forEach(elementKel => {
                     if (elementKel.id == idKelurahan) {
                         if (elementKel.kelurahan_desa !== null) {
                             elementKel.kelurahan_desa.forEach(elementKelDes => {
                                 data[1].forEach(elementDes => {
                                     if (elementKelDes.desa_id ==
                                         elementDes.id) {
                                         html += '<option value="' +
                                             elementDes
                                             .id + '">' + elementDes.nama +
                                             '</option>'
                                     }
                                 });
                             })
                         }
                     }
                 })
                 $("#desa_id_lokasi_wisata").html(
                     '<option value="" selected>Pilih Desa ...</option>' + html);
             }
         })
     })


     $(function() {
         $('#datepicker').datepicker();
     });

     $('#login').hover(() => {
         $('#login').toggleClass('text-primary')
     })

     @if (Session::has('succMessage'))
         Swal.fire({
             icon: 'success',
             title: '{{ Session::get('succMessage') }}',
             timer: 3000
         })
     @elseif (Session::has('succELECTREMessage'))
         Swal.fire({
             icon: 'success',
             title: '{{ Session::get('succELECTREMessage') }}'
             // timer: 3000
         })
     @elseif (Session::has('errELECTREMessage'))
         Swal.fire({
             icon: 'error',
             title: '{{ Session::get('errELECTREMessage') }}'
             // timer: 3000
         })
     @elseif (Session::has('errMessage'))
         Swal.fire({
             icon: 'error',
             title: '{{ Session::get('errMessage') }}'
             // timer: 3000
         })
     @elseif (Session::has('warnMessage'))
         Swal.fire({
             icon: 'warning',
             title: '{{ Session::get('warnMessage') }}'
             // timer: 3000
         })
     @elseif (Session::has('logMessage'))
         Swal.fire({
             icon: 'success',
             title: '{{ Session::get('logMessage') }}',
             timer: 3000
         })
     @endif



     function hapus(id, controller) {
         Swal.fire({
             title: 'Yakin ingin Menghapus?',
             // text: "You won't be able to revert this!",
             icon: 'question',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Ya!',
             cancelButtonText: 'Batal'
         }).then((result) => {
             if (result.isConfirmed) {
                 window.location.replace('/' + controller + '-destroy/' + id);
             }
         })
     }

     function logout() {
         Swal.fire({
             title: 'Yakin ingin Logout?',
             // text: "You won't be able to revert this!",
             icon: 'question',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Logout!'
         }).then((result) => {
             if (result.isConfirmed) {
                 window.location.replace('/logout');
             }
         })
     }

     function perhitungan() {
         Swal.fire({
             title: 'Mulai perhitungan ELECTRE?',
             // text: "You won't be able to revert this!",
             icon: 'question',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Mulai!'
         }).then((result) => {
             if (result.isConfirmed) {
                 window.location.replace('/perhitungan');
             }
         })
     }
 </script>
 </body>

 </html>
