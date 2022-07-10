 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
       <a class="nav-link " href="{{ url('/admin') }}">
         <i class="bi bi-grid"></i>
         <span>Dashboard</span>
         {{-- {{ Request::is('dashboard') ? 'active' : '' }} --}}
       </a>
     </li><!-- End Dashboard Nav -->


     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#pesanan" data-bs-toggle="collapse" href="#">
         <i class="bi bi-list-nested"></i><span>Post</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="pesanan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         <li>
           <a href="{{ url('/admin/post') }}">
             <i class="bi bi-circle"></i><span>Post</span>
           </a>
           <a href="{{ url('/admin/category') }}">
             <i class="bi bi-circle"></i><span>Category</span>
           </a>
         </li>
       </ul>
     </li><!-- End Tables Nav -->





   </ul>

 </aside><!-- End Sidebar-->