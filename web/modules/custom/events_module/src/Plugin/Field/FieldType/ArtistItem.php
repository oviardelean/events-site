<?php

namespace Drupal\events_module\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\TypedData\OptionsProviderInterface;

/**
 * Provides a field type of Artist.
 *
 * @FieldType(
 *   id = "artist_item",
 *   label = @Translation("Artist Field"),
 *   default_widget = "artists_list_widget",
 *   default_formatter = "artist_select_formatter",
 * )
 */

class ArtistItem extends FieldItemBase implements OptionsProviderInterface {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'varchar',
          'length' => 255,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];

    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Value'))
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public function getPossibleValues(AccountInterface $account = NULL) {
    return array_keys($this->getPossibleOptions($account));
  }

  /**
   * {@inheritdoc}
   */
  public function getSettableValues(AccountInterface $account = NULL) {
    return $this->getPossibleValues($account);
  }

  /**
   * {@inheritdoc}
   */
  public function getSettableOptions(AccountInterface $account = NULL) {
    return $this->getPossibleOptions($account);
  }


  public function getPossibleOptions(AccountInterface $account = NULL)
  {
    return \Drupal::service('events_module.artists')->optionList();
  }
}
