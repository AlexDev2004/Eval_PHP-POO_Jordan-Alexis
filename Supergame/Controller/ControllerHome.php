<?php class ControllerHome extends Controller{
    public function displayPlayers():self{
        $data = $this->model->findAll();
        switch(gettype($data)){
            case 'array' :
                $this->view->setListe($data);
                break;
            default:
                $this->view->setMessage2($data);
        }
        return $this;
    }

    public function registerPlayer():self{
        if(isset($_POST['register'])){
            // On enlève les espaces inutiles
            $pseudo = sanitize($_POST['pseudo']);
            $score = sanitize($_POST['score']);
            $teamId = sanitize($_POST['team']);

            // On vérifie que les champs ne soient pas vides
            if($pseudo === '' || $score === '' || $teamId === '') {
                $this->view->setMessage('Veuillez remplir tous les champs !');
                return $this;
            }

            // On vérifie les types de valeurs
            if(!is_numeric($score) || !is_numeric($teamId)) {
                $this->view->setMessage('Les informations sont invalides !');
                return $this;
            }

            $checkPseudo = $this->model->findByPseudo($pseudo);
            if(!empty($checkPseudo)) {
                $this->view->setMessage('Ce Pseudo est déjà utilisé !');
                return $this;
            }   

            $this->model->add($pseudo , $score , $teamId);
            $this->view->setMessage("Joueur $pseudo ajouté !");
        }
        return $this;
    }
}?>