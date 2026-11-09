<?php class View{
    public function displayHeader():self{ ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Supergame</title>
        </head>
        <body>
            <header>
                <nav>

                </nav>
            </header>
    <?php return $this;
    }

    public function displayFooter():self{ ?>
            <footer>

            </footer>
        </body>
        </html>
    <?php return $this;
    }
}?>