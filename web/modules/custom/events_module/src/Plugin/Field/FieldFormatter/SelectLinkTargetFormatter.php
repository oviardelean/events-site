<?php

namespace Drupal\events_module\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Url;
use Drupal\link\Plugin\Field\FieldType\LinkItem;

/**
 * Plugin implementation of the 'SelectLinkTargetFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "select_target_link_formatter",
 *   label = @Translation("Select Target Link Formatter"),
 *   field_types = {
 *     "link"
 *   }
 * )
 */
class SelectLinkTargetFormatter extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = [];

    /**
     * @var  $delta
     * @var LinkItem $item
     */
    foreach ($items as $delta => $item) {

      $values = $item->getValue();

      $options = [
        'attributes' => [
          'target' => $values['options']['attributes']['target'],
        ]
      ];

      $elements[$delta] = [
        '#type' => 'link',
        '#url' => Url::fromUri($values['uri'], $options),
        '#title' => $values['title'],
      ];
    }

    return $elements;
  }


  }
