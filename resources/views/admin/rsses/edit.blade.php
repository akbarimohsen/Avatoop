@extends('layouts.master')
@section('content')
    <livewire:admin.rss-management.edit :rss="$rss">
@endsection
        @section('Js')
            <script type="text/javascript">
                function SimpleUploadAdapterPlugin( editor ) {
                    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                        // Configure the URL to the upload script in your back-end here!
                        return new MyUploadAdapter( loader );
                    };
                }
                ClassicEditor
                    .create(document.querySelector('#editor1'), {
                        extraPlugins: [ SimpleUploadAdapterPlugin ],

                    })
                    .then(function (editor) {
                        // The editor instance
                    })
                    .catch(function (error) {
                        console.error(error)
                    })

                // bootstrap WYSIHTML5 - text editor

                $('.textarea').wysihtml5({
                    toolbar: { fa: true }
                })
                $(document).ready(function () {
                    $(function () {
                        //Initialize Select2 Elements
                        $('.select2').select2()
                    })
                    $("#NewsDate").pDatepicker({
                        altField: '#NewsDate',
                        altFormat: "YYYY-MM-DD H:m:s",
                        observer: true,
                        format: 'YYYY-MM-DD H:m:s',
                        initialValue: false,
                        initialValueType: 'persian',
                        autoClose: true,
                        maxDate: 'today',
                        calendar:{
                            persian: {
                                locale: 'en'
                            }
                        }
                    });
                });
            </script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    Livewire.hook('message.received', () => {
                        ClassicEditor
                            .create(document.querySelector('#editor1'), {
                                extraPlugins: [ SimpleUploadAdapterPlugin ],

                            })
                            .then(function (editor) {
                                // The editor instance
                            })
                            .catch(function (error) {
                                console.error(error)
                            })
                        $('.textarea').wysihtml5({
                            toolbar: {fa: true}
                        })
                        $(function () {
                            //Initialize Select2 Elements
                            $('.select2').select2()

                        })
                    })
                    Livewire.hook('element.initialized', () => {
                    })

                });
            </script>
@endsection
