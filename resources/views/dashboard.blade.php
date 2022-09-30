<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            @if ($status == true)
            <button type="button" class="btn btn-sm btn-success" disabled>LogIn</button>

            @else
            <button type="button" class="btn btn-sm btn-danger" disabled>Logout</button>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3">
                    @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success !</strong> {!! \Session::get('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error !</strong> {!! \Session::get('error') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table id='dataimei' width='100%'>
                        <thead>
                            <tr>
                                <td>ID.</td>
                                <td>User ID</td>
                                <td>Nama</td>
                                <td>NIP</td>
                                <td>OPD</td>
                                <td>Alasan</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- Script -->
                <script type="text/javascript">
                    $(document).ready(function(){
    
          // DataTable
          $('#dataimei').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{url('imei')}}",
             columns: [
                { data: 'id' },
                { data: 'userid' },
                { data: 'nama' },
                { data: 'nip' },
                { data: 'opd' },
                { data: 'alasan' },
                { data: 'status' },
                { data: 'action' },
             ]
          });
    
        });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>