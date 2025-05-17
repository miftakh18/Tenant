<?php
class menu extends Controller
{
    public $mmenu;
    public function __construct()
    {
        $this->mmenu = $this->model('Mmenu');
    }
    public function index() {}
    public function cekmenu($id_menu)
    {
        $submenu = $this->mmenu->getSubmenu($id_menu);
        $subsubmenu  = $this->mmenu->getSubsubmenu($id_menu);
        foreach ($submenu as $i => $sm) {
            // Mencari subsubmenu yang memiliki uuid_submenu yang sama dengan uuid menu
            $subsubmenus = array_filter($subsubmenu, function ($sub) use ($sm) {
                return $sub['uuid_submenu'] == $sm['uuid'];
            });

            // Mengubah array filter ke dalam array numerik
            $submenu[$i]['subsubmenu'] = array_values($subsubmenus);
        }
        // var_dump($submenu);
        $this->return_json($submenu);
    }
}
