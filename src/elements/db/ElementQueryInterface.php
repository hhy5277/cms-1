<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\elements\db;

use craft\base\ElementInterface;
use craft\models\Site;
use craft\search\SearchQuery;
use yii\db\Connection;
use yii\db\QueryInterface;

/**
 * ElementQueryInterface defines the common interface to be implemented by element query classes.
 *
 * The default implementation of this interface is provided by [[ElementQuery]].
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
interface ElementQueryInterface extends QueryInterface
{
    /**
     * Sets the [[asArray]] property.
     *
     * @param bool $value The property value (defaults to true)
     *
     * @return static self reference
     */
    public function asArray(bool $value = true);

    /**
     * Sets the [[id]] property.
     *
     * @param mixed $value The property value
     *
     * @return static self reference
     */
    public function id($value);

    /**
     * Sets the [[uid]] property.
     *
     * @param mixed $value The property value
     *
     * @return static self reference
     */
    public function uid($value);

    /**
     * Sets the [[fixedOrder]] property.
     *
     * @param bool $value The property value (defaults to true)
     *
     * @return static self reference
     */
    public function fixedOrder(bool $value = true);

    /**
     * Sets the [[status]] property.
     *
     * @param string|string[] $value The property value
     *
     * @return static self reference
     */
    public function status($value);

    /**
     * Sets the [[archived]] property.
     *
     * @param bool $value The property value (defaults to true)
     *
     * @return static self reference
     */
    public function archived(bool $value = true);

    /**
     * Sets the [[dateCreated]] property.
     *
     * @param mixed $value The property value
     *
     * @return static self reference
     */
    public function dateCreated($value = true);

    /**
     * Sets the [[dateUpdated]] property.
     *
     * @param mixed $value The property value
     *
     * @return static self reference
     */
    public function dateUpdated($value = true);

    /**
     * Sets the [[siteId]] property based on a given site(s)’s handle.
     *
     * @param string|Site $value The property value
     *
     * @return static self reference
     */
    public function site($value);

    /**
     * Sets the [[siteId]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function siteId(int $value);

    /**
     * Sets the [[enabledForSite]] property.
     *
     * @param mixed $value The property value (defaults to true)
     *
     * @return static self reference
     */
    public function enabledForSite($value = true);

    /**
     * Sets the [[relatedTo]] property.
     *
     * @param int|array|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function relatedTo($value);

    /**
     * Sets the [[title]] property.
     *
     * @param string|string[] $value The property value
     *
     * @return static self reference
     */
    public function title($value);

    /**
     * Sets the [[slug]] property.
     *
     * @param string|string[] $value The property value
     *
     * @return static self reference
     */
    public function slug($value);

    /**
     * Sets the [[uri]] property.
     *
     * @param string|string[] $value The property value
     *
     * @return static self reference
     */
    public function uri($value);

    /**
     * Sets the [[search]] property.
     *
     * @param string|array|SearchQuery $value The property value
     *
     * @return static self reference
     */
    public function search($value);

    /**
     * Sets the [[ref]] property.
     *
     * @param string|string[] $value The property value
     *
     * @return static self reference
     */
    public function ref($value);

    /**
     * Sets the [[with]] property.
     *
     * @param string|string[] $value The property value
     *
     * @return self The query object itself
     */
    public function with($value);

    /**
     * Sets the [[structureId]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function structureId(int $value);

    /**
     * Sets the [[level]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function level(int $value);

    /**
     * Sets the [[ancestorOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function ancestorOf($value);

    /**
     * Sets the [[ancestorDist]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function ancestorDist(int $value);

    /**
     * Sets the [[descendantOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function descendantOf($value);

    /**
     * Sets the [[descendantDist]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function descendantDist(int $value);

    /**
     * Sets the [[siblingOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function siblingOf($value);

    /**
     * Sets the [[prevSiblingOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function prevSiblingOf($value);

    /**
     * Sets the [[nextSiblingOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function nextSiblingOf($value);

    /**
     * Sets the [[positionedBefore]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function positionedBefore($value);

    /**
     * Sets the [[positionedAfter]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function positionedAfter($value);

    // Query preparation/execution
    // -------------------------------------------------------------------------

    /**
     * Executes the query and returns all results as an array.
     *
     * @param Connection $db The database connection used to generate the SQL statement.
     *                       If this parameter is not given, the `db` application component will be used.
     *
     * @return ElementInterface[] The resulting elements.
     */
    public function all($db = null);

    /**
     * @inheritdoc
     *
     * @return ElementInterface|null The resulting element.
     */
    public function one($db = null);

    /**
     * Executes the query and returns a single row of result at a given offset.
     *
     * @param int        $n  The offset of the row to return. If [[offset]] is set, $offset will be added to it.
     * @param Connection $db The database connection used to generate the SQL statement.
     *                       If this parameter is not given, the `db` application component will be used.
     *
     * @return array|bool The row (in terms of an array) of the query result. False is returned if the query
     * results in nothing.
     */
    public function nth(int $n, Connection $db = null);

    /**
     * Executes the query and returns the IDs of the resulting elements.
     *
     * @param Connection $db The database connection used to generate the SQL statement.
     *                       If this parameter is not given, the `db` application component will be used.
     *
     * @return int[] The resulting element IDs. An empty array is returned if no elements are found.
     */
    public function ids(Connection $db = null);
}
