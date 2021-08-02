<?php
namespace Drupal\webform_composite_lists\Element;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Element\WebformCompositeBase;

/**
 * Provides a 'webform_composite_lists'.
 *
 * Webform composites contain a group of sub-elements.
 *
 *
 * IMPORTANT:
 * Webform composite can not contain multiple value elements (i.e. checkboxes)
 * or composites (i.e. webform_address)
 *
 * @FormElement("webform_composite_lists")
 *
 * @see \Drupal\webform\Element\WebformCompositeBase
 * @see \Drupal\webform_composite_lists\Element\WebformExampleComposite
 */
class WebformCompositeLists extends WebformCompositeBase {

  /**
   *
   * {@inheritdoc}
   */
  public function getInfo()
  {
    return parent::getInfo() + [
      '#theme' => 'webform_composite_lists'
    ];
  }

  /**
   *
   * {@inheritdoc}
   */
  public static function getCompositeElements(array $element)
  {
    $Forms = \Drupal::service('webform_composite_lists.form');
    $Forms->form($element);
    return $element;
  }
}