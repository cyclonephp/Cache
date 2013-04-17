<?php
namespace cyclone\cache;
/**
 * @author Bence Erős <crystal@cyclonephp.org>
 */
class ApcCache extends AbstractCache {
    /**
     * Retrieves the value belonging to the cache. If <code>$key</code> is not found int the cache, then
     * throws a @c CacheKeyNotFoundException.
     *
     * @param $key string
     * @return mixed
     * @throws CacheKeyNotFoundException
     */
    public function load($key) {
        $rval = apc_fetch($key, $success);
        if ($success === FALSE) {
            throw new CacheKeyNotFoundException($key);
        }
        return $rval;
    }

    /**
     * Stores a value in the cache.
     *
     * @param $key string
     * @param $value mixed
     * @return void
     */
    public function put($key, $value) {
        apc_store($key, $value);
    }

    /**
     * Deletes a key and its according value from the cache.
     *
     * @param $key
     * @return boolean <code>TRUE</code> on success, <code>FALSE</code> on failure.
     */
    public function delete($key) {
        return apc_delete($key);
    }

}
