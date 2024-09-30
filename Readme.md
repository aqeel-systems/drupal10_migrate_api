JSONPlaceholder Drupal Migration
This project contains a Drupal module that imports user and company data from the JSONPlaceholder API and saves it to the appropriate Drupal content types (company) and user entities (user). The repository includes configuration for content types, fields, and a custom migration script using the Migrate API.

Prerequisites
Before you begin, ensure you have the following:

Drupal 10.x installed.
PHP version: 8.1.10
Composer installed.
Drush installed for command-line management of Drupal.
Steps to Set Up the Project
Follow these steps to install and set up the project:

1. Clone the Repository
   First, clone the repository to your local machine:


git clone https://github.com/aqeel-systems/drupal10_migrate_api.git
cd drupal10_migrate_api
2. Install Dependencies
   Run Composer to install all necessary dependencies, including Drupal modules required for the migration.

composer install
3. Set Up the Local Environment
   Make sure your local development environment (DDEV, LAMP, etc.) is running and Drupal is installed.

4. Import Configuration
   Once the environment is up, you need to import the configuration to set up content types, fields, and other configurations:

vendor/bin/drush config-import
This will import the content type company, along with its fields, and add the necessary user fields.

5. Run Database Updates
   After importing the configuration, update the database to apply any necessary schema updates:

vendor/bin/drush updatedb
6. Clear Cache
   Clear Drupal caches to make sure all changes are applied:

vendor/bin/drush cr
7. Enable the Custom Module
   To enable the custom module for migration:

vendor/bin/drush pm:enable json_migration
8. Running the Migration
   To run the migration and pull user and company data from the JSONPlaceholder API, execute the following command:

vendor/bin/drush migrate-import json_users
This will fetch data from the API and save it into the company content type and Drupal user entities.

9. Rollback the Migration (Optional)
   If you want to undo the migration, you can run:

vendor/bin/drush migrate:rollback json_users
10. View Imported Data
    After running the migration, you can view the imported users and companies:

Users: Check the user list (/admin/people) to see the newly imported users.
Companies: View the company content type to see the imported company data (/admin/content).
Drush Commands Overview
drush config-import: Imports the configuration files into the Drupal site.
drush updatedb: Runs database updates to apply any pending changes.
drush cr: Clears the Drupal cache.
drush pm:enable json_migration: Enables the custom migration module.
drush migrate-import json_users: Runs the migration to import data from the JSON API.
drush migrate:rollback json_users: Rolls back the migration to undo any changes made.
Troubleshooting
Missing Bundle Entity: If you encounter the error Missing bundle entity, it likely means the content type configuration was not imported correctly. Make sure you run the drush config-import command after cloning the repository.

Migration Errors: If the migration doesn't run, ensure that the migration group and configuration files are correctly set up and that the source URL is accessible.

***Notes:
Add this line in settings.php
$config_directories['sync'] = '../config/sync';
