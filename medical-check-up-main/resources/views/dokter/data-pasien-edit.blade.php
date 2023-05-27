@extends('layouts.dashboard.base')

@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">{{ $title }}</h1>
    </div>
    <!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </div>
    <!-- /.col -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pasien</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokter.data_pasien.update') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $pasien->id }}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Nama">Nama</label>
                                <input type="text" name="name" class="form-control" id="Nama" value="{{ $pasien->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="NIK">NIK</label>
                                <input type="number" name="nik" class="form-control" id="NIK" value="{{ $pasien->nik }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal Lahir</label>
                                <div class="input-group date" id="birthdayDate" data-target-input="nearest">
                                    <input type="text" name="birthday" class="form-control datetimepicker-input" data-target="#birthdayDate" value="{{ date('m/d/Y', strtotime($pasien->birthday)) }}">
                                    <div class="input-group-append" data-target="#birthdayDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="form-control form-select">
                                    <option selected="selected" value="{{ $pasien->gender }}">{{ $pasien->gender }}</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Nomor_Telpon">Nomor Telpon</label>
                                <input type="text" name="phone" class="form-control" id="Nomor_Telpon" value="{{ $pasien->phone }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Nama_Ayah">Nama Ayah</label>
                                <input type="text" name="father_name" class="form-control" id="Nama_Ayah" value="{{ $pasien->father_name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Nama_Ibu">Nama Ibu</label>
                                <input type="text" name="mother_name" class="form-control" id="Nama_Ibu" value="{{ $pasien->mother_name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Alamat">Alamat</label>
                                <input type="text" name="address" class="form-control" id="Alamat" value="{{ $pasien->address }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Catatan Keperawatan Pasien</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokter.data_pasien.noted') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Resep Obat">Resep Obat</label>
                                <input type="text" name="resep_obat" class="form-control" id="Resep Obat" value="{{ empty($noted->resep_obat) ? '' : $noted->resep_obat }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal Berobat</label>
                                <div class="input-group date" id="tanggalBerobat" data-target-input="nearest">
                                    <input type="text" name="tanggal_berobat" class="form-control datetimepicker-input" data-target="#tanggalBerobat" value="{{ empty($noted->tanggal_berobat) ? '' : date('m/d/Y', strtotime($noted->tanggal_berobat)) }}">
                                    <div class="input-group-append" data-target="#tanggalBerobat" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Diagnosa Dokter">Diagnosa Dokter</label>
                                <input type="text" name="diagnosa_dokter" class="form-control" id="Diagnosa Dokter" value="{{ empty($noted->diagnosa_dokter) ? '' : $noted->diagnosa_dokter }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Catatan Dokter">Catatan Dokter</label>
                                <input type="text" name="catatan_dokter" class="form-control" id="Catatan Dokter" value="{{ empty($noted->catatan_dokter) ? '' : $noted->catatan_dokter }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pembayaran Pasien</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokter.data_pasien.payment') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="Biaya Konsuktasi">Biaya Konsuktasi</label>
                                <input type="number" name="biaya_konsuktasi" class="form-control" id="Biaya Konsuktasi" value="{{ empty($payment->biaya_konsuktasi) ? '' : $payment->biaya_konsuktasi }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Biaya Perawatan">Biaya Perawatan</label>
                                <input type="number" name="biaya_perawatan" class="form-control" id="Biaya Perawatan" value="{{ empty($payment->biaya_perawatan) ? '' : $payment->biaya_perawatan }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Biaya Resep Obat">Biaya Resep Obat</label>
                                <input type="number" name="biaya_resep_obat" class="form-control" id="Biaya Resep Obat" value="{{ empty($payment->biaya_resep_obat) ? '' : $payment->biaya_resep_obat }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-12 -->
    </div>
    <!-- /.row -->
@endsection

@section('js')
    <!-- Page specific script -->
    <script>
        $(function() {
            //Date range picker
            $('#birthdayDate').datetimepicker({
                format: 'L'
            });

            //Date range picker
            $('#tanggalBerobat').datetimepicker({
                format: 'L'
            });

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>
@endsection
