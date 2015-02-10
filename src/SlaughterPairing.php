<?php namespace haugstrup\TournamentUtils;

class SlaughterPairing {

  public $players = array();

  public function __construct($players) {
    $this->players = $players;
  }

  public function build() {
    $players = $this->players;
    $groups = array('groups' => array(), 'byes' => array());

    if (count($this->players)%2 != 0) {
      $bye_slice = array_splice($players, -1, 1);
      $groups['byes'][] = $bye_slice[0];
    }

    while (count($players) >= 2) {
      $group = array();
      $player_one_slice = array_splice($players, 0, 1);
      $player_two_slice = array_splice($players, -1, 1);
      $group[] = $player_one_slice[0];
      $group[] = $player_two_slice[0];
      $groups['groups'][] = $group;
    }

    return $groups;
  }

}
