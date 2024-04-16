<?php

namespace Drupal\events_module\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldFilteredMarkup;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\OptGroup;

/**
 * Plugin implementation of the 'ArtistsFieldFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "artist_select_formatter",
 *   label = @Translation("Artists Field Formatter"),
 *   field_types = {
 *     "artist_item",
 *   }
 * )
 */
class ArtistsFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode)
  {

    $elements = [];
    if ($items->count()) {

      $provider = $items->getFieldDefinition()
        ->getFieldStorageDefinition()
        ->getOptionsProvider('value', $items->getEntity());
      $options = OptGroup::flattenOptions($provider->getPossibleOptions());


      foreach ($items as $delta => $item) {
        $value = $item->value;
        // If the stored value is in the current set of allowed values, display
        // the associated label, otherwise just display the raw value.
        $output = $options[$value] ?? $value;
        $elements[$delta] = [
          '#markup' => $output,
          '#allowed_tags' => FieldFilteredMarkup::allowedTags(),
        ];
      }
    }

    return $elements;

    }

}
