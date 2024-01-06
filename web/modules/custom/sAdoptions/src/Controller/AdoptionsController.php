<?php

namespace Drupal\sAdoptions\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
class AdoptionsController extends ControllerBase {
    
    public function adoptions() {
        $nodes = $this->getNodesAdoptions();
        //print_r($nodes);
        return [
            '#theme' => 'sAdoptions',
            '#adoption' => $nodes,
            '#attached' => [
                'library' => [
                    'sAdoptions/sAdoptions-style'
                ]
            ]
            ];
    }

    public function getNodesAdoptions() {
        $query = \Drupal::entityQuery('node')
        ->condition('type', 'pet_for_adoption_content')
        ->condition('field_pet_has_been_adopted', 1)
        ->accessCheck(TRUE);
    
        $results = $query->execute();

        $nodes = \Drupal\node\Entity\Node::loadMultiple($results);

        return $nodes;
    }
}
