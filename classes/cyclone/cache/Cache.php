<?php
namespace cyclone\cache;

/**
 * @author Bence Eros <crystal@cyclonephp.org>
 * @package cache
 */
interface Cache {

    /**
     * Returns <code>TRUE</code> if the <code>$key</code> exists in the cache.
     *
     * @param $key string
     * @return boolean
     */
    public function exists($key);

    /**
     * Retrieves the value belonging to the cache. If <code>$key</code> is not found int the cache, then
     * returns <code>null</code>.
     *
     * @param $key string
     * @return mixed
     */
    public function get($key);

    /**
     * Retrieves the value belonging to the cache. If <code>$key</code> is not found int the cache, then
     * throws a @c CacheKeyNotFoundException.
     *
     * @param $key string
     * @return mixed
     * @throws CacheKeyNotFoundException
     */
    public function load($key);

    /**
     * Stores a value in the cache.
     *
     * @param $key string
     * @param $value mixed
     * @return void
     */
    public function put($key, $value);

    /**
     * Batch-adds all key-value pairs to the cache.
     *
     * @param $values array an associative array of cache keys and values.
     * @return void
     */
    public function put_all($values);

    /**
     * Deletes a key and its according value from the cache.
     *
     * @param $key
     * @return boolean <code>TRUE</code> on success, <code>FALSE</code> on failure.
     */
    public function delete($key);

    /**
     * If <code>$keys</code> is <code>NULL</code> then it deletes all entries from the cache.
     *
     * Otherwise it batch-deletes all keys.
     *
     * @param $keys array
     * @return void
     */
    public function delete_all($keys = NULL);

}