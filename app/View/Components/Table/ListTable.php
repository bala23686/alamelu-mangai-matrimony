<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class ListTable extends Component
{

    public $tittle;
    public $tableHeaders;
    public $tableActions;
    public $datas;
    public $actionTypes;
    /**
     * Create a new component instance.
     *@param string $tittle
     *@param array $tableHeaders
     *@param array $datas
     * @return void
     */
    public function __construct(
    $tittle="Table Tittle",
    $tableHeaders=['so','username','email'],
    $tableActions=['Action'],
    $datas=[['id'=>1,'username'=>'saravanasai','email'=>'saravanasai002@gmail.com'],['id'=>2,'username'=>'sai','email'=>'saravanasai002@gmail.com']],
    $actionTypes=[['routeName'=>'admin.edit','buttonText'=>'EDIT']]
    ){
        $this->tittle=$tittle;
        $this->tableHeaders=$tableHeaders;
        $this->tableActions=$tableActions;
        $this->datas=$datas;
        $this->actionTypes=$actionTypes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.list-table');
    }
}
