<?php

namespace Drupal\json_migration\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Drupal\node\Entity\Node;

class UserCompanyController extends ControllerBase {

  public function display() {
    $users = User::loadMultiple();
    $output = '<h2>Users and their Companies</h2><ul>';
    foreach ($users as $user) {
      $company_name = $user->get('field_company_name')->value;
      $output .= '<li>' . $user->getUsername() . ' works at ' . $company_name . '</li>';
    }
    $output .= '</ul>';
    return [
      '#markup' => $output,
    ];
  }

}
