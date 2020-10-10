<?php

class Players {
  /**
  * get the players
  *
  * @param \contracts\Request $search
  * @return \contracts\Collectable
  */
  public function getPlayers(\contracts\Request $search): \contracts\Collectable {
    $where = $this->where($search);
    $bindedParams = $this->bindWhere($where);
    $sql = " SELECT roster.* FROM roster";
    $result = query($sql, $where, $bindedParams);
    return collect($result)
        ->map(function($item, $key) {
            unset($item['id']);
            return $item;
        });
  }
  /**
  * get the parameters used in where condition
  *
  * @param \contracts\Request
  * @return array
  */
  private function where(\contracts\Request $search): array
  {
    $where = [];
    // the $where will be populated like this for all desired columns
    if ($search->has('playerId')) {
      $where[] = 'playerId';
    }
    return $where;
  }
  /**
  * bind parameters used in where class
  *
  * @param \contracts\Request $search
  * @param array $columns
  * @return array
  */
  private function bindWhere(\contracts\Request $search, array $columns): array
  {
    $where = [];
    /**
    * bind all the parameters with the values
    */
    foreach ($columns as $col) {
      $where[":{$col}"] = $search->{$col};
    }
    return $where;
  }
}