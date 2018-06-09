<?php

namespace Drupal\gamification_points\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class GamificationPointForm.
 */
class GamificationPointForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $gamification_point = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $gamification_point->label(),
      '#description' => $this->t("Label for the Gamification point."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $gamification_point->id(),
      '#machine_name' => [
        'exists' => '\Drupal\gamification_points\Entity\GamificationPoint::load',
      ],
      '#disabled' => !$gamification_point->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $gamification_point = $this->entity;
    $status = $gamification_point->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Gamification point.', [
          '%label' => $gamification_point->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Gamification point.', [
          '%label' => $gamification_point->label(),
        ]));
    }
    $form_state->setRedirectUrl($gamification_point->toUrl('collection'));
  }

}
