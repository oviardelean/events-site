<?php

namespace Drupal\events_module\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Annotation\FieldWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\OptionsSelectWidget;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'ArtistsFieldWidget' widget.
 *
 * @FieldWidget(
 *   id = "artists_list_widget",
 *   label = @Translation("Artists List Widget"),
 *   field_types = {
 *     "artist_item",
 *   },
 *   multiple_values = TRUE
 * )
 */
class ArtistsFieldWidget extends OptionsSelectWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $options = \Drupal::service('events_module.artists')->optionList();
    // @todo for me when I have time to check why if default value is not set on null first option is added.
    $element['value'] = $element + [
        '#type' => 'select',
        '#options' => $options,
        '#empty_value' => '',
        '#default_value' => (isset($items[$delta]->value)) ? $items[$delta]->value : NULL,
      ];
    return $element;
  }

}
