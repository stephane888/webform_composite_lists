<?php
namespace Drupal\webform_composite_lists\Plugin\WebformElement;

use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform\WebformSubmissionInterface;
use Drupal\Core\Render\Element as RenderElement;
use Drupal\webform\Plugin\WebformElementAttachmentInterface;

/**
 * Provides a 'webform_composite_lists' element.
 *
 * @WebformElement(
 *   id = "webform_composite_lists",
 *   label = @Translation("Webform composite lists"),
 *   description = @Translation("Provides a webform composite list"),
 *   category = @Translation("Custom - WBU "),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 *
 * @see \Drupal\webform_composite_lists\Element\WebformExampleComposite
 * @see \Drupal\webform\Plugin\WebformElement\WebformCompositeBase
 * @see \Drupal\webform\Plugin\WebformElementBase
 * @see \Drupal\webform\Plugin\WebformElementInterface
 * @see \Drupal\webform\Annotation\WebformElement
 */
class WebformCompositeListsPlugin extends WebformCompositeBase {
  //
}