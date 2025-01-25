@include('admin.layouts.header')
<style>
    .navbar-custom
    {
        background:#752c37!important;
    }
    .navbar-custom .topbar .nav-link
    {
        color:white!important;
    }
</style>
   <!-- Begin page -->
    <div class="layout-wrapper">
    	
    	@include('admin.layouts.sidemenu')	
    	   
    	   <div class="page-content">
    	   		
    	   		@include('admin.layouts.topbar')


                <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">

                <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">{!! $pagetitle !!}</h4>
                </div>
                <div class="col-lg-6">
                   <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $pageroot }}</a></li>
                        <li class="breadcrumb-item active">{!! $pagetitle !!}</li>
                    </ol>
                   </div>
                </div>
            </div>
        </div>
        <!-- end page title -->


                 
                  @yield('content')
               </div>

            </div>



    	@include('admin.layouts.footer')
    	</div>	
    </div>

@include('admin.layouts.scripts')






@include('admin.layouts.popup')
@stack('scripts') 
@include('admin.layouts.popupscripts')
</body>

</html>