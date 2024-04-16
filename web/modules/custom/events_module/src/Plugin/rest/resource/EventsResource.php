<?php

namespace Drupal\events_module\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;


/**
 * Provides an Events overview Resource.
 *
 * @RestResource(
 *   id = "artists_overview_resource",
 *   label = @Translation("Artists Data Overview"),
 *   uri_paths = {
 *     "canonical" = "/api/artists-data"
 *   }
 * )
 */
class EventsResource extends ResourceBase {

  /**
   * Responds to GET requests.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The resource response.
   */
  public function get(): ResourceResponse {
    return new ResourceResponse(\Drupal::service('events_module.artists')->jsonDataFull());
  }

}
