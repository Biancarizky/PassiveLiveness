<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Files') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="card-body">

                        <!-- print success message after file upload  -->
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                            Session::forget('success');
                            @endphp
                        </div>
                        @endif

                        <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data" request="LprlAzZnflLXxYCLxI0bHOwAxIspX6ci">
                            {{ csrf_field() }}

                            <div class="form-group block mt-4">
                                <x-label for="title">Attach Image/file Here</x-label>
                                <x-input type="file" name="files[]" class="form-control-file block mt-1 w-full" multiple=""/>
                                @if($errors->has('files'))
                                <span class="help-block text-danger">{{ $errors->first('files') }}</span>
                                @endif
                            </div>

                            <div class="text-right mt-4">
                                <x-button class="ml-3">Upload</x-button>
                            </div>
                        </form>




                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>