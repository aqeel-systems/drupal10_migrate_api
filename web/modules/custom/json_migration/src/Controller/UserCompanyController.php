<?php

namespace Drupal\json_migration\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Drupal\node\Entity\Node;

class UserCompanyController extends ControllerBase {

  public function display() {
    $users = User::loadMultiple();  // Load all users
    foreach ($users as $index => $user) {

      // Check if the user has the field_company field and it's not empty
      if ($user->hasField('field_company') && !$user->get('field_company')->isEmpty()) {
        // Load the referenced company entity (assuming field_company is a reference to node:company)
        $company_ref = $user->get('field_company')->entity;

        if ($company_ref && $company_ref->hasField('field_company_name')) {
          // Access the company name field
          $company_name = $company_ref->get('field_company_name')->value;
        } else {
          $company_name = 'Unknown Company';
        }
      } else {
        $company_name = 'No Company';
      }
      if ($index > 0){
        // Add the user and company information to the output
        $output .= '<li>' . $user->getAccountName() . ' works at ' . $company_name . '</li>';
      }

    }

    $output .= '</ul>';

    return [
      '#markup' => $output,
    ];
  }


}
