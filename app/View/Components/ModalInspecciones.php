<?php

namespace App\View\Components;

use App\Models\V1\Orden;
use Illuminate\View\Component;
class ModalInspecciones extends Component
{
    public $idInspector;
    public $nombreInspector;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idInspector, $nombreInspector)
    {
        $this->idInspector =$idInspector;
        $this->nombreInspector =  html_entity_decode($nombreInspector);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $ordenes = Orden::Where('inspector_id','=',$this->idInspector)->get();
        return view('components.modal-inspecciones',compact('ordenes'),['nombreInspector'=>$this->nombreInspector,'idInspector'=>$this->idInspector]);
    }
}
