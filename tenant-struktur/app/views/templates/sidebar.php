 <div id="sidebar" class="">
     <div class="sidebar-wrapper active ">
         <div class="sidebar-header position-relative border-bottom  p-0">
             <div class="d-flex justify-content-start align-items-center mb-2 " style="margin-bottom: 13.5px !important;">
                 <div class="  ms-3 mt-3">
                     <div class="user-img d-flex align-items-center">
                         <div class=" pb-2">
                             <img src="<?= BASEURL; ?>/assets/img/logo-mmc.gif" style="width:90% ;height:50px">
                         </div>
                     </div>
                 </div>
                 <div class=" mt-3   ">

                     <h5 class="mt-3 pe-auto col-12" style="height: 20px;color:#1158ac">Rumah Sakit </h5>
                     <h6 class="mt-2 col-12" style="font-size: 10pt;color:#037132;">Metropolitan Medical Center</h6>
                 </div>

                 <div class="sidebar-toggler x">
                     <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                 </div>

             </div>
         </div>
         <div class="sidebar-menu ">
             <ul class="menu p-0 px-3 ">

                 <?php foreach ($data['menu'] as $no => $menu):
                        $link_menu  = explode('/', $menu['link']);
                        $link_menu  = $link_menu[1];
                    ?>
                     <li class="sidebar-item <?= $_GET['url'] == $link_menu ? 'active' : '' ?>" data-id="<?= $menu['uuid']; ?>">
                         <a href="<?= BASEURL . $menu['link'] ?>" class='sidebar-link'>
                             <i class="<?= $menu['icon']; ?>"></i>
                             <span> <?= $menu['menu']; ?>
                             </span>
                         </a>
                     </li>
                 <?php endforeach ?>



             </ul>
         </div>
     </div>
 </div>