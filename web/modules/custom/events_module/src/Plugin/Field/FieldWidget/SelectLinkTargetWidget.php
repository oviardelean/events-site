<?php

namespace Drupal\events_module\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Annotation\FieldWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\link\Plugin\Field\FieldWidget\LinkWidget;

/**
 * Plugin implementation of the 'event_link_widget' widget.
 *
 * @FieldWidget(
 *   id = "event_link_widget",
 *   label = @Translation("Custom Event Link"),
 *   field_types = {
 *     "link"
 *   }
 * )
 */
class SelectLinkTargetWidget extends LinkWidget {

  /**
   * Getting link items.
   *
   * @param \Drupal\Core\Field\FieldItemListInterface $items
   *   Returning of field items.
   * @param string $delta
   *   Returning field delta with item.
   *
   * @return \Drupal\link\LinkItemInterface
   *   Returning link items inteface.
   */
  private function getLinkItem(FieldItemListInterface $items, $delta) {
    return $items[$delta];
  }


  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);

    $item = $this->getLinkItem($items, $delta);
    $options = $item->get('options')->getValue();


    $targets_available = [
      '_self' => 'Current window (_self)',
      '_blank' => 'New window (_blank)',
      '_parent' => 'Parent window (_parent)',
      '_top' => 'Topmost window (_top)',
    ];
    $default_value = !empty($options['attributes']['target']) ? $options['attributes']['target'] : '';
    $element['options']['attributes']['target'] = [
      '#type' => 'select',
      '#title' => $this->t('Select a target'),
      '#options' => ['' => $this->t('- None -')] + $targets_available,
      '#default_value' => $default_value,
      '#description' => $this->t('Select a link behavior. <em>_self</em> will open the link in the current window. <em>_blank</em> will open the link in a new window or tab. <em>_parent</em> and <em>_top</em> will generally open in the same window or tab, but in some cases will open in a different window.'),
    ];


    return $element;
  }

}
