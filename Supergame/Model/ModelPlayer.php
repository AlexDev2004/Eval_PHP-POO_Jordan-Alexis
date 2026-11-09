<?php class ModelPlayer extends Model{
    private int $id;
    private string $pseudo;
    private int $score;
    private string $team;
    private int $idTeam;

    public function getId():int{
        return $this->id;
    }
    public function getPseudo():string{
        return $this->pseudo;
    }
    public function getScore():int{
        return $this->score;
    }
    public function getTeam():string{
        return $this->team;
    }
    public function getIdTeam():int{
        return $this->idTeam;
    }
    public function setId(int $id):self{
        $this->id = $id;
        return $this;
    }
    public function setPseudo(string $pseudo):self{
        $this->pseudo = $pseudo;
        return $this;
    }
    public function setScore(int $score):self{
        $this->score = $score;
        return $this;
    }
    public function setTeam(string $team):self{
        $this->team = $team;
        return $this;
    }
    public function setIdTeam(int $idTeam):self{
        $this->idTeam = $idTeam;
        return $this;
    }

    public function findAll(){
        try{
            $request=$this->bdd->prepare("SELECT p.id_player , p.pseudo , p.score , t.team FROM player p JOIN team t ON t.id_team = p.id_team");
            $request->execute();
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }catch(EXCEPTION $error){die($error->getMessage());}
    }

    public function findByPseudo(string $pseudo){
        try{
            $request=$this->bdd->prepare("SELECT p.id_player , p.pseudo , p.score , t.team FROM player p JOIN team t ON t.id_team = p.id_team WHERE p.pseudo = ?");
            $request->bindParam(1,$pseudo,PDO::PARAM_STR);
            $request->execute();
            return $request->fetch(PDO::FETCH_ASSOC);
        }catch(EXCEPTION $error){die($error->getMessage());}
    }

    public function add(string $pseudo , int $score , int $idTeam):void{
        try{
            $request=$this->bdd->prepare("INSERT INTO player (pseudo , score , id_team) VALUE (?,?,?)");
            $request->bindParam(1,$pseudo,PDO::PARAM_STR);
            $request->bindParam(2,$score,PDO::PARAM_INT);
            $request->bindParam(3,$idTeam,PDO::PARAM_INT);
            $request->execute();
        }catch(EXCEPTION $error){die($error->getMessage());}
    }

    public function update(int $idPlayer , string $pseudo , int $score , int $idTeam):void{
        try{
            $request=$this->bdd->prepare("UPDATE player SET pseudo = ? , score = ? , id_team = ? WHERE id_player = ?");
            $request->bindParam(1,$pseudo,PDO::PARAM_STR);
            $request->bindParam(2,$score,PDO::PARAM_INT);
            $request->bindParam(3,$idTeam,PDO::PARAM_INT);
            $request->bindParam(4,$idPlayer,PDO::PARAM_INT);
            $request->execute();
        }catch(EXCEPTION $error){die($error->getMessage());}
    }

    public function delete(int $idPlayer):void{
        try{
            $request=$this->bdd->prepare("DELETE FROM player WHERE id_player = ?");
            $request->bindParam(1,$idPlayer,PDO::PARAM_INT);
            $request->execute();
        }catch(EXCEPTION $error){die($error->getMessage());}
    }
}?>