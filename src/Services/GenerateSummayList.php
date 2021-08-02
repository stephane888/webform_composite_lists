<?php
namespace Drupal\webform_composite_lists\Services;

use Drupal\Core\Form\FormStateInterface;
use Stephane888\Debug\debugLog;

class GenerateSummayList {

	public $submission = [];

	private $vocabulaire;

	public function getTemplates(array $elements, &$output) {
		// $this->showEmpty = false;
		// dump($elements);
		if (isset($elements["#vocabulaire"])) {
			$this->vocabulaire = $elements["#vocabulaire"];
		}

		if ($this->submission && ! empty($elements["#webform_composite_elements"])) {
			$elements = $elements["#webform_composite_elements"];
			$output['localisation'] = [
				'#type' => 'html_tag',
				'#tag' => 'div',
				'#attributes' => [
					'class' => [
						'd-flex'
					]
				]
			];
			$this->generateTemplate2($elements, $output['localisation']);
		}
	}

	private function generateTemplate2(array $elements, array &$output) {
		// get webform_composite_lists
		if (isset($elements['webform_composite_lists']) && ! empty($this->submission['webform_composite_lists'])) {
			$term = $this->getLabelTerme($this->submission['webform_composite_lists']);
			$output['departement'] = [
				'#type' => 'html_tag',
				'#tag' => 'span',
				'#value' => $term->label()
			];
			// dump($this->submission);
		}
		if (isset($elements['webform_composite_lists_2']) && ! empty($this->submission['webform_composite_lists_2'])) {
			$this->getLabelTerme($this->submission['webform_composite_lists_2']);
			$output['ville'] = [
				'#type' => 'html_tag',
				'#tag' => 'span',
				'#value' => $term->label()
			];
		}
	}

	protected function getLabelTerme($id) {
		return \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($id);
	}
}