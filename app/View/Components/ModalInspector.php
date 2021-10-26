<?php

namespace App\View\Components;

use App\Models\V1\Dependencia;
use App\Models\V1\Inspector;
use Illuminate\View\Component;

class ModalInspector extends Component
{
    public $idInspector;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idInspector)
    {
        $this->id= $idInspector;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $inspector = Inspector::find($this->id);
        $dependencia = Dependencia::find($inspector->dependencia_id);
        return view('components.modal-inspector',['inspector'=>$inspector,'dependencia'=>$dependencia]);
    }
}
