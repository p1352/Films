<?php

/**
* Page destinée à afficher une liste 
* de Blueray à visionner à la 
* date du jour
*/

// Variable contenant la date du jour
$current_date = date("d/m/Y");

// Variable contenant le titre de la page 
$title = "Ma liste de Blueray à visionner au " . $current_date;

// Variable contenant les données des films
$data = array();

if (($handle = fopen("films.csv","r")) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //array_push(&$data, $row);
        $data[] = $row; 

    }
    fclose($handle);
} 




//var_dump($data);

// Fonction affichant un élément de la liste
// details.php?film=FILM001
function show_row($film) {
    echo "<tr><td><a href='details.php?film=" . $film->id . "'>". $film->title ."</a></td><td>" . $film->type . "</td></tr>";
}

// Fonction affichant un select des types de films
function show_select_types_de_films(){
    global $data;
    $types = array();
    foreach ($data as $row) {
        if (!in_array($row[3],$types) && $row[3] !="Type"){
            $types[] = $row[3];
            echo "<li role='type'><a role='menuitem' href='/?type=" . urlencode($row[3]) ."'>" . $row[3] . "</a></li>";
        }
    }
}

/**
 * Classe contenant les propriétés d'un film
 * Et permettant de les utiliser logiquement
 */

class Film {
    
    public $id;
    public $title;
    public $image;
    public $type;
    public $year;
    public $country;
    public $director;
    public $length;
    public $abstract;
    
    public function __construct($row){
       $this->id = $row[0];
       $this->title = $row[1];
       $this->image = $row[2];
       $this->type = $row[3];
       $this->year = $row[4];
       $this->country = $row[5];
       $this->director = $row[6];
       $this->length = $row[7];
       $this->abstract = $row[8];
}

public function __toString() {
    return $this->title . ", " . $this->type;
}

}

/**
 * Classe destinée à trouver le film
 */

class Finder {
    private $_data;
    public function __construct($data) {
        $this->_data = $data;
    }
    
    // Méthode pour trouver un film à partir de son ID
    public function find($id) {
        foreach ($this->_data as $row) {
            if ($row[0] == $id) {
                return new Film($row);
            }
        }
        return NULL;
    }
    
    // Méthode qui permet de trouver un ensemble de films à partir du type
    public function findByType($type) {
        $found = array();
        if (!empty($type)) {
            foreach ($this->_data as $row) {
                if ($row[3] == $type) {
                    $found [] = new Film($row);
                }
            }
        }
        // Si rien, on renvoie tous les films
        else {
            foreach ($this->_data as $row) {
                if ($row[1] !="Title") {
                    $found[] = new Film($row);
            }
            }
        }
        
       
    
        return $found;
                }
    
    
}

?>
