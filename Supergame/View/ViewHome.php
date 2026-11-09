<?php class ViewHome extends View{
    private string $message = '';
    private string $message2 = '';
    private array $liste = [];

    public function getMessage():string{
        return $this->message;
    }
    public function setMessage(string $message):self{
        $this->message = $message;
        return $this;
    }
    public function getMessage2():string{
        return $this->message2;
    }
    public function setMessage2(string $message):self{
        $this->message2 = $message;
        return $this;
    }
    public function getListe():array{
        return $this->liste;
    }
    public function setListe(array $liste):self{
        $this->liste = $liste;
        return $this;
    }

    public function displayMain(){ ?>
        <main>
            <form action="#" method="post">
                <div>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo">
                </div>
                <div>
                    <label for="score">Score</label>
                    <input type="number" name="score" id="score">
                </div>
                <div>
                    <label for="team">Team</label>
                    <select name="team" id="team">
                        <option value="1">Aucune</option>
                        <option value="2">TeamRocket</option>
                        <option value="3">DreamTeam</option>
                    </select>
                </div>
                <button type="submit" name="register">Confirmer</button>
                <p><?= $this->message ?></p>
            </form>
            
            <section>
                <h2>Liste des joueurs :</h2>
                <ul>
                    <?php foreach($this->liste as $data){
                        echo("<li> $data[pseudo] : $data[score] points, $data[team] </li>");
                    }?>
                </ul>
                <p><?= $this->message2 ?></p>
            </section>
        </main>
    <?php }

    public function displayAll(){
        $this->displayHeader();
        $this->displayMain();
        $this->displayFooter();
    }
}?>