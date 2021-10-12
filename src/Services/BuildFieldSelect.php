<?php

namespace Drupal\webform_composite_lists\Services;

use Drupal\Core\Form\FormStateInterface;
use Stephane888\Debug\debugLog;

class BuildFieldSelect {

    public function form(array &$elements) {
        // dump($elements);
        $options = [];
        if (isset($elements["#vocabulaire"])) {
            $level = isset($elements['#vocab_level']) ? $elements['#vocab_level'] : 1;
            $options = $this->getListTermes($elements["#vocabulaire"], $level);
        }
        $title = isset($elements["#title"]) ? $elements["#title"] : 'Liste de departements';
        $elements['webform_composite_lists'] = [
          '#type' => 'select',
          '#title' => $title,
          '#options' => $options,
          '#required' => true,
          '#after_build' => [
            [
              get_class($this),
              'afterBuildBuildFieldSelect'
            ]
          ],
          '#ajax' => [
            'callback' => '_WebformCompositeListsAjax',
            'event' => 'change',
            'wrapper' => 'webform-composite-lists-2-ajax'
          ]
        ];
        $options_2 = [];
        $elements['webform_composite_lists_2'] = [
          '#prefix' => '<div id="webform-composite-lists-2-ajax">',
          '#suffix' => '</div>',
          '#type' => 'select',
          '#title' => 'Dans quelle ville se situe votre projet ?',
          '#options' => $options_2
        ];
    }

    protected function getListTermes($vocab, $level) {
        // debugLog::$themeName = null;
        // debugLog::kintDebugDrupal(\Drupal::entityTypeManager()->getStorage('taxonomy_term'), 'getListTermes', null, true);
        //
        $tree = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vocab, 0, $level, TRUE);
        $result = [];
        foreach ($tree as $term) {
            $result[$term->id()] = $term->get('name')->value;
        }
        return $result;
    }

    static public function afterBuildBuildFieldSelect(array $element, FormStateInterface $form_state) {
        return $element;
    }

}
