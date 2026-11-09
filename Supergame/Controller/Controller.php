<?php class Controller{
    protected Model $model;
    protected View $view;

    public function __construct(Model $model , View $view){
        $this->model = $model;
        $this->view = $view;
    }

    public function getModel():Model{
        return $this->model;
    }
    public function getView():View{
        return $this->view;
    }
    public function setModel(Model $model):self{
        $this->model = $model;
        return $this;
    }
    public function setView(View $view):self{
        $this->view = $view;
        return $this;
    }

    public function render():void{
        $this->view->displayAll();
    }
}?>