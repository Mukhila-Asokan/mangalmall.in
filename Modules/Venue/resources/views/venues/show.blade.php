@extends('admin.layouts.app-admin')
@section('content')
<style type="text/css">
    table
    {
        color:#000;
    }
</style>
 <div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title mb-4">Venue List</h4>
			   
				<div class="text-end">
				 <a href = "{{ route('venue/create') }}" class="btn btn-primary waves-effect waves-light mb-4 text-end">
								  <span class="tf-icon mdi mdi-plus me-1"></span>Add Venue
				   </a>
				</div>
			

				<table class="table table-bordered data-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Venue Name</th>
				<th>Location</th>
				<th>Contact Person</th>
				<th>Mobile No</th>
				<th width="100px">Action</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
				 
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  $(function () {
        
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('venue/index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'venuename', name: 'venuename'},
            {data: 'venueaddress', name: 'venueaddress'},
            {data: 'contactperson', name: 'contactperson'},
            {data: 'contactmobile', name: 'contactmobile'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
        
  });
</script>
@endpush