<?php
namespace cyclone\cache;
/**
 * @author Bence Erős <crystal@cyclonephp.org>
 */
abstract class AbstractCache implements Cache {

    public function exists($key) {
        try {
            $this->load($key);
            return TRUE;
        } catch (CacheKeyNotFoundException $ex) {
            return FALSE;
        }
    }

    public function get($key) {
        try {
            return $this->load($key);
        } catch (CacheKeyNotFoundException $ex) {
            return NULL;
        }
    }

    public function delete_all($keys = NULL) {
        foreach ($keys as $key) {
            $this->delete($key);
        }
    }

    public function put_all($values) {
        foreach ($values as $key => $val) {
            $this->put($key, $val);
        }
    }


}
