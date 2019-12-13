<?php 
use App\Models\Pesan;
 ?>

<div class="header navbar" style="box-shadow: none;">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                    <i class="ti-menu"></i>
                </a>
            </li>
          
        </ul>
        <ul class="nav-right">
            {{-- <li class="notifications dropdown">
                <span class="counter bgc-red">3</span>
                <a href="" class="dropdown-toggle no-after" data-toggle="dropdown">
                    <i class="ti-bell"></i>
                </a>
--}}
              
            </li>
            <li class="notifications dropdown">
                    <?php $pesan_count = Pesan::where('admin_read', '0')->get(); ?>
            <?php if(count($pesan_count) > 0){ ?>
                <span class="counter bgc-blue">
                   
                   <?php echo count($pesan_count); ?>

                </span>
            <?php }
               
                ?>
                <a href="{{route('admin-panel.getPesan')}}" >
                    <i class="ti-email"></i>
                </a>

            </li> 
            <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p" src="/images/1.jpg" alt="">
                    </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    <li>
                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-settings mR-10"></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-user mR-10"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                    <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-email mR-10"></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="/logout" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-power-off mR-10"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
