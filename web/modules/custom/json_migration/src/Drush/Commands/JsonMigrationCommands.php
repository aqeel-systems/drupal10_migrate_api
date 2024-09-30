<?php

namespace Drupal\json_migration\Drush\Commands;

use Drush\Commands\DrushCommands;

/**
 * Defines Drush commands for the JSON Migration module.
 */
class JsonMigrationCommands extends DrushCommands {

  /**
   * Triggers the JSON migration.
   *
   * @command json_migration:run
   * @aliases jmigrate-run
   */
  public function runMigration() {
    // Run the user migration.
    $this->output()->writeln('Running user migration...');
    $user_migration = \Drupal::service('plugin.manager.migration')->createInstance('json_users');
    $user_migration->getIdMap()->prepareUpdate();
    $user_migration->import();

    // Run the company migration.
    $this->output()->writeln('Running company migration...');
    $company_migration = \Drupal::service('plugin.manager.migration')->createInstance('json_companies');
    $company_migration->getIdMap()->prepareUpdate();
    $company_migration->import();
  }

}
