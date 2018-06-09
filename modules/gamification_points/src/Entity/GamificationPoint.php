<?php

namespace Drupal\gamification_points\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Gamification point entity.
 *
 * @ConfigEntityType(
 *   id = "gamification_point",
 *   label = @Translation("Gamification point"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\gamification_points\GamificationPointListBuilder",
 *     "form" = {
 *       "add" = "Drupal\gamification_points\Form\GamificationPointForm",
 *       "edit" = "Drupal\gamification_points\Form\GamificationPointForm",
 *       "delete" = "Drupal\gamification_points\Form\GamificationPointDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\gamification_points\GamificationPointHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "gamification_point",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/gamification/gamification_point/{gamification_point}",
 *     "add-form" = "/admin/structure/gamification/gamification_point/add",
 *     "edit-form" = "/admin/structure/gamification/gamification_point/{gamification_point}/edit",
 *     "delete-form" = "/admin/structure/gamification/gamification_point/{gamification_point}/delete",
 *     "collection" = "/admin/structure/gamification/gamification_point"
 *   }
 * )
 */
class GamificationPoint extends ConfigEntityBase implements GamificationPointInterface {

  /**
   * The Gamification point ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Gamification point label.
   *
   * @var string
   */
  protected $label;

}
