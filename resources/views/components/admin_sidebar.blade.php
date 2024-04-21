<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{ asset('assets') }}/images/app_logo.png"  class="logo-icon-2" alt="" />
        </div>
        <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="{{ Route::is('admin.dashboard') ? 'mm-active' : '' }}">
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Web Apps</li>
        <li class="{{ Route::is('admin.profile') ? 'mm-active' : '' }}">
            <a href="{{route('admin.profile')}}">
                <div class="parent-icon icon-color-4"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>




        <li>
        <a class="{{ Route::is('admin.employe') ? 'mm-active' : '' }} has-arrow" href="javascript:;">
        <div class="parent-icon icon-color-1"> <i class="bx bx-user"></i>
        </div>
        <div class="menu-title">Employe</div>
        </a>
        <ul>
        <li> <a href="{{route('admin.employe')}}"><i class="bx bx-right-arrow-alt"></i>Add Employe</a>
        </li>
        <li> <a href="{{route('admin.allempoye')}}"><i class="bx bx-right-arrow-alt"></i>All Employe</a>
        </li>
        </ul>
        </li>


        <li>
        <a class="{{ Route::is('admin.member') ? 'mm-active' : '' }} has-arrow" href="javascript:;">
        <div class="parent-icon icon-color-1"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users text-danger">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        </div>
        <div class="menu-title">Students</div>
        </a>
        <ul>
        <li> <a href="{{route('admin.student')}}"><i class="bx bx-right-arrow-alt"></i>Add Students</a>
        </li>
        <li> <a href="{{route('admin.allstudent')}}"><i class="bx bx-right-arrow-alt"></i>All Students</a>
        </li>
        </ul>
        </li>


         <li>
            <a class="{{ Route::is('admin.member') ? 'mm-active' : '' }} has-arrow" href="javascript:;">
            <div class="parent-icon icon-color-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users text-danger">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            </div>
            <div class="menu-title">Members</div>
            </a>
            <ul>
            <li> <a href="{{route('admin.member')}}"><i class="bx bx-right-arrow-alt"></i>Add Members</a>
            </li>
            <li> <a href="{{route('admin.allmember')}}"><i class="bx bx-right-arrow-alt"></i>All Members</a>
            </li>
            </ul>
        </li>





        <li>
            <a class="{{ Route::is('admin.category') ? 'mm-active' : '' }} has-arrow" href="javascript:;">
            <div class="parent-icon icon-color-1"> <i class="bx bx-grid"></i>
            </div>
            <div class="menu-title">Categories</div>
            </a>
            <ul>
            <li> <a href="{{route('admin.category')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
            </li>
            <li> <a href="{{route('admin.allcategory')}}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
            </li>
            </ul>
        </li>







        <li>
            <a class="{{ Route::is('admin.blog') ? 'mb-active' : '' }} has-arrow" href="javascript:;">
            <div class="parent-icon icon-color-1"> <i class="bx bx-bold"></i>
            </div>
            <div class="menu-title">Blogs</div>
            </a>
            <ul>
            <li> <a href="{{route('admin.blog')}}"><i class="bx bx-right-arrow-alt"></i>Add Blogs</a>
            </li>
            <li> <a href="{{route('admin.allblog')}}"><i class="bx bx-right-arrow-alt"></i>All Blogs</a>
            </li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
