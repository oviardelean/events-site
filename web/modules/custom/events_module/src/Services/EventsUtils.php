<?php

namespace Drupal\events_module\Services;

use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Useful query for events.
 */
class EventsUtils {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * Constructs a new DatabaseLockBackend.
   *
   * @param \Drupal\Core\Database\Connection $database
   *   The database connection.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   */
  public function __construct(Connection $database, EntityTypeManagerInterface $entityTypeManager) {
    $this->database = $database;
    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * Retrieve Json data for options list.
   */
  public function optionList() {
    $json_data = json_decode(file_get_contents('public://artists.json'));

    // I am storing all data but using only list. For future maybe.
    $data[] = [];
    $list = [];

    foreach ($json_data as $key => $value) {
      $data[$key]['id'] = $value->id;
      $data[$key]['name'] = $value->name;
      $data[$key]['genre'] = $value->genre;
      $data[$key]['nationality'] = $value->nationality;
      $data[$key]['albums'] = $value->albums;
      $data[$key]['active'] = $value->active;

      $list[$value->name] = $value->name;
    }

    return $list;
  }

  /**
   * Retrieve entire json data unmodified.
   */
  public function jsonDataFull() {
    return file_get_contents('public://artists.json');
   }

}
