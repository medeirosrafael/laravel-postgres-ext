<?php

namespace YuryKabanov\Database\Schema;

use Illuminate\Database\Schema\PostgresBuilder as BasePostgresBuilder;

class PostgresBuilder extends BasePostgresBuilder
{
    /**
     * {@inheritdoc}
     *
     * @return Blueprint
     */
    protected function createBlueprint($table, \Closure $callback = null)
    {
        return new Blueprint($table, $callback);
    }

    /**
     * Creates view as given select statement
     *
     * @param string $view
     * @param string $select
     * @param bool $materialize
     */
    public function createView($view, $select, $materialize = false) {
        $blueprint = $this->createBlueprint($view);

        $blueprint->createView($select, $materialize);

        $this->build($blueprint);
    }

    /**
     * Drops view
     *
     * @param string $view
     * @param bool $materialize
     */
    public function dropView($view, $materialize = false) {
        $blueprint = $this->createBlueprint($view);

        $blueprint->dropView($materialize);

        $this->build($blueprint);
    }
}
